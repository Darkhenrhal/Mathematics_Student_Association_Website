<?php

$host = "localhost";
//$dbName = "web_project_database";
$user = "root";
$pass = "";

$conn = new mysqli($host, $user, $pass);

if ($conn->connect_error) {
    die('Connection Failed: ' . $conn->connect_error);
}

//if ($_SERVER["REQUEST_METHOD"] == "POST") 
	
	
    $username = $_POST['signupUsername'];
    $firstname = $_POST['signupFirstname'];
    $lastname = $_POST['signupLastname'];
    $email = $_POST['email'];
    $whatsapp_number = $_POST['whatsappNumber'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
//
	
	mysqli_select_db($conn , "web_project_database");


   
        $sql = "INSERT INTO member_details(User_Name, FirstName, LastName, Email, Whatsapp_Number, Password) 
                VALUES ($username, $firstname, $lastname, $email, $whatsapp_number, $password)";
		
		if (!mysqli_query($conn,$sql))
			{
			die('Error: ' . mysqli_error($conn));
			}
			echo "1 record added";
		;
		
        /*$stmt = $conn->prepare($sql);
        $stmt->bindParam('$username', $username);
        $stmt->bindParam('$firstname', $firstname);
        $stmt->bindParam('$lastname', $lastname);
        $stmt->bindParam('$email', $email);
        $stmt->bindParam('$whatsapp_number', $whatsapp_number);
        $stmt->bindParam('$password', $password);
        $stmt->execute();*/

        echo "User registered successfully!";
    

?>
