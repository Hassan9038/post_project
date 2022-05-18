<?php 
session_start();
/*
** This page use to handel all pages 
** This page connect with index page
** With this page you can create an object
*/
// include the config page it hold all constant variables
include_once 'configs/config.php'; 

// include the Core page it use to roating on the webside
include_once 'libarires/Core.class.php';

//include the Database page it use to connection with database and close the connection
include_once 'libarires/Database.class.php';

// include the Controller page it use to control the model and view folders
include_once 'libarires/Controllers.class.php';

// inculde the Redirect page this containt the function to direct the location of the pages
include_once 'helpers/redirect.php';
