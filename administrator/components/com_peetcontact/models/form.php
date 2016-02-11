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

class PeetcontactModelForm extends JModelAdmin
{
	
	private function getApp(){
		$app = JFactory::getApplication('Administrator');
		return $app;
	}


	/**
	 * Returns a reference to the a Table object, always creating it.
	 *
	 * @param	type	The table type to instantiate
	 * @param	string	A prefix for the table class name. Optional.
	 * @param	array	Configuration array for model. Optional.
	 * @return	JTable	A database object
	 * @since	1.6
	 *
	 *	Used here for delete method !!!
	 *
	 */
	public function getTable($type = 'Form', $prefix = 'Table', $config = array())
	{
		if (JRequest::getWord('view')!=='form'){
			$type='messages';
		}
		return JTable::getInstance($type, $prefix, $config);
	}
	


	public function getForm($data = array(), $loadData = true)		
	{
		// Get the form.
		$form = $this->loadForm('com_peetcontact.peetcontact', 'peetcontact', array('control' => 'peetform', 'load_data' => true));
		if (empty($form)) {
			return false;
		}

		return $form;
	}

	public function save(){
		$table = JTable::getInstance('Form','Table');
		$data = JRequest::getVar('peetform', null,'', 'array');
		$table->load(1);			// load data to get id for further update. since work with only one field
		$table->bind($data);
		$table->check($data);
		$table->store('1');
		$app = $this->getApp();
		$app->setUserState('com_peetcontact.form-data', $data);
	}


	/**
	 * Method to get a single record.
	 * Overriden to work with json string format.
	 * Also I've included a property_exists checd, used for preventing an error when single message displayed.
	 *
	 * @param	integer	$pk	The id of the primary key.
	 *
	 * @return	mixed	Object on success, false on failure.
	 * @since	1.6
	 */
	public function getItem($pk = null)
	{
		$item = parent::getItem($pk);
		if ($item && property_exists(get_class(parent::getItem()), 'params')) {
			// Convert the params field to an array.
			$registry = new JRegistry;
			$registry->loadString($item->params);
			$item->params = $registry->toArray();
 		}

		return $item;
	}

	/**
	 * Method to get the data that should be injected in the form.
	 *
	 * @return	mixed	The data for the form.
	 * @since	1.6
	 */
	protected function loadFormData()
	{
		$app = $this->getApp();
		// Check the session for previously entered form data.
		$data = $app->getUserState('com_peetcontact.form-data', array());
		if (empty($data)) {
			$data = $this->getItem(1);
			$app->setUserState('com_peetcontact.form-data', $data);
		}

		return $data;
	}

	/**
	 * Prepare and sanitise the table prior to saving.
	 *
	 * @param	JTable	$table
	 *
	 * @return	void
	 * @since	1.6
	 */
	/*protected function prepareTable(&$table)
	{
		$date = JFactory::getDate();
		$user = JFactory::getUser();

		$table->name		= htmlspecialchars_decode($table->name, ENT_QUOTES);
		$table->alias		= JApplication::stringURLSafe($table->alias);

		if (empty($table->alias)) {
			$table->alias = JApplication::stringURLSafe($table->name);
		}

		if (empty($table->id)) {
			// Set the values
			//$table->created	= $date->toSql();

			// Set ordering to the last item if not set
			if (empty($table->ordering)) {
				$db = JFactory::getDbo();
				$db->setQuery('SELECT MAX(ordering) FROM #__contact_details');
				$max = $db->loadResult();

				$table->ordering = $max+1;
			}
		}
		else {
			// Set the values
			//$table->modified	= $date->toSql();
			//$table->modified_by	= $user->get('id');
		}
	}*/

	/**
	 * A protected method to get a set of ordering conditions.
	 *
	 * @param	JTable	$table	A record object.
	 *
	 * @return	array	An array of conditions to add to add to ordering queries.
	 * @since	1.6
	 */
	protected function getReorderConditions($table)
	{
		$condition = array();
		$condition[] = 'catid = '.(int) $table->catid;

		return $condition;
	}

	
}
