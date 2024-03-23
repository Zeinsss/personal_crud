<?php
class MySqlDatabase
{
    private $pdo;

    public function __construct()
    {
        $dsn = "mysql:host=localhost;dbname=e_novel_db";
        $username = "root";
        $password = "";

        $this->pdo = new PDO($dsn, $username, $password);
    }
    public function getUserById($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->execute([$id]);
       
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function getTeacherbyName($name) {
        $stmt = $this->pdo->prepare("SELECT id FROM teacher where name = ?");
        $stmt->execute([$name]);
       
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateUser($id, $name, $email)
    {
        $stmt = $this->pdo->prepare("UPDATE users SET name = ?, password = ? WHERE id = ?");
        $stmt->execute([$name, $email, $id]);
    }
    // Novel and User
    // Select Function
    public function getAllAuthor() { 
      $stmt = $this->pdo->query("SELECT * FROM author WHERE 1");
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getAuthorId($name) {
      $stmt = $this->pdo->query("SELECT id FROM author WHERE name = '?'");
      $stmt->execute($name);
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getAllGenre() {
      $stmt = $this->pdo->query("SELECT * FROM genre WHERE 1");
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    // Insert Function
    public function insertUser($name, $email, $password) {
      $stmt = $this->pdo->prepare("INSERT INTO users (name, email, password) values (?, ?, ?) ");
      $stmt->execute([$name, $email, $password]);
    }
    public function insertNovel($author_name, $name, $description, $language, $image, $genre) {
      // Insert Author if there was none of this author yet 
      $stmt = $this->pdo->prepare("INSERT INTO author (name) values (?) ");
      $stmt->execute([$author_name]);
      // Get the last inserted author id
      $id = $this->pdo->lastInsertId();
      // Insert Novel
      $stmt = $this->pdo->prepare("INSERT INTO novel (author_id, genre_id, name, description, language, image) 
      values (?, ?, ?, ?, ?, ?) ");
      $stmt->execute([$id, $name, $genre, $description, $language, $image]);
    }
    // Delete Function
    public function deleteUser($id) {
      $stmt = $this->pdo->prepare("DELETE FROM users WHERE id = ?");
      $stmt->execute($id);
    }
    public function deleteNovel($id) {
      $stmt = $this->pdo->prepare("DELETE FROM novel WHERE id = ?");
      $stmt->execute($id);
    }
    // View
    public function selectUserView($id) {
      $stmt = $this->pdo->prepare("SELECT * FROM `user_view` WHERE id = ?");
      $stmt->execute($id);
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function selectAllUsers() {
      $stmt = $this->pdo->prepare("SELECT * FROM `user_view`");
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function selectNovel($id) {
      $stmt = $this->pdo->prepare("SELECT * FROM `novel_view` WHERE id = ?");
      $stmt->execute($id);
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function selectAllNovels() {
      $stmt = $this->pdo->prepare("SELECT * FROM `novel_view`");
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

  }
  // Initialize connection with database
  $database = new MySqlDatabase();


