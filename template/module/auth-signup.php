<?php
    // REGISTER USER
    if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password'])) {
        // connecting to db
        require("db-connect.php");
        if (mysqli_connect_errno()) {
            echo "Cannot connect to the database.". mysqli_connect_error();
        };
    
        // receive all input values from the form
        $name = $_POST['name'];
        // $uname = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        
        // Ensure that no user is registered twice, the usernames/email should be unique
        $email = mysqli_real_escape_string($conn, $email);
        $email_check_query = "SELECT * FROM users WHERE email = '$email'";
        $check_email = mysqli_query($conn, $email_check_query);
    
    
        // check same username/email
        if (mysqli_num_rows($check_email) > 0) {
          // The username/email already exists
            echo "<script type='text/javascript'>alert('Maaf, email $email tidak tersedia!');document.location='../layout/page_signup.php';</script>";
    
        } else {
        //   The username/email is unique
            echo "<script type='text/javascript'>alert('email $email Anda ada dan bisa digunakan');</script>";
    
            if (true) {
                // make encrypt password
                $pass = password_hash($password, PASSWORD_DEFAULT);

                $query = "INSERT INTO users(name, email, password) VALUES ('$name', '$email', '$pass')";
                $result = mysqli_query($conn, $query);
                echo "<script type='text/javascript'>document.location='../layout/page_dashboard.php';</script>";
            }
        }
	}
?>