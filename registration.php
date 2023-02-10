<?php
include "database.php";
$result = mysqli_query($induction, "SELECT * FROM `Users`");
?>
<title>WaifuSearch</title>
<link rel="stylesheet" type="text/css" href="styles/main.css">
<link rel="shortcut icon" href="/images/favicon.ico" type="image/x-icon">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

<body style="background: #313f3f; font-family: Calibri; cursor: default;">

  <div class="header">
    <a href="index.php" class="logo">ШукаюВайфу</a>
    <div class="header-right">
      <a href="index.php">Головна</a>
      <a href="search.php">Пошук</a>
      <a href="list.php">Моя сторінка</a>
    </div>
  </div>

    <div class="container text-center" style="margin-top: 100px;">
      <article class="card-body mx-auto" style="max-width: 400px;">
        <h1 class="h2 mb-3 font-weight-normal" style="color:aliceblue;">Sign in</h1>
          <form  method="post">
          <div class="form-group input-group">
    
            <h2 class="h5 mb-3 font-weight-normal" style="color:aliceblue; text-align:left;">Nickname</h2>
            <div class="form-group input-group" style="margin-top: -5px">
                <input name="nickname" class="form-control" placeholder="Nickname" type="text" value="<?php echo @$data['login']; ?>">
            </div> <!-- form-group// -->

            <h2 class="h5 mb-3 font-weight-normal" style="color:aliceblue; text-align:left; margin-top:15px;">Email</h2>
            <div class="form-group input-group" style="margin-top: -5px">
                <input name="email" class="form-control" placeholder="Email address" type="email" value="<?php echo @$data['email']; ?>">
            </div> <!-- form-group// -->
    
            <h2 class="h5 mb-3 font-weight-normal" style="color:aliceblue; text-align:left; margin-top:15px;">Password</h2>
            <div class="form-group input-group" style="margin-top: -5px">
              <input name="passwordReg" class="form-control" placeholder="Create password" type="password" value="<?php echo @$data['passwordReg']; ?>">
            </div> <!-- form-group// -->
  
            <div class="form-group input-group" style="margin-top: 10px">
              <input name="repeatPasswordReg" class="form-control" placeholder="Repeat password" type="password" value="<?php echo @$data['repeatPasswordReg']; ?>">
            </div> <!-- form-group// -->
  
          </div> <!-- form-group end.// -->

          <br>
          <div class="form-group">
            <button name="submitPass" type="submit" class="btn" style="background-color:aliceblue; margin-top:10px; width:100px; height:40px; font-size:12pt;">Create</button>
          </div> <!-- form-group// -->
          <br>
          <p class="text-center">Have an account?<a href="login.php" style="color:#ae8b61;">Log In</a> </p>
          </form>
      </article>
    
    </div>
	
	<?php
	
	if(isset($_POST['submitPass'])){
    $nickname = $_POST['nickname'];
    $email = $_POST['email'];
    $pass = $_POST['passwordReg'];
    $passRep = $_POST['repeatPasswordReg'];
    
	$errors = 0;
	if(strlen($nickname) < 7)
	{
		$errors++;
	}

	if(strlen($email) < 7)
	{
		$errors++;
	}

	if(strlen($pass) < 7)
	{
		$errors++;
	}

	if($pass != $passRep)
	{
		$errors++;
  }
  
  while($users = mysqli_fetch_assoc($result))
  {
    if($email == $users['Email'])
    {
      $errors++;
    }
  }


	if($errors == 0)
	{

    $pass = md5($pass);
    $conn = new mysqli('127.0.0.1', 'kittyCat9', 'KittyCat123', 'kittycat9');
    $sql = "INSERT INTO Users (Name, Email, Password) VALUES('$nickname', '$email', '$pass')";
	if($conn->query($sql)){

	}
    $conn->close();

	}
	

  } else
  {
    echo '<div style="color: red>Try again</div>';
  }
    
?>
    </body>