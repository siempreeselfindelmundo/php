<?php

// connecting to database

//storing the connection reference in a variable
    $conn = mysqli_connect('localhost', 'Loreto', 'test1234', 'ninja_pizza'); 
//mysqli_connect is a function that takes 4 parameters: 1- host. 2- username. 3- password. 4- database name.
//it connects to the whole database, not just one table.

//checking connection: 
    if(!$conn){
        echo 'Connection error: ' . mysqli_connect_error();
    }

?>