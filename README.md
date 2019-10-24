# seabin-data-collection

1. `docker-compose pull` # Download the latest versions of the pre-built images
2. `docker-compose up -d` # Running in detached mode
3. `docker-compose exec php bin/console doctrine:migrations:migrate` run migrations