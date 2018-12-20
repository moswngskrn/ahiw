<?php
session_start();
if(isset($_SESSION['uid'])){
    header( "location: profile.php" );
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
    <li><a href="./login.php"><img src="image/member.png" alt=""><br><br><?php ?></a></li>
  </ul>
</div>
</header>

<div class="login-wrap">
        <div class="login-html">

            <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">เข้าสู่ระบบ</label>
            <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">สมัครสมาชิก</label>
            <div class="login-form">
                <div class="sign-in-htm">
                    <form id="form-sign-in" enctype="multipart/form-data" action="api/login.php" method="POST">
                        <div class="group">
                            <label for="user_i" class="label" style="background:none;">อีเมล</label>
                            <input id="user_i" type="text" name="email" class="input">
                        </div>
                        <div class="group">
                            <label for="pass_i" class="label" style="background:none;">รหัสผ่าน</label>
                            <input id="pass_i" type="password" name="password" class="input" data-type="password">
                        </div>
                        <div class="group">
                        </div>
                        <div class="group">
                            <input type="submit" class="button" value="เข้าสู่ระบบ">
                        </div>
                    </form>
                </div>
                <div class="sign-up-htm">
                    <form id="form-sign-up" enctype="multipart/form-data" action="api/register.php" method="POST">
                        <div class="group">
                            <label for="user" class="label" style="background:none;">อีเมล</label>
                            <input id="user" type="text" name="email" class="input">
                        </div>
                        <div class="group">
                            <label for="pass" class="label" style="background:none;">รหัสผ่าน</label>
                            <input id="pass" type="password" name="password"  class="input" data-type="password">
                        </div>
                        <div class="group">
                            <label for="name" class="label" style="background:none;">ชื่อ</label>
                            <input id="name" type="text" name="name" class="input">
                        </div>
                        <div class="group">
                            <label for="file" class="label" style="background:none;">ชื่อ</label>
                            <input id="file" type="file" name="image" class="input">
                        </div>
                        <div class="group">
                            <button type="submit" class="button">สมัครสมาชิก</button>
                        </div>
                    </form>
                    <form action="api/login.php" method="POST" enctype="multipart/form-data">
                        File:
                        <input type="file" name="image"> <input type="submit" value="Upload"> 
                    </form>
                </div>
            </div>
        </div>
    </div>

<footer>
<div class="medium-6 columns">
<ul class="menu align-right">
<li class="menu-text">Copyright © 2018 A Hiw</li>
</ul>
</div>
</div>
</footer>
<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script src="https://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.js"></script>
<script src="js/main.js"></script>
<script>
      $(document).foundation();
    </script>
</body>
</html>
