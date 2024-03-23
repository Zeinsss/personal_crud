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
    // Novel and User
    // Select Function
    public function getUserById($id) {
      $stmt = $this->pdo->prepare("SELECT * FROM users WHERE id = ?");
      $stmt->execute([$id]);
      return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function getAllAuthor() { 
      $stmt = $this->pdo->query("SELECT * FROM author WHERE 1");
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getAuthorById($id) {
      $stmt = $this->pdo->prepare("SELECT * FROM author WHERE id = ?");
      $stmt->execute([$id]);
      return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function getAllGenre() {
      $stmt = $this->pdo->query("SELECT * FROM genre WHERE 1");
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getGenreById($id) {
      $stmt = $this->pdo->prepare("SELECT * FROM genre WHERE id = ?");
      $stmt->execute([$id]);
      return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function getNovelById($id) {
      $stmt = $this->pdo->prepare("SELECT * FROM novel WHERE id = ?");
      $stmt->execute([$id]);
      return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function getNovelAll() {
      $stmt = $this->pdo->query("SELECT * FROM `novel_view` WHERE 1");
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getAllNovel() {
      $stmt = $this->pdo->query("SELECT * FROM novel WHERE 1");
      return $stmt->fetchAll(PDO::FETCH_ASSOC); 
    }
    public function getAllUser() {
      $stmt = $this->pdo->query("SELECT * FROM `user_view` WHERE 1");
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    // Insert Function
    public function insertUser($name, $email, $password, $novel_id) {
      $stmt = $this->pdo->prepare("INSERT INTO users (name, email, password) values (?, ?, ?) ");
      $stmt->execute([$name, $email, $password]);
      $user_id = $this->pdo->lastInsertId();
      $this->insertFavoriteNovel($user_id, $novel_id);
    }
    public function insertNovel($author_name, $name, $description, $language, $image, $genre) {
      $stmt = $this->pdo->prepare("INSERT INTO novel (author_id, name, description, language, image, genre_id) values (?, ?, ?, ?, ?, ?) ");
      $stmt->execute([$author_name, $name, $description, $language, $image, $genre]); 
    }
    public function insertFavoriteNovel($user_id, $novel_id) {
      $stmt = $this->pdo->prepare("INSERT INTO favorite (user_id, novel_id) values (?, ?) ");
      $stmt->execute([$user_id, $novel_id]);
    }
    // Delete Function
    public function deleteUser($id) {
      $stmt = $this->pdo->prepare("DELETE FROM users WHERE id = ?");
      $stmt->execute([$id]);
    }
    public function deleteNovel($id) {
      $stmt = $this->pdo->prepare("DELETE FROM novel WHERE id = ?");
      $stmt->execute([$id]);
    }
    // View Function
    public function selectNovel($id) {
      $stmt = $this->pdo->prepare("SELECT * FROM `novel_view` WHERE id = ?");
      $stmt->execute($id);
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function selectUser($id) {
      $stmt = $this->pdo->prepare("SELECT * FROM `user_view` WHERE id = ?");
      $stmt->execute($id);
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
  }
  // Initialize connection with database
  $database = new MySqlDatabase();


