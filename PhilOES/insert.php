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

    $studentid = $_POST['studentid'];
    $studentname = $_POST['studentname'];
    $password = $_POST['password'];
    $course = $_POST['course'];
    $semester = $_POST['semester'];
    $status = $_POST['status'];

    // Check if student id already exists in the database
    $sql = "SELECT studentid FROM oes_student WHERE studentid='$studentid'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "Error: Student already exists!";
    } else {
        // Insert the data into the database
        $sql = "INSERT INTO oes_student (studentid, studentname, password, course, semester, status) VALUES ('$studentid', '$studentname', '$password', '$course', '$semester', '$status')";

        if ($conn->query($sql) === TRUE) {
            echo "Account created successfully, Redirecting in 3s.......";
            header("Refresh:3; url=student.php");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
            header("Refresh:3; url=student_register.php");
            exit();
        }
    }
    $conn->close();
?>