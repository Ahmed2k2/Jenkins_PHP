# Use the official PHP image as the base image
FROM php:7.4-cli

# Set the working directory inside the container
WORKDIR /app

# Copy your PHP code into the container
COPY . /app

# Expose port 4000
EXPOSE 4000

# Start PHP's built-in web server on port 4000
CMD ["php", "-S", "0.0.0.0:4000", "-t", "/app"]
