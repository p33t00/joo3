<?php
// Запрет прямого доступа.
defined('_JEXEC') or die;
 
// Загружаем тултипы.
JHtml::_('behavior.tooltip');
// Загружаем проверку формы.
JHtml::_('behavior.formvalidation');

JHtml::_('behavior.multiselect');
JHtml::_('formbehavior.chosen', 'select');
?>

<form action="<?php echo JRoute::_('index.php?option=com_peetcontact'); ?>" method="post" name="adminForm" id="adminForm" class="form-validate">

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
		<?php echo $this->loadTemplate('head');?>
		<?php echo $this->loadTemplate('body');?>
		<?php echo $this->loadTemplate('foot');?>
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
