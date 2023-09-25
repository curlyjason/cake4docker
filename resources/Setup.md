# After Cloning the Repo
- Run `composer install` to get all the dependencies in place
- Run `docker compose ps` to see current services and ports to avoid
- Run `bin/cake EditYaml [options]`
    - Provide a short project name (2-3 letters) `-d {database port} -w {web port}`
    - The short project name, database port, and web port keep this particular docker container from stepping on other docker containers
- Run `docker compose up --build -d`
- Run `bin/db_setup.sh`
- Run `bin/migration.sh`
## Edit the PHPStorm CLI
  - Go to Settings / PHP
  - Choose the three dots next to the CLI interpreter choice
  - Select from Docker
  - Choose Docker Compose
  - Choose the name of the PHP container created for this project
  - Apply / OK your way out
