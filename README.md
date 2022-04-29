# Customers app

### Installation

- Clone this repository

- Run ``composer install``

- Setup a mysql database and copy ``.env.example`` file to ``.env``.

- Set the mysql credential in ``.env`` file.

You can install mysql with docker (https://github.com/ikiranis/mysql-server-docker)

- Give write privileges to ``storage`` folder

- Run the app in development mode

```
php artisan serve
```

- CSV file to import, is in ``storage/app/public`` folder.

- To export the file, run the following artisan command. Exported CSV file will be stored in the same folder

```
php artisan export:customers <filename> (without .csv extension)
```

- On CSV import, you must run ``php artisan queue:work`` to start the queued jobs 
