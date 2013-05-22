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

<h1>Join Club Member</h1>
<form method="post" action="join-submit.php">
	<p>Username</p>
	<input type="text" name="username" value="<?php echo $this->form['username'] ?>"/>
	<p>Password</p>
	<input type="password" name="password"/>
	<p>Password again</p>
	<input type="password" name="password_again"/>
	<?php if(!empty($this->error)) {
		foreach($this->error as $error) { ?>
			<p><?php echo $error ?></p>
		<?php }
	} ?>
	<input type="submit" value="Join"/>
</form>


</body>
</html>