<html>
<head>
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
			<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
			<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	</head>
    <body>
    <div class="container">
    <h1>NoPayUpload</h1>
      <script type="text/javascript" src="js/materialize.min.js"></script>
      <form class="col s5" form action="clientdisp.php" method="post">
      <div class="row">
        <div class="input-field col s6">
          <input placeholder="Enter Your Name or Company Name" id="first_name" type="text" class="validate" name="cliname" required>
          <label for="first_name">Your Name / Company Name</label>
        </div>
      </div>
      <button class="btn waves-effect waves-light" type="submit" name="cli" >Get my Files
            <i class="material-icons right">archive</i>
      </button>
    </div>
    <?php
    session_start();      
    if(isset($_POST['cli'])){
      $usrc=$_POST["cliname"];
      $_SESSION["clien"]=$usrc;
    }
?>
</body>
</html>