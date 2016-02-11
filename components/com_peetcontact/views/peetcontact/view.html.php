<?php
/**
 * @package		Peet.Site
 * @subpackage	com_peetcontact
 * @copyright	Copyright (C) 2005 - 2022 Open Source Matters, Inc. All rights reserved.
 * @license		No license Dude
 */

defined('_JEXEC') or die;

jimport('joomla.application.component.view');

/**
 * HTML Contact View class for the Peet Contact component
 *
 * @package		Peet.Site
 * @subpackage	com_peetcontact
 * @since 		1.5
 */
class PeetcontactViewPeetcontact extends JViewLegacy{
	
	public $form;
	public $items;
	public $params;

	public function display($tpl=null)
	{
		//Initialize vars
		$this->items = $this->get('Item');
		$this->params = $this->items->params;
		$this->form = $this->get('Form');
		 
		parent::display($tpl);
	}
}
?>