<?php

require "Database.php";
$config = require("config.php");
$db = new Database($config);


//if ($_SERVER["REQUEST_METHOD"] == "POST" && trim($_POST["title"]) != "" && $_POST["category-id"] <= 3 && strlen($_POST["title"]) <= 255) {
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $errors = [];
  
  if (trim($_POST["title"]) == "") {
    $errors["title"] = "Title can not be empty!";
  }
  if (strlen($_POST["title"]) > 255) {
    $errors["title"] = "Title can not be longer than 255 characters!";
  }
  if ($_POST["category-id"] < 1 || $_POST["category-id"] > 3) {
    $errors["category-id"] = "Category ID is invalid!";
  }
  if (empty($errors)) {
    $query = "INSERT INTO posts (title, category_id)
    VALUES (:title, :category_id);";
    $params = [
    ":title" => $_POST["title"],
    ":category_id" => $_POST["category-id"]
    ];
    $db->execute($query, $params);

    header("Location: /");
    die();

  }

}

$title = "Create a Post";
require "views/posts-create.view.php";

