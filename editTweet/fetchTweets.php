<?php
session_start();
require_once 'Database.php';

$db = new Database();
$conn = $db->getConnection();

$page = isset($_GET['page']) ? $_GET['page'] : 1;
$limit = 10;

$offset = ($page - 1) * $limit;

$query = "SELECT publications.text, publications.createDate, users.username FROM publications
          INNER JOIN users ON publications.userId = users.id
          ORDER BY publications.createDate DESC LIMIT :limit OFFSET :offset";
$stmt = $conn->prepare($query);
$stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
$stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
$stmt->execute();

$tweets = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($tweets);
