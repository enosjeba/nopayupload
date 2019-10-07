<?php
	//$myRoot = $_SERVER["DOCUMENT_ROOT"];
	//echo $myRoot;
	//echo getcwd()."<br/>";
	//require("handlers/config.php");
	include "config.php";
?>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
<nav>
    <div class="nav-wrapper">
      <div class="col s15">
        <a class="breadcrumb">Upload</a>
        <a class="breadcrumb">Files</a>
		<a href="Login.php" class="breadcrumb">Login</a>
      </div>
    </div>
  </nav>
	<h1 class="center-align">NoPayUpload<h1>
	<div class="container">
			<form action="index.php" method="post" class="log_all">
				<div class="container">
					<div class="form-group">
						<div class="row">
							<div class="col-md-3"></div>
							<div class="col-md-1"><label for="username">Username:</label></div>
							<div class="col-md-4"><input type="text" class="form-control" name="usr"></div>
						</div>
					</div>
					<div class="form-group"> 
					  <div class="row">
						<div class="col-md-3"></div>
						  <div class="col-md-3"><label for="password">Password:</label></div>
						  <div class="col-md-3"><input type="password" class="form-control" name="pwd"></div>
						</div>
					</div>
					<button class="btn waves-effect waves-light" type="submit" name="done">Login
  					</button>
  					<a href="imaderegister.php"><button class="btn waves-effect waves-light" type="button" name="done">Register
  					</button></a>
					<a href="client.php"><button class="btn waves-effect waves-light" type="button" name="action">I am here for my Files	
						<i class="material-icons right">archive</i>
					</button>
				</div>
			</form>
			<?php 
		
			session_start();
			if(isset($_POST['done'])):
				$usr=$_POST["usr"];
				$pwd=sha1($_POST["pwd"]);
				$_SESSION["usr"]=$usr;
				
				try {
					$conn = new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
					// set the PDO error mode to exception
					$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$stmt = $conn->prepare("SELECT * FROM user_data WHERE username='$usr' AND password='$pwd'");
					$stmt->execute();
					// set the resulting array to associative
					$result = $stmt->fetchAll();
					if(count($result)==1){
						//Creating the session: Storing User ID//
						$_SESSION['uid'] = $result[0]['Id'];
						$_SESSION['uname'] = $result[0]['username'];
						header("Location: ".$url."image_upload1.php");
					}
					else{
						echo "<h6>Invalid credentials</h6>";
					}
				}
				catch(PDOException $e)
					{
					echo "Connection failed: " . $e->getMessage();
					}
					$conn=null;
					?>

			<?php endif; ?>
		</body>
</html>