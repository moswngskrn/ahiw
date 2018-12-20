<?php
session_start();
try {
    $pdo = new PDO("mysql:dbname=ahiwdb;host=127.0.0.1", "root", "",array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    $data = [
        'uid' => intval($_SESSION['uid']),
    ];
    $sql = "SELECT * FROM posts WHERE uid=:uid  ORDER BY pid DESC";
    $stmt= $pdo->prepare($sql);
    $stmt->execute($data);
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $json = json_encode($results);
    print_r($json);
} catch (Throwable $th) {
    print_r("[{'error':'เกิดข้อผิดพลาด โปรดลองใหม่ภายหลัง'}]");
}
?>