<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_contact
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access
defined('_JEXEC') or die;

jimport('joomla.application.component.controllerform');

/**
 * @package     Joomla.Administrator
 * @subpackage  com_contact
 * @since       1.6
 */
class PeetcontactControllerForm extends JControllerForm
{

	public function save(){
		$model = $this->getModel();
		$model->save();
 
		JRequest::getWord('task') == 'apply' ?
		$this->setRedirect('index.php?option=com_peetcontact&view=form', JText::_("COM_PEETCONTACT_FORM_SETTINGS_SAVED"), 'Success') 	:		//  Перенаправить на страницу настроек
		$this->setRedirect('index.php?option=com_peetcontact', JText::_("COM_PEETCONTACT_FORM_SETTINGS_SAVED"), 'Success'); 					//  Перенаправить на глав страницу компонента
	}



	/**
	 * Method override to check if you can edit an existing record.
	 *
	 * @param   array   $data  An array of input data.
	 * @param   string  $key   The name of the key for the primary key.
	 *
	 * @return  boolean
	 *
	 * @since   1.6
	 */
	protected function allowEdit($data = array(), $key = 'id')
	{
		// Initialise variables.
		$recordId = (int) isset($data[$key]) ? $data[$key] : 0;
		$categoryId = 0;

		if ($recordId)
		{
			$categoryId = (int) $this->getModel()->getItem($recordId)->catid;
		}

		if ($categoryId)
		{
			// The category has been set. Check the category permissions.
			return JFactory::getUser()->authorise('core.edit', $this->option . '.category.' . $categoryId);
		}
		else
		{
			// Since there is no asset tracking, revert to the component permissions.
			return parent::allowEdit($data, $key);
		}
	}

	/**
	 * Method to run batch operations.
	 *
	 * @param   object  $model  The model.
	 *
	 * @return  boolean	 True if successful, false otherwise and internal error is set.
	 *
	 * @since   2.5
	 */
	public function batch($model = null)
	{
		JSession::checkToken() or jexit(JText::_('JINVALID_TOKEN'));

		// Set the model
		$model = $this->getModel('Contact', '', array());

		// Preset the redirect
		$this->setRedirect(JRoute::_('index.php?option=com_contact&view=contacts' . $this->getRedirectToListAppend(), false));

		return parent::batch($model);
	}
}
