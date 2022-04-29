# Customers app
![2022-04-29_06-54](https://user-images.githubusercontent.com/50238022/165883173-d007f746-93a6-4c1e-a88e-2dc8b94adfae.png)


### Installation

- Clone this repository

- Run ``composer install``

- Setup a mysql database and copy ``.env.example`` file to ``.env``.

- Set the mysql credentials in ``.env`` file.

You can install mysql on docker (https://github.com/ikiranis/mysql-server-docker)

- Give write privileges to ``storage`` folder

- Run migrations ``php artisan migrate``. Or ``php artisan migrate --seed``, to insert some customers.

- Run the app in development mode

```
php artisan serve
```

- CSV file to import, is in ``storage/app/public`` folder (``file.csv``).

- To export customers data, run the following artisan command. Exported CSV file will be stored in the same folder

```
php artisan export:customers <filename> (without .csv extension)
```

- On CSV import, you must run ``php artisan queue:work`` to start the queued jobs 
