<?php
// Запрет прямого доступа.
defined('_JEXEC') or die;
 
// Загружаем тултипы.
JHtml::_('behavior.tooltip');
// Загружаем проверку формы.
JHtml::_('behavior.formvalidation');
?>

<form action="<?php echo JRoute::_('index.php?option=com_pdfappform'); ?>" method="post" name="adminForm" id="adminForm" class="form-validate">

	<div id="j-main-container">
			<div id="filter-bar" class="btn-toolbar">
				<div class="filter-search btn-group pull-left">
					<label for="filter_search" class="element-invisible"><?php echo JText::_('COM_CONTACT_FILTER_SEARCH_DESC');?></label>
					<input type="text" name="filter_search" id="filter_search" placeholder="<?php echo JText::_('JSEARCH_FILTER'); ?>" value="<?php echo $this->escape($this->state->get('filter.search')); ?>" class="hasTooltip" title="<?php echo JHtml::tooltipText('COM_CONTACT_SEARCH_IN_NAME'); ?>" />
				</div>
				<div class="btn-group pull-left">
					<button type="submit" class="btn hasTooltip" title="<?php echo JHtml::tooltipText('JSEARCH_FILTER_SUBMIT'); ?>"><span class="icon-search"></span></button>
					<button type="button" class="btn hasTooltip" title="<?php echo JHtml::tooltipText('JSEARCH_FILTER_CLEAR'); ?>" onclick="document.getElementById('filter_search').value='';this.form.submit();"><span class="icon-remove"></span></button>
				</div>
			</div>


<table class="table table-striped">
<thead>
	<tr>
		<th width="1%">
			<?php echo JHtml::_('grid.checkall'); ?>
		</th>
		<th>
			<?php echo JHTML::_( 'grid.sort', JText::_('ID'), 'id', $this->sortDirection, $this->sortColumn); ?>
		</th>
		<th>
			<?php echo JHTML::_( 'grid.sort', JText::_('COM_PDFAPPFORM_MESSAGE_NAME'), 'first_name', $this->sortDirection, $this->sortColumn); ?>
		</th>
		<th>
			<?php echo JHTML::_( 'grid.sort', JText::_('COM_PDFAPPFORM_MESSAGE_LAST_NAME'), 'last_name', $this->sortDirection, $this->sortColumn); ?>
		</th>
		<th>
			<?php echo JHTML::_( 'grid.sort', JText::_('COM_PDFAPPFORM_MESSAGE_EMAIL'), 'email', $this->sortDirection, $this->sortColumn); ?>
		</th>
		<th>
			<?php echo JHTML::_( 'grid.sort', JText::_('COM_PDFAPPFORM_MESSAGE_PHONE'), 'phone', $this->sortDirection, $this->sortColumn); ?>
		</th>
		<th>
			<?php echo JHTML::_( 'grid.sort', JText::_('COM_PDFAPPFORM_MESSAGE_NAME_CREATED'), 'created', $this->sortDirection, $this->sortColumn); ?>
		</th>
	</tr>
</thead>

<tbody>
		<?php foreach ($this->items as $i => $item) : ?>
		<tr class="row<?php echo $i % 2; ?>">
			<td>
				<?php echo JHtml::_('grid.id', $i, $item->id); ?>
			</td>
			<td>
				<?php echo JText::_($item->id); ?>
			</td>
			<td>
				<?php echo JText::_($item->first_name); ?>
			</td>
			<td>
				<?php echo JText::_($item->last_name); ?>
			</td>
			<td>
				<?php echo JText::_($item->email); ?>
			</td>
			<td>
				<?php echo JText::_($item->phone); ?>
			</td>
			<td>
				<?php echo JText::_($item->created); ?>
			</td>
		</tr>
	<?php endforeach ?>
</tbody>

</table>

	<div>
		<input type="hidden" name="task" value="" />
		<input type="hidden" name="boxchecked" value="0" />
		<input type="hidden" name="filter_order" value="<?php echo $this->sortColumn; ?>" />
		<input type="hidden" name="filter_order_Dir" value="<?php echo $this->sortDirection; ?>" />
		<?php echo JHtml::_('form.token'); ?>
	</div>
	</div>
</form>
