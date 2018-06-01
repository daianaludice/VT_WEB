<?php
$servername = "localhost";
$username = "root";
$password = "1234";
$dbname = "VT";

// Create connection
 $conn = mysqli_connect($servername, $username, $password, $dbname);
 // Check connection
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$query2 = "SELECT x,y,height,width,show_addr FROM Coordinate where position='upper'";
$res2 =  mysqli_query($conn,$query2);
$row2 = mysqli_fetch_array($res2);
$query = "SELECT x,y,height,width,show_addr FROM Coordinate where position='lower'";
$res =  mysqli_query($conn,$query);
$row = mysqli_fetch_array($res);

$addr1 = $row2['show_addr'];
$addr2 = $row['show_addr'];

if($addr1 == NULL){
  $addr1 = 'none';
}
if($addr2 == NULL){
  $addr2 = 'none';
}
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="assets/css/show_clothe_css.css" />
<script type="text/javascript" src="http://code.jquery.com/jquery-2.2.3.min.js"></script>
<meta http-equiv="refresh" content="0.5">

<style>
#upper{
  z-index: 10;}
 #lower{
  z-index: 5;}
</style>
</head>
<body>
  <p style="color:red" id ="table">
</p>
  <?
  $Y =date(" Y");
  $m_d =date("m.d");
  $h_i =date("H:i");
  echo "<p style='font-size:350%;margin-left:8%;padding-top:10%; font-family: Sans-Serif'><b> $Y <br> $m_d <br> $h_i</b></p>";
  ?>
<p id="upper" style="position:fixed;top:330px;left:110px;"><img src="images/thumbs/<? echo $addr1; ?>.png" height"<? echo $row2['height']?>" width="<? echo  $row2['width']+730?>" alt=""/></p>
<p id="lower" style="position:fixed;bottom:10px;top:650px;left:100px;"><img src="images/thumbs/<? echo $addr2; ?>.png" height"<? echo $row['height']?>" width="<? echo  $row['width']+850?>" alt=""/></p>
</body>
</html>
