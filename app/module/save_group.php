<?php 
    session_start();
    require_once('db-connect.php');
    if($_SERVER['REQUEST_METHOD'] !='POST') {
        echo "<script> alert('Error: No data to save.'); location.replace('../page_schedule.php') </script>";
        $conn->close();
        exit;
    }

    // Get active user ID from session
    $active_user_id = $_SESSION['id'];

    $dt = extract($_POST);
    echo "<script> console.log('total data masuk') </script>";
    echo "<script> console.log($dt) </script>";

    $id = $_POST['id'];
    $gname = $_POST['name_group'];
    $gdesc = $_POST['description_group'];
    // $usr_id = $_POST['users_id'];
    $gcode = $_POST['code_group'];
    $is_lock = $_POST['is_lock'];
    $lock_code = $_POST['lock_code'];
    

    // check if code_group already exists
    $sql = "SELECT * FROM groups WHERE code_group = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $code_group);
    $stmt->execute();
    $result = $stmt->get_result();

    // check count same group code
    if ($result->num_rows > 0) {
        // the group code already exists
        echo "<script type='text/javascript'>alert('Sorry, the group code $check_gcode must be unique!');document.location='../page_schedule.php';</script>";
        
    } else {
        // the group code is unique
        $sql = "INSERT INTO groups(name_group, description_group, users_id, code_group, is_locked, lock_code) VALUES ('$gname','$gdesc','$active_user_id','$gcode','$is_lock','$code') ";
        echo "<script type='text/javascript'>alert('Your Group Community successfully saved! Let's get started!');document.location='../page_schedule.php';</script>";
    
        $save = $conn->query($sql);
    
        if($save) {
            // retrieve the users id
            $last_id = mysqli_insert_id($conn);
            // auto-generated members by users_id
            $query_members = "INSERT INTO members(users_id, groups_id, role) VALUES ('$active_user_id', '$last_id', 'owner')";
            $result = mysqli_query($conn, $query_members);
    
            if ($result) {
                echo "<script> alert('Community Group Successfully Saved.'); location.replace('../page_schedule.php') </script>";
            }
    
            echo "<script type='text/javascript'>alert('Your Group Community successfully saved! Let's get started!');document.location='../page_schedule.php';</script>";
        
        } else {
            echo "<pre>";
            echo "An Error occured.<br>";
            echo "Error: ".$conn->error."<br>";
            echo "SQL: ".$sql."<br>";
            echo "</pre>";
        }
    }

    
    $conn->close();
?>