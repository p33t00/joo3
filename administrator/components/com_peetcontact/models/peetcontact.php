<?php
/**
 * @package		Peet.Administrator
 * @subpackage	com_peetcontact
 * @copyright	Copyright (C) 2005 - 2022 Open Source Matters, Inc. All rights reserved.
 * @license		No license Dude !!!
 */

// No direct access
defined('_JEXEC') or die;

jimport('joomla.application.component.modellist');

/**
 * Peetcontact Component Model
 *
 * @package		Peet.Administrator
 * @subpackage	com_peetcontact
 * @since 1.5
 */

class PeetcontactModelPeetcontact extends JModelList
{
	protected $searchInFields = array(
		'first_name',
		'last_name',
		'email',
		'phone');

	public function __construct($config = array())
	{   
		// only predefined values are allowed for the ordering
		$config['filter_fields'] = array(
			'first_name',
			'last_name',
			'email',
			'phone'
		);
		parent::__construct($config);
	}

	
	/*
	*method to set the order and default column that will be sorted by
	*/
	protected function populateState($ordering = null, $direction = null){

		// Initialise variables.
		$app = JFactory::getApplication('administrator');

		// Load the filter state.
		$search = $app->getUserStateFromRequest($this->context.'.filter.search', 'filter_search');
		//Omit double (white-)spaces and set state
		$this->setState('filter.search', preg_replace('/\s+/',' ', $search));

		parent::populateState('last_name', 'ASC');
	}


	public function getListQuery(){		// Method for ordering to work

		$db = $this->getDbo();
		$query = $db->getQuery('true');
		$query->select('*');
		$query->from('#__peet_messages');

		// Filter search 
		// Extra: Search more than one fields and for multiple words
		$regex = str_replace(' ', '|', $this->getState('filter.search'));
		if (!empty($regex)) {
			$regex=' REGEXP '.$db->quote($regex);
			$query->where('('.implode($regex.' OR ',$this->searchInFields).$regex.')');
		}

		$query->order($db->escape($this->getState('list.ordering', 'last_name')).' '.$db->escape($this->getState('list.direction', 'ASC')));

		return $query;
	}

}
