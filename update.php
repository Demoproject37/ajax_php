<?php
    include('./connect.php');


    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "UPDATE user SET name='$name',email='$email',password='$password' where id='$id' ";
    mysqli_query($conn, $sql);
?>