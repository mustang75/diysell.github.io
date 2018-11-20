<?php
/**
 * @package     Joomla.Site
 * @subpackage  Template
 *
 * @copyright   Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

$app             = JFactory::getApplication();
$doc             = JFactory::getDocument();
$this->language  = $doc->language;
$this->direction = $doc->direction;

// Add JavaScript Frameworks
// JHtml::_('bootstrap.framework');

JLoader::import( 'joomla.version' );
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
} 

if (version_compare( $version->RELEASE, "2.5", "<")) {
JHtml::_('jquery.ui');
}

// Add Stylesheets
////$doc->addStyleSheet('templates/' . $this->template . '/css/bootstrap.css');
if ($this->direction == 'rtl'){
$doc->addStyleSheet('templates/'.$this->template.'/css/template_rtl.css');
}else{
$doc->addStyleSheet('templates/'.$this->template.'/css/template.css');
}

// Load optional rtl Bootstrap css and Bootstrap bugfixes
if (version_compare( $version->RELEASE, "2.5", ">")) {
JHtmlBootstrap::loadCss($includeMaincss = false, $this->direction);
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
<jdoc:include type="head" />
<!--[if lt IE 9]>
	<script src="<?php echo $this->baseurl; ?>/media/jui/js/html5.js"></script>
<![endif]-->
</head>
<body class="contentpane">
	<jdoc:include type="message" />
	<jdoc:include type="component" />
</body>
</html>
