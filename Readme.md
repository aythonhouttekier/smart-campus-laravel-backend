# Smart Campus Laravel Backend
In this project i'm working with laravel 5.6

Specs and guides can be found on following link:    
https://laravel.com/docs/5.6

### Installing laravel from scratch
If you want to install laravel from scratch follow the readme of this repository:    
**https://github.com/Trapn/laravelframeworktesting** (there is a little tutorial for laravel blade templating and presetting react)

## Using Eloquent ORM
If you want to use mySQL create a database called: `smartcampus`

Run this command in powershell to create the database tables:    
```php artisan migrate```

## Using Database: Seeding
To "seed" (or fill) the database with dummy info:      
```php artisan db:seed```  
  
ONLY if you did something wrong with adding info to the database run this before seeding:      
```php artisan migrate:fresh``` (this will delete all tables and make them again)

## App link:

**https://projectwerk2.herokuapp.com**

## API Routes:

### Listener:

* **/api/listener** (POST REQUEST to post multiple measurements)

the format should look like this:

There's a dummy device in the database with dev-eui `00E4F052209EE8A5` the json should look like this:  
```json
{
    "dev-eui": "00E4F052209EE8A5",
    "temperature": 5,
    "humidity": 20,
    "movement": 8
}
```

to check if the measurements are added you can check:

**api/measurements** (GET REQUEST)

### Locations:

* **/api/locations/{id}**
* **/api/locations** (GET REQUEST returns all locations)
* **/api/locations** (POST REQUEST posts a new locations)

the format for postings should look like this:

```json
{
	"classroom": "theClassroomYouWantToAdd"
}
```
