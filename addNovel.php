<?php 
  require ('db.php');
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  }
  if ($_SERVER['REQUEST_METHOD'] == 'GET') {

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