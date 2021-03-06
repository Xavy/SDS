<?php //netteCache[01]000225a:2:{s:4:"time";s:21:"0.68774900 1287921395";s:9:"callbacks";a:1:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:55:"D:\WWW\SDS\document_root/../app/templates/@layout.phtml";i:2;i:1287921391;}}}?><?php
// file …/templates/@layout.phtml
//

$_l = Nette\Templates\LatteMacros::initRuntime($template, NULL, 'ff84c93c85'); unset($_extends);


//
// block header
//
if (!function_exists($_l->blocks['header'][] = '_lb2d3e03eaca_header')) { function _lb2d3e03eaca_header($_l, $_args) { extract($_args)
;
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
    <title>SDS - systém důležitých sdělení TUL</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name='Description' content='' />
    <meta name='Keywords' content='' />
    <meta name='robots' content='all, follow' />
    <link rel="stylesheet" href="<?php echo Nette\Templates\TemplateHelpers::escapeHtml($basePath) ?>/css/layout.css" type="text/css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Nette\Templates\TemplateHelpers::escapeHtml($basePath) ?>/css/reset-min.css" />
    <script type="text/javascript" src="<?php echo Nette\Templates\TemplateHelpers::escapeHtml($basePath) ?>/scripts/netteForm.js"></script>
    <script type="text/javascript" src="<?php echo Nette\Templates\TemplateHelpers::escapeHtml($basePath) ?>/scripts/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo Nette\Templates\TemplateHelpers::escapeHtml($basePath) ?>/scripts/jquery-ui.min.js"></script>
    <link type="text/css" href="<?php echo Nette\Templates\TemplateHelpers::escapeHtml($basePath) ?>/css/redmond/jquery-ui-1.8.5.custom.css" rel="stylesheet" />
    <script type="text/javascript" src="<?php echo Nette\Templates\TemplateHelpers::escapeHtml($basePath) ?>/scripts/init.js"></script>
    <?php if (!$_l->extends) { call_user_func(reset($_l->blocks['header']), $_l, get_defined_vars()); } ?>

</head>
<body>
   <div id="topbar">
      <ul>
            <li><a href="main.htm" title="">Fakulta mechatroniky</a></li>
            <li><a href="#" title="">Bakalářské obory</a>
                <ul>
                    <li><a href="#" title="Elektronické informační a řídící systémy">El. informační a řídící systémy</a></li>
                    <li><a href="#" title="Informatika a logistika">Informatika a logistika</a></li>
                    <li><a href="#" title="Informační technologie">Informační technologie</a></li>
                    <li><a href="#" title="Modelování a informatika">Modelování a informatika</a></li>
                    <li class="last"><a href="#" title="Nanomateriály">Nanomateriály</a></li>
                </ul>
            </li>
            <li><a href="#" title="">Magisterské obory</a>
            	<ul>
                    <li><a href="#" title="Automatické řízení a inženýrská informatika">Automat. řízení a inž. informatika</a></li>
                    <li><a href="#" title="Mechatronika">Mechatronika</a></li>
                    <li><a href="#" title="Informační technologie">Informační technologie</a></li>
                    <li><a href="#" title="Přírodovědné inženýrství">Přírodovědné inženýrství</a></li>
                    <li><a href="#" title="Engineering of Interactive Systems">Engineering of Interactive Systems</a></li>
                    <li class="last"><a href="#" title="Nanomateriály">Nanomateriály</a></li>
           	    </ul>
            </li>
            <li><a href="#" title="">Doktorské obory</a>
            	<ul>
                	<li><a href="#" title="Technická informatika">Technická informatika</a></li>
                    <li class="last"><a href="#" title="Přírodovědné inženýrství">Přírodovědné inženýrství</a></li>
                </ul>
            </li>
            <li><a href="#" title="">Uživatel</a>
                <ul>
                    <li><a href="registration.htm" title="">Registrace</a></li>
                    <li><a href="#" title="">Nastavení účtu</a></li>
                </ul>
            </li>
            <li class="last"><a href="#" title="">O službě</a>
                <ul>
                    <li><a href="#" title="">Základní informace</a></li>
                    <li><a href="#" title="">Kontakty</a></li>
                    <li class="last"><a href="#" title="">Nápověda</a></li>

                </ul>
            </li>
        </ul>
   </div>

   <div id="root">
      <div id="left">
        <?php foreach ($iterator = $_l->its[] = new Nette\SmartCachingIterator($flashes) as $flash): ?><div class="flash <?php echo Nette\Templates\TemplateHelpers::escapeHtml($flash->type) ?>"><?php echo Nette\Templates\TemplateHelpers::escapeHtml($flash->message) ?></div><?php endforeach; array_pop($_l->its); $iterator = end($_l->its) ?>

<?php Nette\Templates\LatteMacros::callBlock($_l, 'content', $template->getParams()) ?>
        </div>
        <div id="right">
          <div id="logo"></div>
            <div id="right_top">
              <div class="right_nadpis">Uživatelské rozhraní</div>
<?php $control->getWidget("loginForm")->render() ?>
              </div>
              <div class="border"></div>
              <div id="right_bottom">
                <div class="mesic_nav">
                  <a href="#" title="předešlý" class="leva"> << </a>
                  <div class="stred"></div>
                  <a href="#" title="následující" class="prava"> >> </a>
                </div>
                <div class="clear"></div>
                <div class="cal">
                  <table class="cal_table">
                    <tr><th>Po</th><th>Út</th><th>St</th><th>Čt</th><th>Pá</th><th>So</th><th>Ne</th></tr>
                    <tr><td>29</td><td>30</td><td>31</td><td>1</td><td>2</td><td>3</td><td>4</td></tr>
                    <tr><td>5</td><td>6</td><td>7</td><td>8</td><td>9</td><td>10</td><td>11</td></tr>
                    <tr><td>12</td><td>13</td><td>14</td><td>15</td><td>16</td><td>17</td><td>18</td></tr>
                    <tr><td>19</td><td>20</td><td>21</td><td>22</td><td>23</td><td>24</td><td>25</td></tr>
                    <tr><td>26</td><td>27</td><td>28</td><td>29</td><td>30</td><td>1</td><td>2</td></tr>
                    <tr><td>3</td><td>4</td><td>5</td><td>6</td><td>7</td><td>8</td><td>9</td></tr>
                  </table>
                </div>
              </div>
              <div class="border"></div>
            </div>
          </div>
  <div id="footer">
    <div>
      <div class="left">
        © <a href="" title="SDS - systém důležitých sdělení TUL ">SDS - systém důležitých sdělení FM TUL</a> 2010. <span>All rights reserved.</span>
      </div>
      <div class="right">
        <a href="#" title="">Úvodní stránka</a>
        &nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;
        <a href="#" title="">Mapa stránek</a>
        &nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;
        <a href="#" title="">Kontakty</a>
      </div>
    </div>
  </div>
    <div id="addEventDiv"></div>
</body>
</html><?php
}

if ($_l->extends) { ob_end_clean(); Nette\Templates\LatteMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render(); }
