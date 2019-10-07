<?php
	session_start();
	include "config.php";
	$conn=mysqli_connect($servername,$username,$password,$dbname);
    echo "Welcome to nopayupload";
	//mysql_select_db("upload");
	//include("dbconfig.php");
	
	if(isset($_POST['click'])){
		$name=$_POST['name'];
		$img=$_FILES['image']['name'];
		$uid = $_SESSION['uid'];
		$insert="insert into file_stack (`name`,`image`,`uid`) values ('$name','$img','$uid')";
		$Sr_no="SELECT Id FROM user_data";
		if (mysqli_connect_errno())
		  {
		  echo "Failed to connect to MySQL: " . mysqli_connect_error();
		  }
		  else{
			  echo "DATABASE CONNECTION SUCCESSFUll";
		  }
			$lct= "Files".$_SESSION['usr']."/".$img;
			if(mysqli_query($conn,$insert)){
				move_uploaded_file($_FILES['image']['tmp_name'], $lct);
				echo "<script>alert('File has been Uploaded:- ".$lct."');window.location.href='".$url."/nopayupload/display.php'</script>";				
				}
				else{
					echo "File not Uploaded";
				}
				mysqli_close($conn);
		}
?>
<html>
	<head>
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
			<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
			<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<!--<style>
		html {
		height: 100%;
		background-image: url(undraw_add_file_4gfw.svg);
		background-size: 100% 100%;
		-o-background-size: 100% 100%;
		-webkit-background-size: 100% 100%;
		background-size: cover;
		}
</style>-->
	</head>
		<body class="center-align" text-align: center;>
		<!--<img src="undraw_add_file_4gfw.svg">-->
		<div class="container">
		<h1>NoPayUpload</h1>
		<br/>
		<br/>
		<form action="image_upload1.php" method="post" enctype="multipart/form-data">
    			<form class="col s12">
      			<div class="row">
        		<div class="input-field col s6">
          		<input placeholder="Enter the Project Title" id="file_name" type="text" class="validate" name="name">
			<!--<input type="text" name="name"><br>-->
			<label>Project Title</label><br>
			<!--<a input type="file" name="image" class="btn-floating btn-large waves-effect waves-light red"><i class="material-icons" >add</i></a>-->			
			<!--<input type="file" name="image">-->
  			<form action="#">
    			<div class="file-field input-field">
      			<div class="btn">
        		<span>Add Your Files</span>
				<input type="file" multiple name="image">
					<i class="material-icons left">add_box</i>
      			</div>
      			<div class="file-path-wrapper">
        		<input class="file-path validate" type="text" placeholder="Upload one or more files">
      			</div>
    			</div>
  				</form>
			<br>
 			 <button class="btn waves-effect waves-light" type="submit" name="click">Upload
    			<i class="material-icons right">cloud_upload</i>
  			</button>
			  <a href="display.php"><button class="btn waves-effect waves-light" type="button" name="action">My Files	
						<i class="material-icons right">folder</i>
					</button>
					<a href="index.php"><button class="btn waves-effect waves-light" type="button" name="logout">Log-Out
					<i class="material-icons right">account_circle</i>
  					</button></a>
			<!--<input type="submit" name="click" value="Upload" >-->
		</form>
		</div>
		
	</body>
</html>