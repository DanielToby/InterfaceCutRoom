# InterfaceCutRoom
CRUD interface for senior design CutRoom application

## To use:

- Download [XAMPP](https://www.apachefriends.org/index.html) for MacOS or Windows
- Select 'Start' under the 'General' tab. 
- Start all services under the 'Services' tab.
- Enable both port forwarding rules in the Network tab of XAMPP
- IMPORTANT: Mount the volume under the Volumes tab. On mac, htdocs is within this folder.
- Place this project(repo) folder in 'htdocs'. This location changes across different platforms. 

### When XAMPP is running (all services green) navigate to http://localhost:8080/dashboard/
Note the 8080 above. You can find the localhost port under the 'network' tab in XAMPP.

- Select 'PHPMyAdmin' (top right)
- Select 'New' to add a new database (top left)
- Name the new database 'cutroom_db'
- Select 'Import' and browse for the file in this repository labeled 'cutroom_db.sql'
- Select 'Go'

### Test the website by navigating to 'http://localhost:8080/InterfaceCutRoom/'


### When branching use a name that is descriptive of the work you did.
