<?php
include 'main.php';

if (!isset($_SESSION['user'])) {
    http_response_code(401);
    exit();
}

$q = $conn->prepare('INSERT INTO ospets VALUES (null, :nome, :raca, :idade, :peso, :user)');
$q->bindValue(':nome', $_POST['nome']);
$q->bindValue(':raca', $_POST['raca']);
$q->bindValue(':idade', $_POST['idade']);
$q->bindValue(':peso', $_POST['peso']);
$q->bindValue(':user', $_SESSION['user']['USUARIO_ID']);
$q->execute();
$objId = $conn->lastInsertId();

?>