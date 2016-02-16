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
class PdfappformViewPdfappform extends JViewLegacy{
	
	public $form;
	public $formData;

	public function display($tpl=null)
	{
		$this->form = $this->get('Form');
		parent::display($tpl);
	}

	public function confirm()
	{
		$this->form = $this->get('Form');
		parent::display('confirm');
	}

	public function success()
	{
		parent::display('success');
	}
}
?>


