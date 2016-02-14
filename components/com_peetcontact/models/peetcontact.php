<?php
/**
 * @package		Joomla.Site
 * @subpackage	com_contact
 * @copyright	Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access
defined('_JEXEC') or die;

jimport('joomla.application.component.modelform');

/**
 * @package		Joomla.Site
 * @subpackage	com_contact
 * @since 1.5
 */
class PeetcontactModelPeetcontact extends JModelForm
{
	/**
	 * @since	1.6
	 */
	//protected $view_item = 'contact';

	protected $_item = null;


	public function getItem()
	{
		$db = $this->getDbo();
		echo '<pre>'; echo var_dump($db); echo'</pre>'; exit;
		$query = $db->getQuery(true);
		$query->select('*');
		$query->from('#__peetcontact');
		$db->setQuery($query);
		$data = $db->loadObject();

		$reg = new JRegistry;
		$reg->loadString($data->params);					//Convert params fiels JSON to String values
		$data->params = $reg;
		if($this->getState('params')){
			$data->params = clone $this->getState('params');	// Combining two sets of parametrs
			$data->params->merge($reg);
		}
		return $data;
	}

	public function populateState(){

		$app = JFactory::getApplication('Site');

		// Load the parameters.
		$params = $app->getParams();
		$this->setState('params', $params);
	}

	public function save($data)
	{

		$cols = array_keys($data);
		$vals = $data;

		$db = JFactory::getDbo();
		$query = $db->getQuery(true);
		
   		$query->insert($db->quoteName('#__peet_messages'));
    	$query->columns($db->quoteName($cols));
    		
    	/* each value must be quoted by quote() method.
    	*  else it throws sql error of miscount of columns and values
    	*
    	*  also I've used a link for $val in a neet way )))
    	*/
    	foreach ($vals as &$val) {
    		$val = $db->quote($val);
    	}
		/*
		*	$values is imploded into a string (keys are thrown away).
		*	thanks to quote() method, values don't get jumbled in one string    ( puts each value into ('value') )
		*/
		$query->values(implode(',', $vals));
    	$db->setQuery($query);
    	$db->query();

    	// great way to get an SQL errors
    	if ($db->getErrorNum()) {
    		JError::raiseError("Error", $db->stderr());
    	}
	}

	/**
	 * Method to get the contact form.
	 *
	 * The base form is loaded from XML and then an event is fired
	 *
	 *
	 * @param	array	$data		An optional array of data for the form to interrogate.
	 * @param	boolean	$loadData	True if the form is to load its own data (default case), false if not.
	 * @return	JForm	A JForm object on success, false on failure
	 * @since	1.6
	 */
	public function getForm($data = array(), $loadData = true)
	{
		// Get the form.
		$form = $this->loadForm('peetcontact-form', 'peetform', array('control' => 'jform', 'load_data' => true));
		if (empty($form)) {
			return false;
		}

		return $form;
	}

	protected function loadFormData()
	{
		$data = (array)JFactory::getApplication()->getUserState('com_peetcontact.data', array());
		return $data;
	}

}
