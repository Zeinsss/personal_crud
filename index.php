<?php 
  require ('db.php');
  
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
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
      margin: 15px 15px;
    }
    div {
      margin: 10px;
    }
    h1 {
      margin: 15px 15px;
    }
  </style>
</head>
<body>
 <h1>Welcome To E Library Dashboard Page</h1> 
    <table class="table table-hover table-md table-bordered border-primary">
      <thead>
        <tr>
          <th scope="col">Module</th>
          <th scope="col" class="table-primary" >View</th>
          <th scope="col" class="table-success" >Add</th>
          <th scope="col" class="table-warning" >Edit</th>
          <th scope="col" class="table-danger" >Delete</th>
        </tr>
      </thead>
      <tbody>
        <caption>Made By Nuon Uteytithya</caption>
        <tr>
          <td><h3>User</h3></td>
          <td class="table-primary"><a href="viewUser.php"><button class="btn btn-primary">View User</button></a></td>
          <td class="table-success"><a href="addUser.php"><button class="btn btn-success">Add User</button></a></td>
          <td class="table-warning"><a href="editUser.php"><button class="btn btn-warning">Edit User</button></a></td>
          <td class="table-danger"><a href="deleteUser.php"><button class="btn btn-danger">Delete User</button></a></td>
        </tr>
        <tr>
          <td><h3>Novel</h3></td>
          <td class="table-primary"><a href="viewNovel.php"><button class="btn btn-primary">View Novel</button></a></td>
          <td class="table-success"><a href="addNovel.php"><button class="btn btn-success">Add Novel</button></a></td>
          <td class="table-warning"><a href="editNovel.php"><button class="btn btn-warning">Edit Novel</button></a></td>
          <td class="table-danger"><a href="deleteNovel.php"><button class="btn btn-danger">Delete Novel</button></a></td>
        </tr>
        <tr>
          <td><h3>Novel's Rating</h3></td>
          <td class="table-primary"><a href="viewNovelRating.php"><button class="btn btn-primary">View Novel's Rating</button></a></td>
          <td class="table-success"><a href="addRating.php"><button class="btn btn-success">Add Rating</button></a></td>
          <td class="table-warning"></td>
          <td class="table-danger"></td>
        </tr>
    </table>
</body>
</html>