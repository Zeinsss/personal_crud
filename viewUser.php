<?php
  require ('db.php');
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  }
  if ($_SERVER['REQUEST_METHOD'] == 'GET') {

  }
  $database = new MySqlDatabase();
  $users = $database->getAllUser();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>View</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
  <table class="table table-md">
    <tr>
      <td>
        <h1>User View</h1>
      </td>
    </tr>
    <tr>
      <td>
        <a href="addUser.php"><button class="btn btn-primary">Add User</button></a>
        <a href="viewNovel.php"><button class="btn btn-primary">View Novel </button></a>
      </td>
    </tr>
    
    <tr>
      <td>
        <table class="table table-sm">
          <thead>
            <caption>List of Users</caption>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Name</th>  
            <th scope="col">Email</th>
            <th scope="col">Action</th>
          </tr>
          </thead>
          <tbody class="table-group-divider">
          <?php
          $no = 1;
          foreach($users as $user) {?>
            <tr>
              <td><?=$no++?></td>
              <td><?=$user['Username']?></td>
              <td><?=$user['Email']?></td>
              <td><?=$user['Favorite_Novel']?></td>
              <td><a href="editUser.php?id=<?=$user['Id']?>">Edit</a> | <a href="deleteUser.php?id=<?=$user['Id']?>">Delete</a></td>
            </tr>
          <?php }?>
        </tbody>
        </table>
      </td>
    </tr>
  </table>  
</body>
</html>