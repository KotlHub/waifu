<?php
include "database.php";
//$result = mysqli_query($induction, "SELECT * FROM `WaifuHusbanduTable`");
require "langcheck.php";
$f = file("language.txt");
$lang = $f[0];
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

<?php 
if ($lang == "ua")
{
  ?>
  <div class="header">
    <a href="index.php" class="logo">ШукаюВайфу</a>
    <div class="header-right">
      <a href="index.php">Головна</a>
      <a href="search.php">Пошук</a>
      <a href="list.php">Моя сторінка</a>
    </div>
  </div>
  <?php
}
elseif ($lang == "eng")
{
  ?>
  <div class="header">
    <a href="index.php" class="logo">WaifuSearch</a>
    <div class="header-right">
      <a href="index.php">Main</a>
      <a href="search.php">Search</a>
      <a href="list.php">My Page</a>
    </div>
  </div>
  <?php
}
?>

<?php

if(array_key_exists('lng', $_POST))
{
  changeLang($lang);
}

?>

<?php 
if ($lang == "eng")
{
  ?>
  
  <?php
}
elseif ($lang == "ua")
{
  ?>
  
  <?php
}
?>

<div class="parallax" style="background: #283838;"></div>
<form method="post">
<div style="height:460px; background-color:white; display: flex; flex-direction: column;">
  <input type="submit" class="buttonWaifu" style="margin-top: 10px; margin-left: 10px;" name="lng" value="language">
    <?php 
            if ($lang == "ua")
            {
              ?>
    <a style="animation: text 2s 1; width: 100%; font-size: 72px; text-align: center; margin-top: 90px; color: #ae8b61; font-weight: 50px; font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">​Диво-пошук ≧◉ᴥ◉≦</a>
              <?php
            }
            elseif ($lang == "eng")
            {
              ?>
    <a style="animation: text 2s 1; width: 100%; font-size: 72px; text-align: center; margin-top: 90px; color: #ae8b61; font-weight: 50px; font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">Wondersearch≧◉ᴥ◉≦</a>
              <?php
            }
            ?>
    <br>
    <div class="containerForAnim_text search-container" style="font-size:small;">
        <div class="search-el">
        <?php 
            if ($lang == "ua")
            {
              ?>
              <b>Ім'я</b>
              <?php
            }
            elseif ($lang == "eng")
            {
              ?>
              <b>Name</b>
              <?php
            }
            ?>
              <input name="wfName" style="width: 120px; height: 30px; border-radius: 15px; border-width: 3px; border-color: #ae8b61; padding: 5px;">
        </div>
        <div class="search-el">
            <?php 
            if ($lang == "ua")
            {
              ?>
              <b>Характер</b>
              <?php
            }
            elseif ($lang == "eng")
            {
              ?>
              <b>Сharacter</b>
              <?php
            }
            ?>
              <input name="wfChar" style="width: 120px; height: 30px; border-radius: 15px; border-width: 3px; border-color: #ae8b61; padding: 5px;">
        </div>
        <div class="search-el">
        <?php 
            if ($lang == "ua")
            {
              ?>
              <b>Вік</b>
              <?php
            }
            elseif ($lang == "eng")
            {
              ?>
              <b>Age</b>
              <?php
            }
            ?>
            <input name="wfAge" style="width: 120px; height: 30px; border-radius: 15px; border-width: 3px; border-color: #ae8b61; padding: 5px;">
            <!-- <select name="wfAge" class="select">
                <option value="valuenull"></option>
                <option value="value0">менше 18</option>
                <option value="value1">18</option>
                <option value="value2">19</option>
                <option value="value3">20-30</option>
                <option value="value4">30-40</option>
                <option value="value5">40-50</option>
                <option value="value6">50-100</option>
                <option value="value7">100-500</option>
                <option value="value8">500-1000</option>
                <option value="value9">більше 1000</option>
                <option value="value10">невмирущий</option>
            </select> -->
        </div>
        <div class="search-el">
        <?php 
            if ($lang == "ua")
            {
              ?>
              <b>Тип</b>
              <?php
            }
            elseif ($lang == "eng")
            {
              ?>
              <b>Type</b>
              <?php
            }
            ?>
            <select name="wfType" class="select">
                <option value=""></option>
                <option value="Waifu">Waifu</option>
                <option value="Husbandu">Husbandu</option>
            </select>
        </div>
        <div class="search-el">
        <?php 
            if ($lang == "ua")
            {
              ?>
              <b>Звідки</b>
              <?php
            }
            elseif ($lang == "eng")
            {
              ?>
              <b>Where</b>
              <?php
            }
            ?>
            <input name="wfFrom" style="width: 120px; height: 30px; border-radius: 15px; border-width: 3px; border-color: #ae8b61; padding: 5px;">
        </div>
        <div class="search-el">
            <b></b>
            <?php 
            if ($lang == "ua")
            {
              ?>
            <input type="submit" name="submit" value="✓ Шукати ◈◡◈" style="width: 120px; height: 50px; border-radius: 50px; border-width: 3px; background-color: #ae8b61; border-color: #ae8b61; padding: 5px; color: white;">
              <?php
            }
            elseif ($lang == "eng")
            {
              ?>
            <input type="submit" name="submit" value="✓ Search ◈◡◈" style="width: 120px; height: 50px; border-radius: 50px; border-width: 3px; background-color: #ae8b61; border-color: #ae8b61; padding: 5px; color: white;">
              <?php
            }
            ?>
        </div>
    </div>
