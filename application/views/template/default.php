<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo $content['title'] ; ?></title>
	<link rel="stylesheet" href="">
</head>
<body>
	<?php echo content('body') ; ?>
	<hr>
	<?php echo content('footer', 'Footer did not exists, this is the default footer text') ; ?>
</body>
</html>