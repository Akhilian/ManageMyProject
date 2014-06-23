<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 *	Codeigniter library.
 *	Handle the Github V3 Api.
 * 
 * @version 1.0
 * @package Codeigniter
 * @subpackage Libraries
 * @author Adrien "Alwin" SAUNIER <contact@alwin.fr>
 */
class Github
{
	/**
	 * CodeIgniter instance
	 * @var CodeIgniter
	 */
  	protected $ci;

  	/**
  	 * 		STATIC VARS
  	 * ================================================================================================
  	 */

  	/**
  	 * Github login url
  	 * @var string
  	 * @static
  	 */
  	protected $github_access_url = 'https://github.com/login/oauth/authorize';

  	/**
  	 * Github Url to get a token
  	 * @var string
  	 * @static
  	 */
  	protected $github_accessToken_url = 'https://github.com/login/oauth/access_token';

  	/**
  	 * Github API Url
  	 * @var string
  	 * @static
  	 */
  	protected $github_api_url = 'https://api.github.com';

  	/**
	 * 		DYNAMIC VARIABLES
	 * ================================================================================================
	 */

  	/**
  	 * Authorization scope asked to the user.
  	 * @var array
  	 */
  	protected $scope = array();

  	/**
  	 * Github Access token
  	 * @var string
  	 */
  	protected $access_token = '';


	public function __construct()
	{
		// A CodeIgniter library need to use get_instance() function to load external CI ressources
        $this->ci =& get_instance();
        $this->ci->load->library('CI_Requests');
	}

	/**
	 * 		RIGHT MANAGEMENT
	 * ================================================================================================
	 */
	
	public function get_loginUrl() {
		return $this->github_access_url 
					. '?scope='
					. implode(',', $this->get_scope())
					. '&client_id=' . $this->ci->config->item('github_client_id');

	}

	public function get_scope() { return $this->ci->config->item('github_scope'); }


	/**
	 * 		AUTHENTICATION
	 * ================================================================================================
	 */
	public function get_accessToken($code) {

		$response = CI_Requests::post(
				$this->github_accessToken_url,
				array(
					'Accept' => 'application/json'
				),
				array(
					'client_id' => $this->ci->config->item('github_client_id'),
					'client_secret' => $this->ci->config->item('github_client_secret'),
					'code' => $code
				)
			);
		
		$response = json_decode($response->body);

		if( ! empty($response->access_token) ) {
			$this->ci->session->set_userdata( array( 'github_accessToken' => $response->access_token ) );
		}
		else
			show_error($response->error_description, 400);
		

		return $this;
	}

	/**
	 * 		USER DATA
	 * ================================================================================================
	 */
	public function get_authenticatedUser() {

		$response = CI_Requests::get(
			$this->github_api_url . '/user',
			array(
				'Authorization' => $this->get_AuthorizationHeader()
				)
		);

		return json_decode($response->body);
	}

	
	/**
	 * 		MISCELLANEOUS
	 * ================================================================================================
	 */
	
	/**
	 * Return the API mapping
	 * @return Array List of routes
	 */
	public function get_map() {
		$response = CI_Requests::get($this->github_api_url);
		return json_decode($response->body);
	}

	/**
	 * Return the formated github access token.
	 * @return String Authorization Header
	 */
	private function get_AuthorizationHeader() {
		return 'bearer ' . $this->ci->session->userdata('github_accessToken');
	}


}

/* End of file github.php */
/* Location: ./application/libraries/github.php */
