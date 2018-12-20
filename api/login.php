<?php
session_start();
try {
    $pdo = new PDO("mysql:dbname=ahiwdb;host=127.0.0.1", "root", "",array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    $data = [
        'email' => $_POST['email'],
        'password' => $_POST['password']
    ];
    $sql = "SELECT * FROM users WHERE email=:email AND password=:password";
    $stmt= $pdo->prepare($sql);
    $stmt->execute($data);
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $count = $stmt->rowCount();
    if($count==1){
        $_SESSION['uid']= $results[0]['uid'];
        $_SESSION['name']=$results[0]['name'];
        if($results[0]['type']==1){
            $_SESSION['admin']=$results[0]['type'];
        }
        
        header( "location: ../profile.php" );
        exit(0);
    }else{
        // header( "location: ../login.php" )
        echo $results;
    }
    $json = json_encode($results);
} catch (Throwable $th) {
    print_r("[{'error':'เกิดข้อผิดพลาด โปรดลองใหม่ภายหลัง'}]");
}
?>