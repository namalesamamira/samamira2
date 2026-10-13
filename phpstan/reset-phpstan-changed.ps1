[CmdletBinding(SupportsShouldProcess)]
param(
    [string[]]$Paths = @('app')
)

$ErrorActionPreference = 'Stop'

$repoRoot = if ($PSScriptRoot) { $PSScriptRoot } else { (Get-Location).Path }
$outputFile = Join-Path $repoRoot 'phpstan.changed-paths.neon'

$normalizedPaths = @(
    $Paths |
        Where-Object { -not [string]::IsNullOrWhiteSpace($_) } |
        ForEach-Object { $_ -replace '\\', '/' } |
        Sort-Object -Unique
)

if ($normalizedPaths.Count -eq 0) {
    throw 'Provide at least one non-empty path.'
}

$contentLines = @(
    'parameters:',
    '    paths:'
)

foreach ($path in $normalizedPaths) {
    $contentLines += "        - $path"
}

$newContent = ($contentLines -join [Environment]::NewLine) + [Environment]::NewLine

if ($PSCmdlet.ShouldProcess($outputFile, 'Reset PHPStan changed paths')) {
    [System.IO.File]::WriteAllText($outputFile, $newContent, [System.Text.UTF8Encoding]::new($false))
    Write-Output "Reset phpstan.changed-paths.neon with $($normalizedPaths.Count) path(s)."
}