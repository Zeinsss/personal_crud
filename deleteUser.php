<?php 
  require ('db.php');
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $database = new MySqlDatabase();
    $database->deleteUser($id);
    header('Location: viewUser.php');
    exit();
  }
  if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $id = $_GET['id'];
    $database = new MySqlDatabase();
    $user = $database->getUserById($id);
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>View</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <style>
    button {
      margin: 5px 15px;
    }
    div {
      margin: 15px;
    }
    h1 {
      margin: 15px 15px;
    }
  </style>
</head>
<body>
    <h1>Delete User</h1>
  <form action="deleteUser.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?=$user['id']?>">
    <div class="form-group">
      <label for="name">Name</label>
      <input type="text" class="form-control" name="name" id="name" value="<?=$user['name']?>" readonly>
    </div>
    <div class="form-group">
      <label for="email">Email</label>
      <input type="email" class="form-control" name="email" id="email" value="<?=$user['email']?>" readonly>
    </div>
    <button type="submit" class="btn btn-primary">Delete</button>
</body>
</html>