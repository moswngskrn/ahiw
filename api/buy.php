<?php
session_start();
try {
    $pdo = new PDO("mysql:dbname=ahiwdb;host=127.0.0.1", "root", "",
                    array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

    $data = [
        'uid'=>intval($_SESSION['uid']),
        'detail' => $_POST['detail'],
        'store' => $_POST['store'],
        'status' => "-",
        'tell' => $_POST['tell'],
        'address'=> $_POST['address'],
        'name'=> $_POST['name'],
    ];
    
    $sql = "INSERT INTO orders (uid,detail,store,status,tell,address,name) VALUES (:uid,:detail,:store,:status,:tell,:address,:name)";
    $stmt= $pdo->prepare($sql);
    $stmt->execute($data);
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    header( "location: ../pleasebuy.php" );
    exit(0);
    print_r($data);
} catch (Throwable $th) {
    print_r("[{'error':'เกิดข้อผิดพลาด โปรดลองใหม่ภายหลัง'}]");
}
?>