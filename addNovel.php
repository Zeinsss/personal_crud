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
        $database->insertNovel($author_name, $name, $description, $language, $file_destination, $genre);
      
        header('Location: viewNovel.php');
        exit();
  }
  if ($_SERVER['REQUEST_METHOD'] == 'GET') {

  }
  $database = new MySqlDatabase();
  $genre_list = $database->getAllGenre();
  $author_list = $database->getAllAuthor();
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
  <h1>Adding Novel</h1>
  <a href="viewNovel.php"><button class="btn btn-md btn-primary">Back To View Novel</button></a>
  <form action="addNovel.php" method="post" enctype="multipart/form-data">
    <div class="form-group">
      <label for="author_name">Author Name</label>
      <select class="form-control" name="author_name" id="author_name" required>
        <option value="">Select an option</option>
        <?php foreach($author_list as $author) {?>
          <option value="<?=$author['id']?>"><?=$author['name']?></option>
        <?php }?>
      </select>
    </div>
    <div class="form-group">
      <label for="name">Novel Name</label>
      <input type="text" class="form-control" name="name" id="name" required>
    </div>
    <div class="form-group">
      <label for="description">Description</label>
      <textarea class="form-control" name="description" id="description" rows="3" required></textarea>
    </div>
    <div class="form-group">
      <label for="language">Language</label>
      <select name="language" id="language" required>
            <option value="">Select Your Option --</option>
            <option value="Khmer">Khmer</option>
            <option value="Chinese">Chinese</option>
            <option value="English">English</option>
            <option value="Indonesia">Indonesia</option>
            <option value="Japanese">Japanese</option>
            <option value="Korean">Korean</option>
          </select>
    </div>
    <div class="form-group">
      <label for="genre">Genre</label>
      <select class="form-control" name="genre" id="genre" required>
        <option value="">Select Your Option --</option>
        <?php foreach($genre_list as $gen) {?>
          <option value="<?=$gen['id']?>"><?=$gen['name']?></option>
        <?php }?>
      </select>
    </div>
    <div class="form-group">
      <label for="file">File</label>
      <input type="file" class="form-control-file" name="file" id="file" required>
    </div>
    
    <button type="submit" class="btn btn-success">Submit</button>
</body>
</html>