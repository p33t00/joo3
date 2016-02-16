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
 * @subpackage	com_pdfappform
 * @since 		1.5
 */
class PdfappformViewEdit extends JViewLegacy{

	public $form;
	public $id;

	public function display($tpl=null)
	{
		$this->id = JRequest::getInt('id');
		$this->form = $this->get('Form');
		$this->addToolbar();
		parent::display($tpl);
	}

	private function addToolbar()
	{
		JToolBarHelper::save('edit.save'); 
		JToolBarHelper::cancel('cancel'); 
	}
}