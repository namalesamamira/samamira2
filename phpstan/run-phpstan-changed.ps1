[CmdletBinding()]
param(
    [switch]$IncludeUnversioned = $true,
    [string]$FallbackPath = 'app'
)

$ErrorActionPreference = 'Stop'

$repoRoot = if ($PSScriptRoot) { $PSScriptRoot } else { (Get-Location).Path }
Set-Location $repoRoot

& (Join-Path $repoRoot 'phpstan-watch.ps1') -Once -IncludeUnversioned:$IncludeUnversioned -FallbackPath $FallbackPath
if ($LASTEXITCODE -ne 0) {
    exit $LASTEXITCODE
}

$phpstanBinary = if (Test-Path (Join-Path $repoRoot 'vendor\bin\phpstan.bat')) {
    Join-Path $repoRoot 'vendor\bin\phpstan.bat'
} elseif (Test-Path (Join-Path $repoRoot 'vendor\bin\phpstan')) {
    Join-Path $repoRoot 'vendor\bin\phpstan'
} else {
    'phpstan'
}

& $phpstanBinary analyse --configuration=phpstan.neon
exit $LASTEXITCODE