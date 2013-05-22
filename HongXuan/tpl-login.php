<!doctype html>
<html>
<head>
<title>HTML5 Boilerplate</title>
<meta http-equiv="content-type" content="text/html;charset=utf-8">
<meta http-equiv="content-language" content="en">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="robots" content="index,follow">
<meta name="author" content="Jake See">
<meta name="Description" content="New Website"/>
<meta name="Keywords" content="HTML5,Boilerplate"/>
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon"></link>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" media="screen" href="screen.css" />
</head>
<body>

<?php include('tpl-navi.php') ?>

<h1>Welcome To SAMS Teach Yourself</h1>

<form method="post" action="login-submit.php"/>

<p>Username</p>
<input type="text" name="username" value="<?php echo $this->form['username'] ?>"/>
<?php if(!empty($this->error['username'])) { ?><p><?php echo $this->error['username'] ?></p> <?php } ?>

<p>Password</p>
<input type="password" name="password"/>
<?php if(!empty($this->error['password'])) { ?><p><?php echo $this->error['password'] ?></p> <?php } ?>


<input type="submit" value="Sign In"/>
</form>

</body>
</html>