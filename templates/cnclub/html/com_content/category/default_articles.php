<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_content
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

JHtml::addIncludePath(JPATH_COMPONENT . '/helpers/html');

// Create some shortcuts.
$params    = &$this->item->params;
$n         = count($this->items);
$listOrder = $this->escape($this->state->get('list.ordering'));
$listDirn  = $this->escape($this->state->get('list.direction'));

// parsing json string to get intro images
foreach ($this->items as $item)
{
	if (!empty($item->img_intro = json_decode($item->images)->image_intro))
	{
		$item->img_dims = PeetLibThmbmaker::mkThbm($item->img_intro, 300, 200);
	}
}

if (empty($this->items)) : ?>

	<?php if ($this->params->get('show_no_articles', 1)) : ?>
	<p><?php echo JText::_('COM_CONTENT_NO_ARTICLES'); ?></p>
	<?php endif; ?>

<?php else : ?>

<form action="<?php echo htmlspecialchars(JUri::getInstance()->toString()); ?>" method="post" name="adminForm" id="adminForm" class="form-inline">
	<?php if ($this->params->get('show_headings') || $this->params->get('filter_field') != 'hide' || $this->params->get('show_pagination_limit')) :?>
		
	<?php endif; ?>
			<?php foreach ($this->items as $i => $article) : ?>
				<div class="category-list-item">
					<?php if (in_array($article->access, $this->user->getAuthorisedViewLevels())) : ?>
						<div class="band-img-float">
							<a href="<?php echo JRoute::_(ContentHelperRoute::getArticleRoute($article->slug, $article->catid, $article->language)); ?>">
								<img src="<?php echo $article->img_intro; ?>" height = "<?php echo $article->img_dims['height']; ?>" width = "<?php echo $article->img_dims['width']; ?>"/>
							</a>
						</div>
						<div>
							<a href="<?php echo JRoute::_(ContentHelperRoute::getArticleRoute($article->slug, $article->catid, $article->language)); ?>">
								<h2><?php echo $this->escape($article->title); ?> </h2>
							</a>
							<p> <?php echo JHtml::_('string.truncate', $article->introtext, 600, true, false); ?></p>
						</div>
						<div style="clear:both"></div>
						<?php endif; ?>
				</div>
			<?php endforeach; ?>

	<fieldset class="pagination">
		<?php if ($this->params->get('show_pagination_limit')) : ?>
			<div class="btn-group pull-right">
				<label for="limit" class="element-invisible">
					<?php echo JText::_('JGLOBAL_DISPLAY_NUM'); ?>
				</label>
				<?php echo $this->pagination->getLimitBox(); ?>
			</div>
		<?php endif; ?>

		<input type="hidden" name="limitstart" value="" />
		<input type="hidden" name="task" value="" />
	</fieldset>

<?php // Add pagination links ?>
<?php if (!empty($this->items)) : ?>
	<?php if (($this->params->def('show_pagination', 2) == 1  || ($this->params->get('show_pagination') == 2)) && ($this->pagination->pagesTotal > 1)) : ?>
	<div class="pagination">
		<?php if ($this->params->def('show_pagination_results', 1)) : ?>
			<p class="counter pull-right">
				<?php echo $this->pagination->getPagesCounter(); ?>
			</p>
		<?php endif; ?>

		<?php echo $this->pagination->getPagesLinks(); ?>
	</div>
	<?php endif; ?>
	<?php endif; ?>
</form>
<?php  endif; ?>
