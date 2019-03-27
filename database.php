<?php

error_reporting(E_ALL);

if (!ini_get('display_errors')) {
  ini_set('display_errors', 1);
}

//$db = new PDO('mysql:host=localhost;dbname=contact_manager;charset=utf8mb4', 'root', '');
//$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    /**************************************
    * Create databases and                *
    * open connections                    *
    **************************************/
 
    // Create (connect to) SQLite database in file
    $db = new PDO('sqlite:iab.sqlite3');
    // Set errormode to exceptions
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
  
   /**************************************
    * Create table                      *
    **************************************/
 

    // Create table contacts
    $db->exec("CREATE TABLE IF NOT EXISTS contacts (
                    id INTEGER PRIMARY KEY, 
                    first TEXT, 
                    last TEXT, 
					title TEXT,
					phone TEXT,
					address TEXT,
					extra TEXT)");
?>