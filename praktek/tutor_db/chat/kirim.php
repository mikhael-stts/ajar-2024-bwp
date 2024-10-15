<?php
require_once(__DIR__ . "/../includes/connection.php");
$query = $pdo->prepare("INSERT INTO chat(chat_pengirim,chat_penerima,chat_isi) values (?,?,?)");
$query->execute([$_POST["chat_pengirim"], $_POST["chat_penerima"], $_POST["chat_isi"]]);

echo 1;
