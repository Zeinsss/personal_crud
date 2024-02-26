<?php 
  require ('db.php');
  if ($_SERVER['REQUEST_METHOD'] == 'GET') {

  }
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $database = new MySqlDatabase();
    $database->insertUser($name, $email, $password);

    header('Location: index.php');
    exit();
  }
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>View</title>
</head>
<body>
  <h3>Add User</h3>
  <table>
    <form action="addUser.php" method="post">
      <tr>
        <td>
          <label for="name">Full Name:</label>
          <input type="text" name="name" id="name">
        </td>
      </tr>
      <tr>
        <td>
          <label for="email">Email</label>
          <input type="email" name="email" id="email">
        </td>
      </tr>
      <tr>
        <td>
          <label for="password">Password</label>
          <input type="password" name="password" id="password">
        </td>
      </tr>
      <tr>
        <td>
          <input type="submit" value="Submit User">
        </td>
      </tr>
    </form>
  </table>
</body>
</html>