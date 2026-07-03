<?php

$host = "localhost";
$user = "root";
$password = "";
$database = "mobile_cover_store";

$conn = mysqli_connect($host, $user, $password, $database);

if(!$conn){
    die("Database Connection Failed");
}

$message = "";

if(isset($_POST['submit'])){

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $subject = mysqli_real_escape_string($conn, $_POST['subject']);
    $msg = mysqli_real_escape_string($conn, $_POST['message']);

    $sql = "INSERT INTO contact_messages(name,email,subject,message)
            VALUES('$name','$email','$subject','$msg')";

    if(mysqli_query($conn,$sql)){
        $message = "Message Sent Successfully!";
    }else{
        $message = "Error: ".mysqli_error($conn);
    }
}

?>