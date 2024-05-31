<?php
include('db_connect.php');

if (!$db_connect) {
    die("Connection failed: " . mysqli_connect_error());
}

//get id
$id = $_GET['id'];

//delete
$delete_query = "DELETE FROM datap WHERE id = '$id'";
$delete_result = mysqli_query($db_connect, $delete_query);

if ($delete_result) {
    //redirect back
    header("Location: main.php");
} else {
    die("Delete query failed: " . mysqli_error($db_connect));
}
?>