</div>
</form>
<?php
$count = 0;
  if(isset($_POST['submit'])){
    $wfName = $_POST['wfName'];
    $wfChar = $_POST['wfChar'];
    $wfFrom = $_POST['wfFrom'];
    $wfFrom = $_POST['wfFrom'];
    $wfAge = $_POST['wfAge'];
    $wfType = $_POST['wfType'];

    $count++;

    $result = mysqli_query($induction, "SELECT * FROM `WaifuHusbanduTable` WHERE `Name` LIKE '%$wfName%' AND `Characteristic` LIKE '%$wfChar%' AND `WhereAreFrom` LIKE '%$wfFrom%' AND `Type` LIKE '%$wfType%' AND `Age` LIKE '%$wfAge%' ");
  }
?>
<div class="container2" style="background-color:rgb(225,218,211); width:100%;">
  <div class="center2" style="height:auto; background-color:rgb(225,218,211); display:flex; flex-direction:column;">
  <?php
if ($lang == "ua")
{
    while($waifus = mysqli_fetch_assoc($result))
    {
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
      $count++;
    }
    if ($count == 1)
    {
      ?>
        <span class="list-span">Нічого не знайдено</span>
      <?php
    }
}
elseif ($lang == "eng")
{
  while($waifus = mysqli_fetch_assoc($result))
  {
  ?>
  <div class="list-box-inp" style="width:780px; height:300px; padding:10px;">
    <img src="./images_pers/<?php echo $waifus['Image']; ?>.jpg" alt="err" style="height:280px; width:280px;">
    <div style="margin-left:10px; height:280px; width:490px;">
        <span class="list-span" style="font-weight:bold; vertical-align:top; font-size:14pt;"><?php echo $waifus['Name'];?> 
        <span class="list-span" style="color:#283838; font-weight:lighter; vertical-align:top; font-size:14pt;"><?php echo $waifus['Type']; ?></span>
        </span><br>
        <hr style="width:50%; margin-left:0px;">
        <span class="list-span"><?php echo $waifus['Nickname']?></span><br>
        <span class="list-span">Where: <?php echo $waifus['WhereAreFrom']; ?></span><br>
        <span class="list-span">Age: <?php echo $waifus['Age']; ?></span><br><br>
        <span class="list-span">Character: <?php echo $waifus['Characteristic']; ?></span><br><br>
        <span class="list-span">View: <?php echo $waifus['Comment']; ?></span><br>
    </div>
  </div>
  <?php
  $count++;
}
if ($count == 1)
{
  ?>
    <span class="list-span">Nothing found</span>
  <?php
}
}
?>
  </div>
</div>
</body>
</html>