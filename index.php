<?php
session_start();
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
<br>

<div class="row">
<div class="medium-8 columns">
<p><img src="image/900x450&text=Promoted Article.png" alt="main article image"></p>
</div>
<div class="medium-4 columns">
    <p class="lead">รายการสั่งซื้อ</p>
  <div class="scoll-q">
    <table style="width:100%;">
        <thead>
            <tr><th>เลขที่ฝากซื้อ</th><th>สถานะ</th></tr>
        </thead>
        <tbody id="orders">

        </tbody>
    </table>
  </div>
  
</div>
</div>
<hr>
<div class="row column">
<h4 style="margin: 0;" class="text-center">LATEST STORIES</h4>
</div>
<hr>
<div class="row">
    <div class="columns" style="border-right: 1px solid #E3E5E8;">
        <article id="review">

        </article>
    </div>
</div>


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

      $(document).ready(function(){
        $.ajax({
            type: "GET",
            url: 'api/get-view.php',
            success: function(data){
                console.log(data)
                data = JSON.parse(data)
                console.log(data)
                $("#review").empty();
                for(var i=0;i<data.length;i++){
                    $("#review").append(contentstring(data[i]))
                }
                
            },
         });

         $.ajax({
            type: "GET",
            url: 'api/get-order.php',
            success: function(data){
                console.log(data)
                data = JSON.parse(data)
                console.log(data)
                $("#orders").empty();
                for(var i=0;i<data.length;i++){
                    $("#orders").append("<tr><td>"+data[i].oid+"</td><td>"+data[i].status+"</td></tr>")
                }
                
            },
         });
      })


      function contentstring(ob){
          text = ''+
            '<div class="medium-6 row">'+
            '<div class="large-6 columns">'+
            '<p><img src="'+ob.urlimage+'" alt="image for article" alt="article preview image"></p>'+
            '</div>'+
            '<div class="large-6 columns">'+
            '<h5><a href="#">'+ob.title+'</a></h5>'+
            '<p>'+
            '<span><i class="fi-torso">'+ob.position+'</i></span>'+
            '</p>'+
            '<p>'+ob.detail+'</p>'+
            '</div>'+
            '</div>'+
            '<hr>';
        return text;
      }
</script>
</body>
</html>
