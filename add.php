<?php
include('./connect.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <title>Document</title>
</head>

<body>
    <form method="POST">
        <table>
            <tr>
                <td>Enter The name : </td>
                <td><input type="text" name="name" id="name"></td>
            </tr>
            <tr>
                <td>Enter The Email Id : </td>
                <td><input type="email" name="email" id="email"></td>
            </tr>
            <tr>
                <td>Enter Your Password: </td>
                <td><input type="password" name="password" id="password"></td>
            </tr>
            <tr>
                <td><input type="button" name="save" value="Save" id="save"></td>
            </tr>
        </table>
    </form>
    <!-- <button id="show">Show Data</button> -->
    <div id="div"></div>
    <script>
        // $('#show').click(function(){
        //     $("#div").load("index.php");
        // });
        // let data={
        //     name:$('#name').val(),
        //     email:$('#email').val(),
        //     password:$('#password').val(),
        // }
        // .ajax({
        //     type:'POST',
        //     url:'insert.php',
        //     data:data,
        //     success:function(data){
        //         window.location('./index.php');
        //     }
        // });
        $("#div").load("index.php");

        $('#save').click(function() {

            var name = $('#name').val();
            var password = $('#password').val();
            var email = $('#email').val();
            $.ajax({
                type: "POST",
                url: 'insert.php',
                data: {
                    name: name,
                    password: password,
                    email: email
                },
                success: function(data) {
                    $("#div").load("index.php");
                }

            });
            // $.ajax({
            //     url: "insert.php",
            //     method: "POST",
            //     data ={data:'data'},
            //     success: function(data) {
            //         window.location("./index.php");
            //     }
            // });
            // $.ajax({
            //     url: "index.php",
            //     success: function(data) {
            //         //console.log(dataabc); 
            //         $("#div").html(data);
            //     }
            // });

        });
    </script>


</body>


</html>