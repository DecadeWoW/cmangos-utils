<?php
header("content-type:text/html; charset=utf-8");
$player_username = $_POST['username'];
$player_password = $_POST['user_password'];
$player_mobile = $_POST['mobile'];

$servername = "127.0.0.1";
$username = "mangos";
$password = "mangos";
$dbname = "realmd";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO account (username, sha_pass_hash, gmlevel, email, last_login)
    VALUE (UPPER('$player_username'), SHA1(CONCAT(UPPER('$player_username'), ':', UPPER('$player_password'))),0, '$player_mobile', '2006-04-25')";
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "注册成功（ $player_username ）。";
    }
catch(PDOException $e)
    {
    echo "注册失败。";
    }

$conn = null;
?>
