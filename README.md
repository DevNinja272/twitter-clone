# Twitter Clone

### Process
I tried to use Silex and Composer for this final application, but it did not work out too well since I am not too familiar working in the PHP environment.  
The main issue I ran into was setting it up on my local machine. I was able to run it using `composer run` after installing all the dependencies, but then I ran into the problem of where to make the files in which folders for organization sake and which folders had which purpose.   
I got confused on the Twig templating of how all that is set up. I was not able to set up or comprehend how to connect a SQL database into the app. I knew it had to do with one of the service providers or dependencies, but wasn't able to get it to work.

I then tried having a solo folder for an XAMPP application, but was not able to connect to the MySQL module on the solo folder. Therefore, the only thing that I could run to test my changes was working in the default xampp folder and have all my php files in the `htdocs` folder. I tried templating using "Plates" but that did not work out as well.

## What I Have to Show For

### Setup
The environment that I have setup is XAMPP. I downloaded XAMPP and then configured all the settings on Windows 10 to get Apache and MySQL modules running so I can test on my localhost. In phpMyAdmin, I created a database ("twitterdb"), a table ("messages"), and a column ("post"). I then made a new account to have granted permissions to insert, edit, and etc on that specified database with that user. With these settings, I was able to create a php file to connect my database with the application. Here are the settings:
```
DEFINE ('DB_USER', 'twitteradmin');
DEFINE ('DB_PASSWORD', 'p@$$w0rd1$$@f3f0r3v3r');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'twitterdb');
```

### File Structure
There are two major files: `twitterClone.php` and `mysqli_connect.php`.   
+ The twitterClone.php file is the page where you can add your tweets into the database and have it show on the page. The layout is a grid-like structure controlled by CSS3. The file include code that sends queries into the database and also retrieve it to show previous tweets. 
+ The mysqli_connect.php file is within the root directory and the main purpose is to connect the database so there will be communication between the application and the SQL database. The file has the credentials to get access into the database. 

## What I Could Have Done to Make it Better
+ Better UI/UX to mimic Twitter
+ Fully learn Silex to use the micro framework to make the work flow more organized
+ Gain understanding of the templates, like Twig, so there would be more code reuse and smaller individual files
