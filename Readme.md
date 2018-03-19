The database settings are optimized for heroku, please contact me if you want to use another database.

##App link:

**https://projectwerk2.herokuapp.com**

###API Routes:

####Listener:

**api/listener** (POST REQUEST to post multiple measurements)

the format should look like this:

```json
{
	"temperature": double,
	"humidity": double,
	"movement": double
}
```

to check if the measurements are added you can check:

**api/measurements** (GET REQUEST)

#### Locations:

**api/locations/{id}**

**api/locations** (GET REQUEST returns all locations)

**api/locations** (POST REQUEST posts a new locations)

the format for postings should look like this:

```json
{
	"classroom": "theClassroomYouWantToAdd"
}
```
