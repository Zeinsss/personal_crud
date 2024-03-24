<?php 
  require ('db.php');
  if ($_SERVER['REQUEST_METHOD'] == 'GET') {

  }
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_POST['user_id'];
    $novel_id = $_POST['novel_id'];
    $rating = $_POST['rating'];
    $review_text = $_POST['review_text'];
    $database = new MySqlDatabase();
    $database->insertRating($user_id, $novel_id, $rating, $review_text);
    header('Location: viewNovelRating.php');
  }
  $database = new MySqlDatabase();
  $novels = $database->getAllNovel();
  $users = $database->getAllUsers();
  
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
      margin: 15px;
    }
    h1 {
      margin: 15px 15px;
    }
  </style>
</head>
<body>
  <h1>Add Rating</h1>
  <form action="addRating.php" method="post" enctype="multipart/form-data">
    <div class="form-group">
      <label for="user_id">User</label>
      <select class="form-select" name="user_id" id="user_id" required>
        <option value="">Select an option</option>
        <?php foreach($users as $user) {?>
          <option value="<?=$user['id']?>"><?=$user['name']?></option>
        <?php }?>
      </select>
    </div>
    <div class="form-group">
      <label for="novel_id">Novel</label>
      <select class="form-select" name="novel_id" id="novel_id" required>
        <option value="">Select an option</option>
        <?php foreach($novels as $novel) {?>
          <option value="<?=$novel['id']?>"><?=$novel['name']?></option>
        <?php }?>
      </select>
    </div>
    <div class="form-group">
      <label for="rating">Rating</label>
      <input type="number" class="form-control" name="rating" id="rating" required>
    </div>
    <div class="form-group">
      <label for="review_text">Review</label>
      <textarea class="form-control" name="review_text" id="review_text" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button> 
  </form>
</body>
</html>