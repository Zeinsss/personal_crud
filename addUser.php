<?php 
  require ('db.php');
  if ($_SERVER['REQUEST_METHOD'] == 'GET') {

  }
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $novel_id = $_POST['favorite_novel'];

    $database = new MySqlDatabase();
    $database->insertUser($name, $email, $password ,$novel_id);
    header('Location: viewUser.php');
    exit();
  }
  $database = new MySqlDatabase();
  $novels = $database->getAllNovel();
  
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
    a button {
      margin: 15px 15px;
    }
    button {
      margin: 15px 0px;
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
  <h1>Add User</h1>
  <a href="viewUser.php"><button class="btn btn-primary">View User</button></a>
  <form action="addUser.php" method="post" enctype="multipart/form-data">
    <div class="form-group">
      <label for="name">Name</label>
      <input type="text" class="form-control" name="name" id="name" required>
    </div>
    <div class="form-group">
      <label for="email">Email</label>
      <input type="email" class="form-control" name="email" id="email" required>
    </div>
    <div class="form-group">
      <label for="password">Password</label>
      <input type="password" class="form-control" name="password" id="password" required>
    </div>
    <div class="form-group">
      <label for="favorite_novel">Favorite Novel</label>
      <select class="form-select" name="favorite_novel" id="favorite_novel" required>
        <option value="">Select an option</option>
        <?php foreach($novels as $novel) {?>
          <option value="<?=$novel['id']?>"><?=$novel['name']?></option>
        <?php }?>
      </select>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</body>
</html>