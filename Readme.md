The database settings are optimized for heroku, please contact me if you want to use another database.

The app can be found on:

**https://projectwerk2.herokuapp.com**

Locations api is working:

Routes:

**api/locations/{id}**

**api/locations** (GET REQUEST returns all locations)

**api/locations** (POST REQUEST posts a new locations)

the format for postings should look like this:

'''json
{
	"classroom": "theClassroomYouWantToAdd"
}
'''
