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

<form method="POST" action="edit-user-submit.php"/>

<p>Name</p>
<input type="text" name="name" value="<?php echo $this->form['name'] ?>"/>

<p>Email</p>
<input type="text" name="email" value="<?php echo $this->form['email'] ?>"/>

<p>Description</p>
<textarea type="text" name="description"><?php echo $this->form['description'] ?></textarea>

<p>Type</p>
<select name="type">
	<?php foreach($this->data['types'] as $type) { ?>
		<option value="<?php echo $type['id'] ?>" <?php echo $this->form['type'] == $type['id'] ? 'selected' : '' ?>><?php echo $type['type'] ?></option>
	<?php } ?>
</select>

<p>Area</p>
<select name="area">
	<?php foreach($this->data['areas'] as $area) { ?>
		<option value="<?php echo $area['id'] ?>" <?php echo $this->form['area'] == $area['id'] ? 'selected' : '' ?>><?php echo $area['area'] ?></option>
	<?php } ?>
</select>

<?php if(!empty($this->error)) {
		foreach($this->error as $error) { ?>
			<p><?php echo $error ?></p>
		<?php }
	} ?>


<input type="submit" value="Update User/Club"/>
</form>

</body>
</html>