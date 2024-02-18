<?php
    $host = "localhost";
    $user = "root";
    $password = "";
    $db = "oes";

    // Create connection
    $conn = new mysqli($host, $user, $password, $db);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $lectid = $_POST['lectid'];
    $lectname = $_POST['lectname'];
    $lectpassword = $_POST['lectpassword'];
    $lectuser = $_POST['lectuser'];
    $lectstatus = $_POST['lectstatus'];

    // Check if student id already exists in the database
    $sql = "SELECT userid FROM oes_login WHERE userid='$lectid'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "Error: Lecturer already exists!";
    } else {
        // Insert the data into the database
        $sql = "INSERT INTO oes_login (userid, username, userpass, usertype, status) VALUES ('$lectid', '$lectname', '$lectpassword', '$lectuser', '$lectstatus')";

        if ($conn->query($sql) === TRUE) {
            echo "Account created successfully, Redirecting in 3s.......";
            header("Refresh:3; url=lecturer.php");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
            header("Refresh:3; url=lecturer_register.php");
            exit();
        }
    }
    $conn->close();
?>