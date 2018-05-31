
<?
$db_host ="localhost";
$db_user = "root";
$db_password ="1234";
$db_name = "VT";
$conn = mysqli_connect($db_host,$db_user,$db_password,$db_name);

if(!$conn){
  die("connetction failed:" . mysqli_connect_error());
  }

$No = addslashes($_GET["No"]);
$sql = "UPDATE Coordinate SET show_addr ='black' WHERE position = 'upper'";
if (mysqli_query($conn,$sql)){
  }
    else{ echo "Error: " .$sql . "<br>" . mysqli_error($conn);
    }
$sql2 = "UPDATE Coordinate SET show_addr ='black' WHERE position ='lower'";
if (mysqli_query($conn,$sql2)){
   }
   else{ echo "Error : " .$sql2." <br>".mysqli_error($conn);
}

  mysqli_close($conn);

  ?>
  <html>
   <head>
      <script type="text/javascript">
        location.href='select_clothe.php?No=<? echo $No ;?>&Picture_Addr=black';
      </script>
   </head>

  </html>
