<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if ( ! function_exists('display_content'))
{
	/**
	*
	* display_content(block_name, render)
	* echo if content exists, otherwise return FALSE
	*/
	function display_content($block, $render = TRUE)
	{
		$ci =& get_instance() ;
		if(template_content_exists($block)){
			if(!$render) return $ci->template->data['_template'][$block] ;
			else echo $ci->template->data['_template'][$block] ;
		} else {
			return false ;
		}
	}
}

if ( ! function_exists('template_content_exists'))
{
	function template_content_exists($block){
		if(!$block) return false ;

		$ci =& get_instance() ;

		if(is_array($ci->template->data['_template']) && array_key_exists($block,$ci->template->data['_template'])){
			return true ;
		} else {
			return false ;
		}

	}
}


/* End of file _template_helper.php */
/* Location: ./application/helpers/_template_helper.php */