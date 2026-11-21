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

        table{
            margin: 50px 400px 30px 30px;
        }

        td,th{
            padding: 30px 40px;
        }

        body,th,tr,td,table{
            font-size: 30;

        }

        button{
            margin-left: 30px;
            padding: 20px; 
        }

        a{
            text-decoration: none;
            color: black;
        }
    </style>
<body>
    <?php
    include_once('config.php');
    $sql = "SELECT * FROM users";
    $getUsers = $conn->prepare($sql);
    $getUsers->execute();
    $users = $getUsers->fetchAll();
    ?>
    <table>
        <thead>
            <tr>
               <th>Email</th>
               <th>Password</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include_once("config.php");
            foreach($users as $user){
            ?>
            <tr>
                <td><?=$user['email'] ?></td>
                <td><?=$user['password'] ?></td>
            </tr>

          <?php }
          
          ?>

        </tbody>
    </table>

   <br><br><button ><a href="index.php" >Add Users</a>  </button>


</body>
</html>