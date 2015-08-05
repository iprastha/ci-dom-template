<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if ( ! function_exists('display_content'))
{
	/**
	*
	* display_content(block_name, render)
	* echo if content exists, otherwise return FALSE
	*/
	function content($block, $default_content = NULL)
	{
		$ci =& get_instance();
		if($ci->template->block_exists($block)){
			return $ci->template->data['template'][$block];
		} else {
			return $default_content;
		}
	}
}

/* End of file template_helper.php */
/* Location: ./application/helpers/template_helper.php */