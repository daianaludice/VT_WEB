<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="assets/css/show_clothe_css.css" />
<script type="text/javascript" src="http://code.jquery.com/jquery-2.2.3.min.js"></script>
<meta http-equiv="refresh" content="1">
<script>
$(document).ready(function(){
        var xhr = new XMLHttpRequest();
        xhr.open('GET','10.30.113.210:5000/get-coordinate');
        xhr.onreadystatechange =function(){
          if(xhr.redayState === 4 && xhr.status === 200){
            document.querySelector('#table').innerHTML = xhr.responseText;
          }
        }
        xhr.send();
});
</script>
</head>
<body>
  <p style="color:red" id ="table"></p>
  <?
  $time =date("Y-M-d h:m:s");
  echo "<p>$time</p>";
  ?>
<p><img src="images/thumbs/1.png" alt=""/></p>
</body>
</html>
