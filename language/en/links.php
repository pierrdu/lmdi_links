<?php
/**
*
* @package phpBB Extension - LMDI Links
* @copyright (c) 2015 Pierre Duhem - LMDI
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

if (!defined('IN_PHPBB'))
{
	exit;
}

if (empty($lang) || !is_array($lang))
{
	$lang = array();
}

$lang = array_merge($lang, array(
	'LFE'				=> 'FE',
	'TFE'				=> 'Fauna europaea',
	'LINPN'				=> 'INPN',
	'TINPN'				=> 'INPN',
));
