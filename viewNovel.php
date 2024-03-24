<?php
  require ('db.php');

    $database = new MySqlDatabase();
    $novel = $database->getNovelAll();
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
        <h1>Novel View</h1>
      </td>
    </tr>
    <tr>
      <td>
        <a href="addNovel.php"><button class="btn btn-success">Add Novel</button></a>
        <a href="viewUser.php"><button class="btn btn-primary">View User </button></a>
        <a href="viewNovelRating.php"><button class="btn btn-primary">View Novel's Rating</button></a>
        <a href="index.php"><button class="btn btn-info">Go to Dashboard </button></a>
      </td>
    </tr>
    <tr>
      <td>
        <table class="table table-sm">
          <thead>
            <caption>List of Novels</caption>
          <tr>
            <th scope="col">No</th>
            <th scope="col">File</th>  
            <th scope="col">Novel</th>
            <th scope="col">Author</th>
            <th scope="col">Description</th>
            <th scope="col">Language</th>
            <th scope="col">Genre</th>
            <th scope="col">Action</th>
          </tr>
          </thead>
          <tbody class="table-group-divider">
          <?php
          $no = 1;
          foreach($novel as $novel) {?>
            <tr>
              <td><?=$no++?></td>
              <td><img src="<?=$novel['Cover']?>" alt="Cover" width="100px" height="100px"></td>
              <td><?=$novel['Novel']?></td>
              <td><?=$novel['Author']?></td>
              <td><?=$novel['Description']?></td>
              <td><?=$novel['Language']?></td>
              <td><?=$novel['Genre']?></td>
              <td><a href="editNovel.php?id=<?=$novel['Id']?>"><button class="btn btn-warning">Edit</button></a> | <a href="deleteNovel.php?id=<?=$novel['Id']?>"><button class="btn btn-danger">Delete</button></a></td>
            </tr>
          <?php }?>
        </tbody>
        </table>
      </td>
    </tr>
  </table>
</body>
</html>