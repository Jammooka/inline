<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Inline SVG Plugin
 *
 * @category    Plugin
 */

$plugin_info = array(
	'pi_name'       => 'Inline SVG',
	'pi_version'    => '1.0',
	'pi_author'     => 'Jamie Blacker',
	'pi_author_url' => 'http://amitywebsolutions.co.uk',
	'pi_description'=> 'Inline an svg file',
	'pi_usage'      => Inline::usage()
);


class Inline {

	// PREPARE VARS
	public $return_data;

	/**
	 * Constructor
	 */
	public function __construct()
	{
		$this->EE =& get_instance();
		
		// Get folder from config
		$folder = $this->EE->config->item('svg_folder');
		// Only proceed if folder is set
		if($folder !== FALSE)
		{
			$filename = trim($this->EE->TMPL->fetch_param('file'));
			
			// Fail silently with @
			$svg_file = @file_get_contents($folder . $filename);
			
			return $svg_file;
		}
		else
		{
			// Log error and do nothing
			$this->EE->TMPL->log_item("INLINE SVG ERROR: Must have svg_folder set in config");
		}
		
	}
	/* END __construct */
	
	public function svg()
	{
		return $this->__construct();
	}
	
	/**
	 * Plugin Usage
	 */
	public static function usage()
	{
		ob_start();
?>

{exp:inline:svg file="filename.svg"}

<?php
		$buffer = ob_get_contents();
		ob_end_clean();
		return $buffer;
	}
}


/* End of file pi.inline.php */
/* Location: /system/expressionengine/third_party/inline/pi.inline.php */
