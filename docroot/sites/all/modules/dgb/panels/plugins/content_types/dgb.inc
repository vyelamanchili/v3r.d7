<?php

/**
 * @file
 * Provides a CTools content type containing the Drupal Guestbook's.
 */

/**
 * Callback function to supply a list of content types.
 */
function dgb_dgb_ctools_content_types() {
  return array(
    'title' => t('Guestbook'),
    'icon' => 'icon_user.png',
    'description' => t('User or site guestbook.'),
    'required context' => new ctools_context_required(t('User'), 'user'),
    'category' => t('Drupal Guestbook (DGB)'),
    'defaults' => array('overide_pager' => variable_get('dgb_entries_per_page', 20))
  );
}

/**
 * Render the Drupal Guestbook of a user.
 */
function dgb_dgb_content_type_render($subtype, $conf, $panel_args, $context) {
  if (!$context->data || !user_access('access user guestbooks')) {
    return;
  }

  $account = isset($context->data) ? drupal_clone($context->data) : NULL;
  $block = new stdClass();

  if ($account) {
    // The site guestbook.
    if ($account->uid == 0) {
      $account->name = $context->data->name = variable_get('dgb_site_title', t('Site guestbook'));
      $account->realname = $context->data->realname = variable_get('dgb_site_title', t('Site guestbook'));
      $block->title = theme('username', $account, array('plain' => TRUE));
    }
    else {
      $context->data->name = theme('username', $account, array('plain' => TRUE));
      $block->title = 'Guestbook of' .' '. theme('username', $account, array('plain' => TRUE));
    }
    
    if ($conf['overide_pager'] != 'none') {
      $block->content = dgb_page($account, NULL, NULL, FALSE, $conf['overide_pager']);
    }
    else {
      $block->content = dgb_page($account, NULL, NULL, FALSE);
    }
  }
  else {
    $block->content = '<p>'. t('Guestbook not available.') .'</p>';
  }

  return $block;
}

/**
 * Provides an edit form for the custom type.
 */
function dgb_dgb_content_type_edit_form(&$form, &$form_state) {
  $conf = $form_state['conf'];

  $form['overide_pager'] = array(
    '#type' => 'select',
    '#title' => t('Overide pager'),
    '#description' => t('The DGB settings are configured with !count entries per page.', array('!count' => variable_get('dgb_entries_per_page', 20))),
    '#options' => array(
      'none' => t("Don't overide"),
      5 => '5',
      10 => '10',
      15 => '15',
      20 => '20',
      25 => '25',
      50 => '50',
      75 => '75',
      100 => '100',
      150 => '150',
      200 => '200',
      250 => '250'
    ),
    '#default_value' => $conf['overide_pager']
  );
}

function dgb_dgb_content_type_edit_form_submit(&$form, &$form_state) {
  // Copy everything from our defaults.
  foreach (array_keys($form_state['plugin']['defaults']) as $key) {
    $form_state['conf'][$key] = $form_state['values'][$key];
  }
}

/**
 * Provides an administrative title for the content pane.
 */
function dgb_dgb_content_type_admin_title($subtype, $conf, $context) {
  return t('User or site guestbook');
}
