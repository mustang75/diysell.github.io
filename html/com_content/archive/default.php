<?php
defined('_JEXEC') or die;
JHtml::addIncludePath(JPATH_COMPONENT . '/helpers');
?>
<div class="archive<?php echo $this->pageclass_sfx;?>">
<?php if ($this->params->get('show_page_heading', 1)) : ?>
<h1>
<?php echo $this->escape($this->params->get('page_heading')); ?>
</h1>
<?php endif; ?>
<form id="adminForm" action="<?php echo JRoute::_('index.php')?>" method="post">
<fieldset class="filters">
<legend class="hidelabeltxt"><?php echo JText::_('JGLOBAL_FILTER_LABEL'); ?></legend>
<div style ="float:left;" class="filter-search">
<?php if ($this->params->get('filter_field') != 'hide') : ?>
<label class="filter-search-lbl" for="filter-search"><?php echo JText::_('COM_CONTENT_'.$this->params->get('filter_field').'_FILTER_LABEL').'&#160;'; ?></label>
<input type="text" name="filter-search" id="filter-search" value="<?php echo $this->escape($this->filter); ?>" class="inputbox" onchange="document.getElementById('adminForm').submit();"/>
<?php endif; ?>
<?php echo $this->form->monthField; ?>
<?php echo $this->form->yearField; ?>
<?php echo $this->form->limitField; ?>
<div style ="float:right;margin-left:5px;margin-top:-5px;">
<span class="ttr_button" onmouseover="this.className='ttr_button_hover1';" onmouseout="this.className='ttr_button';">
<input type="submit" value="<?php echo JText::_('JGLOBAL_FILTER_BUTTON'); ?>"/>
</span>
<div style="clear:both;">
</div>
</div>
</div>
<input type="hidden" name="view" value="archive"/>
<input type="hidden" name="option" value="com_content" />
<input type="hidden"name="limitstart" value="0"/>
</fieldset>
<?php echo $this->loadTemplate('items'); ?>
</form>
</div>
