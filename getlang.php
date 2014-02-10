<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
* Get Language
*
* A PyroCMS plugin to get language from any source
* 
*
* @author Eko Muhammad Isa <ekoisa@gmail.com>
*
*/

class Plugin_Getlang extends Plugin
{

    /**
     * Returns a string that conditionally depends on mobile status.
     *
     * Usage:
     * {{ getlang:mobile yes="string mobile" no="string dekstop"}}
     *
     * @yes   string	the text for mobile
     * @no   string	the text for dekstop
     * @return	string
     */
   function mobile()
   {
	$tx_yes = $this->attribute("yes", "");
	$tx_no = $this->attribute("no", "");
	if($this->agent->is_mobile()):
	    return $tx_yes;   
	else:
	    return $tx_no;
	endif;
   }
   
    /**
     * Returns a string language from module.
     *
     * Usage:
     * {{ getlang:text source="module/name" lang=""}}
     *
     * @source   string	the language source file
     * @lang   string	language slug
     * @return	string
     */
    function text()
    {
		$source = $this->attribute("source", "");
		$langslug = $this->attribute("lang", "");
		
		if(empty($source) || empty($langslug)){
			return "";
		}
		
		$this->lang->load($source);
		
		return $this->lang->line($langslug);
    }

}
/* End of file agent.php */