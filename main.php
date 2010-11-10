<?php
/**
 * DokuWiki Arctic Template
 *
 * This is the template you need to change for the overall look
 * of DokuWiki.
 *
 * You should leave the doctype at the very top - It should
 * always be the very first line of a document.
 *
 * @author Andreas Gohr <andi@splitbrain.org>
 * @author Michael Klier <chi@chimeric.de>
 * @link   http://wiki.splitbrain.org/template:arctic
 * @link   http://chimeric.de/projects/dokuwiki/template/arctic
 */

// must be run from within DokuWiki
if (!defined('DOKU_INC')) die();

// include custom arctic template functions
require_once(dirname(__FILE__).'/tpl_functions.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $conf['lang']?>" lang="<?php echo $conf['lang']?>" dir="<?php echo $lang['direction']?>">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>
    <?php tpl_pagetitle()?> – <?php echo strip_tags($conf['title'])?>
  </title>

  <?php tpl_metaheaders()?>

  <link rel="shortcut icon" href="<?php echo DOKU_TPL?>images/favicon.ico" />

  <?php /*old includehook*/ @include(dirname(__FILE__).'/meta.html')?>

</head>
<body class="dw-<?php print tpl_getConf('sidebar'); ?>">
<a name="top"></a>
<?php /*old includehook*/ @include(dirname(__FILE__).'/topheader.html')?>

<div id="menubar" class="dokuwiki">
  <?php tpl_link(wl(),$conf['title'],'name="dokuwiki__top" accesskey="h" title="[ALT+H]" id="wikititle"')?>
    <div class="right-side">
      <div class="search-form">
        <?php tpl_searchform() ?>
      </div>
    <?php if(!tpl_getConf('hideactions') || tpl_getConf('hideactions') && isset($_SERVER['REMOTE_USER'])) { ?>
      <div class="action-menus">
   </div>
    <?php } ?>
  <div class="top-menu">
    <ul>
      <li><a href="/">Home</a></li>
      <li><a href="/doku.php?id=performauditprocedures:home">Perform Audit Procedures</a></li>
      <li><a href="/doku.php?id=audittemplates:home">Audit Tempates</a></li>
      <li><a href="/doku.php?id=projectmanagement:home">Project Management</a></li>
      <li><a href="/doku.php?id=firm-departmentmanagement:home">Firm/Department Mangement</a></li>
    </ul>
  </div>
   </div>

</div>

<div id="wrapper" class="dokuwiki">

  <?php /*old includehook*/ @include(dirname(__FILE__).'/header.html')?>

  <?php /*old includehook*/ @include(dirname(__FILE__).'/pageheader.html')?>

  <?php flush()?>

  <?php if(tpl_getConf('sidebar') == 'left') { ?>

  <?php if(!tpl_sidebar_hide()) { ?>
    <div class="left-sidebar">
      <div class="menu">
        <?php// render_navigation(":menu");?>
        <?php html_navigate(); ?>
      </div>
          <?php //tpl_sidebar('left') ?>
    </div>
    <div class="right-page<?php echo $ID == 'start' ? ' start-page' : '' ?>">
      <?php if(tpl_getConf('trace')) {?> 
        <div id="trail">
          <?php ($conf['youarehere'] != 1) ? tpl_breadcrumbs('') : tpl_youarehere('»');?>
        </div>
      <?php } ?>

    <?php html_msgarea()?>
        
          <div id="page"><?php ($notoc) ? tpl_content(false) : tpl_content() ?>
	
			<div class="meta">
			  <div class="user">
			  <?php tpl_userinfo()?>
			  </div>
			  <div class="doc">
			  <?php tpl_pageinfo()?>
			  </div>
			</div>
	               
	               <div class="action-buttons">  
	               <ul>
	                 <?php if(!plugin_isdisabled('npd') && ($npd =& plugin_load('helper', 'npd'))) { ?><li><?php $npd->html_new_page_button(); ?></li><?php } ?>
                        <li><?php tpl_actionlink('edit'); ?></li>
                        <li><?php tpl_actionlink('history'); ?></li>
                        <li class="to-top"><a href="#top">Back to top</a></li>
                      </ul>
                    </div>
	</div>
        </div>
      <?php } else { ?>
        <div  id="page" class="page">
          <?php tpl_content()?> 
        </div> 
      <?php } ?>

    <?php } elseif(tpl_getConf('sidebar') == 'right') { ?>

      <?php if(!tpl_sidebar_hide()) { ?>
        <div class="left-page">
 <div id="page"><?php ($notoc) ? tpl_content(false) : tpl_content() ?></div>
        </div>
        <div class="right-sidebar">
			<div class="menu">
		  		<?php render_navigation(":menu");?>
			</div>
          <?php tpl_sidebar('right') ?>
        </div>
      <?php } else { ?>
        <div id="page" class="page">
          <?php tpl_content() ?>

		<div class="meta">
		  <div class="user">
		  <?php tpl_userinfo()?>
		  </div>
		  <div class="doc">
		  <?php tpl_pageinfo()?>
		  </div>
		</div>

        </div> 
      <?php }?>

    <?php } elseif(tpl_getConf('sidebar') == 'none') { ?>
      <div id="page" class="page">
        <?php tpl_content() ?>

		<div class="meta">
		  <div class="user">
		  <?php tpl_userinfo()?>
		  </div>
		  <div class="doc">
		  <?php tpl_pageinfo()?>
		  </div>
		</div>

      </div>
    <?php } ?>

</div>

   <?php flush()?>

    <?php /*old includehook*/ @include(dirname(__FILE__).'/footer.html')?>

<div class="no"><?php /* provide DokuWiki housekeeping, required in all templates */ tpl_indexerWebBug()?></div>
</body>
</html>
