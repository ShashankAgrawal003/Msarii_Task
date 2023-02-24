<?php
$conn = mysqli_connect("localhost", "root", "", "msarii_task_two");
if($conn->connect_error){
    die("Connection failed: ".$conn->connect_error);
}
$result = mysqli_query($conn, "SELECT * FROM selectedsubitem");
$data = array();
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
}
$json_data = json_encode($data);
header('Content-Type: application/json');
echo $json_data;
?>

  