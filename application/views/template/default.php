<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo content('title','Untitled') ; ?></title>
</head>
<body>
	<?php echo content('body', 'No Content') ; ?>
	<hr>
	<?php echo content('footer', 'If footer block is not provided, this is the default footer text') ; ?>
</body>
</html>