<?php
defined('_JEXEC') or die;
JHtml::addIncludePath(JPATH_COMPONENT . '/helpers');
JHtml::_('behavior.core');
JHtml::_('formbehavior.chosen', 'select');
// Get the user object.
$user = JFactory::getUser();
// Check if user is allowed to add/edit based on tags permissions.
// Do we really have to make it so people can see unpublished tags???
$canEdit = $user->authorise('core.edit', 'com_tags');
$canCreate = $user->authorise('core.create', 'com_tags');
$canEditState = $user->authorise('core.edit.state', 'com_tags');
$items = $this->items;
$n = count($this->items);
$lg = 4;
$md = 4;
$xs = 1;
$class_suffix_lg  = round((12 / $lg));
$class_suffix_md  = round((12 / $md));
$class_suffix_xs  = round((12 / $xs));
$columncounter=0;
?>
<form action="<?php echo htmlspecialchars(JUri::getInstance()->toString()); ?>" method="post" name="adminForm" id="adminForm" class="form-inline">
<?php if ($this->params->get('show_headings') || $this->params->get('filter_field') || $this->params->get('show_pagination_limit')) : ?>
<fieldset class="filters btn-toolbar">
<?php if ($this->params->get('filter_field')) :?>
<div class="btn-group">
<label class="filter-search-lbl element-invisible" for="filter-search">
<?php echo JText::_('COM_TAGS_TITLE_FILTER_LABEL') . '&#160;'; ?>
</label>
<input type="text" name="filter-search" id="filter-search" value="<?php echo $this->escape($this->state->get('list.filter'));
?>" class="inputbox" onchange="document.adminForm.submit();" title="<?php echo JText::_(
'COM_TAGS_FILTER_SEARCH_DESC'); ?>" placeholder="<?php echo JText::_('COM_TAGS_TITLE_FILTER_LABEL'); ?>" />
</div>
<?php endif; ?>
<?php if ($this->params->get('show_pagination_limit')) : ?>
<div class="btn-group pull-right">
<label for="limit" class="element-invisible">
<?php echo JText::_('JGLOBAL_DISPLAY_NUM'); ?>
</label>
<?php echo $this->pagination->getLimitBox(); ?>
</div>
<?php endif; ?>
<input type="hidden" name="filter_order" value="" />
<input type="hidden" name="filter_order_Dir" value="" />
<input type="hidden" name="limitstart" value="" />
<input type="hidden" name="task" value="" />
<div class="clearfix"></div>
</fieldset>
<?php endif; ?>
<?php if ($this->items == false || $n == 0) : ?>
<p> <?php echo JText::_('COM_TAGS_NO_ITEMS'); ?></p>
<?php else : ?>
<ul class="category list-striped">
<?php foreach ($items as $i => $item) : ?>
<?php if ($item->core_state == 0) : ?>
<li class="system-unpublished cat-list-row<?php echo $i % 2; ?>">
<?php else: ?>
<li class="cat-list-row<?php echo $i % 2;  ?> col-lg-<?php echo $class_suffix_lg;?> col-md-<?php echo $class_suffix_md;?> col-sm-<?php echo $class_suffix_md;?> col-xs-<?php echo $class_suffix_xs;?> clearfix" >
<h3>
<a href="<?php echo JRoute::_(TagsHelperRoute::getItemRoute($item->content_item_id, $item->core_alias, $item->
core_catid, $item->core_language, $item->type_alias, $item->router)); ?>">
<?php echo $this->escape($item->core_title); ?>
</a>
</h3>
<?php endif; ?>
<?php echo $item->event->afterDisplayTitle; ?>
<?php $images  = json_decode($item->core_images);?>
<?php if ($this->params->get('tag_list_show_item_image', 1) == 1 && !empty($images->image_intro)) :?>
<a href="<?php echo JRoute::_(TagsHelperRoute::getItemRoute($item->content_item_id, $item->core_alias, $item->
core_catid, $item->core_language, $item->type_alias, $item->router)); ?>">
<img src="<?php echo htmlspecialchars($images->image_intro);?>" alt="<?php echo htmlspecialchars($images->
image_intro_alt); ?>">
</a>
<?php endif; ?>
<?php if ($this->params->get('tag_list_show_item_description', 1)) : ?>
<?php echo $item->event->beforeDisplayContent; ?>
<span class="tag-body">
<?php echo JHtml::_('string.truncate', $item->core_body, $this->params->get('tag_list_item_maximum_characters')); ?>
</span>
<?php echo $item->event->afterDisplayContent; ?>
<?php endif; ?>
<?php $columncounter++; ?>
</li>
<?php if(($columncounter) % $xs == 0){ echo '<div class="clearfix visible-xs-block"></div>';}
if(($columncounter) % $md == 0){ echo '<div class="clearfix visible-sm-block"></div>';
echo '<div class="clearfix visible-md-block"></div>';}
if(($columncounter) % $lg == 0){ echo '<div class="clearfix visible-lg-block"></div>';}?>
<?php endforeach; ?>
</ul>
<?php endif; ?>
</form>
