<?php 
  include "config.php";
  //echo getcwd()."<br/>";
?>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
<div class="container">
<h1>NoPayUpload</h1>
<div class="row">
    <form class="col s12" action="imaderegister.php" method="POST">
      <div class="row">
        <div class="input-field col s2">
        <label for="first_name">Name</label>
          <input placeholder="First name" id="first_name" type="text" class="validate" required name="nm">
        </div>
        <!--
        <div class="input-field col s2">
          <input id="last_name" type="text" class="validate" required>
          <label for="last_name">Last Name</label>
        </div>
        -->
      </div>
      <div class="row">
        <div class="input-field col s3">
          <input type="password" name="pass" id="pass" class="validate" onfocusout="password_match()" required>
          <label for="password">Password</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s3">
          <input type="password" name="cpass" id="cpass" class="validate" onfocusout="password_match()" required>
          <div class="input-field col s3" id="answer"></div>
          <label for="password">Confirm Password</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s3">
          <input id="email" type="email" name="emil" class="validate" required >
          <label for="email">Email</label>
        </div>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
            <button class="btn waves-effect waves-light" type="submit" name="done">Register and Proceed
                <i class="material-icons right">send</i>
            </button>
        </div>
    </form>
    <script>
	function password_match(){
		var pass1=document.getElementById('pass').value;
		var pass2=document.getElementById('cpass').value;
		if(pass1 != ""){
			if(pass1 == pass2){
				document.getElementById('answer').innerHTML="Correct Password";
			}
			else{
				document.getElementById('answer').innerHTML="Password Do not Match";
			}
		}
		else{
				document.getElementById('answer').innerHTML="Please fill Password Field";
		}
	}
</script>
  </div>
</div>
</body>
</html>
<?php 
	if(isset($_POST['done'])){	
		
		$usr=$_POST["nm"];
		$pwd=sha1($_POST["pass"]);
		$emil=$_POST['emil'];
		
		try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = ("INSERT INTO user_data(username,password,email) VALUES('$usr','$pwd','$emil')");
			if($conn->exec($sql) == True){
				/*echo "<script LANGUAGE='JavaScript'>
						window.alert('Your Account has been Created');
						window.location.href='/Login.php';
						</script>";*/
			}
			else{
				echo "<script>alert('Sign Up Failed');";
			}
		}
		catch(PDOException $e)
			{
			echo "Connection failed: " . $e->getMessage();
			}
    $conn = null;
    
    $uploads_dir = '/Files'.$usr;
    $curdir = getcwd();
    
    if(mkdir($curdir . $uploads_dir, 0777, true)){
            echo "$uploads_dir was made";
            echo "<script>alert('Welcome.$usr');window.location.href='/nopayupload/index.php'</script>";
            echo "<br>";
        }else{
            echo "Failed to create directory";
        }
  }
?>