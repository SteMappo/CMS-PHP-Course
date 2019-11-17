<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<title>log in</title>
</head>
<body>
  <div class="container">
      <div class="col-sm-6">
          <form action="login.php" method="post">
            <div class="form-group">
                <label for="username">Username</label>
                <input class="form-control" type="text" name="username">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input class="form-control" type="password" name="password">
            </div>
            <input class="btn btn-primary" type="submit" name="submit" value="submit">
              
          </form>
      </div>
  </div>

</body>
</html>