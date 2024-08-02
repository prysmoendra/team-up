<?php 
require_once('db-connect.php');
if($_SERVER['REQUEST_METHOD'] !='POST') {
    echo "<script> alert('Error: No data to save.'); location.replace('../page_dashboard.php') </script>";
    $conn->close();
    exit;
}
$dt = extract($_POST);
$allday = isset($allday);

echo "<script> console.log('total data masuk') </script>";
echo "<script> console.log($dt) </script>";

// $id = $_POST['id'];
// $check_sch = "SELECT * FROM `schedule_list` WHERE id = '$id' LIMIT 1";
// echo "<script> console.log($check_sch) </script>";

if(empty($id)) {
    $sql = "INSERT INTO schedule_list(title, description, start_datetime, end_datetime) VALUES ('$title', '$description', '$start_datetime', '$end_datetime')";
    echo "<script> alert('Schedule Successfully Saved NEW.'); location.replace('../page_dashboard.php') </script>";

} else {
    $sql = "UPDATE schedule_list SET title = '$title', description = '$description', start_datetime = '$start_datetime', end_datetime = '$end_datetime' WHERE id = '$id'";
    echo "<script> alert('Schedule Successfully Saved UPDATE.'); location.replace('../page_dashboard.php') </script>";
}

$save = $conn->query($sql);

if($save) {
    echo "<script> alert('Schedule Successfully Saved.'); location.replace('../page_dashboard.php') </script>";

} else {
    echo "<pre>";
    echo "An Error occured.<br>";
    echo "Error: ".$conn->error."<br>";
    echo "SQL: ".$sql."<br>";
    echo "</pre>";
}

$conn->close();
?>