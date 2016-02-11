<?php
// Запрет прямого доступа.
defined('_JEXEC') or die;
 
JHtml::_('behavior.formvalidator');
JHtml::_('behavior.keepalive');
JHtml::_('formbehavior.chosen', 'select');
?>
<form action="<?php echo JRoute::_('index.php?option=com_peetcontact'); ?>" method="post" name="adminForm" id="message-form" class="form-validate">
	<table class='adminlist'>
		<tr>
			<td width="1"><b>
				<?php echo JText::_('ID'); ?></b>
			</td>
			<td>
				<?php echo JText::_($this->escape($this->itm->message_id)); ?>
			</td>
		</tr>
		<tr>
			<td width="1"><b>
				<?php echo JText::_('COM_PEETCONTACT_PEETCONTACT_MESSAGE_NAME'); ?></b>
			</td>
			<td>
				<?php echo JText::_($this->escape($this->itm->first_name)); ?>
			</td>
		</tr>
		<tr>
			<td width="1"><b>
				<?php echo JText::_('COM_PEETCONTACT_PEETCONTACT_MESSAGE_LAST_NAME'); ?></b>
			</td>
			<td>
				<?php echo JText::_($this->escape($this->itm->last_name)); ?>
			</td>
		</tr>
		<tr>
			<td width="1"><b>
				<?php echo JText::_('COM_PEETCONTACT_PEETCONTACT_MESSAGE_EMAIL'); ?></b>
			</td>
			<td>
				<?php echo JText::_($this->escape($this->itm->email)); ?>
			</td>
		</tr>
		<tr>
			<td width="1"><b>
				<?php echo JText::_('COM_PEETCONTACT_PEETCONTACT_MESSAGE_PHONE'); ?></b>
			</td>
			<td>
				<?php echo JText::_($this->escape($this->itm->phone)); ?>
			</td>
		</tr>
		<tr>
			<td width="1"><b>
				<?php echo JText::_('COM_PEETCONTACT_PEETCONTACT_MESSAGE_MESSAGE'); ?></b>
			</td>
			<td>
				<?php echo JText::_($this->escape($this->itm->message)); ?>
			</td>
		</tr>
		<tr>
			<td width="1"><b>
				<?php echo JText::_('COM_PEETCONTACT_PEETCONTACT_MESSAGE_CREATED'); ?></b>
			</td>
			<td>
				<?php echo JText::_($this->escape($this->itm->created)); ?>
			</td>
		</tr>
	</table>
	<input type="hidden" name="task" value="" />
	<?php echo JHtml::_('form.token'); ?>
</form>