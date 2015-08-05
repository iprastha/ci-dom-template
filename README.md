# ci_dom_template
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

## Installing
simply copy the following files into your codeigniter project

## Consideration into creating this template system
1. Avoid new file extension such as .tpl
2. Follow inheritance templating method
3. Use of built in PHP method in parsing template blocks
4. Suitable for beginner and simple use cases, avoid complex use case (like nesting templates, file includes, etc.)