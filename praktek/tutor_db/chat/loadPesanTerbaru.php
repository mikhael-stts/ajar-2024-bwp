<?php

require_once(__DIR__ . "/../includes/connection.php");

$query = $pdo->prepare("select * from chat
where
chat_pengirim = ?
and chat_penerima = ?
and chat_isread = 0");

$query->execute([
  $_GET["chat_penerima"],
  $_GET["chat_pengirim"]
]);
$result = $query->fetchAll(PDO::FETCH_ASSOC);

$queryTandaiTerbaca = $pdo->prepare("update chat
set chat_isread = 1
where
chat_pengirim = ?
and chat_penerima = ?
and chat_isread = 0");

$queryTandaiTerbaca->execute([
  $_GET["chat_penerima"],
  $_GET["chat_pengirim"]
]);

echo json_encode($result);
