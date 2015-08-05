# Codeigniter DOM Template Library
Codeigniter DOM based template library

## 3 Steps to use this template system

1. Your template file `./application/views/template/default.php`
	```
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
	```

2. Your view file `./application/views/myview.php`
	```
	<template block="title">
		Welcome to Simple Codeigniter Template
	</template>
	<template block="body">
		This is the <i>body</i> section
		<!-- some html comment -->
	</template>
	```

3. Your controller file `./application/controller/Welcome.php`
	```
	<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Welcome extends CI_Controller {

		public function index()
		{
			// $this->load->library('template');	// remark this line if you have autoloaded the library  
			// $this->load->helper('template');		// remark this line if you have autoloaded the helper

			// sample data to be loaded into view just like using $this->load->view('View File', $data);
			$data['some_text'] = "Some content text here";

			// load views/myview.php with $data, rendered into 'default' template located at views/template/default.php
			$this->template->render('myview', $data, 'default') ;
		}
	}
	```


## Installing
simply copy the following files into your codeigniter project

## Consideration into creating this template system
1. Avoid new file extension such as .tpl
2. Follow inheritance templating method
3. Use of built in PHP method in parsing template blocks
4. Suitable for beginner and cater to simple use cases