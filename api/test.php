<?php
session_start();
try {
    $pdo = new PDO("mysql:dbname=ahiwdb;host=127.0.0.1", "root", "",array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    $data = [
        'email' => "mos.wongsakorn@gmail.com",
        'password' => "123456"
    ];
    $sql = "SELECT * FROM users WHERE email=:email AND password=:password";
    $stmt= $pdo->prepare($sql);
    $stmt->execute($data);
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // $count = $stmt->rowCount();
    // if($count==1){
    //     $_SESSION['uid']= $results;
    //     $_SESSION['name']=$results[0].name;
    //     header( "location: ../profile.php" );
    //     exit(0);
    // }else{
    //     // header( "location: ../login.php" )
    //     echo $results;
    // }
    print_r($results[0]['uid']);
    $json = json_encode($results);
    print_r($json);
} catch (Throwable $th) {
    print_r("[{'error':'เกิดข้อผิดพลาด โปรดลองใหม่ภายหลัง'}]");
}
?>