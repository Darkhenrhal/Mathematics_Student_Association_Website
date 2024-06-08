<?php
require "config.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];	
	
    $stmt = $conn->prepare("SELECT Email, Password FROM member_details WHERE Email = ?");
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        $hashedPassword = $row["Password"];
        
        if (password_verify($password, $hashedPassword)) {
            // Password matches, login successful
	
            header("Location: News.html");
            exit();
        } else {
            // Password does not match
            setFormMessage("error", "Invalid username/password combination");
            header("Location: LogIn.html");
            exit();
        }
    } else {
        // No user with that email
        setFormMessage("error", "User not found");
        header("Location: login.html");
        exit();
    }
}

function setFormMessage($type, $message) {
    $_SESSION['form_message'] = array("type" => $type, "message" => $message);
}
?>