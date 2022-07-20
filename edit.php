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
        <?php
        include('./connect.php');

        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $sq = "SELECT * FROM user where id='$id'";
            $re = mysqli_query($conn, $sq);
            $row = mysqli_fetch_assoc($re);
        ?>
            <table>
                <input type="hidden" id="id" value="<?php echo $row['id']; ?>">
                <tr>
                    <td>Enter The name : </td>
                    <td><input type="text" id="name" value="<?php echo $row['name']; ?>"></td>
                </tr>
                <tr>
                    <td>Enter The Email Id : </td>
                    <td><input type="email" id="email" value="<?php echo $row['email']; ?>"></td>
                </tr>
                <tr>
                    <td>Enter Your Password: </td>
                    <td><input type="password" id="password" value="<?php echo $row['password']; ?>"></td>
                </tr>
                <tr>
                    <td><input type="submit" id="save" value="Update"></td>
                </tr>
            </table>

        <?php
        }
        ?>
    </form>
    <div id="div"></div>
    <script>
        $("#div").load("index.php");
        $("#save").click(function(e) {
            e.preventDefault()
            var id = $('#id').val();
            var name = $('#name').val();
            var password = $('#password').val();
            var email = $('#email').val();
            $.ajax({
                url: 'update.php',
                type: 'POST',
                data: {
                    id: id,
                    name: name,
                    password: password,
                    email: email
                },
                // success: function(data) {
                //     alert('Updated');
                //     window.location.href="./add.php"; 
                // }
            }).then(function(){
                // alert('fge');
                window.location.href="add.php"; 
            });
        });
    </script>


</body>


</html>