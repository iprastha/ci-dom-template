<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
*
* Template Library for CodeIgniter 
* Parse template blocks in views into data segments rendered within the template file
* Usage : $this -> template -> render ( $view , $data , $template )
*
**/

class Template
{
	protected $ci;
	public $data;

	public function __construct()
	{
        $this->ci =& get_instance();
	}

	public function render2($view, $data = null, $template = 'frontend')
	{
		$controller = $this->ci->router->fetch_class();
		$data['content'] = $this->ci->load->view("{$controller}/{$view}", $data, TRUE);
		$this->ci->load->view("template/{$template}", $data);
	}

	public function render($view, $viewdata = null, $template = 'frontend')
	{
		$controller = $this->ci->router->fetch_class();
		$html = $this->ci->load->view("{$controller}/{$view}", $viewdata, TRUE);
		$this->data['template'] = $this->parse_blocks($html);
		$this->data['_viewdata'] = $viewdata;
		$this->ci->load->view("template/{$template}", $this->data);
	}

	/**
	*
	* parse_blocks
	* Get DOM based document on "template" tag and parse into arrays
	* using the "block" attributes as the array key and the inner html
	* as the HTML content
	* Resources to read:
	*  http://de2.php.net/manual/en/class.domdocument.php
	*  http://stackoverflow.com/questions/3820666/grabbing-the-href-attribute-of-an-a-element
	*/
	public function parse_blocks($html)
	{
		$blocks = array();

		// avoid empty string to disable warning
		if(empty($html)) $html = " ";

		$dom = new DOMDocument;

		// avoid warning from html5 nodes which are not finalized in W3C spec
		libxml_use_internal_errors(true); 

		$dom->loadHTML($html);

		// revert error mechanism
		libxml_use_internal_errors(false);
		foreach ($dom->getElementsByTagName('template') as $node) {
		    $section = $node -> getAttribute('block');
		    $blocks[$section] = $this->DOMinnerHTML($node);
		}
		return $blocks;
	}

	/**
	*
	* DOMinnerHTML
	* The following function is taken from 
	* http://stackoverflow.com/questions/2087103/how-to-get-innerhtml-of-domnode
	*
	*/
	private function DOMinnerHTML(DOMNode $element) 
	{ 
	    $innerHTML = ""; 
	    $children  = $element->childNodes;

	    foreach ($children as $child) 
	    { 
	        $innerHTML .= $element->ownerDocument->saveHTML($child);
	    }

	    return $innerHTML; 
	} 

	/**
	*
	* block_exists($blockname)
	* Check whether a content block exists
	*
	*/
	public function block_exists($blockname = NULL)
	{
		if(empty($blockname))
			return false;

		return (is_array($this->data) && is_array($this->data['template']) && array_key_exists($blockname,$this->data['template']));
	}

}

/* End of file Template.php */
/* Location: ./application/libraries/Template.php */