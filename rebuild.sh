#!/bin/bash

echo "🔄 Rebuilding application..."

# Stop containers
docker-compose down

# Build with cache
docker-compose build

# Start containers in detached mode
docker-compose up -d

# Wait for MySQL to be ready
echo "⏳ Waiting for MySQL to be ready..."
sleep 10

# Run migrations and seeds
echo "🌱 Running database migrations and seeds..."
docker-compose exec -T db mysql -uappuser -papppassword contact_app < src/database/seeds/initial_seed.sql

echo "✅ Rebuild complete! Application is running."