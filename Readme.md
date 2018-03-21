# Smart Campus Laravel Backend

### Installing laravel from scratch
If you want to install laravel from scratch follow the readme of this repository:
**https://github.com/Trapn/laravelframeworktesting** (there is a little tutorial for laravel blade templating and presetting react)


## App link:

**https://projectwerk2.herokuapp.com**

### API Routes:

#### Listener:

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
