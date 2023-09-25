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
  - Go to the menu `PhpStorm/Preferences...`
  - Choose `> PHP`
  - Set `PHP language level` as appropriate
  - Choose the three dots next to the `CLI interpreter` choice
  - Click `+` at the top of the left sidebar
  - Select from `From Docker, Vagrant, VM, WSL, Remote...` (it will be the top, highlighted choice)
  - Choose the `Docker Compose` radio button
  - Choose the name of the PHP container created for this project from the `Service` dropdown and press the `OK` button to dismiss the dialog box
    - In the `General` section press the 'respin' icon for `PHP executable`
  - `Apply` / `OK` your way out of the dialog box stack
