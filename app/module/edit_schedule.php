<?php 
require_once('db-connect.php');
if($_SERVER['REQUEST_METHOD'] !='GET') {
    echo "<script> alert('Error: No data to save.'); location.replace('../page_dashboard.php') </script>";
    $conn->close();
    exit;
}
extract($_GET);
$allday = isset($allday);

$id = $_GET['id'];
// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     echo 'Received ID: ' . $id; // Example response
// }

$update_dt = "SELECT * FROM `schedule_list` WHERE id = '$id' LIMIT 1";
echo $update_at;

if(empty($id)) {
    echo "<script> alert('the ID event is: ', $id); location.replace('../page_dashboard.php') </script>";

    $sql = "UPDATE schedule_list SET title = '$title', description = '$description', start_datetime = '$start_datetime', end_datetime = '$end_datetime' WHERE id = '$id'";

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