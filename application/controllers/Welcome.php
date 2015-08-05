<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		// $this->load->view('welcome_message');
		// use template library instead
		// $this->load->library('template');	// remark this line if you have autoloaded the library  
		// $this->load->helper('template');		// remark this line if you have autoloaded the helper

		// sample data to be loaded into view just like using $this->load->view('View File', $data);
		$data['some_text'] = "Some content text here";

		// load views/myview.php with $data, rendered into 'default' template located at views/template/default.php
		$this->template->render('myview', $data, 'default') ;
	}
}
