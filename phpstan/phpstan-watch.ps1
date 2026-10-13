[CmdletBinding()]
param(
    [switch]$Once,
    [switch]$IncludeUnversioned = $true,
    [string]$FallbackPath = 'app',
    [int]$PollSeconds = 2
)

$ErrorActionPreference = 'Stop'

function Get-ProjectRoot {
    if ($PSScriptRoot) {
        return $PSScriptRoot
    }

    return (Get-Location).Path
}

function Get-ChangedPhpStanPaths {
    param(
        [switch]$IncludeUnversioned,
        [string]$FallbackPath,
        [string[]]$IgnorePatterns
    )

    $statusOutput = & git status --porcelain 2>$null
    if ($LASTEXITCODE -ne 0) {
        throw 'git status failed. Run this script from a Git working directory with git available on PATH.'
    }

    # Git status codes: M (modified), A (added), D (deleted), R (renamed), ? (untracked)
    $allowedStatuses = @('M', 'A', 'R')
    if ($IncludeUnversioned) {
        $allowedStatuses += '?'
    }

    $files = foreach ($line in $statusOutput) {
        if ([string]::IsNullOrWhiteSpace($line) -or $line.Length -lt 4) {
            continue
        }

        # Git porcelain format: XY PATH
        # First two characters are status codes, then space, then path
        $status = $line.Substring(0, 1)
        $indexStatus = $line.Substring(1, 1)
        
        # Accept if either working tree or index has an allowed status
        if ($allowedStatuses -notcontains $status -and $allowedStatuses -notcontains $indexStatus) {
            continue
        }

        # Extract path (skip first 3 characters: "XY ")
        $relativePath = $line.Substring(3).Trim()
        if ([string]::IsNullOrWhiteSpace($relativePath)) {
            continue
        }

        $normalizedPath = $relativePath -replace '\\', '/'
        if ($normalizedPath -notmatch '(?i)\.(php|blade\.php)$') {
            continue
        }

        if (Test-IsIgnoredPath -Path $normalizedPath -IgnorePatterns $IgnorePatterns) {
            continue
        }

        $normalizedPath
    }

    $uniqueFiles = @($files | Sort-Object -Unique)
    return $uniqueFiles
}

function Get-ExistingPhpStanPaths {
    param(
        [string]$PathFile,
        [string[]]$IgnorePatterns
    )

    if (-not (Test-Path $PathFile)) {
        return @()
    }

    $existingPaths = foreach ($line in [System.IO.File]::ReadAllLines($PathFile)) {
        if ($line -match '^\s*-\s+(.+?)\s*$') {
            $normalizedPath = $matches[1] -replace '\\', '/'
            if (-not (Test-IsIgnoredPath -Path $normalizedPath -IgnorePatterns $IgnorePatterns)) {
                $normalizedPath
            }
        }
    }

    return @($existingPaths | Where-Object { -not [string]::IsNullOrWhiteSpace($_) } | Sort-Object -Unique)
}

function Merge-PhpStanPaths {
    param(
        [string[]]$ExistingPaths,
        [string[]]$ChangedPaths,
        [string]$FallbackPath
    )

    $mergedPaths = @($ExistingPaths + $ChangedPaths | Where-Object { -not [string]::IsNullOrWhiteSpace($_) } | Sort-Object -Unique)
    if ($mergedPaths.Count -eq 0) {
        return @($FallbackPath)
    }

    return $mergedPaths
}

function Get-IgnorePatterns {
    param(
        [string]$RepoRoot
    )

    $patternFiles = @(
        (Join-Path $RepoRoot '.ignore'),
        (Join-Path $RepoRoot '.gitignore')
    )

    $patterns = foreach ($patternFile in $patternFiles) {
        if (-not (Test-Path $patternFile)) {
            continue
        }

        foreach ($line in [System.IO.File]::ReadAllLines($patternFile)) {
            $trimmedLine = $line.Trim()
            if ([string]::IsNullOrWhiteSpace($trimmedLine)) {
                continue
            }

            if ($trimmedLine.StartsWith('#')) {
                continue
            }

            if ($trimmedLine.StartsWith('!')) {
                continue
            }

            $trimmedLine -replace '\\', '/'
        }
    }

    return @($patterns | Sort-Object -Unique)
}

