<?php session_start();
	if($_SESSION['login']=="true")
	{
	$username=$_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Teacher Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<?php include "header.php"; ?><br><br>
<div class="container">
<h1 style="margin-top: 5px;"><?php echo "Welcome ".$username ?></h1><br><br><br><br>
 <form method="post" style="width:60%;margin:auto;">
      <div class="form-group">
        <label for="class">Class:</label>
        <input class="form-control" name="class" placeholder="Enter Class">
      </div>
      <div class="form-group">
        <label for="Date">Date:</label>
        <input type="class" class="form-control" name="date" placeholder="Enter the date">
      </div>
      <input type="submit" value="View Attendance" class="btn btn-primary" name="attendance">
 </form>
</div>
</body>
</html>
<?php
	
		if(isset($_POST['attendance']))
		{
			$flag=0;
			$class=$_POST['class'];
    		$date=$_POST['date'];
    		//echo "".$username;echo "".$password;
			$db = new SQLite3('FaceBase.db');
    		$sql = "SELECT * FROM attendance where Clas='$class' and Dat='$date'";
        	$ret = $db->query($sql);
        	while($row=$ret->fetchArray(SQLITE3_ASSOC)) 
     	    {
 				$flag=1;
    			break;
   			} 
   			if($flag==1)
			{
				$_SESSION['class']=$class;
				$_SESSION['date']=$date;
				header('location:attendance.php');
			}
			else {
      	echo "<br><div class='row' style='width:50%;margin:auto;'>
      	<div class='col-xs-4'></div><div class='alert alert-danger alert-dismissable col-sx-4'>
    	<a href=''#'' class='close' data-dismiss='alert' aria-label='close'>×</a>
    	<strong>Error!</strong> Such a record does not exist.
  		</div><div class='col-xs-4'>
  		</div>
  		</div>";
    		}
		}
?>
<?php }
  else {
  header("location:index.php");
}
 ?>
<!--$sql = "SELECT Name,Clas,Dat FROM attendance where Clas='$class' and Dat='$date' ORDER BY Name ";-->