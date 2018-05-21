<!--To create login for teachers-->
<?php session_start(); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Teacher Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
  <body>
    <div class="container">
      <div class="row">
      <div class="col-xs-4"></div>
    <div class="jumbotron col-xs-4" style="border-radius:10px;margin-top:15%;">
      <form method="post">
        <div class="input-group">
          <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
          <input id="username" type="text" class="form-control" name="username" placeholder="Enter Username" required>
        </div><br>
        <div class="input-group">
          <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
          <input id="password" type="password" class="form-control" name="password" placeholder="Enter Password" required>
        </div><br>
        <div class="col-xs-4"></div><input type="submit" class="btn btn-primary col-xs-4" value="Login" name="login"/><div class="col-xs-4"></div>
      </form>
    </div>
    <div class="col-xs-4"></div>
  </div>
</div>
</body>
</html>
<?php
		if(isset($_POST['login']))
		{
		$username=$_POST['username'];
    	$password=$_POST['password'];
    	//echo "".$username;echo "".$password;
		$db = new SQLite3('FaceBase.db');
    	$sql = "SELECT * FROM teacher where username='$username' and password='$password'";
        $ret = $db->query($sql);
        while($row=$ret->fetchArray(SQLITE3_ASSOC)) 
        {
 			$flag=1;
    		break;
   		} 
   		if($flag==1)
		{
			$_SESSION['username']=$username;
			$_SESSION['login']="true";
			header('location:attendance_initial.php');
		}
    	else {
      	echo "<br><div class='row' style='width:50%;margin:auto;'>
      	<div class='col-xs-4'></div><div class='alert alert-danger alert-dismissable col-sx-4'>
    	<a href=''#'' class='close' data-dismiss='alert' aria-label='close'>×</a>
    	<strong>Error!</strong> Wrong Username or password.
  		</div><div class='col-xs-4'>
  		</div>
  		</div>";
    		}
    	}
?>
