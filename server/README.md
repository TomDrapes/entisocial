### Getting Started
To begin using this boilerplate setup there are a few things you will need to do first.

---
### Create .env file
You will need to copy and paste the `.env.example` file inside the `laravel` directory and rename it to `.env`.

Run this command to automatically fill out the APP_KEY in the `.env` file:
    `php artisan key:generate`
    
Ensure that the database name configured in the `mysql` container inside `docker-compose.yml` matches the value 
for DB_DATABASE inside `.env`

Note after running `make db-refresh` you might have to install passport again. Note ensure it is installed
inside the docker container.

You will need to add your gmail credentials for `MAIL_USERNAME`, `MAIL_PASSWORD` and `MAIL_FROM_ADDRESS`. Note that
if you haven't already, you will need to go into your gmail account and allow access to third party apps. You will also 
need to generate an App password in your gmail security settings to use for the `MAIL_PASSWORD` value and not your emails
login password.

---
### Useful make commands

- `db-refresh` - this will execute `php artisan migrate:refresh` in the php container
- `db-migrate` - this will execute `php artisan migrate` in the php container
- `clear-caches` - this will clear the routes, config, cache and then call `composer dump-autoload`

### Useful php Artisan commands

  - `clear-compiled` -       Remove the compiled class file
  - `down` -                 Put the application into maintenance mode
  - `env` -                  Display the current framework environment
  - `help` -                 Displays help for a command
  - `inspire` -              Display an inspiring quote
  - `list` -                 Lists commands 
  - `migrate` -              Run the database migrations
  - `optimize` -             Cache the framework bootstrap files
  - `serve` -                Serve the  application on the PHP development server
  - `test` -                 Run the application tests
  - `tinker` -               Interact with your application
  - `up` -                   Bring the application out of maintenance mode
  - `auth:clear`-            Flush expired password reset tokens
  - `cache:clear` -          Flush the application cache
  - `cache:forget` -         Remove an item from the cache
  - `cache:table` -          Create a migration for the cache database table
  - `config:cache` -         Create a cache file for faster configuration loading
  - `config:clear` -         Remove the configuration cache file
  - `db:seed` -              Seed the database with records
  - `db:wipe` -              Drop all tables, views, and types
  - `event:cache` -          Discover and cache the application's events and listeners
  - `event:clear` -          Clear all cached events and listeners
  - `event:generate` -       Generate the missing events and listeners based on registration
  - `event:list` -           List the application's events and listeners
  - `key:generate` -         Set the application key
  - `make:channel` -         Create a new channel class
  - `make:command` -         Create a new Artisan command
  - `make:component` -       Create a new view component class
  - `make:controller` -      Create a new controller class
  - `make:event` -           Create a new event class
  - `make:exception` -       Create a new custom exception class
  - `make:factory` -         Create a new model factory
  - `make:job` -             Create a new job class
  - `make:listener` -        Create a new event listener class
  - `make:mail` -            Create a new email class
  - `make:middleware` -      Create a new middleware class
  - `make:migration` -       Create a new migration file
  - `make:model` -           Create a new Eloquent model class
  - `make:notification` -    Create a new notification class
  - `make:observer` -        Create a new observer class
  - `make:policy` -          Create a new policy class
  - `make:provider` -        Create a new service provider class
  - `make:request` -         Create a new form request class
  - `make:resource` -        Create a new resource
  - `make:rule` -            Create a new validation rule
  - `make:seeder` -          Create a new seeder class
  - `make:test` -            Create a new test class
  - `migrate:fresh` -        Drop all tables and re-run all migrations
  - `migrate:install` -      Create the migration repository
  - `migrate:refresh` -      Reset and re-run all migrations
  - `migrate:reset` -        Rollback all database migrations
  - `migrate:rollback` -     Rollback the last database migration
  - `migrate:status` -       Show the status of each migration
  - `notifications:table` -  Create a migration for the notifications table
  - `optimize:clear` -       Remove the cached bootstrap files
  - `package:discover` -     Rebuild the cached package manifest
  - `queue:failed` -         List all of the failed queue jobs
  - `queue:failed`-          Create a migration for the failed queue jobs database table
  - `queue:flush` -          Flush all of the failed queue jobs
  - `queue:forget` -         Delete a failed queue job
  - `queue:listen` -         Listen to a given queue
  - `queue:restart` -        Restart queue worker daemons after their current job
  - `queue:retry` -          Retry a failed queue job
  - `queue:table` -          Create a migration for the queue jobs database table
  - `queue:work` -           Start processing jobs on the queue as a daemon
  - `route:cache` -          Create a route cache file for faster route registration
  - `route:clear` -          Remove the route cache file
  - `route:list` -           List all registered routes
  - `schedule:run` -         Run the scheduled commands
  - `session:table` -        Create a migration for the session database table
  - `storage:link` -         Create the symbolic links configured for the application
  - `stub:publish` -         Publish all stubs that are available for customization
  - `vendor:publish` -       Publish any publishable assets from vendor packages
  - `view:cache` -           Compile all of the application's Blade templates
  - `view:clear` -           Clear all compiled view files