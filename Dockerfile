# Get the PHP official Docker image
FROM php:8.4

WORKDIR /usr/src/app

COPY . .

# Common for web apps
EXPOSE 8000

# Command to start the PHP server
CMD ["php", "-S", "0.0.0.0:8000"]
