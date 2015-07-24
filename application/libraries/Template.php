<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
*
* Template Library for CodeIgniter 
* Parse template blocks in views into data segments rendered within the template file
* https://github.com/iprastha/ci-dom-template
*
*/
class Template
{
	protected $ci;
	public $data;

	public function __construct()
	{
        $this->ci =& get_instance();
	}

	public function render($view, $viewdata = null, $template = 'default')
	{
		$this->data['_template'] = array();

		$html = $this->ci->load->view($view, $viewdata, TRUE);
		$this->data['_template'] = $this->parse_blocks($html);
		$this->data['_viewdata'] = $viewdata; // in case the template needs access to the original view's data
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
	*
	**/
	public function parse_blocks($html)
	{
		$blocks = array();
		$dom = new DOMDocument;
		libxml_use_internal_errors(true); // avoid warning from html5 nodes which are not finalized in W3C spec
		$dom->loadHTML($html);
		libxml_use_internal_errors(false); // avoid warning from html5 nodes which are not finalized in W3C spec
		foreach ($dom->getElementsByTagName('template') as $node) {
		    // echo $dom->saveHtml($node), PHP_EOL;
		    $section = $node -> getAttribute('block');
		    $blocks[$section] = $this->DOMinnerHTML($node);
		}
		return $blocks;
	}

	/**
	*
	* DOMinnerHTML
	* The following function is referenced from:
	* http://stackoverflow.com/questions/2087103/how-to-get-innerhtml-of-domnode
	*
	**/
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
	

}

/* End of file Template.php */
/* Location: ./application/libraries/Template.php */