<?php
  require ('db.php');

    $database = new MySqlDatabase();
    $novel = $database->getAllNovelRating();
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
        <h1>Novel's Rating</h1>
      </td>
    </tr>
    <tr>
      <td>
        <a href="viewNovel.php"><button class="btn btn-primary">View Novel </button></a>
        <a href="AddRating.php"><button class="btn btn-success">Add Rating </button></a>
        <a href="index.php"><button class="btn btn-info">Go to Dashboard </button></a>
      </td>
    </tr>
    <tr>
      <td>
        <table class="table table-sm">
          <thead>
            <caption>List of Novel's Rating</caption>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Cover</th>
            <th scope="col">Novel</th>
            <th scope="col">Rating</th>
            <th scope="col">Last Updated</th>
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
              <td><?=$novel['Rating']?>/10 Of <?=$novel['User_Count']?> Users</td>
              <td><?=$novel['Last_Updated_Rating']?></td>
            </tr>
          <?php }?>
        </tbody>
        </table>
      </td>
  </table>
</body>
</html>