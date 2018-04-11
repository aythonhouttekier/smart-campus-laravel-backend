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

If the api is indicated with a  :closed_lock_with_key: you need an account to use the api

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
* **/api/locations**  :closed_lock_with_key: (POST REQUEST posts a new locations) 

the format for postings should look like this:

```json
{
    "name": "theNameOffTheClassroom",
    "roomnumber": "theNumberOfftheClassroom(the datatype is a string)",
    "description": "theDescriptionOffTheClassroom"
}
```
### Devices:

* **/api/devices/{id}**
* **/api/devices** (GET REQUEST returns all devices)  
* **/api/devices**  :closed_lock_with_key: (POST REQUEST posts a new devices) 

the format for postings should look like this:

```json
{
    "name": "theNameOffTheDevice",
    "dev-eui": "theDev-euiOffTheDevice",
    "location_id": "PKoffTheLocationWhereTheDeviceIsLocated"
}
```
### Sensors:

* **/api/sensors/{id}**
* **/api/sensors** (GET REQUEST returns all sensors)  
* **/api/sensors** :closed_lock_with_key: (POST REQUEST posts a new sensors) 

the format for postings should look like this:

```json
{
    "name": "theNameOffThesensor",
    "measurement_unit": "theUnitTheSensorIsMeasuring",
    "device_id": "PKoffTheDeviceWhereTheSensorIsInstalled"
}
```
## Register and login
This is an example to register or login with a user to access the :closed_lock_with_key: API's
### Register 
* **/api/register** 
![Alt Text](/images/register.PNG)
### Register 
* **/api/login** 
After registering you can get the token by logging in
![Alt Text](/images/login.PNG)
### Accessing the :closed_lock_with_key: API's
When done the previous steps you have to add some things to youre request
1. Set authentication type to "Bearer Token" and fill in you're recived token
![Alt Text](/images/addtokentorequest.PNG)
2. Add these two values to the header:
![Alt Text](/images/addheaders.PNG)
3. Normally you should be able now to access following API's with a POST request:
* **/api/locations**  :unlock:
* **/api/devices**  :unlock:
* **/api/sensors**  :unlock:
* **/api/measurements**  :unlock:  
Make sure the Foreign key(if adding devices, sensors, measurements) of the other table exists.  
You should get something like this when sending the post request:
![Alt Text](/images/postlocation.PNG)

## Database

### Database UML
![Alt Text](/images/database_uml.PNG)
