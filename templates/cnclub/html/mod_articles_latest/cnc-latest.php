<?php
/**
 * @package		CNC.Site
 * @subpackage	mod_articles_latest
 * @copyright	Copyright (C) 2015 P33T's PROperty
 */

// no direct access
defined('_JEXEC') or die;
?>

<ul class="latestnews<?php echo $moduleclass_sfx; ?>">
<?php foreach ($list as $item) :  
	$smb_num = isset($item->img) ? (($item->img_dims['width'] > 110) ? 100 : 130) : 100;
?>
	<li>
			<div class="news-image"><a href="<?php echo $item->link; ?>">
			<?php if (isset($item->img)):?>
				<img src="<?php echo $item->img; ?>" width="<?php echo $item->img_dims['width']; ?>" height="<?php echo $item->img_dims['height']; ?>" />
			<?php endif; ?></a></div>
			<h5>
				<?php echo $item->title; ?>
			</h5>
			<p><?php echo JHtml::_('string.truncate', $item->introtext, $smb_num, true, false); ?></p>
			<a href="<?php echo $item->link; ?>"><?php echo JText::_('MOD_ARTICLES_LATEST_READ_MORE') ?></a>
	</li>
<?php endforeach; ?>
</ul>
