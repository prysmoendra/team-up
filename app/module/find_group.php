<?php 
    session_start();
    require_once('db-connect.php');
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get active user ID from session
    $active_user_id = $_SESSION['id'];

    // Get input from the form
    $nama_grup = $_POST['name_group'];
    $grup_code = $_POST['code_group'];
    $lock_code = isset($_POST['lock_code']) ? $_POST['lock_code'] : null;

    // Query to find the group
    $sql = "SELECT * FROM groups WHERE name_group = ? AND code_group = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $nama_grup, $grup_code);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Group found
        $group = $result->fetch_assoc();
        $group_id = $group['id'];

        echo "<script> alert('You now Successfully join the Group LOCKED {$active_user_id}') </script>";
        
        if ($group['is_locked'] == 1) {
            // Group is locked
            if ($lock_code !== "" && $lock_code === $group['lock_code']) {
                
                // Proceed with joining the group
                $query_members = "INSERT INTO members(users_id, groups_id) VALUES ('$active_user_id', '$group_id')";
                $result = mysqli_query($conn, $query_members);
                echo "<script> alert('Success: You have joined the Community Group Successfully! LOCKED')') </script>";
                echo "<script> alert('You now Successfully join the Group LOCKED'); location.replace('../page_schedule.php') </script>";
            
            } else {
                // Wrong group code
                echo "<script> alert('Error: This group is locked. Please provide a valid lock code password!'); location.replace('../page_schedule.php') </script>";
            }
        } elseif($group['$is_lock'] == 0) {
            // Group is not locked
            if ($group['code_group'] === $grup_code && $group['name_group'] === $nama_grup){    
                // Proceed with joining the group
                $query_members = "INSERT INTO members(users_id, groups_id) VALUES ('$active_user_id', '$group_id')";
                $result = mysqli_query($conn, $query_members);
                echo "<script> alert('Success: You have joined the Community Group Successfully! NOT LOCKED')') </script>";
                echo "<script> alert('You now Successfully join the Group NOT LOCKED'); location.replace('../page_schedule.php') </script>";
            }
            
            // } else {
            //     // Wrong group code and name group
            //     echo "<script> alert('Error: Group not found! Make sure the Group Code and Lock Code password is correct.'); location.replace('../page_schedule.php') </script>";
            // }
        
        }
    
    } else {
        // Group not found
        echo "<script> alert('Error: Group not found!'); location.replace('../page_schedule.php') </script>";
    }

    $stmt->close();
    $conn->close();
?>