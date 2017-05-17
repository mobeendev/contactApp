Below are the steps which you can follow to run the application (on Windows OS 7/8/10).
Download and install the WAMP server from http://www.wampserver.com/en/

Navigate to "www" folder of WAMP and clone this repo there.


Database Configuration
  Open PHPMyAdmin and create a database e.g “contactapp” as I have did.
	Open the contactapp folder and open the “.env” file in text editor and provide the database configurations there.
  
  
  Importing the database:
	   1.	Oen the Laravel Command Line and run following command  “php artisan migrate”
     This will create the two tables in the database you’ve created i.e contacts and users tables and also a migrations table 
     
     Now at this stage we have successfully configured the ContactApp and we can run it.
     
     Start the wamp server and browse the url : http://localhost/contactapp/public/
     
     Read the Setup-Guide file to use this app.
     
     Thanks.
     

  
