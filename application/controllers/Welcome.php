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