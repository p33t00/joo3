<?php
// Запрет прямого доступа.
defined('_JEXEC') or die;
?>

<tbody>
	<?php foreach ($this->items as $i => $item) : ?>
		<tr class="row<?php echo $i % 2; ?>">
			<td>
				<?php echo JHtml::_('grid.id', $i, $item->message_id); ?>
			</td>
			<td class="center">
				<?php echo JText::_($item->message_id); ?>
			</td>
			<td class="center">
				<?php echo JText::_($item->first_name); ?>
			</td>
			<td class="center">
				<?php echo JText::_($item->last_name); ?>
			</td>
			<td class="center">
				<?php echo JText::_($item->email); ?>
			</td>
			<td class="center">
				<?php echo JText::_($item->phone); ?>
			</td>
			<td class="center">
				<?php echo JHtml::_('link', JRoute::_('index.php?option=com_peetcontact&task=peetcontact.showmess&layout=message&id='.(int) $item->message_id), JText::_(JHtml::_('string.truncate', $item->message, 50, true, false))); ?>
			</td>
			<td class="center">
				<?php echo JText::_($item->created); ?>
			</td>
		</tr>
	<?php endforeach ?>
</tbody>

