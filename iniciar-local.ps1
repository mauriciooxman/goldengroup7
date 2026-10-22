$ErrorActionPreference = 'Stop'
Set-Location -LiteralPath $PSScriptRoot
$phpCommand = Get-Command php -ErrorAction Stop
Write-Host 'Golden Group 7: http://127.0.0.1:8080'
Write-Host 'Mantén esta terminal abierta. Para detener el servidor, pulsa Ctrl+C.'
& $phpCommand.Source -n -S 127.0.0.1:8080 -t (Join-Path $PSScriptRoot 'public') (Join-Path $PSScriptRoot 'public/router.php')
