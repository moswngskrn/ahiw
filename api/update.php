<?php
    try {
        $pdo = new PDO("mysql:dbname=ahiwdb;host=127.0.0.1", "root", "",array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        $data = [
            'oid' => intval($_POST['oid']),
            'status' => $_POST['status']
        ];
        $sql = "UPDATE orders SET status=:status WHERE oid=:oid";
        $stmt= $pdo->prepare($sql);
        $stmt->execute($data);
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $json = json_encode($results);
        print_r($json);
        header( "location: ../admin.php" );
        exit(0);
    } catch (Throwable $th) {
        print_r("[{'error':'เกิดข้อผิดพลาด โปรดลองใหม่ภายหลัง'}]");
    }
?>