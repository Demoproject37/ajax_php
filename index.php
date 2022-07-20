
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
    <h2>All Data</h2>
    <table border="2" id="content">
        <tr >
            <th>Sr. no</th>
            <th>Name</th>
            <th>Email</th>
            <th>Password</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        <?php 
        include('./connect.php');
            $sql="SELECT * FROM user";
            $result=mysqli_query($conn,$sql);
            $count=0;
            while($row=mysqli_fetch_assoc($result)){
            $count++;
        ?>
        <tr class="deleterow<?php echo $row['id']; ?>">
            <td><?php echo $count; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['password']; ?></td>
            <th><a href="edit.php?id=<?php echo $row['id']; ?>"><i class="fa fa-edit"></i><button>Edit</button></a></th>
            <th><button class="delete" id="<?php echo $row['id']; ?>">Delete</button></th>
        </tr>
        <?php
            }
        ?>
    </table>
    <script>
        $('.delete').click(function(){
            var id=$(this).attr('id');
            $.ajax({
                method:'GET',
                url:"delete.php",
                data:{
                    id:id,
                },
                success:function(){
                    alert('Data is deleted.');
                    $(".deleterow"+id).fadeOut("slow");
                }
            });
        });
    </script>
</body>
</html>