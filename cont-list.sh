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

check_docker
check_docker_daemon
clear
sudo docker ps -a --format "{{.Names}}\t\t{{.Status}}\t{{.Ports}}"