
<?
$db_host ="localhost";
$db_user = "root";
$db_password ="1234";
$db_name = "VT";
$conn = mysqli_connect($db_host,$db_user,$db_password,$db_name);

if(!$conn){
  die("connetction failed:" . mysqli_connect_error());
  }

$position = addslashes($_GET["position"]);
$Addr = addslashes($_GET["No"]);
$No = addslashes($_GET["Addr]);

$sql = "UPDATE Coordinate SET show_addr ='NULL' WHERE position = '$position'";
if (mysqli_query($conn,$sql)){
  }
  else{ echo "Error: " .$sql . "<br>" . mysqli_error($conn);
  }

mysqli_close($conn);

?>
<html>
 <head>
    <script type="text/javascript">
      //location.href='select_clothe.php?No=<? $No?>&Addr=<? $Addr ?>';
    </script>
 </head>

</html>
