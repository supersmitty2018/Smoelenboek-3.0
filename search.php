<?php

header('Content-type: application/json; charset=utf-8');

$servername = "localhost";
$username = "phpdb";
$password = "wachtwoord";

$id = $_POST['id']; 



try {
    //connect to DB
    $conn = new PDO("mysql:host=$servername;dbname=myDB", $username, $password);

    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //Prepare and execute mysql query
    $adressquery = $conn->prepare("SELECT * FROM adressCards WHERE id=$id");
    $adressquery->execute();

    //Set array to receive record
    $person = array();
    
    //Loop through all rows from table
    foreach($adressquery as $item) {   

    //Add person array
    $person = $item;
    }

    //Sent array as JSON
    echo json_encode($person);

    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;

?>