function Test-IsIgnoredPath {
    param(
        [string]$Path,
        [string[]]$IgnorePatterns
    )

    if ([string]::IsNullOrWhiteSpace($Path) -or $IgnorePatterns.Count -eq 0) {
        return $false
    }

    $normalizedPath = ($Path -replace '\\', '/').TrimStart('./')
    $segments = $normalizedPath.Split('/')

    foreach ($pattern in $IgnorePatterns) {
        $normalizedPattern = ($pattern -replace '\\', '/').Trim()
        if ([string]::IsNullOrWhiteSpace($normalizedPattern)) {
            continue
        }

        $isDirectoryPattern = $normalizedPattern.EndsWith('/')
        $normalizedPattern = $normalizedPattern.TrimStart('/').TrimEnd('/')
        if ([string]::IsNullOrWhiteSpace($normalizedPattern)) {
            continue
        }

        $hasWildcard = $normalizedPattern.IndexOfAny(@('*', '?', '[')) -ge 0
        $hasSlash = $normalizedPattern.Contains('/')

        if ($hasWildcard) {
            if ($hasSlash) {
                if ($normalizedPath -like $normalizedPattern) {
                    return $true
                }

                if ($isDirectoryPattern -and $normalizedPath -like "$normalizedPattern/*") {
                    return $true
                }

                continue
            }

            foreach ($segment in $segments) {
                if ($segment -like $normalizedPattern) {
                    return $true
                }
            }

            continue
        }

        if ($hasSlash) {
            if ($normalizedPath -eq $normalizedPattern -or $normalizedPath.StartsWith("$normalizedPattern/")) {
                return $true
            }

            continue
        }

        if ($segments -contains $normalizedPattern) {
            return $true
        }
    }

    return $false
}

function New-PhpStanChangedPathsContent {
    param(
        [string[]]$Paths
    )

    $lines = @(
        'parameters:',
        '    paths:'
    )

    foreach ($path in $Paths) {
        $lines += "        - $path"
    }

    return ($lines -join [Environment]::NewLine) + [Environment]::NewLine
}

$repoRoot = Get-ProjectRoot
Set-Location $repoRoot

$outputFile = Join-Path $repoRoot 'phpstan.changed-paths.neon'
$ignorePatterns = Get-IgnorePatterns -RepoRoot $repoRoot
$lastWrittenContent = if (Test-Path $outputFile) {
    [System.IO.File]::ReadAllText($outputFile)
} else {
    ''
}

do {
    $ignorePatterns = Get-IgnorePatterns -RepoRoot $repoRoot
    $existingPaths = Get-ExistingPhpStanPaths -PathFile $outputFile -IgnorePatterns $ignorePatterns
    $changedPaths = Get-ChangedPhpStanPaths -IncludeUnversioned:$IncludeUnversioned -FallbackPath $FallbackPath -IgnorePatterns $ignorePatterns
    $paths = Merge-PhpStanPaths -ExistingPaths $existingPaths -ChangedPaths $changedPaths -FallbackPath $FallbackPath
    $newContent = New-PhpStanChangedPathsContent -Paths $paths

    if ($newContent -ne $lastWrittenContent) {
        [System.IO.File]::WriteAllText($outputFile, $newContent, [System.Text.UTF8Encoding]::new($false))
        $lastWrittenContent = $newContent
        Write-Output "Updated phpstan.changed-paths.neon with $($paths.Count) path(s)."
    }

    if (-not $Once) {
        Start-Sleep -Seconds $PollSeconds
    }
} while (-not $Once)