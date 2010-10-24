<?php //netteCache[01]000232a:2:{s:4:"time";s:21:"0.61773400 1287924252";s:9:"callbacks";a:1:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:62:"D:\WWW\SDS\document_root/../app/templates/Eventlist/show.phtml";i:2;i:1287924209;}}}?><?php
// file …/templates/Eventlist/show.phtml
//

$_l = Nette\Templates\LatteMacros::initRuntime($template, NULL, '3c976ff025'); unset($_extends);


//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lbf3863caaec_content')) { function _lbf3863caaec_content($_l, $_args) { extract($_args)
?>

<div class="day">
    <div class="day_name">
        <div class="day_num">26.10</div>
        <div class="day_text">
            PO
        </div>
        <div class="day_text2">
<?php if ($user->isLoggedIn()): ?>
            <a href="<?php echo Nette\Templates\TemplateHelpers::escapeHtml($control->link("Eventlist:add")) ?>" title="Nová událost"  class="ajax day_text2">vložit</a>
<?php endif ?>
        </div>
    </div>
<?php if (count($events) > 0): foreach ($iterator = $_l->its[] = new Nette\SmartCachingIterator($events) as $event): ?>
    <div class="description">

    	<div class="head">
            <img src="<?php echo Nette\Templates\TemplateHelpers::escapeHtml($basePath) ?>/images/hodiny.png" class="time" alt="cas" /> <?php echo Nette\Templates\TemplateHelpers::escapeHtml($event->event_date->format("H:i")) ?>

            <span class="predmet"><?php echo Nette\Templates\TemplateHelpers::escapeHtml($event->Subject->name) ?></span>
            <span class="obor">
<?php foreach ($iterator = $_l->its[] = new Nette\SmartCachingIterator($event->Subject->Specialization) as $specs): ?>
                    <?php echo Nette\Templates\TemplateHelpers::escapeHtml($specs->shortcut) ?>

                    <?php if (!$iterator->isLast()): ?>,<?php endif ?>

<?php endforeach; array_pop($_l->its); $iterator = end($_l->its) ?>
                - <?php echo Nette\Templates\TemplateHelpers::escapeHtml($event->Subject->Specialization[0]->type) ?>

            </span>
        </div>
        <div class="body_text"><?php echo Nette\Templates\TemplateHelpers::escapeHtml($event->text) ?></div>
        <div class="foot">
            <img src="<?php echo Nette\Templates\TemplateHelpers::escapeHtml($basePath) ?>/images/icon_tech.png" width="25" height="25" alt="Student" title="Učitel" class="textbottom" /><a href="#" title="#" class="username">Mgr. Adam Dvořák</a>
            <a href="#" title="Upozornění na e-mail" class="icons"><img src="<?php echo Nette\Templates\TemplateHelpers::escapeHtml($basePath) ?>/images/mail.png" class="textbottom" alt="mail" /></a>
            <a href="#" title="Editace" class="icons2"><img src="<?php echo Nette\Templates\TemplateHelpers::escapeHtml($basePath) ?>/images/edit-icon.png" class="textbottom" alt="edit" /></a>
            <a href="#" title="Odstranit" class="icons2"><img src="<?php echo Nette\Templates\TemplateHelpers::escapeHtml($basePath) ?>/images/delete.png" class="textbottom" alt="smazat" /></a>
        </div>
    </div>
<?php endforeach; array_pop($_l->its); $iterator = end($_l->its) ;else: ?>
    <p>Nic tu není.</p>
<?php endif ?>
</div>
<div class="clear"></div>

<?php
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
