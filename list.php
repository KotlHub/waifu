<?php
include "database.php";
session_start();
?>

<!doctype html>
<html lang="en">
  <script src="functions.js"></script>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>WaifuSearch</title>
  <link rel="stylesheet" type="text/css" href="styles/main.css">
  <link rel="shortcut icon" href="/images/favicon.ico" type="image/x-icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body style="background: rgb(225,218,211); cursor: default; font-family: Calibri;">

  <div class="header">
    <a href="index.php" class="logo">ШукаюВайфу</a>
    <div class="header-right">
      <a href="index.php">Головна</a>
      <a href="search.php">Пошук</a>
      <a href="list.php">Моя сторінка</a>
    </div>
  </div>

  <div>
    <!-- <input type="submit" class="buttonWaifu" style="margin-top: 10px; margin-left: 10px;" name="lng" value="language"> -->    
    <div id="app_profile" style="height: 500px; background: #283838;">
      <div class="elem">
        <div class="parallaxProfileBG">
          <!-- <button class="buttonWaifu" style="margin:20px;" onclick="window.location.href='page_sign_log_in.php'">log in or sign in</button> -->
          <br>
          <div class="elem2" style="height: 80px; display:flex; flex-direction:column; background-color: white; opacity: 85%; margin-top: 190px;"></div>
          <br>
        </div>
      </div>
      <div class="elem3" style="display:flex; flex-direction:column; margin-top: -280px;">
        <?php
        if($_SESSION['user'])
        {
          ?>
        <a style="width: 100%; font-size: 48px; text-align: center; color: #ae8b61; font-weight: 50px;">ᕙ(^▿^-ᕙ) Welcome, <?php echo $_SESSION['user']["name"]; ?> ≧◠ᴥ◠≦</a>
        <?php
      }
      if(!$_SESSION['user'])
        {
          ?>
          <a href="page_sign_log_in.php" style="width: 100%; font-size: 48px; text-align: center; color: #ae8b61; font-weight: 50px;">ᕙ(^▿^-ᕙ) Зареєструйся або авторизуйся ≧◠ᴥ◠≦</a>
          <?php
        }
      ?>
      </div>
    </div>
  </div>
  
  

<div id="app_list" style="background: #283838;">
    <div style="height:360px; background-color:white;">
      <div class="containerForAnim_text" style="display:flex; flex-direction:column;">
        <a style="width: 100%; font-size: 48px; text-align: center; margin-top: 90px; color: #ae8b61; font-weight: 50px;">(ɔ◔‿◔)ɔ ♥ Фаворити ≧✯◡✯≦</a>
      </div>
      <div class="container2" style="background-color:rgb(225,218,211); width:100%;">
        <div class="center2" style="height:auto; background-color:rgb(225,218,211); display:flex; flex-direction:column;">
  <?php
    if($_SESSION['user'])
    {
      $user = $_SESSION['user']["id"];
      $result = mysqli_query($induction, "SELECT `Waifu` FROM `Favourites` WHERE `User` LIKE '%$user%'");
      while($favs = mysqli_fetch_assoc($result))
      {
        $fav = $favs['Waifu'];
        $wf = mysqli_query($induction, "SELECT * FROM `WaifuHusbanduTable` WHERE `id` LIKE '%$fav%'");
        $waifus = mysqli_fetch_assoc($wf);
          ?>
        <div class="list-box-inp" style="width:780px; height:300px; padding:10px;">
        <img src="./images_pers/<?php echo $waifus['Image']; ?>.jpg" alt="err" style="height:280px; width:280px;">
        <div style="margin-left:10px; height:280px; width:490px;">
            <span class="list-span" style="font-weight:bold; vertical-align:top; font-size:14pt;"><?php echo $waifus['Name'];?> 
            <span class="list-span" style="color:#283838; font-weight:lighter; vertical-align:top; font-size:14pt;"><?php echo $waifus['Type']; ?></span>
            </span><br>
            <hr style="width:50%; margin-left:0px;">
            <span class="list-span"><?php echo $waifus['Nickname']?></span><br>
            <span class="list-span">Звідки: <?php echo $waifus['WhereAreFrom']; ?></span><br>
            <span class="list-span">Вік: <?php echo $waifus['Age']; ?></span><br><br>
            <span class="list-span">Характер: <?php echo $waifus['Characteristic']; ?></span><br><br>
            <span class="list-span">Опис: <?php echo $waifus['Comment']; ?></span><br>
        </div>
        </div>
      <?php
        
      }
    }
  ?>

        </div>
      </div>
    </div>
</div>


<script src="index.js"></script>
</body>
</html>		