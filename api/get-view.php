<?php
try {
    $pdo = new PDO("mysql:dbname=ahiwdb;host=127.0.0.1", "root", "",array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    // $data = [
    //     'email' => $_GET['email'],
    //     'password' => $_POST['password']
    // ];
    $sql = "SELECT * FROM posts WHERE 1 ORDER BY pid DESC";
    $stmt= $pdo->prepare($sql);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $json = json_encode($results);
    print_r($json);
} catch (Throwable $th) {
    print_r("[{'error':'เกิดข้อผิดพลาด โปรดลองใหม่ภายหลัง'}]");
}
?>