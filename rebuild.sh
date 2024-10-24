#!/bin/bash

# Check the .env file exists in the src directory
if [[ ! -f src/.env ]]; then
    echo "The .env file does not exist in the src directory."
    exit 1
fi

# Parse command line arguments
if [[ $# -eq 0 ]]; then
    echo "Usage: $0 [local|production]"
    exit 1
fi

# If local, set name of Docker Compose file else if production, set name of Docker Compose file
case $1 in
    local)
        docker_compose_file="docker-compose.yml"
        ;;
    production)
        docker_compose_file="docker-compose-prod.yml"
        ;;
    *)
        echo "Invalid command. Usage: $0 [local|production]"
        exit 1
        ;;
esac

sudo docker compose -f $docker_compose_file up -d --build app
sudo docker compose run --rm composer update
sudo docker compose run --rm artisan migrate
sudo docker compose run --rm artisan db:seed
sudo docker compose run --rm artisan key:generate
sudo docker compose run --rm npm install
sudo docker compose run --rm npm run build
# sudo docker compose run --rm artisan users

# Check the api/ping endpoint returns a 200 status code
#if [[ $(curl -s -o /dev/null -w "%{http_code}" http://localhost/api/ping) -eq 200 ]]; then
    # Display message in green with a checkmark
#    echo -e "\e[32mAPI is running.\e[0m"
#else
    # Display message in red
#    echo -e "\e[31mAPI is not running.\e[0m"
#fi