<?php
session_start();
try {
    $pdo = new PDO("mysql:dbname=ahiwdb;host=127.0.0.1", "root", "",array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

    $file =$_FILES['image'];
    $name = rand(11111, 99999) . '-' .$file["name"];
    echo $file["tmp_name"];
    echo $file["name"];
    define ('SITE_ROOT', realpath(dirname(__FILE__)));
    if(move_uploaded_file($_FILES['image']["tmp_name"],SITE_ROOT.'/'.$_FILES['image']["name"])){
        $data = [
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'password' => $_POST['password'],
            'urlimage' => 'api/'.$name,
        ];
        
        $sql = "INSERT INTO users (name, email, password,urlimage) VALUES (:name, :email, :password,:urlimage)";
        $stmt= $pdo->prepare($sql);
        $stmt->execute($data);
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $json = json_encode($results);
        $uid = LAST_INSERT_ID();
        $_SESSION['uid']= $uid;
        $_SESSION['name']=$_POST['name'];
        header( "location: ../profile.php" );
        exit(0);
    }else{
        print_r("[{'error':'ไม่สามารถอัพโหลดรูปได้'}]");
    }
} catch (Throwable $th) {
    print_r("[{'error':'เกิดข้อผิดพลาด โปรดลองใหม่ภายหลัง'}]");
}
?>