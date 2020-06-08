# InterfaceCutRoom
A web based scheduling engine for clothing manufacturing, created for UConn's senior design class in partnership with Interface Technologies

## To use:

- Download [XAMPP](https://www.apachefriends.org/index.html) for MacOS or Windows

## FOR MAC:

- Select 'Start' under the 'General' tab. 
- Start all services under the 'Services' tab.
- Enable both port forwarding rules in the Network tab of XAMPP
- IMPORTANT: Mount the volume under the Volumes tab. On mac, htdocs is within this folder.
- Place this project(repo) folder in 'htdocs'. This location changes across different platforms. 

### When XAMPP is running (all services green) navigate to http://localhost:8080/dashboard/
Note the 8080 above. You can find the localhost port under the 'network' tab in XAMPP.

## FOR WINDOWS:

- In the XAMPP folder, select the xampp-control application
- Select start on all five services. Tomcat might fail to start, just keep trying eventually it will run.
- Place this project(repo) folder in 'htdocs'. This should be in the xampp folder.
### When XAMPP is running (all services green) enter localhost as your web address in your internet browser.


## FOR ALL SYSTEMS:

- Select 'PHPMyAdmin' (top right)
- Select 'New' to add a new database (top left)
- Name the new database 'cutroom_db'
- Select 'Import' and browse for the file in this repository labeled 'cutroom_db.sql'
- Select 'Go'

### Test the website by navigating to 'http://localhost:8080/InterfaceCutRoom/' or 'localhost'

