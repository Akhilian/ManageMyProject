<?php
/**
 * Github configuration file.
 * The place to set all the parameters to make the application working with Github.
 * 
 * @author Adrien "Alwin" SAUNIER <contact@alwin.fr>
 * @version 1.0
 * @package CodeIgniter
 * @subpackage Libraries
 */

/*
|---------------------------------------------------------------
| Github application identifiers
|---------------------------------------------------------------
*/

/*
 * Application ID
 */
$config['github_client_id'] = '4a71306e93f16f4ba5b5';

/*
 * Application secret
 */
$config['github_client_secret'] = '1e27595ada6f2853f4c915fa184cfa5f8e94c969';

/*
 *	Authorization Scope for the application.
 */
$config['github_scope'] = array('user', 'repo');