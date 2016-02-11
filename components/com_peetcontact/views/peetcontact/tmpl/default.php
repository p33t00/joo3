<?php 
// No direct access
defined('_JEXEC') or die('Restricted access');
JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');
?>
<div class="peet-contact-form">
	<?php if ($this->params->get('show_contact_form'))
	{
		echo $this->loadTemplate('form');
	} ?>
	<?php echo $this->loadTemplate('contacts');?>
</div>