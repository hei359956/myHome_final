<?php
    $FirstName = $_POST['FirstName'];
    $LastName = $_POST['LastName'];
    $Email = $_POST['Email'];
    $Password = $_POST['Password'];
    $Birthday = $_POST['Birthday'];
    $PhoneNumber = $_POST['PhoneNumber'];

    //DataBase Connection
    $conn = new mysqli('localhost','root','','test');
    if($conn->connect_error){
        echo "$conn->connect_error";
        die('Connection Failed : '. $conn->connect_error);
    }else{
        $stmt = $conn->prepare("insert into customer(FirstName, LastName, Email, Password, Birthday, PhoneNumber)
            values(?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssii",$FirstName, $LastName, $Email, $Password, $Birthday, $PhoneNumber);
        $stmt->execute();
        echo "registration Sucessfully...";
        $stmt->close();
        $conn->close();
    }
?>