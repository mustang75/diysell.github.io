<?php 
defined('_JEXEC') or die ('Restricted access');
$app	= JFactory::getApplication();
$doc = JFactory::getDocument();
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
<jdoc:include type="head" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php global $template_path;
$template_path = JURI::base() . 'templates/' . $app->getTemplate(); ?>
<?php JLoader::import( 'joomla.version' );
$version = new JVersion();
if (version_compare( $version->RELEASE, "2.5", "<=")) {
if(JFactory::getApplication()->get('jquery') !== true) {
$document = JFactory::getDocument();
$headData = $this->getHeadData();
reset($headData['scripts']);
$newHeadData = $headData['scripts'];
$jquery = array(JURI::base() .'/templates/' . $this->template . '/js/jquery.js' => array('mime' => 'text/javascript', 'defer' => FALSE, 'async' => FALSE));
$newHeadData = $jquery + $newHeadData;
$headData['scripts'] = $newHeadData;
$this->setHeadData($headData);
$doc->addScript(JURI::base() .'/templates/' . $this->template . '/js/jui/bootstrap.min.js', 'text/javascript');
}
} else {
JHtml::_('jquery.framework');
JHtml::_('bootstrap.framework');
} ?>
<?php
if (version_compare( $version->RELEASE, "2.5", "<")) {
JHtml::_('jquery.ui');
}
$doc = JFactory::getDocument();
$doc->addStyleSheet('templates/'.$this->template.'/css/bootstrap.css');
$doc->addStyleSheet('templates/'.$this->template.'/css/template.css');
$style = $this->params->get('custom_css');
if (($style || $style == Null) && !empty($style)) {
 $doc->addStyleDeclaration($style);
}
?>
<?php
$doc->addScript($template_path.'/js/totop.js');
$doc->addScript($template_path.'/js/Customjs.js');
?>
<?php $str = JURI::base(); ?>
<style type="text/css">
@media only screen and (min-width : 1025px) {
<?php $bg = $this->params->get('header_background');
if(!empty($bg)){ ?>
header#ttr_header{
background: url('<?php echo $str.$this->params->get('header_background');?>') no-repeat
<?php 
$stretch = "";
$stretch_option = $this->params->get('header_stretch');
if($stretch_option == "Uniform"){
$stretch = "/ contain";
}else if($stretch_option == "Uniform to fill"){
$stretch = "/ cover";
}
else {
$stretch = " / 100% 100% ";
}
echo $this->params->get('header_horizontal_alignment') ." " . $this->params->get('header_vertical_alignment'). $stretch ."!important; }";
} ?>
.ttr_title_style, header .ttr_title_style a, header .ttr_title_style a:link, header .ttr_title_style a:visited, header .ttr_title_style a:hover {
font-size:<?php echo $this->params->get('Site_Title_FontSize'); ?>px;
color:<?php echo $this->params->get('site_title_color');?>;
}
.ttr_slogan_style {
font-size:<?php echo $this->params->get('Site_Slogan_FontSize'); ?>px;
color:<?php echo $this->params->get('site_slogan_color');?>;
}
h1.ttr_block_heading, h2.ttr_block_heading, h3.ttr_block_heading, h4.ttr_block_heading, h5.ttr_block_heading, h6.ttr_block_heading, p.ttr_block_heading {
font-size:<?php echo $this->params->get('block_heading_font_size'); ?>px;
color:<?php echo $this->params->get('block_heading_color');?>;
}
h1.ttr_verticalmenu_heading, h2.ttr_verticalmenu_heading, h3.ttr_verticalmenu_heading, h4.ttr_verticalmenu_heading, h5.ttr_verticalmenu_heading, h6.ttr_verticalmenu_heading, p.ttr_verticalmenu_heading {
font-size:<?php echo $this->params->get('sidebar_menu_font_size'); ?>px;
color:<?php echo $this->params->get('sidebar_menu_heading_color');?>;
}
#ttr_copyright a {
font-size:<?php echo $this->params->get('Copyright_FontSize'); ?>px;
color:<?php echo $this->params->get('footer_copyright_color');?>;
}
#ttr_footer_designed_by_links{
font-size:<?php echo $this->params->get('Designed_By_FontSize'); ?>px;
color:<?php echo $this->params->get('footer_designed_by_color');?>;
}
#ttr_footer_designed_by_links a, #ttr_footer_designed_by_links a:link, #ttr_footer_designed_by_links a:visited, #ttr_footer_designed_by_links a:hover {
font-size:<?php echo $this->params->get('Designed_By_Link_FontSize'); ?>px;
color:<?php echo $this->params->get('footer_designed_by_link_color');?>;
}
}
</style>
<?php
$doc->addStyleSheet($this->baseurl.'/templates/system/css/system.css');
?>
<!--[if lte IE 8]>
<link rel="stylesheet"  href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/menuie.css" type="text/css"/>
<link rel="stylesheet"  href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/vmenuie.css" type="text/css"/>
<![endif]-->
<!--[if IE 7]>
<style type="text/css" media="screen">
#ttr_vmenu_items  li.ttr_vmenu_items_parent {display:inline;}
</style>
<![endif]-->
<!--[if lt IE 9]>
<script type="text/javascript" src="<?php echo $template_path?>/js/html5shiv.js">
</script>
<script type="text/javascript" src="<?php echo $template_path?>/js/respond.min.js">
</script>
<![endif]-->
</head>
<body>
<div class="totopshow">
<a href="#" class="back-to-top"><img alt="Back to Top" src="<?php echo $template_path?>/images/gototop.png"/></a>
</div>
<div class="ttr_banner_header">
<?php
if(  $this->countModules('verh1')||  $this->countModules('verh2')||  $this->countModules('verh3')||  $this->countModules('verh4')):
?>
<div class="ttr_banner_header_inner_above0">
<?php
$showcolumn= $this->countModules('verh1');
?>
<?php if($showcolumn): ?>
<div class="cell1 col-lg-3 col-md-6 col-sm-6  col-xs-12">
<div class="headerabovecolumn1">
<jdoc:include type="modules" name="verh1" style="<?php if(($this->params->get('verh1') == 'block') || ($this->params->get('verh1') == Null)): echo "block"; else: echo "xhtml"; endif;?>"/>
</div>
</div>
<?php else: ?>
<div class="cell1 col-lg-3 col-md-6 col-sm-6  col-xs-12"  style="background-color:transparent;">
&nbsp;
</div>
<?php endif; ?>
<div class="clearfix visible-xs-block">
</div>
<?php
$showcolumn= $this->countModules('verh2');
?>
<?php if($showcolumn): ?>
<div class="cell2 col-lg-3 col-md-6 col-sm-6  col-xs-12">
<div class="headerabovecolumn2">
<jdoc:include type="modules" name="verh2" style="<?php if(($this->params->get('verh2') == 'block') || ($this->params->get('verh2') == Null)): echo "block"; else: echo "xhtml"; endif;?>"/>
</div>
</div>
<?php else: ?>
<div class="cell2 col-lg-3 col-md-6 col-sm-6  col-xs-12"  style="background-color:transparent;">
&nbsp;
</div>
<?php endif; ?>
<div class="clearfix visible-sm-block visible-md-block visible-xs-block">
</div>
<?php
$showcolumn= $this->countModules('verh3');
?>
<?php if($showcolumn): ?>
<div class="cell3 col-lg-3 col-md-6 col-sm-6  col-xs-12">
<div class="headerabovecolumn3">
<jdoc:include type="modules" name="verh3" style="<?php if(($this->params->get('verh3') == 'block') || ($this->params->get('verh3') == Null)): echo "block"; else: echo "xhtml"; endif;?>"/>
</div>
</div>
<?php else: ?>
<div class="cell3 col-lg-3 col-md-6 col-sm-6  col-xs-12"  style="background-color:transparent;">
&nbsp;
</div>
<?php endif; ?>
<div class="clearfix visible-xs-block">
</div>
<?php
$showcolumn= $this->countModules('verh4');
?>
<?php if($showcolumn): ?>
<div class="cell4 col-lg-3 col-md-6 col-sm-6  col-xs-12">
<div class="headerabovecolumn4">
<jdoc:include type="modules" name="verh4" style="<?php if(($this->params->get('verh4') == 'block') || ($this->params->get('verh4') == Null)): echo "block"; else: echo "xhtml"; endif;?>"/>
</div>
</div>
<?php else: ?>
<div class="cell4 col-lg-3 col-md-6 col-sm-6  col-xs-12"  style="background-color:transparent;">
&nbsp;
</div>
<?php endif; ?>
<div class="clearfix visible-lg-block visible-sm-block visible-md-block visible-xs-block">
</div>
</div>
<div class="clearfix"></div>
<?php endif; ?>
</div>
<div style="height:0px;width:0px;overflow:hidden;-webkit-margin-top-collapse: separate;"></div>
<header id="ttr_header">
<div id="ttr_header_inner">
<?php if (($this->params->get('enable_site_Title')) || ($this->params->get('enable_site_Title') == Null)): ?>
<div class="ttr_title_position">
<?php $heading_tag = 'h3';
$temp = $this->params->get('Site_Title_Heading_Tag');
if($temp != Null)
$heading_tag = $temp;?>
<<?php echo $heading_tag; ?> class="ttr_title_style">
<a href="<?php echo $app->getCfg('live_site');?>">
<?php echo $this->params->get('Site_Title');?>
</a>
</<?php echo $heading_tag; ?>>
</div>
<?php endif; ?>
<?php if (($this->params->get('enable_site_slogan')) || ($this->params->get('enable_site_slogan') == Null)): ?>
<div class="ttr_slogan_position">
<?php $slogan_tag = 'h3';
$temp = $this->params->get('Site_Slogan_Heading_Tag');
if($temp != Null)
$slogan_tag = $temp;?>
<<?php echo $slogan_tag; ?> class="ttr_slogan_style">
<?php echo $this->params->get('Site_Slogan');?>
</div>
<?php endif; ?>
<div class="ttr_headershape01">
<div class="html_content"><p>&nbsp;</p></div>
</div>
<?php
$linkpath = $this->params->get('site_logo_navigation');
 if(!empty($linkpath) && $this->params->get('enable_site_logo') && $this->params->get('enable_site_logo_link'))
{
?>
<a class="logo" href=<?php echo $linkpath; ?> target="_self">
<?php } ?>
<?php if ($this->params->get('enable_site_logo')): ?>
<img <?php if($this->params->get('site_logo_Image')!=""):?> src="<?php echo $this->params->get('site_logo_Image');?>" <?php else: ?> src="<?php echo (JURI::base() . 'templates/' . $app->getTemplate().'/logo.png')?>" <?php endif; ?> class="ttr_header_logo" alt="logo" />
<?php endif; ?>
<?php if(!empty($linkpath) && $this->params->get('enable_site_logo_link'))
{ 
echo "</a>"; 
} ?>
<?php if (  $this->countModules('poisk')) : ?>
<div class=headerposition1>
<jdoc:include type="modules" name="poisk" style="<?php if(($this->params->get('poisk') == 'block') || ($this->params->get('poisk') == Null)): echo "block"; else: echo "xhtml"; endif;?>"/>
</div>
<?php endif; ?>
</div>
</header>
<div class="ttr_banner_header">
<?php
if(  $this->countModules('HBModulePosition00')||  $this->countModules('HBModulePosition01')||  $this->countModules('HBModulePosition02')||  $this->countModules('HBModulePosition03')):
?>
<div class="ttr_banner_header_inner_below0">
<?php
$showcolumn= $this->countModules('HBModulePosition00');
?>
<?php if($showcolumn): ?>
<div class="cell1 col-lg-3 col-md-6 col-sm-6  col-xs-12">
<div class="headerbelowcolumn1">
<jdoc:include type="modules" name="HBModulePosition00" style="<?php if(($this->params->get('hbmoduleposition00') == 'block') || ($this->params->get('hbmoduleposition00') == Null)): echo "block"; else: echo "xhtml"; endif;?>"/>
</div>
</div>
<?php else: ?>
<div class="cell1 col-lg-3 col-md-6 col-sm-6  col-xs-12"  style="background-color:transparent;">
&nbsp;
</div>
<?php endif; ?>
<div class="clearfix visible-xs-block">
</div>
<?php
$showcolumn= $this->countModules('HBModulePosition01');
?>
<?php if($showcolumn): ?>
<div class="cell2 col-lg-3 col-md-6 col-sm-6  col-xs-12">
<div class="headerbelowcolumn2">
<jdoc:include type="modules" name="HBModulePosition01" style="<?php if(($this->params->get('hbmoduleposition01') == 'block') || ($this->params->get('hbmoduleposition01') == Null)): echo "block"; else: echo "xhtml"; endif;?>"/>
</div>
</div>
<?php else: ?>
<div class="cell2 col-lg-3 col-md-6 col-sm-6  col-xs-12"  style="background-color:transparent;">
&nbsp;
</div>
<?php endif; ?>
<div class="clearfix visible-sm-block visible-md-block visible-xs-block">
</div>
<?php
$showcolumn= $this->countModules('HBModulePosition02');
?>
<?php if($showcolumn): ?>
<div class="cell3 col-lg-3 col-md-6 col-sm-6  col-xs-12">
<div class="headerbelowcolumn3">
<jdoc:include type="modules" name="HBModulePosition02" style="<?php if(($this->params->get('hbmoduleposition02') == 'block') || ($this->params->get('hbmoduleposition02') == Null)): echo "block"; else: echo "xhtml"; endif;?>"/>
</div>
</div>
<?php else: ?>
<div class="cell3 col-lg-3 col-md-6 col-sm-6  col-xs-12"  style="background-color:transparent;">
&nbsp;
</div>
<?php endif; ?>
<div class="clearfix visible-xs-block">
</div>
<?php
$showcolumn= $this->countModules('HBModulePosition03');
?>
<?php if($showcolumn): ?>
<div class="cell4 col-lg-3 col-md-6 col-sm-6  col-xs-12">
<div class="headerbelowcolumn4">
<jdoc:include type="modules" name="HBModulePosition03" style="<?php if(($this->params->get('hbmoduleposition03') == 'block') || ($this->params->get('hbmoduleposition03') == Null)): echo "block"; else: echo "xhtml"; endif;?>"/>
</div>
</div>
<?php else: ?>
<div class="cell4 col-lg-3 col-md-6 col-sm-6  col-xs-12"  style="background-color:transparent;">
&nbsp;
</div>
<?php endif; ?>
<div class="clearfix visible-lg-block visible-sm-block visible-md-block visible-xs-block">
</div>
</div>
<div class="clearfix"></div>
<?php endif; ?>
</div>
<div class="ttr_banner_menu">
<?php
if(  $this->countModules('MAModulePosition00')||  $this->countModules('MAModulePosition01')||  $this->countModules('MAModulePosition02')||  $this->countModules('MAModulePosition03')):
?>
<div class="ttr_banner_menu_inner_above0">
<?php
$showcolumn= $this->countModules('MAModulePosition00');
?>
<?php if($showcolumn): ?>
<div class="cell1 col-lg-3 col-md-6 col-sm-6  col-xs-12">
<div class="menuabovecolumn1">
<jdoc:include type="modules" name="MAModulePosition00" style="<?php if(($this->params->get('mamoduleposition00') == 'block') || ($this->params->get('mamoduleposition00') == Null)): echo "block"; else: echo "xhtml"; endif;?>"/>
</div>
</div>
<?php else: ?>
<div class="cell1 col-lg-3 col-md-6 col-sm-6  col-xs-12"  style="background-color:transparent;">
&nbsp;
</div>
<?php endif; ?>
<div class="clearfix visible-xs-block">
</div>
<?php
$showcolumn= $this->countModules('MAModulePosition01');
?>
<?php if($showcolumn): ?>
<div class="cell2 col-lg-3 col-md-6 col-sm-6  col-xs-12">
<div class="menuabovecolumn2">
<jdoc:include type="modules" name="MAModulePosition01" style="<?php if(($this->params->get('mamoduleposition01') == 'block') || ($this->params->get('mamoduleposition01') == Null)): echo "block"; else: echo "xhtml"; endif;?>"/>
</div>
</div>
<?php else: ?>
<div class="cell2 col-lg-3 col-md-6 col-sm-6  col-xs-12"  style="background-color:transparent;">
&nbsp;
</div>
<?php endif; ?>
<div class="clearfix visible-sm-block visible-md-block visible-xs-block">
</div>
<?php
$showcolumn= $this->countModules('MAModulePosition02');
?>
<?php if($showcolumn): ?>
<div class="cell3 col-lg-3 col-md-6 col-sm-6  col-xs-12">
<div class="menuabovecolumn3">
<jdoc:include type="modules" name="MAModulePosition02" style="<?php if(($this->params->get('mamoduleposition02') == 'block') || ($this->params->get('mamoduleposition02') == Null)): echo "block"; else: echo "xhtml"; endif;?>"/>
</div>
</div>
<?php else: ?>
<div class="cell3 col-lg-3 col-md-6 col-sm-6  col-xs-12"  style="background-color:transparent;">
&nbsp;
</div>
<?php endif; ?>
<div class="clearfix visible-xs-block">
</div>
<?php
$showcolumn= $this->countModules('MAModulePosition03');
?>
<?php if($showcolumn): ?>
<div class="cell4 col-lg-3 col-md-6 col-sm-6  col-xs-12">
<div class="menuabovecolumn4">
<jdoc:include type="modules" name="MAModulePosition03" style="<?php if(($this->params->get('mamoduleposition03') == 'block') || ($this->params->get('mamoduleposition03') == Null)): echo "block"; else: echo "xhtml"; endif;?>"/>
</div>
</div>
<?php else: ?>
<div class="cell4 col-lg-3 col-md-6 col-sm-6  col-xs-12"  style="background-color:transparent;">
&nbsp;
</div>
<?php endif; ?>
<div class="clearfix visible-lg-block visible-sm-block visible-md-block visible-xs-block">
</div>
</div>
<div class="clearfix"></div>
<?php endif; ?>
</div>
<div style="height:0px;width:0px;overflow:hidden;-webkit-margin-top-collapse: separate;"></div>
<?php if ($this->countModules('Menu')):?>
<nav id="ttr_menu" class="navbar-default navbar">
<div id="ttr_menu_inner_in">
<div class="menuforeground">
</div>
<div id="navigationmenu">
<div class="navbar-header">
<button id="nav-expander" data-target=".nav-menu" data-toggle="collapse" class="navbar-toggle" type="button">
<span class="sr-only">
</span>
<span class="icon-bar">
</span>
<span class="icon-bar">
</span>
<span class="icon-bar">
</span>
</button>
</div>
<div class="menu-center collapse navbar-collapse nav-menu">
<jdoc:include type="modules" name="Menu" style="none"/>
</div>
</div>
</div>
</nav>
<?php endif; ?>
<div class="ttr_banner_menu">
<?php
if(  $this->countModules('MBModulePosition00')||  $this->countModules('MBModulePosition01')||  $this->countModules('MBModulePosition02')||  $this->countModules('MBModulePosition03')):
?>
<div class="ttr_banner_menu_inner_below0">
<?php
$showcolumn= $this->countModules('MBModulePosition00');
?>
<?php if($showcolumn): ?>
<div class="cell1 col-lg-3 col-md-6 col-sm-6  col-xs-12">
<div class="menubelowcolumn1">
<jdoc:include type="modules" name="MBModulePosition00" style="<?php if(($this->params->get('mbmoduleposition00') == 'block') || ($this->params->get('mbmoduleposition00') == Null)): echo "block"; else: echo "xhtml"; endif;?>"/>
</div>
</div>
<?php else: ?>
<div class="cell1 col-lg-3 col-md-6 col-sm-6  col-xs-12"  style="background-color:transparent;">
&nbsp;
</div>
<?php endif; ?>
<div class="clearfix visible-xs-block">
</div>
<?php
$showcolumn= $this->countModules('MBModulePosition01');
?>
<?php if($showcolumn): ?>
<div class="cell2 col-lg-3 col-md-6 col-sm-6  col-xs-12">
<div class="menubelowcolumn2">
<jdoc:include type="modules" name="MBModulePosition01" style="<?php if(($this->params->get('mbmoduleposition01') == 'block') || ($this->params->get('mbmoduleposition01') == Null)): echo "block"; else: echo "xhtml"; endif;?>"/>
</div>
</div>
<?php else: ?>
<div class="cell2 col-lg-3 col-md-6 col-sm-6  col-xs-12"  style="background-color:transparent;">
&nbsp;
</div>
<?php endif; ?>
<div class="clearfix visible-sm-block visible-md-block visible-xs-block">
</div>
<?php
$showcolumn= $this->countModules('MBModulePosition02');
?>
<?php if($showcolumn): ?>
<div class="cell3 col-lg-3 col-md-6 col-sm-6  col-xs-12">
<div class="menubelowcolumn3">
<jdoc:include type="modules" name="MBModulePosition02" style="<?php if(($this->params->get('mbmoduleposition02') == 'block') || ($this->params->get('mbmoduleposition02') == Null)): echo "block"; else: echo "xhtml"; endif;?>"/>
</div>
</div>
<?php else: ?>
<div class="cell3 col-lg-3 col-md-6 col-sm-6  col-xs-12"  style="background-color:transparent;">
&nbsp;
</div>
<?php endif; ?>
<div class="clearfix visible-xs-block">
</div>
<?php
$showcolumn= $this->countModules('MBModulePosition03');
?>
<?php if($showcolumn): ?>
<div class="cell4 col-lg-3 col-md-6 col-sm-6  col-xs-12">
<div class="menubelowcolumn4">
<jdoc:include type="modules" name="MBModulePosition03" style="<?php if(($this->params->get('mbmoduleposition03') == 'block') || ($this->params->get('mbmoduleposition03') == Null)): echo "block"; else: echo "xhtml"; endif;?>"/>
</div>
</div>
<?php else: ?>
<div class="cell4 col-lg-3 col-md-6 col-sm-6  col-xs-12"  style="background-color:transparent;">
&nbsp;
</div>
<?php endif; ?>
<div class="clearfix visible-lg-block visible-sm-block visible-md-block visible-xs-block">
</div>
</div>
<div class="clearfix"></div>
<?php endif; ?>
</div>
<div id="ttr_page"  class="container">
<div id="ttr_content_and_sidebar_container">
<div id="ttr_content">
<div id="ttr_content_margin">
<div style="height:0px;width:0px;overflow:hidden;-webkit-margin-top-collapse: separate;"></div>
<?php
if(  $this->countModules('CAModulePosition00')||  $this->countModules('CAModulePosition01')||  $this->countModules('CAModulePosition02')||  $this->countModules('CAModulePosition03')):
?>
<div class="contenttopcolumn0">
<?php
$showcolumn= $this->countModules('CAModulePosition00');
?>
<?php if($showcolumn): ?>
<div class="cell1 col-lg-3 col-md-6 col-sm-6  col-xs-12">
<div class="topcolumn1">
<jdoc:include type="modules" name="CAModulePosition00" style="<?php if(($this->params->get('camoduleposition00') == 'block') || ($this->params->get('camoduleposition00') == Null)): echo "block"; else: echo "xhtml"; endif;?>"/>
</div>
</div>
<?php else: ?>
<div class="cell1 col-lg-3 col-md-6 col-sm-6  col-xs-12"  style="background-color:transparent;">
&nbsp;
</div>
<?php endif; ?>
<div class="clearfix visible-xs-block">
</div>
<?php
$showcolumn= $this->countModules('CAModulePosition01');
?>
<?php if($showcolumn): ?>
<div class="cell2 col-lg-3 col-md-6 col-sm-6  col-xs-12">
<div class="topcolumn2">
<jdoc:include type="modules" name="CAModulePosition01" style="<?php if(($this->params->get('camoduleposition01') == 'block') || ($this->params->get('camoduleposition01') == Null)): echo "block"; else: echo "xhtml"; endif;?>"/>
</div>
</div>
<?php else: ?>
<div class="cell2 col-lg-3 col-md-6 col-sm-6  col-xs-12"  style="background-color:transparent;">
&nbsp;
</div>
<?php endif; ?>
<div class="clearfix visible-sm-block visible-md-block visible-xs-block">
</div>
<?php
$showcolumn= $this->countModules('CAModulePosition02');
?>
<?php if($showcolumn): ?>
<div class="cell3 col-lg-3 col-md-6 col-sm-6  col-xs-12">
<div class="topcolumn3">
<jdoc:include type="modules" name="CAModulePosition02" style="<?php if(($this->params->get('camoduleposition02') == 'block') || ($this->params->get('camoduleposition02') == Null)): echo "block"; else: echo "xhtml"; endif;?>"/>
</div>
</div>
<?php else: ?>
<div class="cell3 col-lg-3 col-md-6 col-sm-6  col-xs-12"  style="background-color:transparent;">
&nbsp;
</div>
<?php endif; ?>
<div class="clearfix visible-xs-block">
</div>
<?php
$showcolumn= $this->countModules('CAModulePosition03');
?>
<?php if($showcolumn): ?>
<div class="cell4 col-lg-3 col-md-6 col-sm-6  col-xs-12">
<div class="topcolumn4">
<jdoc:include type="modules" name="CAModulePosition03" style="<?php if(($this->params->get('camoduleposition03') == 'block') || ($this->params->get('camoduleposition03') == Null)): echo "block"; else: echo "xhtml"; endif;?>"/>
</div>
</div>
<?php else: ?>
<div class="cell4 col-lg-3 col-md-6 col-sm-6  col-xs-12"  style="background-color:transparent;">
&nbsp;
</div>
<?php endif; ?>
<div class="clearfix visible-lg-block visible-sm-block visible-md-block visible-xs-block">
</div>
</div>
<div class="clearfix"></div>
<?php endif; ?>
<jdoc:include type="message" style="width:100%;"/>
<jdoc:include type="component" />
<?php
if(  $this->countModules('CBModulePosition00')||  $this->countModules('CBModulePosition01')||  $this->countModules('CBModulePosition02')||  $this->countModules('CBModulePosition03')):
?>
<div class="contentbottomcolumn0">
<?php
$showcolumn= $this->countModules('CBModulePosition00');
?>
<?php if($showcolumn): ?>
<div class="cell1 col-lg-3 col-md-6 col-sm-6  col-xs-12">
<div class="bottomcolumn1">
<jdoc:include type="modules" name="CBModulePosition00" style="<?php if(($this->params->get('cbmoduleposition00') == 'block') || ($this->params->get('cbmoduleposition00') == Null)): echo "block"; else: echo "xhtml"; endif;?>"/>
</div>
</div>
<?php else: ?>
<div class="cell1 col-lg-3 col-md-6 col-sm-6  col-xs-12"  style="background-color:transparent;">
&nbsp;
</div>
<?php endif; ?>
<div class="clearfix visible-xs-block">
</div>
<?php
$showcolumn= $this->countModules('CBModulePosition01');
?>
<?php if($showcolumn): ?>
<div class="cell2 col-lg-3 col-md-6 col-sm-6  col-xs-12">
<div class="bottomcolumn2">
<jdoc:include type="modules" name="CBModulePosition01" style="<?php if(($this->params->get('cbmoduleposition01') == 'block') || ($this->params->get('cbmoduleposition01') == Null)): echo "block"; else: echo "xhtml"; endif;?>"/>
</div>
</div>
<?php else: ?>
<div class="cell2 col-lg-3 col-md-6 col-sm-6  col-xs-12"  style="background-color:transparent;">
&nbsp;
</div>
<?php endif; ?>
<div class="clearfix visible-sm-block visible-md-block visible-xs-block">
</div>
<?php
$showcolumn= $this->countModules('CBModulePosition02');
?>
<?php if($showcolumn): ?>
<div class="cell3 col-lg-3 col-md-6 col-sm-6  col-xs-12">
<div class="bottomcolumn3">
<jdoc:include type="modules" name="CBModulePosition02" style="<?php if(($this->params->get('cbmoduleposition02') == 'block') || ($this->params->get('cbmoduleposition02') == Null)): echo "block"; else: echo "xhtml"; endif;?>"/>
</div>
</div>
<?php else: ?>
<div class="cell3 col-lg-3 col-md-6 col-sm-6  col-xs-12"  style="background-color:transparent;">
&nbsp;
</div>
<?php endif; ?>
<div class="clearfix visible-xs-block">
</div>
<?php
$showcolumn= $this->countModules('CBModulePosition03');
?>
<?php if($showcolumn): ?>
<div class="cell4 col-lg-3 col-md-6 col-sm-6  col-xs-12">
<div class="bottomcolumn4">
<jdoc:include type="modules" name="CBModulePosition03" style="<?php if(($this->params->get('cbmoduleposition03') == 'block') || ($this->params->get('cbmoduleposition03') == Null)): echo "block"; else: echo "xhtml"; endif;?>"/>
</div>
</div>
<?php else: ?>
<div class="cell4 col-lg-3 col-md-6 col-sm-6  col-xs-12"  style="background-color:transparent;">
&nbsp;
</div>
<?php endif; ?>
<div class="clearfix visible-lg-block visible-sm-block visible-md-block visible-xs-block">
</div>
</div>
<div class="clearfix"></div>
<?php endif; ?>
<div style="height:0px;width:0px;overflow:hidden;-webkit-margin-top-collapse: separate;"></div>
</div>
</div>
<div style="clear:both;">
</div>
</div>
<div class="footer-widget-area">
<div class="footer-widget-area_inner">
<?php
if(  $this->countModules('FAModulePosition00')||  $this->countModules('FAModulePosition01')||  $this->countModules('FAModulePosition02')||  $this->countModules('FAModulePosition03')):
?>
<div class="ttr_footer-widget-area_inner_above0">
<?php
$showcolumn= $this->countModules('FAModulePosition00');
?>
<?php if($showcolumn): ?>
<div class="cell1 col-lg-3 col-md-6 col-sm-6  col-xs-12">
<div class="footerabovecolumn1">
<jdoc:include type="modules" name="FAModulePosition00" style="<?php if(($this->params->get('famoduleposition00') == 'block') || ($this->params->get('famoduleposition00') == Null)): echo "block"; else: echo "xhtml"; endif;?>"/>
</div>
</div>
<?php else: ?>
<div class="cell1 col-lg-3 col-md-6 col-sm-6  col-xs-12"  style="background-color:transparent;">
&nbsp;
</div>
<?php endif; ?>
<div class="clearfix visible-xs-block">
</div>
<?php
$showcolumn= $this->countModules('FAModulePosition01');
?>
<?php if($showcolumn): ?>
<div class="cell2 col-lg-3 col-md-6 col-sm-6  col-xs-12">
<div class="footerabovecolumn2">
<jdoc:include type="modules" name="FAModulePosition01" style="<?php if(($this->params->get('famoduleposition01') == 'block') || ($this->params->get('famoduleposition01') == Null)): echo "block"; else: echo "xhtml"; endif;?>"/>
</div>
</div>
<?php else: ?>
<div class="cell2 col-lg-3 col-md-6 col-sm-6  col-xs-12"  style="background-color:transparent;">
&nbsp;
</div>
<?php endif; ?>
<div class="clearfix visible-sm-block visible-md-block visible-xs-block">
</div>
<?php
$showcolumn= $this->countModules('FAModulePosition02');
?>
<?php if($showcolumn): ?>
<div class="cell3 col-lg-3 col-md-6 col-sm-6  col-xs-12">
<div class="footerabovecolumn3">
<jdoc:include type="modules" name="FAModulePosition02" style="<?php if(($this->params->get('famoduleposition02') == 'block') || ($this->params->get('famoduleposition02') == Null)): echo "block"; else: echo "xhtml"; endif;?>"/>
</div>
</div>
<?php else: ?>
<div class="cell3 col-lg-3 col-md-6 col-sm-6  col-xs-12"  style="background-color:transparent;">
&nbsp;
</div>
<?php endif; ?>
<div class="clearfix visible-xs-block">
</div>
<?php
$showcolumn= $this->countModules('FAModulePosition03');
?>
<?php if($showcolumn): ?>
<div class="cell4 col-lg-3 col-md-6 col-sm-6  col-xs-12">
<div class="footerabovecolumn4">
<jdoc:include type="modules" name="FAModulePosition03" style="<?php if(($this->params->get('famoduleposition03') == 'block') || ($this->params->get('famoduleposition03') == Null)): echo "block"; else: echo "xhtml"; endif;?>"/>
</div>
</div>
<?php else: ?>
<div class="cell4 col-lg-3 col-md-6 col-sm-6  col-xs-12"  style="background-color:transparent;">
&nbsp;
</div>
<?php endif; ?>
<div class="clearfix visible-lg-block visible-sm-block visible-md-block visible-xs-block">
</div>
</div>
<div class="clearfix"></div>
<?php endif; ?>
</div>
</div>
<div style="height:0px;width:0px;overflow:hidden;-webkit-margin-top-collapse: separate;"></div>
<footer id="ttr_footer">
<div id="ttr_footer_top_for_widgets">
<div class="ttr_footer_top_for_widgets_inner">
<?php 
if($this->countModules('LeftFooterArea') || $this->countModules('CenterFooterArea') || $this->countModules('RightFooterArea')):
?>
<div class="footer-widget-area_fixed">
<div style="margin:0 auto;">
<?php if($this->countModules('LeftFooterArea')): ?>
<div id="first" class="widget-area col-lg-4 col-md-4 col-sm-4 col-xs-12">
<jdoc:include type="modules" name="LeftFooterArea" style="<?php if(($this->params->get('leftfooterarea') == 'block') || ($this->params->get('leftfooterarea') == Null)): echo "block"; else: echo "xhtml"; endif;?>"/>
</div>
<div class="clearfix visible-xs"></div>
<?php else: ?>
<div id="first" class="widget-area  col-lg-4 col-md-4 col-sm-4 col-xs-12 ">
&nbsp;
</div>
<div class="clearfix visible-xs"></div>
<?php endif; ?>
<?php if($this->countModules('CenterFooterArea')): ?>
<div id="second" class="widget-area  col-lg-4 col-md-4 col-sm-4 col-xs-12">
<jdoc:include type="modules" name="CenterFooterArea" style="<?php if(($this->params->get('centerfooterarea') == 'block') || ($this->params->get('centerfooterarea') == Null)): echo "block"; else: echo "xhtml"; endif;?>"/>
</div>
<div class="clearfix visible-xs"></div>
<?php else: ?>
<div id="second" class="widget-area  col-lg-4 col-md-4 col-sm-4 col-xs-12">
&nbsp;
</div>
<div class="clearfix visible-xs"></div>
<?php endif; ?>
<?php if($this->countModules('RightFooterArea')): ?>
<div id="third" class="widget-area  col-lg-4 col-md-4 col-sm-4 col-xs-12">
<jdoc:include type="modules" name="RightFooterArea" style="<?php if(($this->params->get('rightfooterarea') == 'block') || ($this->params->get('rightfooterarea') == Null)): echo "block"; else: echo "xhtml"; endif;?>"/>
</div>
<div class="clearfix visible-lg visible-md visible-sm visible-xs"></div>
<?php else: ?>
<div id="third" class="widget-area  col-lg-4 col-md-4 col-sm-4 col-xs-12">
&nbsp;
</div>
<div class="clearfix visible-lg visible-md visible-sm visible-xs"></div>
<?php endif; ?>
</div>
</div>
<?php endif; ?>
</div>
</div>
<div class="ttr_footer_bottom_footer">
<div class="ttr_footer_bottom_footer_inner">
<?php if (($this->params->get('enable_Designed_By')) || ($this->params->get('enable_Designed_By') == Null)): ?>
<div id="ttr_footer_designed_by_links">
<a <?php if ($this->params->get('Designed_By')): ?> href="<?php echo $this->params->get('Designed_By');?>"<?php else: ?> href="<?php echo $app->getCfg('live_site');?>"<?php endif; ?> >
Joomla Template
</a>
<span id="ttr_footer_designed_by">
Designed With TemplateToaster
</span>
</div>
<?php endif; ?>
<?php if (($this->params->get('enable_facebook_icon')) || ($this->params->get('enable_facebook_icon') == Null)): ?>
<a target="_self" href="<?php echo $this->params->get('facebook_Url');?>">
<img <?php if($this->params->get('facebook_icon_Image')!=""):?> src="<?php echo $this->params->get('facebook_icon_Image');?>" <?php else:?> src="<?php echo (JURI::base() . 'templates/' . $app->getTemplate().'/images/footerfacebook.png')?>" <?php endif; ?> alt="footerfacebook" class="ttr_footer_facebook"/>
</a>
<?php endif; ?>
</div>
</div>
</footer>
<div style="height:0px;width:0px;overflow:hidden;-webkit-margin-top-collapse: separate;"></div>
<div class="footer-widget-area">
<div class="footer-widget-area_inner">
<?php
if(  $this->countModules('FBModulePosition00')||  $this->countModules('FBModulePosition01')||  $this->countModules('FBModulePosition02')||  $this->countModules('FBModulePosition03')):
?>
<div class="ttr_footer-widget-area_inner_below0">
<?php
$showcolumn= $this->countModules('FBModulePosition00');
?>
<?php if($showcolumn): ?>
<div class="cell1 col-lg-3 col-md-6 col-sm-6  col-xs-12">
<div class="footerbelowcolumn1">
<jdoc:include type="modules" name="FBModulePosition00" style="<?php if(($this->params->get('fbmoduleposition00') == 'block') || ($this->params->get('fbmoduleposition00') == Null)): echo "block"; else: echo "xhtml"; endif;?>"/>
</div>
</div>
<?php else: ?>
<div class="cell1 col-lg-3 col-md-6 col-sm-6  col-xs-12"  style="background-color:transparent;">
&nbsp;
</div>
<?php endif; ?>
<div class="clearfix visible-xs-block">
</div>
<?php
$showcolumn= $this->countModules('FBModulePosition01');
?>
<?php if($showcolumn): ?>
<div class="cell2 col-lg-3 col-md-6 col-sm-6  col-xs-12">
<div class="footerbelowcolumn2">
<jdoc:include type="modules" name="FBModulePosition01" style="<?php if(($this->params->get('fbmoduleposition01') == 'block') || ($this->params->get('fbmoduleposition01') == Null)): echo "block"; else: echo "xhtml"; endif;?>"/>
</div>
</div>
<?php else: ?>
<div class="cell2 col-lg-3 col-md-6 col-sm-6  col-xs-12"  style="background-color:transparent;">
&nbsp;
</div>
<?php endif; ?>
<div class="clearfix visible-sm-block visible-md-block visible-xs-block">
</div>
<?php
$showcolumn= $this->countModules('FBModulePosition02');
?>
<?php if($showcolumn): ?>
<div class="cell3 col-lg-3 col-md-6 col-sm-6  col-xs-12">
<div class="footerbelowcolumn3">
<jdoc:include type="modules" name="FBModulePosition02" style="<?php if(($this->params->get('fbmoduleposition02') == 'block') || ($this->params->get('fbmoduleposition02') == Null)): echo "block"; else: echo "xhtml"; endif;?>"/>
</div>
</div>
<?php else: ?>
<div class="cell3 col-lg-3 col-md-6 col-sm-6  col-xs-12"  style="background-color:transparent;">
&nbsp;
</div>
<?php endif; ?>
<div class="clearfix visible-xs-block">
</div>
<?php
$showcolumn= $this->countModules('FBModulePosition03');
?>
<?php if($showcolumn): ?>
<div class="cell4 col-lg-3 col-md-6 col-sm-6  col-xs-12">
<div class="footerbelowcolumn4">
<jdoc:include type="modules" name="FBModulePosition03" style="<?php if(($this->params->get('fbmoduleposition03') == 'block') || ($this->params->get('fbmoduleposition03') == Null)): echo "block"; else: echo "xhtml"; endif;?>"/>
</div>
</div>
<?php else: ?>
<div class="cell4 col-lg-3 col-md-6 col-sm-6  col-xs-12"  style="background-color:transparent;">
&nbsp;
</div>
<?php endif; ?>
<div class="clearfix visible-lg-block visible-sm-block visible-md-block visible-xs-block">
</div>
</div>
<div class="clearfix"></div>
<?php endif; ?>
</div>
</div>
</div>
<?php if ($this->countModules('debug')){ ?>
<jdoc:include type="modules" name="debug" style="<?php if(($this->params->get('debug') == 'block') || ($this->params->get('debug') == Null)): echo "block"; else: echo "xhtml"; endif;?>"/>
<?php } ?>
<script type="text/javascript">
WebFontConfig = {
google: { families: [ 'Montserrat','Kurale::cyrillic'] }
};
(function() {
var wf = document.createElement('script');
wf.src = ('https:' == document.location.protocol ? 'https' : 'http') + '://ajax.googleapis.com/ajax/libs/webfont/1.0.31/webfont.js';
wf.type = 'text/javascript';
wf.async = 'true';
var s = document.getElementsByTagName('script')[0];
s.parentNode.insertBefore(wf, s);
})();
</script>
</body>
</html>
