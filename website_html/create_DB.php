<!DOCTYPE html>
<html>
    <head>
    	<title>Create Database</title>
    </head>
    <body>
    	<h1>Create Database Yayaya</h1>
    	<?php
            $conn = new mysqli("localhost","root","");                 // Directory Location
            $select = $conn->select_db("Stubu_Database");           // Connect to Database
            if(!$select){                                              // Creates Database if Database does not Exist
                $conn->query("CREATE DATABASE Stubu_Database;");    // Add Database Name
                    $conn->select_db('Stubu_Database');                    // Table and Columns Creation
                    $conn->query("CREATE TABLE User(
                    User_ID INT AUTO_INCREMENT PRIMARY KEY,
                    Username VARCHAR(100) NOT NULL,
                    Password NVARCHAR(50) NOT NULL,
                    Email_address VARCHAR(50) NOT NULL,
                    Profile_picture VARCHAR(100) NOT NULL,
                    First_Name VARCHAR(50) NOT NULL,
                    Last_Name VARCHAR(50) NOT NULL,
                    Mobile_Number VARCHAR(14) NOT NULL,
                    Date_Created DATE NOT NULL,
                    Last_online DATE NOT NULL,
                    User_level INT NOT NULL
                    )"                   // <----------- Directory Column
                );

                echo "<br>Database successfully Created!";
            }
        ?>
    </body>
</html>