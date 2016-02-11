<?php
// No direct access
defined('_JEXEC') or die('Restricted access');
?>

<div class="contact-info">

	<?php if($this->params->get("show_contact_name") || $this->params->get("show_contact_name")) : ?>
		<div class="name">
			<h3>
				<span>
					NAME:
				</span>
			</h3>
			<?php if($this->params->get("show_contact_name") && $this->items->name)	: ?>
				<p>
					<?php echo $this->items->name; ?>
				</p>
			<?php endif; ?>
		</div>
	<?php endif; ?>

	<?php if($this->params->get("show_contact_last")) : ?>
		<div class="last-name">
			<h3>
				<span>
					Last NAME:
				</span>
			</h3>
			<?php if($this->items->last_name) : ?>
				<p>
					<?php echo $this->items->last_name; ?>
				</p>
			<?php endif; ?>
		</div>
	<?php endif; ?>

	<?php if($this->params->get("show_contact_tel_01") || $this->params->get("show_contact_tel_02")) : ?>
		<div class="phone">
			<h3>
				<span>
					PHONE:
				</span>
			</h3>
			<?php if($this->params->get("show_contact_tel_01") && $this->items->tel_01)	: ?>
				<p>
					<?php echo $this->items->tel_01; ?>
				</p>
			<?php endif; ?>
			<?php if($this->params->get("show_contact_tel_02") && $this->items->tel_02)	: ?>
				<p>
					<?php echo $this->items->tel_02; ?>
				</p>
			<?php endif; ?>
		</div>
	<?php endif; ?>

	<?php if($this->params->get("show_contact_fax") || $this->params->get("show_contact_fax")) : ?>
		<div class="fax">
			<h3>
				<span>
					FAX:
				</span>
			</h3>
			<?php if($this->params->get("show_contact_fax") && $this->items->fax)	: ?>
				<p>
					<?php echo $this->items->fax; ?>
				</p>
			<?php endif; ?>
		</div>
	<?php endif; ?>

	<?php if($this->params->get("show_contact_email") || $this->params->get("show_contact_email")) : ?>
		<div class="email">
			<h3>
				<span>
					E-MAIL:
				</span>
			</h3>
			<?php if($this->params->get("show_contact_email") && $this->items->email)	: ?>
				<p>
					<?php echo JHtml::_('email.cloak', $this->items->email, 0);?>
				</p>
			<?php endif; ?>
		</div>
	<?php endif; ?>
	
	<?php if($this->params->get("show_contact_social_01") || $this->params->get("show_contact_social_02")) : ?>
		<div class="social">
			<h3>
				<span>
					SOCIAL RESOURCES:
				</span>
			</h3>
			<?php if($this->params->get("show_contact_social_01") && $this->items->social01)	: ?>
				<p>
					<?php echo $this->items->social01; ?>
				</p>
			<?php endif; ?>
			<?php if($this->params->get("show_contact_social_02") && $this->items->social02)	: ?>
				<p>
					<?php echo $this->items->social02; ?>
				</p>
			<?php endif; ?>
		</div>
	<?php endif; ?>
</div>
