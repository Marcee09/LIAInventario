function Stop-ProcessByPort {
    param (
        [int]$PortNumber,
        [string]$ProcessName
    )

    $process = Get-NetTCPConnection -LocalPort $PortNumber -ErrorAction SilentlyContinue | 
        Select-Object -ExpandProperty OwningProcess -ErrorAction SilentlyContinue | 
        ForEach-Object { Get-Process -Id $_ }

    if ($process) {
        $process | Stop-Process -Force
        Write-Host "Process '$ProcessName' running on port $PortNumber has been terminated."
    } else {
        Write-Host "No process '$ProcessName' found running on port $PortNumber."
    }
}

# A function that reads the processes.txt file and stops the processes
function Stop-Processes {
    if (-not (Test-Path .\processes.txt)) {
        Write-Host "No processes to stop."
        return
    }
    $processes = Get-Content .\processes.txt
    $processes | ForEach-Object {
        $process = Get-Process -Id $_
        if ($process) {
            $process | Stop-Process
            Write-Host "Process with ID $_ has been stopped."
        }
        #Stop-Process -Id $_
    }
    Remove-Item .\processes.txt
}

#Stop-ProcessByPort 5173 "Vite"
#Stop-ProcessByPort 8000 "php artisan serve"
Stop-Processes