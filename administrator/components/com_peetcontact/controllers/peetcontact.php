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

jimport('joomla.application.component.controlleradmin');

/**
 * @package     Peet.Administrator
 * @subpackage  com_peetcontact
 * @since       2.5
 */
class PeetcontactControllerPeetcontact extends JControllerForm
{

	public function showMess()
	{ 
		$view = $this->getView('peetcontact', 'html');
		if(JRequest::getWord('layout')==='message'){
			$view->setModel($this->getModel(), true);		// Get model which parent has getItem() method
			$view->showMess();
		}
	}

	/*
	*	Override this method to get JModelAdmin instance since it has delete method
	*	and getModel method is initiated in JControllerAdmin class
	*/

	public function getModel($name = 'Form', $prefix = 'PeetcontactModel', $config = array('ignore_request' => true))
	{
		$model = parent::getModel($name, $prefix, $config);
		return $model;
	}

public function cancel()
{
	echo "foo"; exit;
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

}
