<?php
    session_start();

    function login_verification_user(){
        require('db-connect.php');
        
        $email = $_POST['email'];
        $password = $_POST['password'];

        if (true) {
            $query_get_pass = "select password from users where email='$email'";
            $get_result = mysqli_query($conn, $query_get_pass);
            $pass_result = mysqli_fetch_array($get_result);

            if (password_verify($password, $pass_result['password'])) {
                // check and get data of user
                $sql = "select * from users where (email = '$email')";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_array($result);

                // get id of created user
                $reg_user_id = $row['id'];
                $email = $row['email'];
                $uname = $row['username'];
                $fname = $row['name'];
                $std = $row['students_id'];
                
                // check user roles if user is admin, redirect to admin area
                if (true) {
                    // put logged in user into session array
                    $_SESSION['id'] = $reg_user_id;
                    $_SESSION['username'] = $uname;
                    $_SESSION['name'] = $fname;
                    $_SESSION['email'] = $email;

                    echo "<script type='text/javascript'>alert('Welcome to TeamUp $row[name]!');document.location='./page_dashboard.php';</script>";
                } 
            } else {
                echo "<script type='text/javascript'>alert('Your Username or Password INCORECT! Please check again!');document.location='./page_signin.php';</script>";
            }
        }
    }
?>