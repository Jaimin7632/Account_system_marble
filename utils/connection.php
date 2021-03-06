<?php
$servername = "localhost";
$username = "root";
$password = "1234";
$dbname = "account_db";

// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$result = $conn->select_db($dbname);

if(!$result){
	$sql = "CREATE DATABASE ".$dbname;
	if ($conn->query($sql) === TRUE) {
	echo "Database created successfully";
	} else {
	echo "Error creating database: " . $conn->error;
	}
	$conn->select_db($dbname);

	#Create neccesary tables 
	$bill_account = "CREATE TABLE bill_account (
				id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
				date date NOT NULL,
				party_name VARCHAR(200) NOT NULL,
				bill_no VARCHAR(30) NOT NULL,
				book_no VARCHAR(50) NOT NULL,
				mobile_no VARCHAR(50) NOT NULL,
				pay_receive int(5) NOT NULL,  
				comment VARCHAR(500) NULL,
				amount int(100) NOT NULL,
				is_bill int(5) NOT NULL,
				bill_id int(5) NULL
				)";

	$stock = "CREATE TABLE stock (
				id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
				date date NOT NULL,
				product VARCHAR(100) NOT NULL,
				product_type VARCHAR(100) NOT NULL,
				add_minus int(5) NOT NULL, 
				amount int(100) NOT NULL
				)";
	$daily_expenditure = "CREATE TABLE daily_expenditure (
				id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
				date date NOT NULL,
				add_minus int(5) NOT NULL,  
				amount int(100) NOT NULL,  
				comment VARCHAR(500) NULL
				)";				

	if ($conn->query($bill_account)!=True or $conn->query($stock)!=True or $conn->query($daily_expenditure)!=True){
		print_r("Error while creating tables");
	}


}

?>