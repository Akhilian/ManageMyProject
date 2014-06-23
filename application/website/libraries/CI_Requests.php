<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once 'requests/Requests.php';

/**
 * Custom adaptator for the Requests library
 *
 * @package CodeIgniter
 * @link http://requests.ryanmccue.info/
 * 
 * @author Adrien SAUNIER <contact@alwin.fr>
 * @author Ryanmccue <[email]>
 */
class CI_Requests extends Requests
{
 	protected $ci;

	public function __construct()
	{
        $this->ci =& get_instance();
        Requests::register_autoloader();
	}

}

/* End of file libraryName.php */
/* Location: ./application/libraries/libraryName.php */
