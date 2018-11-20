<?php
defined('_JEXEC') or die;
$params = &$this->item->params;
$canEdit	= $this->item->params->get('access-edit');
$app	= JFactory::getApplication();
$images  = json_decode($this->item->images);
JHtml::addIncludePath(JPATH_COMPONENT.'/helpers/html');
JHtml::_('behavior.tooltip');
$templateparams = $app->getTemplate(true)->params;
?>
<?php if ($this->item->state == 0) : ?>
<div class="system-unpublished">
<?php endif; ?>
<?php if ($params->get('show_title')) : ?>
<div class="ttr_post_inner_box">
<h2 class="ttr_post_title">
<?php if ($params->get('link_titles') && $params->get('access-view')) : ?>
<a href="<?php echo JRoute::_(ContentHelperRoute::getArticleRoute($this->item->slug, $this->item->catid)); ?>">
<?php echo $this->escape($this->item->title); ?></a>
<?php else : ?>
<?php echo $this->escape($this->item->title); ?>
<?php endif; ?>
</h2>
</div>
<?php endif; ?>
<div class="ttr_article">
<div class="postedon">
<?php if ($params->get('show_parent_category') && $this->item->parent_id != 1) : ?>
<?php $title = $this->escape($this->item->parent_title);
$url = '<a href="' . JRoute::_(ContentHelperRoute::getCategoryRoute($this->item->parent_id)) . '">' . $title . '</a>'; ?>
<?php if ($params->get('link_parent_category')) : ?>
<?php echo JText::sprintf('COM_CONTENT_PARENT', $url); ?>
<?php else : ?>
<?php echo JText::sprintf('COM_CONTENT_PARENT', $title); ?>
<?php endif; ?>
<?php endif; ?>
<?php if ($params->get('show_category')) : ?>
<?php $title = $this->escape($this->item->category_title);
$url = '<a href="' . JRoute::_(ContentHelperRoute::getCategoryRoute($this->item->catid)) . '">' . $title . '</a>'; ?>
<?php if ($params->get('link_category')) : ?>
<?php echo JText::sprintf('COM_CONTENT_CATEGORY', $url); ?>
<?php else : ?>
<?php echo JText::sprintf('COM_CONTENT_CATEGORY', $title); ?>
<?php endif; ?>
<?php endif; ?>
<?php if ($params->get('show_create_date')) : ?>
<dd class=" create">
<span class="ttr_date_icon"></span>
<?php echo JText::sprintf('COM_CONTENT_CREATED_DATE_ON', JHtml::_('date',$this->item->created, JText::_('DATE_FORMAT_LC2'))); ?>
</dd>
<?php endif; ?>
<?php if (($params->get('show_author')) or ($params->get('show_publish_date'))) : ?>
<?php if ($params->get('show_publish_date')) : ?>
<?php echo JText::sprintf('COM_CONTENT_PUBLISHED_DATE_ON', JHtml::_('date',$this->item->publish_up, JText::_('DATE_FORMAT_LC2'))); ?>
<?php endif; ?>
<?php if ($params->get('show_author') && !empty($this->item->author )) : ?>
<?php $author =  $this->item->author; ?>
<?php $author = ($this->item->created_by_alias ? $this->item->created_by_alias : $author);?>
<?php if (!empty($this->item->contactid ) &&  $params->get('link_author') == true):?>
<?php 	echo JText::sprintf('COM_CONTENT_WRITTEN_BY' ,
 JHtml::_('link',JRoute::_('index.php?option=com_contact&view=contact&id='.$this->item->contactid),$author)); ?>
