<!DOCTYPE html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="jquery/1.12.4/jquery.min.js"></script>
  <script src="bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="ValidationFormScript.js"></script>
  <script src="login.js"></script>
  <title>Login</title>
</head>
<body>
  <div class="container-fluid">
   <h1></h1>
   <legend>
   <center>
     大连化物所礼堂信息查询系统
   </center>
   </legend>
   <form method="post" class="form-signin" action="login.php">
   <label class="col-md-4"></label>
   <div class="col-md-4">
    <input type="text" id="userid" name="userid" class="form-control" placeholder="用户名" required autofocus>
    <input type="password" id="password" name="password" class="form-control" placeholder="密码" required>
    <input class="btn btn-lg btn-primary btn-block" type="submit" value="登入">
   </div>
   </form>
  </div>
</body>
</html>
