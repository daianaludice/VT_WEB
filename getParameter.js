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
