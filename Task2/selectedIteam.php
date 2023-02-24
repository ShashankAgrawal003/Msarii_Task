<?php
$conn = mysqli_connect("localhost", "root", "", "msarii_task_two");
if($conn->connect_error){
    die("Connection failed: ".$conn->connect_error);
}
$result = mysqli_query($conn, "SELECT * FROM selecteditem");
$x=0;
while ($row = mysqli_fetch_assoc($result)) 
{   $x++;
    echo "<tr id='$x'>
            <td>$x)</td>
            <td><ul class='list-unstyled' id='appendSubItem$x'><li style='font-weight:bold; font-size:17px;margin-bottom:20px;'>$row[selectedItemName]</li></ul></td>
            <td><button type='button' class='btn btn-info' data-toggle='modal' data-target='#mySubModal' onclick='sltSubItem($x)'>Select SubItems</button></td>
            <td><a class='btn btn-danger btn-sm' href='deleteSelectedItem.php?id=$row[id]'><i class='fa fa-trash' aria-hidden='true'></i></a></td>
    </tr>";
}
?>

<!-- <a class='btn btn-primary btn-sm' href='modelOfSubItem.html?id=$x'>Add subitem</a>    like this unique krna hoga -->   