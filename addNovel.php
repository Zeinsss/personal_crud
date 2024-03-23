<?php 
  require ('db.php');
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $author_name = $_POST['author_name'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $language = $_POST['language'];
    $genre = $_POST['genre'];
    $file = $_FILES['file'];
    $file_name = $file['name'];
    $file_tmp = $file['tmp_name'];
    $file_size = $file['size'];
    $file_error = $file['error'];
    $file_type = $file['type'];
    $file_ext = explode('.', $file_name);
    $file_actual_ext = strtolower(end($file_ext));
    $allowed = array('jpg', 'jpeg', 'png');
    if (in_array($file_actual_ext, $allowed)) {
      if ($file_error === 0) {
        if ($file_size < 1000000) {
          $file_name_new = uniqid('', true).".".$file_actual_ext;
          $file_destination = 'uploads/'.$file_name_new;
          move_uploaded_file($file_tmp, $file_destination);
          $database = new MySqlDatabase();
          $database->insertNovel($author_name, $name, $description, $language, $file_destination, $genre);
          header('Location: index.php');
          exit();
        }
        else {
          echo "Your file is too big!";
        }
      }
      else {
        echo "There was an error uploading your file!";
      }
    }
    else {
      echo "You cannot upload files of this type!";
    }
        $database = new MySqlDatabase();
        $database->insertUser($name , $pass);
      
        header('Location: index.php');
        exit();
  }
  if ($_SERVER['REQUEST_METHOD'] == 'GET') {

  }
  $database = new MySqlDatabase();
  $genre = $database->getAllGenre();
  print_r($database);
  // Check if the database connection is right 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>View</title>
</head>
<body>
  <table>
    <form action="addNovel.php" method="post" enctype="multipart/form-data">
      <tr>
        <td>
          <label for="author_name">Author</label>
          <input type="text" name="author_name" id="author_name">
        </td>
      </tr>
      <tr>
        <td>
          <label for="name">Novel Name:</label>
          <input type="text" name="name" id="name">
        </td>
      </tr>
      <tr>
        <td>
          <label for="description" style="float:left;">Description:</label>
          <textarea name="description" id="description" cols="30" rows="10" style="margin-left:25px; float:left;"></textarea>
        </td>
      </tr>
      <tr>
        <td>
          <label for="language">Language: </label>
          <input type="" name="language" id="language">
        </td>
      </tr>
      <tr>
        <td>
          <label for=""></label>
          <select name="genre" id="genre">Genre: </select>
            <?php foreach($genre as $gen) {?>
              <option value="<?=$gen['id']?>"><?=$gen['name']?></option>
            <?php }?>
          </select>
        </td>
      </tr>
      <tr>
        <td>
          <label for="file">File Image:</label>
          <input type="file" name="file" id="file" accept="image/*">
        </td>
      </tr>
      <tr>
        <td>
          <input type="submit" value="Submit Novel">
        </td>
      </tr>
    </form>
  </table>
</body>
</html>