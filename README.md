# InterfaceCutRoom
CRUD interface for senior design CutRoom application

To use:

Download XAMPP for MacOS or Windows
https://www.apachefriends.org/index.html

Select 'Start' under the 'General' tab. Start all services under the 'Services' tab.
IMPORTANT: Mount the volume under the Volumes tab. On mac, htdocs is within this folder.

Place this project folder in 'htdocs'. This location changes across different platforms. 
This can be your repository location.

When XAMPP is running (all services green) navigate to http://localhost:8080/dashboard/
Note the 8080 above. You can find the localhost port under the 'network' tab in XAMPP.

Select 'PHPMyAdmin' (top right)
Select 'New' to add a new database (top left)
Name the new database 'cutroom_db'
Select 'Import' and browse for the file in this repository labeled 'cutroom_db.sql'
Select 'Go'

Test the website by navigating to 'http://localhost:8080/InterfaceCutRoom/'
