<?php
include('./connect.php');

    $id = $_GET['id'];
    $sql = "DELETE FROM user WHERE id='$id'";
    $result = mysqli_query($conn, $sql);
?>