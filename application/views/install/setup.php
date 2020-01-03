<?php
echo $test;
?>
<html>
  <head>
    <title>Setup ATE</title>
    <style>
      form {
        margin: 100px auto;
        width: 50%;
      }
      form p {
        height: 30px;
        line-height: 30px;
        text-align: center;
        margin: 20px;
      }
      form input {
        margin-bottom: 10px;
        border: 2px solid #c5464a;
        border-radius: 5px;
        text-align: center;
        height: 50px;
      }
      form label {
        width: 80px;
      }
      form .button {
        width: 200px;
        background: #c5464a;
        color: #fff;
        margin: 10px;
      }
    </style>
  </head>
  <body>
    <form action="/index.php/install/setup/" method="post" name="setup">
      <h1>Entry database setting:</h1>
      <p><label >Database host:</label></p><p><input type="text" name="host" value="localhost" /></p>
      <p><label >Database user name: </label></p><p><input type="text" name="username" /></p>
      <p><label >Database password: </label></p><p><input type="text" name="password" /></p>
      <p><label >Database name: </label></p><p><input type="text" name="dbname" /></p>

      <p><input type="submit" class="button" value="submit" /></p>
    </form>
  </body>
</html>
