<?php //netteCache[01]000231a:2:{s:4:"time";s:21:"0.08672300 1287913959";s:9:"callbacks";a:1:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:61:"D:\WWW\SDS\document_root/../app/templates/Eventlist/add.phtml";i:2;i:1287913952;}}}?><?php
// file …/templates/Eventlist/add.phtml
//

$_l = Nette\Templates\LatteMacros::initRuntime($template, NULL, '036ce275b0'); unset($_extends);


//
// block _eventForm
//
if (!function_exists($_l->blocks['_eventForm'][] = '_lb6a02bbed66__eventForm')) { function _lb6a02bbed66__eventForm($_l, $_args) { extract($_args)
;$control->getWidget("eventForm")->render() ;
}}

//
// end of blocks
//

if ($_l->extends) { ob_start(); }
elseif (isset($presenter, $control) && $presenter->isAjax()) { Nette\Templates\LatteMacros::renderSnippets($control, $_l, get_defined_vars()); }

if (Nette\Templates\SnippetHelper::$outputAllowed) {
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script type="text/javascript" src="<?php echo Nette\Templates\TemplateHelpers::escapeHtml($basePath) ?>/scripts/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo Nette\Templates\TemplateHelpers::escapeHtml($basePath) ?>/scripts/jquery.ajaxForm.js"></script>
    <script type="text/javascript" src="<?php echo Nette\Templates\TemplateHelpers::escapeHtml($basePath) ?>/scripts/jquery.nette.dependentselectbox.js"></script>
    <script type="text/javascript" src="<?php echo Nette\Templates\TemplateHelpers::escapeHtml($basePath) ?>/scripts/jquery.nette.js"></script>
    <script type="text/javascript" src="<?php echo Nette\Templates\TemplateHelpers::escapeHtml($basePath) ?>/scripts/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="<?php echo Nette\Templates\TemplateHelpers::escapeHtml($basePath) ?>/css/modal.css" type="text/css" />
    <link type="text/css" href="<?php echo Nette\Templates\TemplateHelpers::escapeHtml($basePath) ?>/css/redmond/jquery-ui-1.8.5.custom.css" rel="stylesheet" />
    <script type="text/javascript" src="<?php echo Nette\Templates\TemplateHelpers::escapeHtml($basePath) ?>/scripts/addEvent.js"></script>
    <script type="text/javascript" src="<?php echo Nette\Templates\TemplateHelpers::escapeHtml($basePath) ?>/scripts/timepicker-cs.js"></script>
    <script type="text/javascript" src="<?php echo Nette\Templates\TemplateHelpers::escapeHtml($basePath) ?>/scripts/jquery.ui.datepicker-cs.js"></script>
</head>
<body>
<div id="<?php echo $control->getSnippetId('eventForm') ?>"><?php call_user_func(reset($_l->blocks['_eventForm']), $_l, $template->getParams()) ?></div></body>
</html><?php
}

if ($_l->extends) { ob_end_clean(); Nette\Templates\LatteMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render(); }
