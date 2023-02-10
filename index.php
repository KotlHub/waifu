<?php
include "database.php";
require "langcheck.php";
$f = file("language.txt");
$lang = $f[0];
session_start();
?>

<!doctype html>
<html lang="en">
  <!-- <script src="functions.js"></script> -->
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>WaifuSearch</title>
  <link rel="stylesheet" type="text/css" href="styles/main.css">
    <link rel="shortcut icon" href="./free-icon-hand-4551468.png" type="image/png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body style="background: #283838; cursor: default; font-family: Calibri;">

<?php 
if ($lang == "ua")
{
  $result = mysqli_query($induction, "SELECT * FROM `WaifuHusbanduTable`");
  ?>
  <div class="header">
    <a class="logo">ШукаюВайфу</a>
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
  $result = mysqli_query($induction, "SELECT * FROM `WaifuHusbanduTable_EN`");
  ?>
  <div class="header">
    <a class="logo">WaifuSearch</a>
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
if ($lang == "ua")
{
  ?>
  <div class="elem">
    <div class="parallaxBG">
    	<form method="post" class="lng-button">
  			<input type="submit" class="buttonWaifu" style="margin-top: 10px; margin-left: 10px;" name="lng" value="language">
		</form>
    </div>
  </div>
  <div style="height:460px; background-color:white;">
    <div class="containerForAnim_text" style="display:flex; flex-direction:column;">
      <a style="width: 100%; font-size: 72px; text-align: center; margin-top: 90px; color: #ae8b61; font-weight: 50px;">Waifu & Husbandu</a>
    </div>
    <div class="containerForAnim_text" style="display:flex; flex-direction:column;">
    <br>
    <a style="width: 100%; font-size: 20px; text-align: center; margin-top: 5px; color: black;">Знайди свою Вайфу або Хазбенду</a>
  </div>
    <div class="containerForAnim_text2" style="display:flex; flex-direction:column;">
    <br>
    <a style="width: 100%; font-size: 18px; text-align: center; margin-top: 10px; color: black;">👌(≖‿‿≖👍) Онлайн пошук своєї Вайфу або свого Хазбенду, чи всеж таки обох (✌≖‿‿≖)👍</a>
  </div>
  </div>
  <?php
}
elseif ($lang == "eng")
{
  ?>
  <div class="elem">
    <div class="parallaxBG">
    	<form method="post" class="lng-button">
  			<input type="submit" class="buttonWaifu" style="margin-top: 10px; margin-left: 10px;" name="lng" value="language">
		</form>
    </div>
  </div>
  <div style="height:460px; background-color:white;">
    <div class="containerForAnim_text" style="display:flex; flex-direction:column;">
      <a style="width: 100%; font-size: 72px; text-align: center; margin-top: 90px; color: #ae8b61; font-weight: 50px;">Waifu & Husbandu</a>
    </div>
    <div class="containerForAnim_text" style="display:flex; flex-direction:column;">
    <br>
    <a style="width: 100%; font-size: 20px; text-align: center; margin-top: 5px; color: black;">Find your Waifu or Husbandu</a>
  </div>
    <div class="containerForAnim_text2" style="display:flex; flex-direction:column;">
    <br>
    <a style="width: 100%; font-size: 18px; text-align: center; margin-top: 10px; color: black;">👌(≖‿‿≖👍) Online search for your Wife or your Husband, or even both (✌≖‿‿≖)👍</a>
  </div>
  </div>
  </div>
  <?php
}
?>

<div>
  <div>
  <div class="parallaxDecoBG">
    <div class="container">
      <div class="center">
        <form method="post">
           <input type="submit" class="buttonWaifu" name="wf" value="Waifu">
           <input type="submit" class="buttonWaifu" style="margin-left: 10px;" name="wfz" value="Both">
           <input type="submit" class="buttonWaifu" style="margin-left: 10px;" name="wf" value="Husbandu">
        </form>
      </div>
    </div>
  </div>
</div>
<div class="container2" style="background-color:rgb(225,218,211); width:100%;">
  <div class="center2" style="height:auto; background-color:rgb(225,218,211); display:flex; flex-direction:column;">
  <?php
  if(isset($_POST['wf']))
  {
    while($waifus = mysqli_fetch_assoc($result))
    {
      if ($waifus['Type'] == $_POST['wf'])
      {
      ?>
      <div class="list-box-inp" style="width:780px; height:300px; padding:10px;">
        <img src="./images_pers/<?php echo $waifus['Image']; ?>.jpg" alt="err" style="height:280px; width:280px;">
        <div style="margin-left:10px; height:280px; width:490px;">
            <input type="hidden" name="waifuID" value="<?php echo $waifus['id']; ?>">
            <span class="list-span" style="font-weight:bold; vertical-align:top; font-size:14pt;"><?php echo $waifus['Name'];?> 
            <span class="list-span" style="color:#283838; font-weight:lighter; vertical-align:top; font-size:14pt;"><?php echo $waifus['Type']; ?></span>
            </span><br>
            <hr style="width:50%; margin-left:0px;">
            <?php
            if ($lang == 'ua')
            { ?>
            <span class="list-span"><?php echo $waifus['Nickname']?></span><br>
            <span class="list-span">Звідки: <?php echo $waifus['WhereAreFrom']; ?></span><br>
            <span class="list-span">Вік: <?php echo $waifus['Age']; ?></span><br><br>
            <span class="list-span">Характер: <?php echo $waifus['Characteristic']; ?></span><br><br>
            <span class="list-span">Опис: <?php echo $waifus['Comment']; ?></span><br>
            <?php 
            }
            ?>
            <?php
            if ($lang == 'eng')
            { ?>
            <span class="list-span"><?php echo $waifus['Nickname']?></span><br>
            <span class="list-span">Where: <?php echo $waifus['WhereAreFrom']; ?></span><br>
            <span class="list-span">Age: <?php echo $waifus['Age']; ?></span><br><br>
            <span class="list-span">Characteristic: <?php echo $waifus['Characteristic']; ?></span><br><br>
            <span class="list-span">About: <?php echo $waifus['Comment']; ?></span><br>
            <?php 
            }
            ?>
        </div>
        <?php 
        if($_SESSION['user'])
        { ?>
            <div class="div-heart">
			<form method="post" class="lng-button">
                <input type="submit" name="button_heart" class="button-heart" value="<?php echo $waifus['id']; ?>">
            </form>
			</div>
        <?php
        }
        ?>
      </div>
      <?php
      }
    }
  }
  else {
    
    while($waifus = mysqli_fetch_assoc($result))
    {
      ?>
      <div class="list-box-inp" style="width:780px; height:300px; padding:10px;">
        <img src="./images_pers/<?php echo $waifus['Image']; ?>.jpg" alt="err" style="height:280px; width:280px;">
        <div style="margin-left:10px; height:280px; width:490px;">
        <input type="hidden" name="waifuID" value="<?php echo $waifus['id']; ?>">
            <span class="list-span" style="font-weight:bold; vertical-align:top; font-size:14pt;"><?php echo $waifus['Name'];?> 
            <span class="list-span" style="color:#283838; font-weight:lighter; vertical-align:top; font-size:14pt;"><?php echo $waifus['Type']; ?></span>
            </span><br>
            <hr style="width:50%; margin-left:0px;">
            <?php
            if ($lang == 'ua')
            { ?>
            <span class="list-span"><?php echo $waifus['Nickname']?></span><br>
            <span class="list-span">Звідки: <?php echo $waifus['WhereAreFrom']; ?></span><br>
            <span class="list-span">Вік: <?php echo $waifus['Age']; ?></span><br><br>
            <span class="list-span">Характер: <?php echo $waifus['Characteristic']; ?></span><br><br>
            <span class="list-span">Опис: <?php echo $waifus['Comment']; ?></span><br>
            <?php 
            }
            ?>
            <?php
            if ($lang == 'eng')
            { ?>
            <span class="list-span"><?php echo $waifus['Nickname']?></span><br>
            <span class="list-span">Where: <?php echo $waifus['WhereAreFrom']; ?></span><br>
            <span class="list-span">Age: <?php echo $waifus['Age']; ?></span><br><br>
            <span class="list-span">Characteristic: <?php echo $waifus['Characteristic']; ?></span><br><br>
            <span class="list-span">About: <?php echo $waifus['Comment']; ?></span><br>
            <?php 
            }
            ?>
        </div>
        <?php 
        if($_SESSION['user'])
        { ?>
            <div class="div-heart">
			<form method="post" class="lng-button">
                <input type="submit" name="button_heart" class="button-heart" value="<?php echo $waifus['id']; ?>">
            </form>
			</div>
        <?php
        }
        ?>
      </div>
      <?php
    }
  }?>
  </div>
</div>
</div>

<?php 
if(isset($_POST['button_heart'])) {
  $waifu = $_POST['button_heart'];
  $user = $_SESSION['user']["id"];
  $status = true;
  $conn = new mysqli('127.0.0.1', 'kittyCat9', 'KittyCat123', 'kittycat9');
  $sql = "INSERT INTO Favourites (User, Waifu, Status) VALUES('$user', '$waifu', '$status')";
	if($conn->query($sql)){
    echo "Данные успешно добавлены";
	}
    $conn->close();
 }
?>

<script src="index.js"></script>
</body>

</html>