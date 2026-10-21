<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>module 10</title>
</head>
    <style>
        th,td,table{
            border: 1px solid black;
            border-collapse: collapse;
        }

        td,th{
            padding: 10px 20px;
        }

        body,th,tr,td,table{
            background-color: yellow;
            font-size: 30;
            margin: 50px 250px 400px;
        }

        a{
            text-decoration: none;
            color: orange;
            margin: 400px
        }
    </style>
<body>
    <?php
    include_once('config.php');
    $sql = "SELECT * FROM user";
    $getUsers = $conn->prepare($sql);
    $getUsers->execute();
    $users = $getUsers->fetchAll();
    ?>
    <table>
        <thead>
            <tr>
               <th>ID</th>
               <th>Name</th>
               <th>Username</th>
               <th>Email</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include_once("config.php");
            foreach($users as $user){
            ?>
            <tr>
                <td><?=$user['id'] ?></td>
                <td><?=$user['name'] ?></td>
                <td><?=$user['username'] ?></td>
                <td><?=$user['email'] ?></td>
            </tr>

          <?php }
          
          ?>

        </tbody>
    </table>

   <a href="index1.php"><b>Add Users</a>

</body>
</html>