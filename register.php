<?php
// the database information was stored in the .env file that is
// accessed via autoload
// include "autoload.php";
   //setting CONSTANTS for host, user, password
$email = filter_input(INPUT_POST, 'email');

if ( !empty($email)) {
   $DB_HOST = 'localhost'; 
   $DB_USER = 'root'; 
   $DB_PASS = '';
   $DB_NAME = 'emails';

   $conn = new mysqli ($DB_HOST, $DB_USER, $DB_PASS , $DB_NAME);
echo "database connected";

if (mysqli_connect_error()){
    die('Connect Error ('. mysqli_connect_errno() .') '. mysqli_connect_error());
}
else {
    $sql = "INSERT INTO subcribers (emails) 
    values ('$email') ";
    if ($conn-> query($sql)){
        echo "new record in the database" ;
    }
    else{
        echo "Error :". $sql ."<br>". $conn->error;
    }
    $conn->close();
}
}
else{
    echo "please input email"; 
    die();
}
     //'root' as a default in MAMP servers

//storing the result of the connection (mysqli $link) in a variable

//storing the name of the database you want to work with


//selecting the database
// connecction to the sql database


// check if the data from the form was submitted, using isset
// if (!isset($_POST['email'])) {
//     exit('Please input an email address');
// }

// checking to make sure the fields are not empty


// some backend validation for email 
// if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
//     exit('Email is not valid!');
// }

// ;
// // checking if the email address was already registered
// if ($stmt = $conn->prepare('SELECT id FROM emails WHERE email = ?')) {
//     // binding parameters to the ? in the previous statement
//     // this is used to prevent SQL statment injection
//     $stmt->bind_param('s', $_POST['email']);
//     // i know the -> thing is a bit wierd, one of the
//     // many things i hate about php comming from a language like 
//     // python or js. so This is doing the same thing as 
//     // accessing a method in an object with . in js
//     // so like list.filter
//     $stmt->execute();
//     $stmt->store_result();

//     if ($stmt->num_rows > 0) {
//         // if it returns a result then the email is already registered
//         echo 'Yay!, your email is already registered';
//     } else {
//         // we add the email if it wasn't registered
//         if ($stmt = $conn->prepare('INSERT INTO emails (email) VALUES (?)')) {
//             $stmt->bind_param('s', $_POST['email']);
//             $stmt->execute();
//             echo 'Your Email has been successfully registered, we will let you know when the product launches.';
//         } else {
//             // again we do error handling here
//             echo 'Could not prepare the statements';
//         }
//     }
//     $stmt->close();
// } else {
//     // this is just error handling in case something goes wrong
//     echo 'Could not prepare statement';
// }
// $conn->close(); // again here we access a close method using -> instead of . 
// // php just makes life hard sha
// ?>