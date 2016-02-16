<?php
/**
 * @package		Peet.Administrator
 * @subpackage	com_peetcontact
 * @copyright	Copyright (C) 2005 - 2022 Open Source Matters, Inc. All rights reserved.
 * @license		No license Dude !!!
 */

// No direct access
defined('_JEXEC') or die;

jimport('joomla.application.component.modeladmin');

/**
 * Peetcontact Component Model
 *
 * @package		Peet.Administrator
 * @subpackage	com_peetcontact
 * @since 1.5
 */

class PdfappformModelEdit extends JModelAdmin
{
	public function getForm($data = array(), $loadData = true)			
	{
		// Get the form.
		$form = $this->loadForm('com_pdfappform.pdfappform', 'pdfappform', array('control' => 'jform', 'load_data' => true));	 //controller => jform is used as a var-name in JControllerForm->save  to get data array.
		if (empty($form)) {
			return false;
		}
		return $form;
	}

	/**
	 * Method to get the data that should be injected in the form.
	 *
	 * @return	mixed	The data for the form.
	 * @since	1.6
	 */
	protected function loadFormData()
	{
		$data = $this->getItem(JRequest::getInt('id'));
		return $data;
	}

}
