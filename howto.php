<?php
session_start();
if(!isset($_SESSION['uid'])){
    header( "location: login.php" );
}
$isloginde=false;

if(isset($_SESSION['uid'])){
    $isloginde=true;
}
?>
<!doctype html>
<html class="no-js" lang="en">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Foundation | Welcome</title>
<link rel="stylesheet" href="https://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.min.css">
</head>
<body>
<link rel="stylesheet" href="css/main.css">
<header>
<div class="row">
  <div class="medium-4 columns" style="text-align:center">
    <img src="image/4920dee5-0bac-4331-8454-7ce2764f014c.png" style="width:100%" alt="company logo">
  </div>
  <div class="medium-8 columns">
    <img src="image/burger-cropped.jpg" alt="advertisement for deep fried Twinkies">
  </div>
</div>

<br>
<div class="title-bar" data-responsive-toggle="main-menu" data-hide-for="medium">
  <button class="menu-icon" type="button" data-toggle></button>
  <div class="title-bar-title">Menu</div>
</div>
<div class="top-bar" id="main-menu"  style="background:#FCE903;">
  <ul class="menu vertical medium-horizontal expanded medium-text-center" data-responsive-menu="drilldown medium-dropdown">
    <li><a href="./"><img src="image/home-icon-silhouette.png" alt=""><br><br>หน้าแรก</a></li>
    <li><a href="./howto.php"><img src="image/restaurant-cutlery-circular-symbol-of-a-spoon-and-a-fork-in-a-circle.png" alt=""><br><br>วีธีฝากซื้อของ</a></li>
    <li><a href="./pleasebuy.php"><img src="image/covered-food-tray-on-a-hand-of-hotel-room-service (2).png" alt=""><br><br>ฝากซื้อของ</a></li>
    <li><a href="./login.php"><img src="image/member.png" alt=""><br><br><?php if($isloginde){echo 'โปรไฟล์';}else{echo 'เข้าสู่ระบบ';} ?></a></li>
    <?php if(isset($_SESSION['admin'])){ ?>
        <li><a href="./admin.php"><img src="image/member.png" alt=""><br><br>Admin</a></li>
    <?php }?>
    <?php if($isloginde){ ?>
        <li><a href="./api/logout.php"><img src="image/member.png" alt=""><br><br>ออกจากระบบ</a></li>
    <?php }?>
</ul>
</div>
</header>
<div class="row medium-8 large-7 columns">
        <div class="blog-post">
            <br>
            <h3>วิธีการใช้บริการฝากซื้อของ by A HIW</h3>
            <p class="lead">พื้นที่ให้บริการ</p>
            <div class="callout">
                <p>บริเวณรอบมหาวิทยาลัยนเรศาร</p>
            </div>
        </div>
    </div>
    <br>
<footer>
<div class="medium-6 columns">
<ul class="menu align-right">
<li class="menu-text"></li>
</ul>
</div>
</div>
</footer>
<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script src="https://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.js"></script>
<script>
      $(document).foundation();
    </script>
</body>
</html>
