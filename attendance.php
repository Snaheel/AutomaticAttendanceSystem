<?php session_start();
  if($_SESSION['login']=="true")
  {
  $username=$_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Attendance</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<?php include "header.php"; ?><br><br>
<div class="container">
<?php

    $class=$_SESSION['class'];
    $date=$_SESSION['date'];
    #print($date);
    $db = new SQLite3('FaceBase.db');
    $sql="SELECT Name,Clas,Dat FROM attendance where Clas='$class' and Dat='$date' ORDER BY Name ";
    $result = $db->query($sql);
    $row = array(); 
    $i = 0; 
          
    echo ("<br><br><table class='table table-responsive table-striped table-bordered text-center table-hover' style='width:40%;margin:auto;'> <tr>");
                                
      echo "<th class='text-center'>Name of Students</th>";
      echo "<th class='text-center'>Student Class</th>";
      echo "<th class='text-center'>Date</th>";
      echo '</tr>';
      while($res = $result->fetchArray(SQLITE3_ASSOC)){ 
      echo "<tr>";
      echo '<td>'. $res['Name'].'</td>';
      echo '<td>'. $res['Clas'].'</td>';
      echo '<td>'. $res['Dat'].'</td>';
      echo "</tr>";
      $i++; 
      echo("<br>");
      }
      echo("</table>");
?>
</div>
</body>
</html>
<?php }
  else {
  header("location:index.php");
}
 ?>
