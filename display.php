<?php 
	session_start();
	//echo ("USER is ".$_SESSION['usr']."<br/>");
	include "config.php";
	$link=mysqli_connect($servername,$username,$password,$dbname);
?>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<!--<link rel="stylesheet" href="css/bootstrap.min.css" />-->
	<title>Download Files</title>
<!--	<style type="text/css">
	#wrapper {
	margin: 0 auto;
	float: none;
	width:70%;
}
.header {
	padding:10px 0;
	border-bottom:1px solid #CCC;
}
.title {
	padding: 0 5px 0 0;
	float:left;
	margin:0;
}
.container form input {
	height: 30px;
}
body
{
    
    font-size:14;
    font-weight:bold;
}
.table{
	border: 5px solid green;
}
		</style>-->
</head>
<body>
<nav>
    <div class="nav-wrapper">
      <div class="col s15">
        <a href="index.php" class="breadcrumb">Login</a>
        <a href="image_upload1.php" class="breadcrumb">Upload</a>
        <a href="display.php" class="breadcrumb">Files</a>
		
      </div>
    </div>
  </nav>

<br>

<div class="container home">
<a href="index.php"><button class="btn waves-effect waves-light" type="button" name="logout">I am Done			
<!--	<i class="material-icons right">account_circle</i> -->
  					</button></a>
<h3>List of Files Uploaded</h3>
 <table class="highlight">
  <thead>
   <tr>
    <th>Sr.No</th>
    <th>Name</th>
	<th>File</th>
  </tr>
   </thead>
    <tbody>
	
                        <?php				
	//mysqli_select_db("upload",$link);
	echo "Welcome, These are files you uploaded";
	$q="select count(*) \"total\"  from file_stack";
	$ros=mysqli_query($link,$q);
	$row=(mysqli_fetch_array($ros));
	$total=$row['total'];
	$dis=4;
	$total_page=ceil($total/$dis);
	$page_cur=(isset($_GET['page']))?$_GET['page']:1;
	$k=($page_cur-1)*$dis;
	//SELECT Id FROM user_data WHERE Id = '$username'
	$usr=$_SESSION['usr'];
	$q="SELECT * FROM file_stack LIMIT $k,$dis";
	$ros=mysqli_query($link,$q);
	while($row=mysqli_fetch_array($ros))
	{
		echo '<tr>';
		echo '<td align=center>' . $row['Sr_no'];
		echo '<td align=center>' .$row['name'];
		echo "<td align=center><a download title='Click here to download in image.' 
		     href='Files".$_SESSION['uname']."/".$row['image']."'>{$row['image']} </a>"; 
		echo '</tr>';
	}
	echo '</table>';
	echo  '</tbody>';
	echo '<br/>';
	
	if($page_cur>1)
	{
	 echo '<a href="display.php?page='.($page_cur-1).'" style="cursor:pointer;color:DeepSkyBlue ;" ><input style="cursor:pointer;background-color:DeepSkyBlue;border:1px black solid;border-radius:5px;width:120px;height:30px;color:white;font-size:15px;font-weight:bold;" type="button" value=" Previous "></a> ';
     }
	else
	{
	  
	  echo '<input style="background-color:DeepSkyBlue;border:1px black solid;border-radius:5px;width:120px;height:30px;color:black;font-size:15px;font-weight:bold;" type="button" value=" Previous "> ';
	  
	}
	for($i=1;$i<$total_page;$i++)
	{
		if($page_cur==$i)
		{
			echo '<input style="background-color:DeepSkyBlue ;border:2px black solid;border-radius:5px;width:30px;height:30px;color:black;font-size:15px;font-weight:bold;" type="button" value="'.$i.'"> ';
		}
		else
		{
		echo '<a href="display.php?page='.$i.'"> <input style="cursor:pointer;background-color:DeepSkyBlue ;border:1px black solid;border-radius:5px;width:30px;height:30px;color:white;font-size:15px;font-weight:bold;" type="button" value="'.$i.'"> </a> ';
		
		}
	}
	if($page_cur<$total_page)
	{
		
		echo '<a href="display.php?page='.($page_cur+1).'"><input style="cursor:pointer;background-color:DeepSkyBlue ;border:1px black solid;border-radius:5px;width:90px;height:30px;color:white;font-size:15px;font-weight:bold;" type="button" value=" Next "></a>';
  	  
	}
	else
	{

	 echo '<input style="background-color:DeepSkyBlue ;border:1px black solid;border-radius:5px;width:90px;height:30px;color:black;font-size:15px;font-weight:bold;" type="button" value="   Next "> ';
     }
   
?>
</div>
<br>
</div>
</body>
</html>	