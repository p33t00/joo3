<?php
/**
 * @package		Peet.Admin
 * @subpackage	com_peetcontact
 * @copyright	Copyright (C) 2005 - 2022 Open Source Matters, Inc. All rights reserved.
 * @license		No license Dude
 */

defined('_JEXEC') or die;

jimport('joomla.application.component.view');

/**
 * HTML Contact View class for the Peet Contact component
 *
 * @package		Peet.Admin
 * @subpackage	com_peetcontact
 * @since 		1.5
 */
class PeetcontactViewForm extends JViewLegacy{

	protected $form;														// !! !! !! !!
	
	public function display($tpl=null){

		$this->form	= $this->get('Form');

		$this->addToolbar();
		parent::display($tpl);

	}

	protected function addToolbar(){
		JToolBarHelper::apply('form.apply');
		JToolBarHelper::save('form.save');
		JToolBarHelper::cancel('cancel');
	}
}