# After Cloning the Repo
- Run `composer install` to get all the dependencies in place
- Run `docker ps` to see current services and ports to avoid
- Run `bin/cake EditYaml [options]`
    - Provide a short project name (2-3 letters) `-d {database port} -w {web port}`
    - The short project name, database port, and web port keep this particular docker container from stepping on other docker containers
- Run `docker compose up --build -d`
- Run `bin/db_setup.sh`
- Run `bin/migration.sh`
## Php Interpretor setup in PhpStorm
  - Go to the menu `PhpStorm/Preferences...`
  - Choose `> PHP`
  - Set `PHP language level` as appropriate
  - Choose the three dots next to the `CLI interpreter` choice
  - Click `+` at the top of the left sidebar
  - Select from `From Docker, Vagrant, VM, WSL, Remote...` (it will be the top, highlighted choice)
  - Choose the `Docker Compose` radio button
  - Choose the name of the PHP container created for this project from the `Service` dropdown and press the `OK` button to dismiss the dialog box
  - In the `General` section press the 're-spin' icon for `PHP executable`
  - `Apply` / `OK` your way back to the main Preferences dialog
    - The preferences `PHP` pane, `Path mappings:` should include the path `<Project root>→/application;` for PhpUnit configuration to work
  ## PhpUnit Configuration in PhpStorm
  - Click `>` to expand the `PHP` preferences sub menu
  - Choose `Test Frameworks`
  - Choose `+` at the top left sidebar of the `PHP > Test Frameworks` pane
  - Choose `PhpUnit Local`
  - Choose `Use Composer autoloader` radio button
  - Click the `Path to script:` folder icon and select `vendor/autoload.php`
  - In the `Test Runner` section, check `Default configuration file:` checkbox, then click its folder icon and select `phpunit.xml.dist`
  - `Apply` / `OK` your way back to the editor
