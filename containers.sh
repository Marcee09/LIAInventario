#!/bin/bash

# Check if docker is installed
function check_docker() {
    if ! [ -x "$(command -v docker)" ]; then
        echo "Docker is not installed. Pleas install it."
        exit 1
    fi
}

# Check if docker daemon is running
function check_docker_daemon() {
    if ! sudo docker info &>/dev/null; then
        echo "Docker daemon is not running."
        exit 1
    fi
}

start_containers() {
    echo "Starting containers..."
    sudo docker start $(docker ps -a -q) &>/dev/null
}

stop_containers() {
    echo "Stopping containers..."
    sudo docker stop $(docker ps -a -q) &>/dev/null
}

check_docker
check_docker_daemon

# Parse command line arguments
if [[ $# -eq 0 ]]; then
    echo "Usage: $0 [start|stop]"
    exit 1
fi

# Start or stop containers based on command line argument
case $1 in
    start)
        start_containers
        ;;
    stop)
        stop_containers
        ;;
    *)
        echo "Invalid command. Usage: $0 [start|stop]"
        exit 1
        ;;
esac

# Display container status
sudo docker ps -a --format "{{.Names}}\t\t{{.Status}}"
