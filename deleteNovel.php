<?php 
  require ('db.php');
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $database = new MySqlDatabase();
    $database->deleteNovel($id);
    header('Location: index.php');
    exit();
  }
  if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $id = $_GET['id'];
    $database = new MySqlDatabase();
    $novel =  $database->getNovelById($id);
    $author = $database->getAuthorById($novel['author_id']);
    $genre = $database->getGenreById($novel['genre_id']);
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
</head>
<body>
  <h1>Delete Novel</h1>
  <form action="deleteNovel.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?=$novel['id']?>">
    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" class="form-control" name="name" id="name" value="<?=$novel['name']?>" readonly>
    </div>
    <div class="form-group">
      <label for="author_name">Author Name:</label>
      <input type="text" class="form-control" name="author_name" id="author_name" value="<?=$author['name']?>" readonly>
    </div>
    <div class="form-group">
      <label for="description">Description:</label>
      <input type="text" class="form-control" name="description" id="description" value="<?=$novel['description']?>" readonly>
    </div>
    <div class="form-group">
      <label for="language">Language:</label>
      <input type="text" class="form-control" name="language" id="language" value="<?=$novel['language']?>" readonly>
    </div>

    <div class="form-group">
      <label for="genre">Genre:</label>
      <input type="text" class="form-control" name="genre" id="genre" value="<?=$genre['name']?>" readonly>
    </div>
    <div class="form-group">
      <label for="file">Cover Image:</label>
      <img src="<?=$novel['image']?>" alt="image" width="100px" height="100px">
      <input type="hidden" class="form-control" name="file" id="file" value="<?=$novel['image']?>" readonly>
    </div>
    <button type="submit" class="btn btn-primary">Delete</button>
</body>
</html>