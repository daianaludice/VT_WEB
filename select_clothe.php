<?php
$servername = "localhost";
$username = "root";
$password = "1234";
$dbname = "VT";


//Option to print Error
error_reporting(E_ALL);
ini_set("display_errors", 1);


// Create connection
 $conn = mysqli_connect($servername, $username, $password, $dbname);
 // Check connection
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$No = addslashes($_GET["No"]);
$Addr = addslashes($_GET["Picture_Addr"]);

$query = "SELECT position FROM Clothes_Info where No = $No " ;
$res =  mysqli_query($conn,$query);
$row = $res -> fetch_array();
$position = $row[0];

if($position == 'upper'){
 $sql = "UPDATE Coordinate SET show_addr = '$Addr' WHERE position = 'upper'";
if (mysqli_query($conn,$sql)){
  }
  else{ echo "Error: " .$sql . "<br>" . mysqli_error($conn);
  }
}
if($position == 'lower'){
  $sql = "UPDATE Coordinate SET show_addr = '$Addr' WHERE position = 'lower'";
  if (mysqli_query($conn,$sql)){
    }
    else{ echo "Error: " .$sql . "<br>" . mysqli_error($conn);
    }
}

$que = "SELECT show_addr FROM Coordinate where position='upper'" ;
$res3 =  mysqli_query($conn,$que);
$row3 =  mysqli_fetch_array($res3);
$upper_addr = $row3[0];

$que2 = "SELECT show_addr FROM Coordinate where position='lower'" ;
$res4 =  mysqli_query($conn,$que2);
$row4 =  mysqli_fetch_array($res4);
$lower_addr = $row4[0];

if($upper_addr == 'black'){
  $upper_addr =0;
}
if($lower_addr == 'black'){
  $lower_addr = 0;
}

$que3 = "UPDATE Recommend_List set position = '$position' where No = '0'";
if( mysqli_query($conn,$que3)){
 }

$qu1 = "SELECT addr FROM Recommend_List where No = '1'" ;
$re1 =  mysqli_query($conn,$qu1);
$ro1 = $re1 -> fetch_array();
$list_1 = $ro1[0];


$qu2 = "SELECT addr FROM Recommend_List where No = '2'" ;
$re2 =  mysqli_query($conn,$qu2);
$ro2 = $re2 -> fetch_array();
$list_2 = $ro2[0];


$qu3 = "SELECT addr FROM Recommend_List where No = '3'" ;
$re3 =  mysqli_query($conn,$qu3);
$ro3 = $re3 -> fetch_array();
$list_3 = $ro3[0];

?>
<!DOCTYPE HTML>
<html>
<head>
 <title>Select Clothe</title>
     		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->

		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
    <script type="text/javascript" src="http://code.jquery.com/jquery-2.2.3.min.js"></script>
    <link rel="stylesheet" href="assets/css/main.css" />
</head>
<body style="background-color: white">
			<div id="wrapper">

				<!-- Header -->
					<header id="header" style="background-image:url(images/배경.png)" >
						<h1><a href="VT_list.php" style='color:black'><- clothes list </a></h1>
            <span style='color:white; font-size:130%; margin-left:3%' id="call"> 현재 선택한 옷입니다. 다른 옷을 입으시려면 Clothes List를 눌러주세요.</span>
						<nav>
							<ul>
							 <li> href="db_delete.php?No=<? echo $No; ?>"><button>RESET</button></a></li>
	<li style='margin-left:-50px;margin-right:-20px;'><a href="Insert_DB.php?upper=<? echo $upper_addr; ?>&lower=<? echo $lower_addr; ?>"><button>Go to MAIN</button></a></p></li>

							</ul>
						</nav>
					</header>

				<!-- Main -->
					<div id="main">
            <?php
					echo "<div style='position:fixed; margin-left :8%;z-index : 4;'><img src='images/thumbs/".$upper_addr.".png' class='image' width='60%' style=' z-index:-1000; padding-left:3%' id='up' alt='None'/></div>";
          echo "<div style='position:fixed; margin-top:14%; margin-left :8%; z-index:1'><img src='images/thumbs/".$lower_addr.".png' alt='None' class='image' width='55%' id='down' alt='None'/></div>";
          ?>

        </div id='db_con'>
         <a href='db_delete.php?position=upper&No=<? echo $No;?>&Addr=<? echo $Addr;?>'><button class='button_css' id="cancle1">상의 취소</button></a>
          <a href='db_delete.php?position=lower&No=<? echo $No;?>&Addr=<? echo $Addr;?>'><button class='button_css' id="cancle2" style='top:40%;'>하의 취소</button></a>

          <div style='position:fixed;margin-left:80%; background-color:black; width:35%; height:95%;text-decoration:none;' id="recomment">
            <div style="color:white; font-size:150%;margin-left:2%;">코디 추천</div>
            <a href='change.php?list=<? echo $list_1; ?>&No=<? echo $No;?>'><div style="color:white; font-size:120%;margin-left:2%;">1순위<img src='images/thumbs/<? echo $list_1; ?>.png' width='35%' height:'25%'></div></a>
            <a href='change.php?list=<? echo $list_2; ?>&No=<? echo $No;?>'><div style="color:white; font-size:120%;margin-left:2%;">2순위<img src='images/thumbs/<? echo $list_2; ?>.png' width='35%' height:'25%'></div></a>
            <a href='change.php?list=<? echo $list_3; ?>&No=<? echo $No;?>'><div style="color:white; font-size:120%;margin-left:2%;">3순위<img src='images/thumbs/<? echo $list_3; ?>.png' width='35%' height:'25%'></div></a>
          </div>
			</div>
      <script src="assets/js/button_act.js"></script>
</body>
<html>

