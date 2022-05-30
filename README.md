# CINEMA APi
This API is created using Laravel 8.75 API Resource. It has Users, Movies and Cinema Locations. Protected routes are also added. Protected routes are accessed via jwt access token.

#### Usage
Clone the project via git clone or download the zip file.

##### .env
Copy contents of .env.example file to .env file. Create a database and connect your database in .env file.
##### Composer Install
cd into the project directory via terminal and run the following  command to install composer packages.
###### `composer install`
##### Generate Key
then run the following command to generate fresh key.
###### `php artisan key:generate`
##### Run Migration
then run the following command to create migrations in the database.
###### `php artisan migrate`
##### Passport Install
run the following command to generate jwt secret key
###### `php artisan jwt:secret`
##### Database Seeding
finally run the following command to seed the database with dummy content.
###### `php artisan db:seed`

### API EndPoints
##### User
* User POST Login `http://localhost:8000/api/login`
* User POST Register `http://localhost:8000/api/register`

##### Cinema locations
* Location GET `http://localhost:8000/api/locations`

##### Movies
* Post GET All Movies By Location `http://localhost:8000/api/movies/location/1`
* Post GET Single `http://localhost:8000/api/movies/1/location/1`
* Post POST Create `http://localhost:8000/api/movies/store`
* Post POST Update `http://localhost:8000/api/movies/update/1`
* Post DELETE destroy movie by location `http://localhost:8000/api/movies/1/1`
