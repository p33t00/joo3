<?php
// Запрет прямого доступа.
defined('_JEXEC') or die;
?>

<thead>
	<tr>
		<th width="1%">
			<!-- <input type="checkbox" name="checkall-toggle" value="" title="<?php echo JText::_('JGLOBAL_CHECK_ALL'); ?>" onclick="Joomla.checkAll(this)" /> -->
			<?php echo JHtml::_('grid.checkall'); ?>
		</th>
		<th>
			<?php echo JText::_('ID'); ?>
		</th>
		<th>
			<?php echo JHTML::_( 'grid.sort', JText::_('COM_PEETCONTACT_PEETCONTACT_MESSAGE_NAME'), 'first_name', $this->sortDirection, $this->sortColumn); ?>
		</th>
		<th>
			<?php echo JHTML::_( 'grid.sort', JText::_('COM_PEETCONTACT_PEETCONTACT_MESSAGE_LAST_NAME'), 'last_name', $this->sortDirection, $this->sortColumn); ?>
		</th>
		<th>
			<?php echo JHTML::_( 'grid.sort', JText::_('COM_PEETCONTACT_PEETCONTACT_MESSAGE_EMAIL'), 'email', $this->sortDirection, $this->sortColumn); ?>
		</th>
		<th>
			<?php echo JText::_('COM_PEETCONTACT_PEETCONTACT_MESSAGE_PHONE'); ?>
		</th>
		<th>
			<?php echo JText::_('COM_PEETCONTACT_PEETCONTACT_MESSAGE_MESSAGE'); ?>
		</th>
		<th>
			<?php echo JText::_('COM_PEETCONTACT_PEETCONTACT_MESSAGE_CREATED'); ?>
		</th>
	</tr>
</thead>