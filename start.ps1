Clear-Host

$currentPath = Get-Location
# check if the currentPath ends with 'src' or 'src\'
if ($currentPath -match 'src$' -or $currentPath -match 'src\\$') {
    # if the currentPath ends with 'src' or 'src\', then change the directory to the parent directory
    Set-Location ..
}


Set-Location src

if ($args -contains '-r') {
    Remove-Item database/database.sqlite -ErrorAction SilentlyContinue
    php artisan migrate --force --seed
}

$vite = Start-Process -FilePath "powershell.exe" -ArgumentList "-Command", "npm run dev" -PassThru -NoNewWindow
$artisan = Start-Process -FilePath "powershell.exe" -ArgumentList "-Command", "php artisan serve" -PassThru -NoNewWindow


# Save the process IDs to a file
$processes = @($vite.Id, $artisan.Id)
$processes | Out-File .\processes.txt