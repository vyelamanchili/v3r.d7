<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language ?>" lang="<?php print $language->language ?>" dir="<?php print $language->dir ?>">

<head>
  <?php print $head; ?>
  <title><?php print $head_title; ?></title>
  <?php print $styles; ?>
  <?php print $scripts; ?>
  <!--[if lte IE 7]>
    <link rel="stylesheet" href="<?php print $base_path . drupal_get_path('theme', 'aperture') . '/ie.css'; ?>" type="text/css">  
  <![endif]-->
  <script type="text/javascript"><?php /* Needed to avoid Flash of Unstyled Content in IE */ ?> </script>
</head>
<body class="<?php print $body_classes; ?>">
  <?php if (!empty($site_slogan)): ?>
    <div id="site-slogan"><?php print $site_slogan; ?></div>
  <?php endif; ?>
  
  <div id="page">
    <div id="header">
      <div id="header-1">

        <?php if (!empty($header)): ?>
          <div id="header-region">
            <?php print $header; ?>
          </div>
        <?php endif; ?>

        <div id="logo-title">
          <?php if (!empty($logo)): ?>
            <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" id="logo"><img src="<?php print $logo; ?>" alt="<?php print $logo_alt; ?>" title="<?php print t('Home'); ?>" /></a>
          <?php endif; ?>

          <div id="name-and-slogan">
            <?php if (!empty($site_name)): ?>
              <<?php $tag = $title ? 'div' : 'h1'; print $tag; ?> id="site-name">
                <a href="<?php print $front_page ?>" title="<?php print t('Home'); ?>" rel="home"><span><?php print $site_name; ?></span></a>
              </<?php print $tag; ?>>
            <?php endif; ?>
          </div> <!-- /name-and-slogan -->
        </div> <!-- /logo-title -->
      </div>

      <?php if (!empty($primary) || !empty($primary_links) || !empty($secondary_links)): ?>
        <div id="navigation">
          <?php if (!empty($primary)): ?>
            <div id="primary" class="clear-block">
              <?php print $primary; ?>
            </div>
          <?php elseif (!empty($primary_links)): ?>
            <div id="primary" class="clear-block">
              <?php print theme('links', $primary_links, array('class' => 'links primary-links')); ?>
            </div>
          <?php endif; ?>
        </div> <!-- /navigation -->
      <?php endif; ?>
    </div> <!-- /header -->

    <?php if (!empty($feature_image)): ?>
      <div id="feature-image">
        <?php print $feature_image; ?>
      </div> <!-- /feature-image -->
    <?php endif; ?>

    <?php if (!empty($splash)): ?>
      <div id="splash"><div id="splash-inner">
        <?php print $splash; ?>
      </div></div> <!-- /splash-inner /splash -->
    <?php endif; ?>

    <div id="container" class="clear-block">
      <?php if (!empty($preface_one)): ?>
        <div id="preface-one"><div id="preface-one-inner">
          <?php print $preface_one; ?>
        </div></div> <!-- /preface-one-inner /preface-one -->
      <?php endif; ?>

      <div id="main" class="column"><div id="main-inner">
        <?php if (!empty($breadcrumb)): ?><div id="breadcrumb"><?php print $breadcrumb; ?></div><?php endif; ?>
        <?php if (!empty($mission)): ?><div id="mission"><?php print $mission; ?></div><?php endif; ?>

        <?php if (!empty($preface_two)): ?>
          <div id="preface-two"><div id="preface-two-inner">
            <?php print $preface_two; ?>
          </div></div> <!-- /preface-two-inner /preface-two -->
        <?php endif; ?>

        <div id="content"><div id="content-inner">
          <?php if (!empty($content_top)): ?>
            <div id="content-top"><div id="content-top-inner">
              <?php print $content_top; ?>
            </div></div> <!-- /content-top-inner /content-top -->
          <?php endif; ?>
          <?php if (!empty($title)): ?><h1 class="title" id="page-title"><?php print $title; ?></h1><?php endif; ?>
          <?php if (!empty($tabs)): ?><div class="tabs"><?php print $tabs; ?></div><?php endif; ?>
          <?php if (!empty($messages)): print $messages; endif; ?>
          <?php if (!empty($help)): print $help; endif; ?>
          <div id="content-content" class="clear-block">
            <?php print $content; ?>
          </div> <!-- /content-content -->
          <?php print $feed_icons; ?>
        </div></div> <!-- /content-inner /content -->

        <?php if (!empty($right)): ?>
          <div id="sidebar-right" class="column sidebar"><div id="sidebar-right-inner">
            <?php print $right; ?>
          </div></div> <!-- /sidebar-right-inner /sidebar-right -->
        <?php endif; ?>
      </div></div> <!-- /main-inner /main -->

      <?php if (!empty($left)): ?>
        <div id="sidebar-left" class="column sidebar"><div id="sidebar-left-inner">
          <?php print $left; ?>
        </div></div> <!-- /sidebar-left-inner /sidebar-left -->
      <?php endif; ?>

      <?php if (!empty($postscript_one)): ?>
        <div id="postscript-one"><div id="postscript-one-inner">
          <?php print $postscript_one; ?>
        </div></div> <!-- /postscript-one-inner /postscript-one -->
      <?php endif; ?>
    </div> <!-- /container -->

    <?php if (!empty($postscript_two)): ?>
      <div id="postscript-two"><div id="postscript-two-inner">
        <?php print $postscript_two; ?>
      </div></div> <!-- /postscript-two-inner /postscript-two -->
    <?php endif; ?>

    <div id="footer"><div id="footer-inner">
      <?php if (!empty($footer)): print $footer; endif; ?>
      <?php print $footer_message; ?>
      <?php print $postamble; ?>
    </div></div> <!-- /footer-inner /footer -->

    <?php print $closure; ?>

  </div> <!-- /page -->
</body>
</html>
