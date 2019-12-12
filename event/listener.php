<?php
/*
*
* @package LMDI Links
* @copyright (c) Pierre Duhem - LMDI
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
* 
*/

namespace lmdi\links\event;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class listener implements EventSubscriberInterface
{

	protected $template;
	protected $language;
	protected $config;



	public function __construct(
		\phpbb\language\language $language,
		\phpbb\config\config $config,
		\phpbb\template\template $template)
	{
		$this->language = $language;
		$this->config = $config;
		$this->template = $template;
	}

	static public function getSubscribedEvents ()
	{
		return array(
			'core.user_setup_after'	=> 'load_language',
			'core.page_header'	=> 'build_url',
		);
	}

	public function load_language ()
	{
		$this->language->add_lang ('links', 'lmdi/links');
	} 
	
	public function build_url ($event)
	{
		$this->template->assign_vars(array(
			'U_INPN'	=> "http://inpn.mnhn.fr/accueil/recherche-de-donnees/especes/",
			'U_FE'	=> "http://www.faunaeur.org/?no_redirect=1",
			'L_INPN'	=> $this->language->lang('LINPN'),
			'L_FE'	=> $this->language->lang('LFE'),
			'T_INPN'	=> $this->language->lang('TINPN'),
			'T_FE'	=> $this->language->lang('TFE'),
		));
	}
}
