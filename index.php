<?php
// Šis fails ir, lai izvadītu datus no datubāzes uz
// lapu 
require "functions.php";
require "Database.php";


$config = require("config.php");

$query = "SELECT * FROM posts";
$params = [];
if (isset($_GET["id"]) && $_GET["id"] != "") {
  $id = trim($_GET["id"]);
  $query = $query . " WHERE id=:id";
  $params = [":id" => $id];
}
if (isset($_GET["category"]) && $_GET["category"] != "") {
  $category = trim($_GET["category"]);
  $query = $query . " JOIN categories ON posts.category_id = categories.id WHERE name =:category";
  $params = [":category" => $category];
}

$db = new Database($config);
$posts = $db
          ->execute($query, $params)
          ->fetchAll();

$title = "Posts 💖";
require "views/index.view.php";
