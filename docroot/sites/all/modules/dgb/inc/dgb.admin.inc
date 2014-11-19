<?php
// $Id$

/**
 * @file
 * Administer Drupal Guestbook (DGB).
 */

/**
 * Menu callback; present an administrative entry listing.
 */
function dgb_entry_admin($type = 'new') {
  $edit = $_POST;

  if (isset($edit['operation']) && ($edit['operation'] == 'delete') && isset($edit['guestbook_entries']) && $edit['guestbook_entries']) {
    return drupal_get_form('dgb_multiple_delete_confirm');
  }
  else {
    return drupal_get_form('dgb_entry_admin_overview', $type, arg(3));
  }
}

/**
 * Builds the entries overview form for the admin.
 *
 * @param $type
 *   Not used.
 * @param $arg
 *   Current path's fourth component deciding the form type (Published entries/Unpulished entries)
 * @return
 *   The form structure.
 * @ingroup forms
 * @see dgb_entry_admin_overview_validate()
 * @see dgb_entry_admin_overview_submit()
 * @see theme_dgb_entry_admin_overview()
 */
function dgb_entry_admin_overview($type = 'new', $arg) {
  $path = drupal_get_path('module', 'dgb');
  drupal_add_css($path .'/css/dgb.admin.css');
  drupal_add_js($path .'/js/scroll-bottom-top.jquery.js', 'module', 'footer');

  $destination = dgb_get_destination();
  $dgb_mode = variable_get('dgb_mode', DGB_SITE_GUESTBOOK | DGB_USER_GUESTBOOKS);
  $exinclude = variable_get('dgb_admin_content_exinclude', 0);

  // Build needed query values.
  // 3 Site and user guestbooks, 1 Site guestbook only, 2 User guestbooks only
  $left_join = 'u2.uid = g.recipient';
  $status_string_i = 'dgb_status";i:1:"1';
  $status_string_s = 'dgb_status";s:1:"1';
  $gb_status = 'on';
  $siteg = 0;
  $where = '';
  switch ($dgb_mode) {
    case 3:
      $siteg = 1;
      if ($exinclude == 1) {
        $where = "AND (SELECT IFNULL(LOCATE('". $status_string_i ."', u3.data), $siteg) FROM {users} u3 WHERE u3.uid = g.recipient) > 0
                  OR (SELECT IFNULL(LOCATE('". $status_string_s ."', u3.data), $siteg) FROM {users} u3 WHERE u3.uid = g.recipient) > 0";
      }
      break;
    case 1:
      $siteg = 1;
      $where = "AND g.recipient = 0";
      break;
    case 2:
      if ($exinclude == 0) {
        $where = "AND g.recipient <> 0";
      }
      if ($exinclude == 1) {
        $where = "AND g.recipient <> 0
                  AND (SELECT LOCATE('". $status_string_i ."', u3.data) FROM {users} u3 WHERE u3.uid = g.recipient) > 0
                  OR (SELECT LOCATE('". $status_string_s ."', u3.data) FROM {users} u3 WHERE u3.uid = g.recipient) > 0";
      }
      break;
  }

  $status = ($arg == 'approval') ? DGB_ENTRY_NOT_PUBLISHED : DGB_ENTRY_PUBLISHED;

  // Build an 'Update options' form.
  $form['options'] = array(
    '#type' => 'fieldset', '#title' => t('Update options'),
    '#prefix' => '<div class="container-inline">',
    '#suffix' => '</div>'
  );
  $options = array();
  foreach (dgb_operations($arg == 'approval' ? 'publish' : 'unpublish') as $key => $value) {
    $options[$key] = $value[0];
  }
  $form['options']['operation'] = array('#type' => 'select', '#options' => $options, '#default_value' => 'publish');
  $form['options']['submit'] = array('#type' => 'submit', '#value' => t('Update'));

  // Build the table header.
  $form['header'] = array('#type' => 'value', '#value' => array(
    theme('table_select_header_cell'),
    array('data' => t('Entry'), 'field' => 'subject'),
    array('data' => t('Author'), 'field' => 'author'),
    array('data' => t('Guestbook'), 'field' => 'recipient'),
    array('data' => t('- status'), 'field' => 'gb_status'),
    array('data' => t('Time'), 'field' => 'created', 'sort' => 'desc'),
    array('data' => t('Operations'))
  ));

  // Load the guestbook entries that we want to display.
  // $status aka g.status is the entry publish status.
  $result = pager_query("SELECT
                           CASE IFNULL(LOCATE('$status_string_s', u2.data), 1) OR IFNULL(LOCATE('$status_string_i', u2.data), 1)
                             WHEN 0 THEN 'off'
                             WHEN 1 THEN '$gb_status'
                             ELSE 'on'
                           END AS gb_status,
                           g.id AS eid, g.recipient, g.author, g.anonname, g.anonemail, g.anonwebsite, g.message, g.created, g.status, 
                           u.name AS registered_name, u.uid, u2.name AS recipient_name, u2.data
                         FROM {dgb} g
                         INNER JOIN {users} u ON u.uid = g.author
                         LEFT JOIN {users} u2 ON $left_join
                         WHERE g.status = %d $where". tablesort_sql($form['header']['#value']), variable_get('dgb_admin_content_rows', 50), 0, NULL, $status);

  // Build a table listing the appropriate guestbook entries.
  while ($entry = db_fetch_object($result)) {
    $guestbook_entries[$entry->eid] = '';
    $subject = filter_xss($entry->message);
    // Make sure the usage of name from anonymous poster.
    $entry->name = $entry->author ? $entry->registered_name : $entry->anonname;
    // Make sure the different links to site and user guestbooks.
    if ($entry->recipient > 0) {
      // Fake an account object.
      $recipient = new stdClass();
      $recipient->uid = $entry->recipient;
      $recipient->name = $entry->recipient_name;
      $guestbook = theme('username', $recipient);
    }
    else {
      $guestbook = l(variable_get('dgb_site_title', t('Site guestbook')), dgb_dgb_path($entry->recipient));
    }

    $form['subject'][$entry->eid] = array('#value' => l(truncate_utf8($subject, 32), 'drupal-guestbook/'. $entry->recipient .'/'. $entry->eid, array('attributes' => array('title' => truncate_utf8($subject, 250)))     ));
    $form['username'][$entry->eid] = array('#value' => theme('username', $entry));
    $form['recipient'][$entry->eid] = array('#value' => $guestbook);
    $form['gb_status'][$entry->eid] = array('#value' => t($entry->gb_status));
    $form['created'][$entry->eid] = array('#value' => format_date($entry->created, 'small'));
    $form['operations'][$entry->eid] = array('#value' => l(t('edit'), dgb_dgb_path($entry->recipient) .'/edit/'. $entry->eid, array('query' => $destination['destination'] ? 'destination='. urldecode($destination['destination']) : 'destination='. $destination['path'])));
  }
  
  $form['guestbook_entries'] = array(
    '#type' => 'checkboxes',
    '#options' => $guestbook_entries
  );

  // AHAH path: .../content/exinclude saves the
  // system variable 'dgb_admin_content_exinclude'
  // AHAH form element must have the schama $form['dgb_admin_<action>']
  if ($dgb_mode == 3 || $dgb_mode == 2) {
    $form['dgb_admin_exinclude'] = array(
      '#type' => 'select',
      '#title' => t('Exclude or include entries'),
      '#options' => array(
        0 => t('Include deactivated guestbooks'),
        1 => t('Exclude deactivated guestbooks')
      ),
      '#default_value' => variable_get('dgb_admin_content_exinclude', 0),
      '#ahah' => array(
        'path' => 'dgb/filter/admin/content/exinclude'
      )
    );
  }
  // AHAH form element.
  $form['dgb_admin_rows'] = array(
    '#type' => 'select',
    '#title' => t('Entries per page'),
    '#options' => array(
      10 => '10',
      25 => '25',
      50 => '50',
      75 => '75',
      100 => '100',
      150 => '150',
      200 => '200',
      250 => '250',
      500 => '500',
      750 => '750',
      1000 => '1000'
    ),
    '#default_value' => variable_get('dgb_admin_content_rows', 50),
    '#ahah' => array(
      'path' => 'dgb/filter/admin/content/rows'
    )
  );
  $form['destination'] = array(
    '#type' => 'hidden',
    '#value' => $destination['destination'] ? urldecode($destination['destination']) : $destination['path']
  );

  $form['pager'] = array(
    '#value' => theme('pager', NULL, variable_get('dgb_admin_content_rows', 50), 0)
  );

  return $form;
}

/**
 * Dynamic AHAH callback to save different form actions from
 * administration pages to a corresponding system variable.
 *
 *   Use a AHAH form element path dgb/filter/admin/<admin-area>/<action>.
 *   Menu elements:
 *   - admin-area; A administration area. For example content
 *   - action; A name idetifier for the action/variable.
 *   The system variable are saved has the name schema dgb_admin_<admin-area>_<action>.
 *
 * @param string $area
 *   Administration area identifier for the system variable.
 *   As examples: content, settings
 * @param string $action
 *   Name identifier for the system variable.
 *   As examples: pager, limit, rows, exinclude, ... or whatever
 * @see dgb_entry_admin_overview()
 */
function dgb_admin_ahah_actions($form_state, $area, $action) {
  $doit = $form_state['post']['dgb_admin_'. $action];

  // Render form output as JSON. Necessary to avoid errors here.
  print drupal_json(array('data' => '', 'status' => true));

  variable_set('dgb_admin_'. $area .'_'. $action, $doit);
  
  exit();
}

/**
 * Validate dgb_entry_admin_overview form submissions.
 *
 * We can't execute any 'Update options' if no comments were selected.
 */
function dgb_entry_admin_overview_validate($form, &$form_state) {
  $form_state['values']['guestbook_entries'] = array_diff($form_state['values']['guestbook_entries'], array(0));
  if (count($form_state['values']['guestbook_entries']) == 0) {
    form_set_error('', t('Please select one or more entries to perform the update on.'));
  }
}

/**
 * Process dgb_entry_admin_overview form submissions.
 *
 * Execute the chosen 'Update option' on the selected entries, such as
 * publishing, unpublishing or deleting.
 */
function dgb_entry_admin_overview_submit($form, &$form_state) {
  $operations = dgb_operations();

  if (!empty($operations[$form_state['values']['operation']][1])) {
    // Extract the appropriate database query operation.
    $query = $operations[$form_state['values']['operation']][1];
    foreach ($form_state['values']['guestbook_entries'] as $id => $value) {
      if ($value) {
        // Perform the update action.
        db_query($query, $id);

        $entry = dgb_entry_load($id);
        $subject = truncate_utf8($entry['message'], 64, false, true);

        // Allow modules to respond to the updating of a entry.
        dgb_invoke_dgb_entry($entry, $form_state['values']['operation']);

        // Add an entry to the watchdog log.
        watchdog('content', 'DGB: updated %subject.', array('%subject' => $subject), WATCHDOG_NOTICE, l(t('view'), dgb_dgb_path($entry['recipient']), array('fragment' => 'entry-'. $entry['id'])));
      }
    }
    cache_clear_all();
    drupal_set_message(t('The update has been performed.'));
    $form_state['redirect'] = 'admin/content/dgb';
  }
}

/**
 * List the selected guestbook entries and verify that the admin really wants
 * to delete them.
 *
 * @param $form_state
 *   An associative array containing the current state of the form.
 * @return
 *   TRUE if the guestbook entries should be deleted, FALSE otherwise.
 * @ingroup forms
 * @see dgb_multiple_delete_confirm_submit()
 */
function dgb_multiple_delete_confirm(&$form_state) {
  $edit = $form_state['post'];

  $form['guestbook_entries'] = array(
    '#prefix' => '<ul>',
    '#suffix' => '</ul>',
    '#tree' => true
  );

  // array_filter() returns only elements with actual values.
  $i = 0;
  foreach (array_filter($edit['guestbook_entries']) as $id => $value) {
    $entry = dgb_entry_load($id);
    if (isset($entry['id'])) {
      // Fake an subject from entry text.
      $subject = db_result(db_query('SELECT LEFT(message, 64) FROM {dgb} WHERE id = %d', $id));

      $form['guestbook_entries'][$id] = array(
        '#type' => 'hidden',
        '#value' => $id,
        '#prefix' => '<li>',
        '#suffix' => check_plain($subject) .'</li>'
      );
      ++$i;
    }
  }
  $form['operation'] = array(
    '#type' => 'hidden',
    '#value' => 'delete'
  );

  if ($i == 0) {
    drupal_set_message(t('There do not appear to be any guestbook entries to delete or your selected centry was deleted by another administrator.'));
    drupal_goto('admin/content/dgb');
  }
  else {
    return confirm_form($form,
                          t('Are you sure you want to delete these guestbook entries?'),
                          array('path' => 'admin/content/dgb'),
                          t('This action cannot be undone.'),
                          t('Delete entries'),
                          t('Cancel')
                        );
  }
}

/**
 * Process dgb_multiple_delete_confirm form submissions.
 *
 * Perform the actual guestbook entry deletion.
 */
function dgb_multiple_delete_confirm_submit($form, &$form_state) {
  if ($form_state['values']['confirm']) {
    foreach ($form_state['values']['guestbook_entries'] as $id => $value) {
      $entry = dgb_entry_load($id);
      db_query("DELETE FROM {dgb} WHERE id = %d", $entry['id']);

      module_invoke_all('dgb', 'delete', $entry);
    }

    drupal_set_message(t('The guestbook entries have been deleted.'));
  }

  $form_state['redirect'] = 'admin/content/dgb';
}

/**
 * Provides the module settings form.
 */
function dgb_admin_settings() {
  $roles = _dgb_user_roles();
  $form = array();

  $form['modus'] = array(
    '#type' => 'fieldset',
    '#title' => t('Guestbook modus'),
    '#collapsible' => true,
    '#collapsed' => true
  );
  $form['dgb_modeold'] = array(
    '#type' => 'value',
    '#value' => variable_get('dgb_mode', DGB_SITE_GUESTBOOK | DGB_USER_GUESTBOOKS)
  );
  $form['modus']['dgb_mode'] = array(
    '#type' => 'radios',
    '#title' => t('Mode'),
    '#default_value' => variable_get('dgb_mode', DGB_SITE_GUESTBOOK | DGB_USER_GUESTBOOKS),
    '#options' => array(
      DGB_SITE_GUESTBOOK | DGB_USER_GUESTBOOKS => t('Site and user guestbooks'),
      DGB_SITE_GUESTBOOK => t('Site guestbook only'),
      DGB_USER_GUESTBOOKS => t('User guestbooks only')
    )
  );

  // Site guestbook.
  $form['site_guestbook'] = array(
    '#type' => 'fieldset',
    '#title' => t('Site guestbook'),
    '#collapsible' => true,
    '#collapsed' => true
  );
  $form['site_guestbook']['dgb_site_title'] = array(
    '#type' => 'textfield',
    '#title' => t('Title'),
    '#default_value' => variable_get('dgb_site_title', t('Site guestbook')),
    '#size' => 30,
    '#maxlength' => 128,
    '#description' => t("The site guestbook's page title.")
  );
  $form['site_guestbook']['dgb_site_intro'] = array(
    '#type' => 'textarea',
    '#title' => t('Intro text'),
    '#default_value' => variable_get('dgb_site_intro', ''),
    '#cols' => 64,
    '#rows' => DGB_TEXTAREA_ROWS,
    '#description' => t('The text that appears on top of the site guestbook.')
  );
  $form['site_guestbook']['publish_status'] = array(
    '#type' => 'fieldset',
    '#title' => t('Default published status'),
    '#description' => t('Default published status for new entries.'),
    '#collapsible' => true,
    '#collapsed' => false
  );
  foreach ($roles as $rid => $name) {
    $form['site_guestbook']['publish_status']['dgb_sgb_default_publish_'. $rid] = array(
      '#type' => 'checkbox',
      '#title' => $name,
      '#default_value' => variable_get('dgb_sgb_default_publish_'. $rid, 1)
    );
  }
  $form['site_guestbook']['publish_status']['info'] = array(
    '#type' => 'markup',
    '#value' => '<div class="description">'. t('Deactivated checkboxes: The default published status is <em>unpublished</em>.') .'</div>'
  );

  // User guestbooks.
  $form['user_guestbooks'] = array(
    '#type' => 'fieldset',
    '#title' => t('User guestbooks'),
    '#collapsible' => true,
    '#collapsed' => true
  );
  $form['user_guestbooks']['dgb_enabled_status'] = array(
    '#type' => 'radios',
    '#title' => t('Default guestbook status'),
    '#description' => t('If are created user accounts, guestbooks should be enabled or disabled by default?'),
    '#options' => array(
      1 => t('Default enabled (opt-out)'),
      0 => t('Default disabled (opt-in)')
    ),
    '#default_value' => variable_get('dgb_enabled_status', 1)
  );

  $form['user_guestbooks']['dgb_profile_link'] = array(
    '#type' => 'radios',
    '#title' => t('User link to profile'),
    '#description' => t('Should a user guestbook shown a link to the profile?'),
    '#options' => array(
      0 => t('No'),
      1 => t('Yes')
    ),
    '#default_value' => variable_get('dgb_profile_link', 0)
  );
  $form['dgb_tabold'] = array(
    '#type' => 'value',
    '#value' => variable_get('dgb_tab', 1)
  );
  $form['user_guestbooks']['dgb_tab'] = array(
    '#type' => 'radios',
    '#title' => t('Guestbook tab'),
    '#description' => t('Displaying an guestbook tab in the user profiles?'),
    '#options' => array(
      1 => t('Yes'),
      0 => t('No')
    ),
    '#default_value' => variable_get('dgb_tab', 1)
  );
  $form['user_guestbooks']['publish_status'] = array(
    '#type' => 'fieldset',
    '#title' => t('Default published status'),
    '#description' => t('Default published status for new guestbook entries.'),
    '#collapsible' => true,
    '#collapsed' => false
  );
  foreach ($roles as $rid => $name) {
    $form['user_guestbooks']['publish_status']['dgb_ugb_default_publish_'. $rid] = array(
      '#type' => 'checkbox',
      '#title' => $name,
      '#description' => '',
      '#default_value' => variable_get('dgb_ugb_default_publish_'. $rid, 1)
    );
  }
  $form['user_guestbooks']['publish_status']['info'] = array(
    '#type' => 'markup',
    '#value' => '<div class="description">'. t('Deactivated checkboxes: The default published status is <em>unpublished</em>.') .'</div>'
  );

  // Guestbook and e-mails.
  $form['email_options'] = array(
    '#type' => 'fieldset',
    '#title' => t('E-mail settings'),
    '#description' => '',
    '#collapsible' => true,
    '#collapsed' => true
  );
  // Send e-mails.
  $form['email_options']['send_email'] = array(
    '#type' => 'fieldset',
    '#title' => t('Send e-mail'),
    '#description' => '',
    '#collapsible' => true,
    '#collapsed' => true
  );
  $form['email_options']['send_email']['info'] = array(
    '#type' => 'markup',
    '#value' => '<div>'. t('You can send various e-mails. More informations contains the help.') .'</div>'
  );
  // Validate e-mail address
  $form['email_options']['email_validation'] = array(
    '#type' => 'fieldset',
    '#title' => t('E-mail validation'),
    '#description' => '',
    '#collapsible' => true,
    '#collapsed' => true
  );
  if (function_exists('email_verify_check')) {
    $form['email_options']['email_validation']['dgb_email_verify'] = array(
      '#type' => 'checkbox',
      '#title' => t('Advanced e-mail verification'),
      '#description' => t('Extend the simple syntax checking of email addresses: Use advanced e-mail address verification for the e-mail field of anonymous poster.'),
      '#default_value' => variable_get('dgb_email_verify', 0)
    );
  }
  else {
    $form['email_options']['email_validation']['info'] = array(
    '#type' => 'markup',
    '#value' => '<div>'. t('Extend the simple syntax checking of email addresses: You can use the <a href="!email-verify-url">Email Verification</a> module to implement an advanced e-mail address verification for the e-mail field of anonymous poster.', array('!email-verify-url' => url('http://drupal.org/project/email_verify'))) .'</div>'
  );
  }

  // Display options.
  $form['display_options'] = array(
    '#type' => 'fieldset',
    '#title' => t('Display settings'),
    '#collapsible' => true,
    '#collapsed' => true
  );
  $form['display_options']['dgb_entries_per_page'] = array(
    '#type' => 'textfield',
    '#title' => t('Entries per page'),
    '#description' => t('The number of guestbook entries per page.'),
    '#default_value' => variable_get('dgb_entries_per_page', 20),
    '#size' => 3,
    '#maxlength' => 3
  );
  $form['display_options']['dgb_display'] = array(
    '#type' => 'checkboxes',
    '#title' => t('Toggle display'),
    '#description' => t('Disable options to hide their corresponding display.'),
    '#default_value' => variable_get('dgb_display', array('date', 'email', 'website', 'comments')),
    '#options' => array(
      'date' => t('Submission date'),
      'email' => t('Anonymous poster e-mail'),
      'website' => t('Anonymous poster website'),
      'comments' => t('Comments')
    )
  );
  $form['display_options']['dgb_pager_position'] = array(
    '#type' => 'radios',
    '#title' => t('Position of pager'),
    '#default_value' => variable_get('dgb_pager_position', DGB_PAGER_BELOW),
    '#options' => array(
      DGB_PAGER_ABOVE => t('Above the entries'),
      DGB_PAGER_BELOW => t('Below the entries'),
      DGB_PAGER_ABOVE | DGB_PAGER_BELOW => t('Above and below the entries')
    )
  );

  // Posting settings.
  $form['posting_settings'] = array(
    '#type' => 'fieldset',
    '#title' => t('Posting settings'),
    '#collapsible' => true,
    '#collapsed' => true
  );
  $form['posting_settings']['dgb_input_format'] = filter_form(variable_get('dgb_input_format', 0), NULL, array('dgb_input_format'));
  $form['posting_settings']['dgb_input_format']['#type'] = 'item';
  $form['posting_settings']['dgb_filter_tips'] = array(
    '#type' => 'checkbox',
    '#title' => t('Display filter tips'),
    '#description' => t('If enabled filter tips are displayed below the message textarea.'),
    '#default_value' => variable_get('dgb_filter_tips', true)
  );
  $form['posting_settings']['dgb_anonymous_fields'] = array(
    '#type' => 'checkboxes',
    '#title' => t('Anonymous poster fields'),
    '#description' => t('Additional information that anonymous posters may supply.'),
    '#default_value' => variable_get('dgb_anonymous_fields', array('email', 'website')),
    '#options' => array(
      'email' => t('E-mail'),
      'website' => t('Website')
    )
  );
  $form['posting_settings']['dgb_webite_validate_silent'] = array(
    '#type' => 'checkbox',
    '#title' => t('Webite validation'),
    '#description' => t('Enable this option to use a validation action. This action display a error message if the entered website address without prepended http://. If disabled, the website address will automatically prepended with http://.'),
    '#default_value' => variable_get('dgb_webite_validate_silent', 0)
  );

  $form['posting_settings']['dgb_form_location'] = array(
    '#type' => 'radios',
    '#title' => t('Position of entry submission form'),
    '#default_value' => variable_get('dgb_form_location', 'above'),
    '#options' => array(
      'above' => t('Above entries'),
      'below' => t('Below entries'),
      'separate page' => t('Separate page')
    )
  );

  // User settings.
  $form['user_settings'] = array(
    '#type' => 'fieldset',
    '#title' => t('User settings'),
    '#collapsible' => true,
    '#collapsed' => true
  );
  $description_dgb_notver = t('Drupal core adds "Not verified" for anonymous users, this option allows that to be turned off.') .'<br />';
  $description_dgb_notver .= t('Note: If you are use the RealName module. This module offers the same option to configure - avoid double configuration. Use RealName and leave this option checked here.');
  $form['user_settings']['dgb_notver'] = array(
    '#type' => 'checkbox',
    '#title' => t('Show "Not verified" for anonymous users'),
    '#description' => $description_dgb_notver,
    '#default_value' => variable_get('dgb_notver', true)
  );
  // User settings.
  $form['user_settings']['picture_info'] = array(
    '#type' => 'markup',
    '#value' => '<div class="form-item"><label>'. t('User pictures') .':</label><div>'. t('To use pictures in entries enable the <a href="!picture-support-url">User settings</a> <em>!picture-support</em> and configure the <em>Toggle display</em> settings of the current theme.', array('!picture-support-url' => url('admin/user/settings'), '!picture-support' => t('Picture support'))) .'</div></div>'
  );

  $form['array_filter'] = array(
    '#type' => 'value',
    '#value' => true
  );

  return system_settings_form($form);
}

/**
 * Submit callback from module settings form.
 *
 *   This is a additional submit callback for a system settings form to make sure
 *   changes in the local task tab settings for the guestbook tab.
 */
function dgb_admin_settings_submit($form, $form_state) {
  if ($form_state['values']['dgb_modeold'] != $form_state['values']['dgb_mode'] || $form_state['values']['dgb_tabold'] != $form_state['values']['dgb_tab']) {
    menu_rebuild();
    drupal_set_message(t('The menu router has been rebuilt.'));
  }
}
