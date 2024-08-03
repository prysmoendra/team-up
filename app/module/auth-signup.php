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
            echo "<script type='text/javascript'>alert('Maaf, email $email tidak tersedia!');document.location='../page_signup.php';</script>";
    
        } else {
        //   The username/email is unique
            echo "<script type='text/javascript'>alert('email $email Anda ada dan bisa digunakan');</script>";
    
            if (true) {
                // make encrypt password
                $pass = password_hash($password, PASSWORD_DEFAULT);

                // insert a new account users
                $query_users = "INSERT INTO users(name, email, password) VALUES ('$name', '$email', '$pass')";
                if (mysqli_query($conn, $query_users)) {
                    // retrieve the users id
                    $last_id = mysqli_insert_id($conn);
                    // echo "<script type='text/javascript'>alert('New record USER created successfully. Last inserted ID is: $last_id');</script>";

                    if ($last_id != NULL) {
                        // auto-generated members by users_id
                        $query_members = "INSERT INTO members(users_id) VALUES ('$last_id')";
                        $result = mysqli_query($conn, $query_members);

                        // $members_id = $conn->insert_id;
                        // echo "New record MEMBER created successfully. Last inserted ID is: " . $members_id;
                    }

                }

                echo "<script type='text/javascript'>document.location='../page_signin.php';</script>";
            }
        }
	}
?>