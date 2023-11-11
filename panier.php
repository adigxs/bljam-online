<html>
  <head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript">
      function sendData()
{
  var name = document.getElementById("name").value;
  var age = document.getElementById("age").value;

  $.ajax({
    type: 'post',
    url: 'insert.php',
    data: {
      name:name,
      age:age
    },
    success: function (response) {
      $('#res').html("Vos données seront sauvegardées");
    }
  });
    
  return false;
}
    </script>
  </head>
  <body>  
  <form method="POST" onsubmit="return sendData();">
     <input type="text" name="name" id="name">
     <input type="text" name="age" id="age">
	 
     <input type="submit" name="submit_form" value="Submit">
  </form>
  <?php
  echo 'L adresse IP de l utilisateur est : '.$_SERVER['REMOTE_ADDR'];
?>
  <div id="res" ></div>
  </body>
</html>
