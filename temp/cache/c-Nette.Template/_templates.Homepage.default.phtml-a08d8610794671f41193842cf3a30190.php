<?php //netteCache[01]000234a:2:{s:4:"time";s:21:"0.24986700 1287327812";s:9:"callbacks";a:1:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:64:"D:\WWW\SDS\document_root/../app/templates/Homepage/default.phtml";i:2;i:1284556357;}}}?><?php
// file …/templates/Homepage/default.phtml
//

$_l = Nette\Templates\LatteMacros::initRuntime($template, NULL, '9c6aeedc9d'); unset($_extends);


//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lb22efb73935_content')) { function _lb22efb73935_content($_l, $_args) { extract($_args)
;
}}

//
// end of blocks
//

if ($_l->extends) { ob_start(); }
elseif (isset($presenter, $control) && $presenter->isAjax()) { Nette\Templates\LatteMacros::renderSnippets($control, $_l, get_defined_vars()); }

if (Nette\Templates\SnippetHelper::$outputAllowed) {
if (!$_l->extends) { call_user_func(reset($_l->blocks['content']), $_l, get_defined_vars()); }  
}

if ($_l->extends) { ob_end_clean(); Nette\Templates\LatteMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render(); }
