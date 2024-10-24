#!/bin/bash

# Check if Docker is installed
if ! command -v docker &> /dev/null; then
    echo "Docker is not installed. Please install Docker and try again."
    exit 1
fi

# Check if Docker daemon is running without using systemctl
if ! sudo docker info &> /dev/null; then
    echo "Docker daemon is not running."
fi

# Stop containers
sudo docker stop $(docker ps -a -q) &>/dev/null

# Remove containers
sudo docker rm $(docker ps -a -q) &>/dev/null

# Display container status
sudo docker ps -a --format "{{.Names}}\t\t{{.Status}}"

echo -e "\e[32mAll containers have been removed.\e[0m"