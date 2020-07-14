<?php 
// creating a .env file because i guess you would have to host it
// and the database information might differnt when hosting on
// a server.
    $variables = [
        $DB_HOST = 'localhost';
        $DB_USER = 'root';
        $DB_PASS = '';
        $DB_NAME = 'emails';
    ];

    // normal for each loop in javascript key as the key and 
    //value inside the loop it adds the key value pair as environment
    // variables using the putenv function
    foreach ($variables as key => value) {
        putenv("$key=$value")
    }

>