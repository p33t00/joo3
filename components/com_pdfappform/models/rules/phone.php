<?php
/**
 * @package		Joomla.Site
 * @subpackage	Peet Contact
 */

defined('_JEXEC') or die;

//require_once JPATH_PLATFORM. '/joomla/form/rules/email.php';

class JFormRulePhone extends JFormRule
{
    protected $regex = '^[0-9,\-,(,)]*$';
}