<?php else :?>
<?php echo JText::sprintf('COM_CONTENT_WRITTEN_BY', $author); ?>
<?php endif; ?>
<?php endif; ?>
<?php endif; ?>
<?php if ($params->get('show_hits')) : ?>
<dd class="hits">
<?php echo JText::sprintf('COM_CONTENT_ARTICLE_HITS', $this->item->hits); ?>
</dd>
<?php endif; ?>
<?php if ($params->get('show_print_icon') || $params->get('show_email_icon')) : ?>
<?php endif; ?>
<?php if ($params->get('show_tags') && !empty($this->item->tags->itemTags)) : ?>
<?php echo JLayoutHelper::render('joomla.content.tags', $this->item->tags->itemTags); ?>
<?php endif; ?>
<?php if (!$params->get('show_intro')) : ?>
<?php echo $this->item->event->afterDisplayTitle; ?>
<?php endif; ?>
<?php echo $this->item->event->beforeDisplayContent; ?>
</div>
<?php if ($canEdit) : ?>
<?php echo JHtml::_('icon.edit', $this->item, $params, array(), true); ?>
<?php endif; ?>
<?php if (isset($images->image_intro) && !empty($images->image_intro)) : ?>
<?php $imgfloat = (empty($images->float_intro)) ? $params->get('float_intro') : $images->float_intro; ?>
<div class="pull-<?php echo htmlspecialchars($imgfloat); ?> item-image">
<?php $link = JRoute::_(ContentHelperRoute::getArticleRoute($this->item->slug, $this->item->catid)); ?>
<a href= "<?php echo $link; ?>">
<img
<?php if ($images->image_intro_caption):
echo 'class="caption"'.' title="' .htmlspecialchars($images->image_intro_caption) .'"';
endif; ?>
 src="<?php echo htmlspecialchars($images->image_intro); ?>" alt="<?php echo htmlspecialchars($images->image_intro_alt); ?>"/>
<?php if ($images->image_intro_caption):?>
<p class="intro_img_caption"><?php echo htmlspecialchars($images->image_intro_caption); ?></p>
<?php endif; ?>
</a>
</div>
<?php endif; ?>
<div class="postcontent">
<?php echo $this->item->introtext; ?>
<div style="clear:both;"></div>
</div>
<?php if ($params->get('show_readmore') && $this->item->readmore) :
if ($params->get('access-view')) :
$link = JRoute::_(ContentHelperRoute::getArticleRoute($this->item->slug, $this->item->catid));
else :
$menu = JFactory::getApplication()->getMenu();
$active = $menu->getActive();
$itemId = $active->id;
$link1 = JRoute::_('index.php?option=com_users&view=login&Itemid=' . $itemId);
$returnURL = JRoute::_(ContentHelperRoute::getArticleRoute($this->item->slug, $this->item->catid));
$link = new JURI($link1);
$link->setVar('return', base64_encode($returnURL));
endif;
?>
<?php if ($params->get('show_modify_date')) : ?>
<?php echo JText::sprintf('COM_CONTENT_LAST_UPDATED', JHtml::_('date',$this->item->modified, JText::_('DATE_FORMAT_LC2'))); ?>
<?php endif; ?>
<p class="readmore">
<?php if(($templateparams->get('enable_read_more_button')) || ($templateparams->get('enable_read_more_button') == Null)): ?>
<a class="btn btn-default" href="<?php echo $link; ?>">
<?php else:?>
<a href="<?php echo $link; ?>">
<?php endif;?>
<?php if (!$params->get('access-view')) :
echo JText::_('COM_CONTENT_REGISTER_TO_READ_MORE');
elseif ($readmore = $this->item->alternative_readmore) :
echo $readmore;
if ($params->get('show_readmore_title', 0) != 0) :
echo JHtml::_('string.truncate', ($this->item->title), $params->get('readmore_limit'));
endif;
elseif ($params->get('show_readmore_title', 0) == 0) :
echo JText::sprintf('COM_CONTENT_READ_MORE_TITLE');
else :
echo JText::_('COM_CONTENT_READ_MORE');
echo JHtml::_('string.truncate', ($this->item->title), $params->get('readmore_limit'));
endif; ?></a>
</p>
<?php endif; ?>
</div>
<?php if ($this->item->state == 0) : ?>
</div>
<?php endif; ?>
<div class="item-separator"></div>
<?php echo $this->item->event->afterDisplayContent; ?>
