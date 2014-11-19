<?php

// Piggyback to add css and js just before template_preprocess_page() processes them. 
function aperture_help() {
  global $theme;
  $themes = list_themes();
  $info = $themes[$theme]->info;
  
  $dir = drupal_get_path('theme', 'aperture');

  // Change colour scheme if configured to do so
  $colour = $info['colour'] ? $info['colour'] : theme_get_setting('colour');
  if (!empty($colour)) {
    $path = $dir . '/aperture-' . $colour . '.css';
    if (file_exists($path)) {
      drupal_add_css($path, 'theme');
    }
  }
  
  // Pass through to default theme('help')
  return theme_help();
}

function aperture_preprocess_page(&$vars) {
  if (theme_get_setting('toggle_primary_links') && empty($vars['primary'])) {
    $tree = menu_tree_all_data(variable_get('menu_primary_links_source', 'primary-links'));
    $vars['primary'] = '<div id="primary-menu">' . menu_tree_output($tree) . '</div>';
  }

  if (empty($vars['postamble'])) {
    // Linkback: Please do not remove this as a courtesy to the effort we have put into this theme. 
    global $base_path;
    $text = aperture_linkback_text();
    $title = 'Theme by ProsePoint Express: ' . $text;
    $vars['postamble'] = '<div style="font-size: 12px; line-height: 20px; text-align: right;"><a href="http://www.prosepoint.net" title="' . $title . '"><img src="' . $base_path . drupal_get_path('theme', 'aperture') . '/linkback.png" style="vertical-align: middle;" alt="ProsePoint Express: ' . $text . '" title="' . $title . '" /></a></div>';
  }

  if (empty($vars['logo_alt'])) {
    $vars['logo_alt'] = filter_xss_admin(variable_get('site_name', 'Drupal'));
  }
}

function aperture_linkback_text() {
  $options = array(
    'Online newspaper and magazine cms software', 
    'Content management system for newspapers and magazines', 
    'Newpaper websites and web design', 
    'News website publishing software',
    'Software for hosted news websites',
  );
  return $options[strlen(variable_get('site_name', 'Drupal')) % count($options)];
}

function aperture_preprocess_node(&$vars) {
  $type = str_replace('_', '-', $vars['node']->type);
  $size_suffix = $vars['teaser'] ? 'teaser' : 'full';

  $classes = array();
  $classes[] = 'node-' . $size_suffix;
  $classes[] = 'node-' . $type;
  $classes[] = 'node-' . $type . '-' . $size_suffix;
  $vars['node_classes'] = implode(' ', $classes);
  
  $vars['template_files'][] = 'node-' . $type . '-' . $size_suffix;
}

function aperture_textfield($element) {
  // Reduce width of textfields because we have a small space
  if ($element['#size'] > 32) {
    $element['#size'] = 32;
  }
  return theme_textfield($element);
}

