<?php
// $Id$

/**
 * @file:
 * Actions module integration for the Drupal Guestbook (DGB) module.
 */

/**
 * Implementation of hook_hook_info().
 */
function dgb_hook_info() {
  $hooks = array(
    'dgb' => array(
      'dgb' => array(
        'insert' => array(
          'runs when' => t('After saving a new Drupal Guestbook entry'),
        ),
        'update' => array(
          'runs when' => t('After saving a updated Drupal Guestbook entry'),
        ),
        'delete' => array(
          'runs when' => t('After deleting a Drupal Guestbook entry')
        ),
        'view' => array(
          'runs when' => t('When a Drupal Guestbook entry is viewed by an user')
        ),
        'unpublish' => array(
          'runs when' => t('After unpublishing a Drupal Guestbook entry')
        ),
        'publish' => array(
          'runs when' => t('After publishing a Drupal Guestbook entry')
        ),
      ),
    ),
  );

  return $hooks;
}

/**
 * Implementation of hook_action_info().
 */
function dgb_action_info() {
  return array(
    'dgb_message_action' => array(
      'type' => 'dgb',
      'description' => t('DGB: Display a message to user'),
      'configurable' => true,
      'hooks' => array(
        'dgb' => array('insert', 'update', 'delete', 'unpublish', 'publish')
      ),
    ),
    'dgb_debug_log_action' => array(
      'type' => 'dgb',
      'description' => t('DGB: Debug log to watchdog'),
      'configurable' => true,
      'hooks' => array(
        'dgb' => array('insert', 'update', 'delete', 'unpublish', 'publish')
      ),
    ),
    'dgb_send_email_action' => array(
      'description' => t('DGB: Send e-mail'),
      'type' => 'dgb',
      'configurable' => true,
      'hooks' => array(
        'dgb' => array('insert')
      )
    ),
    'dgb_entry_publish_action' => array(
      'description' => t('DGB: Publish entry'),
      'type' => 'dgb',
      'configurable' => false,
      'hooks' => array(
        'dgb' => array('insert', 'update')
      ),
    ),
    'dgb_entry_unpublish_action' => array(
      'description' => t('DGB: Unpublish entry'),
      'type' => 'dgb',
      'configurable' => false,
      'hooks' => array(
        'dgb' => array('insert', 'update'),
      )
    ),
    'dgb_entry_unpublish_by_keyword_action' => array(
      'description' => t('DGB: Unpublish entry containing keyword(s)'),
      'type' => 'dgb',
      'configurable' => true,
      'hooks' => array(
        'dgb' => array('insert', 'update')
      )
    )
  );
}

/**
 * Implements a Drupal action; Publish a entry.
 *
 * @param $comment
 *   An optional entry object.
 * @param $context
 *   Keyed array. Must contain the id of the entry if $entry is not passed.
 *
 * @ingroup actions
 */
function dgb_entry_publish_action($entry, $context = array()) {
  if (isset($entry->id)) {
    $id = $entry->id;
    $subject = truncate_utf8($entry->message, 32, false, true);
  }
  else {
    $id = $context['id'];
    $subject = db_result(db_query("SELECT message FROM {dgb} WHERE id = %d", $id));
    $subject = truncate_utf8($subject);
  }
  db_query('UPDATE {dgb} SET status = %d WHERE id = %d', DGB_ENTRY_PUBLISHED, $id);

  watchdog('actions', 'DGB: Published entry %subject.', array('%subject' => $subject));
}

/**
 * Implements a Drupal action; Unpublish a entry.
 *
 * @param $entry
 *   An optional entry object.
 * @param $context
 *   Keyed array. Must contain the id of the entry if $entry is not passed.
 *
 * @ingroup actions
 */
function dgb_entry_unpublish_action($entry, $context = array()) {
  if (isset($entry->id)) {
    $id = $entry->id;
    $subject = truncate_utf8($entry->message, 64, false, true);
  }
  else {
    $id = $context['id'];
    $subject = db_result(db_query("SELECT message FROM {dgb} WHERE id = %d", $id));
    $subject = truncate_utf8($subject);
  }
  db_query('UPDATE {dgb} SET status = %d WHERE id = %d', DGB_ENTRY_NOT_PUBLISHED, $id);

  watchdog('actions', 'DGB: Unpublished entry %subject.', array('%subject' => $subject));
}

/**
 * Implements a Drupal action; Display a message to user.
 *
 * @ingroup actions
 */
function dgb_message_action(&$object, $context = array()) {
  $text = '';

  switch ($context['op']) {
    case 'insert':
      // Get guestbook type.
      if ($object['recipient'] == 0) {
        // Site guestbook.
        $type = 'sgb';
      }
      else {
        // User guestbook.
        $type = 'ugb';
      }

      // Check default publish status.
      $default_publish_status = _dgb_get_default_publish_status($object['author_obj'], $type);

      if ($default_publish_status == 0) {
        $text = t('Your entry has been added.');
      }
      else {
        $text = t('Your entry has been added and need approval.');
      }
      break;

    case 'update':
      $text = t('The entry has been updated.');
      break;
    
    case 'delete':
      $text = t('The entry has been deleted.');
      break;

    case 'unpublish':
      $text = t('The entry has been unpublished.');
      break;

    case 'publish':
      $text = t('The entry has been published.');
      break;
  }
  
  drupal_set_message($text, 'status');
}

/**
 * Form builder; Configuring the Drupal Guestbook message action.
 *
 * @ingroup forms
 */
function dgb_message_action_form($guestbook, $context = array()) {
  $form = array();

  $items = array(
    t('Your entry has been added.') .' / '. t('Your entry has been added and need approval.'),
    t('The entry has been updated.'),
    t('The entry has been deleted.'),
    t('The entry has been unpublished.'),
    t('The entry has been published.')
  );

  $value = '<p>'. t('These messages are used depending on the events') .':</p>';
  $value .= theme('item_list', $items);

  $form['markup'] = array(
    '#value' => $value,
  );

  return $form;
}

/**
 * Form submission handler for dgb_message_action_form().
 *
 * @see dgb_message_action_form()
 */
function dgb_message_action_submit($form, $form_state) {
  return array('message' => $form_state['values']['message']);
}

/**
 * Implements a Drupal action; Debug log to watchdog.
 *
 * @ingroup actions
 */
function dgb_debug_log_action(&$object, $context = array()) {
  $text = '';
  
  switch ($context['op']) {
    case 'insert':
      $text = t('Guestbook entry inserted.');
      break;
    case 'update':
      $text = t('Guestbook entry updated.');
      break;
    case 'delete':
      $text = t('Guestbook entry deleted.');
      break;
    case 'unpublish':
      $text = t('Guestbook entry unpublished.');
      break;
    case 'publish':
      $text = t('Guestbook entry published.');
      break;
  }

  foreach ($object as $key => $value) {
    if ($key == 'recipient_obj' || $key == 'author_obj') {
      continue;
    }
    if ($key == 'created') {
      $value = format_date($value, 'medium') .' ('. $value .')';
    }
    $items[] = $key .': '. $value;
  }

  $text .= theme('item_list', $items);

  watchdog('DGB action', $text);
}

/**
 * Form builder; Configuring the Drupal Guestbook debug log action.
 *
 * @ingroup forms
 */
function dgb_debug_log_action_form($guestbook, $context = array()) {
  $form = array();

  $form['markup'] = array(
    '#value' => '<div>'. t('ATTENTION: Provide and enable this action only if are needed. Do not forget to disable if no longer needed.') .'</div>',
  );

  return $form;
}

/**
 * Form submission handler for dgb_debug_log_action_form().
 *
 * @see dgb_debug_log_action_form()
 *
 * @ingroup forms
 */
function dgb_debug_log_action_submit($form, $form_state) {
  return array('message' => $form_state['values']['message']);
}

/**
 * Form builder; Return a form definition so the "DGB: Send e-mail" action can be configured.
 *
 * @param $context
 *   Default values (if we are editing an existing action instance).
 * @return
 *   Form definition.
 * @see dgb_send_email_action_validate()
 * @see dgb_send_email_action_submit()
 *
 * @todo
 *   See todo of dgb_send_email_action_submit()
 */
function dgb_send_email_action_form($context) {
  // Set default values for form.
  if (!isset($context['recipient'])) {
    $context['recipient'] = '';
  }
  if (!isset($context['subject'])) {
    $context['subject'] = '';
  }
  if (!isset($context['message'])) {
    $context['message'] = '';
  }

  $form['recipient'] = array(
    '#type' => 'textfield',
    '#title' => t('Recipient'),
    '#description' => t('The e-mail address to which the message should be sent OR enter %author if you would like to send an e-mail to the guestbook owner.', array('%author' => '%author')),
    '#default_value' => $context['recipient'],
    '#maxlength' => 254,
    '#required' => true,
  );

  // We use an dummy to make sure that the subject
  // inserted in the locale functionality.
  if (isset($context['email_language']) && $context['email_language'] >= 1) {
    $t_dummy = t($context['subject']);
  }
  $form['subject'] = array(
    '#type' => 'textfield',
    '#title' => t('Subject'),
    '#description' => t('The subject of the message. You may include the replacement variables.'),
    '#default_value' => $context['subject'],
    '#maxlength' => 254,
    '#required' => true,
  );

  // We use an dummy to make sure that the message
  // inserted in the locale functionality.
  if (isset($context['email_language']) && $context['email_language'] >= 1) {
    $t_dummy = t($context['message']);
  }
  $description['message'] = t('The message that should be sent. You may include the replacement variables.') . '<br />';
  $description['message'] .= t('This field accepts the following HTML tags') . ':<br />';
  $description['message'] .= htmlentities('<a> <em> <i> <strong> <b> <br> <p> <blockquote> <ul> <ol> <li> <dl> <dt> <dd> <h1> <h2> <h3> <h4> <h5> <h6> <hr>');
  $form['message'] = array(
    '#type' => 'textarea',
    '#title' => t('Message'),
    '#description' => $description['message'],
    '#default_value' => $context['message'],
    '#cols' => 80,
    '#rows' => 10,
    '#required' => true,
  );

  $form['replacements'] = array(
    '#type' => 'fieldset',
    '#title' => t('Replacements'),
    '#description' => t('You can use the replacements for the fields %subject and %message.', array('%subject' => t('Subject'), '%message' => t('Message'))),
    '#collapsible' => true,
    '#collapsed' => true,
  );
  $form['replacements']['markup'] = array(
    '#type' => 'markup',
    '#value' => _dgb_send_email_action_replacements(),
  );

  // Initiate the language option for the e-mail recipient.
  if (variable_get('language_count', 1) > 1) {
    $language_default = variable_get('language_default', (object) array('language' => 'en', 'name' => 'English', 'native' => 'English', 'direction' => 0, 'enabled' => 1, 'plurals' => 0, 'formula' => '', 'domain' => '', 'prefix' => '', 'weight' => 0, 'javascript' => ''));
    $description['email_language'] = t('Choose the language with which sent the e-mail.') . '<br />';
    $description['email_language'] .= t('Important: Enter the %subject and %message in English. You translate it with the translation interface.', array('%subject' => t('Subject'), '%message' => t('Message'))) . '<br />';
    $description['email_language'] .= t('NOTE: Use %dont as long as the fields %subject and %message are not configured yet final!', array('%dont' => t("Don't use"), '%subject' => t('Subject'), '%message' => t('Message')));

    $form['email_language'] = array(
      '#type' => 'select',
      '#title' => t('Language'),
      '#description' => $description['email_language'],
      '#options' => array(
        0 => t("Don't use"),
        1 => t('Site language') .' ('. $language_default->name .')',
        2 => t('Guestbook owner language')
      ),
      '#default_value' => $context['email_language'] ? $context['email_language'] : 0
    );
  }

  $form['email_user_message'] = array(
    '#type' => 'select',
    '#title' => t('User message'),
    '#description' => t('Display a message to the user, if a guest book entry was created. This message informs the user that an e-mail has been sent to the guestbook owner.'),
    '#options' => array(
      0 => t('No message'),
      1 => t('Display message to user')
    ),
    '#default_value' => $context['email_user_message'],
  );
  
  return $form;
}

/**
 * Form validation handler for dgb_send_email_action_form().
 *
 * @see dgb_send_email_action_form()
 */
function dgb_send_email_action_validate($form, $form_state) {
  $form_values = $form_state['values'];
  // Validate the configuration form.
  if (!valid_email_address($form_values['recipient']) && $form_values['recipient'] != '%author') {
    // We want the literal %author placeholder to be emphasized in the error message.
    form_set_error('recipient', t('Please enter a valid email address or %author.', array('%author' => '%author')));
  }
}

/**
 * Form submission handler for dgb_send_email_action_form().
 *
 * @see dgb_send_email_action_form()
 *
 * @todo
 *   Provide a additional form field to configure a alternative e-mail recipient.
 *   This is usefull if the guestbook configureded to provide site and user guestbooks
 *   and the recipient of the action e-mail is not the guestbook owner.
 */
function dgb_send_email_action_submit($form, $form_state) {
  $form_values = $form_state['values'];

  // Process the HTML form to store configuration. The keyed array that
  // we return will be serialized to the database.
  $params = array(
    'recipient'          => $form_values['recipient'],
    'subject'            => $form_values['subject'],
    'message'            => $form_values['message'],
    'email_user_message' => $form_values['email_user_message'],
  );

  if ($form_values['email_language'] && $form_values['email_language'] >= 1) {
    $params['email_language'] = $form_values['email_language'];
  }

  return $params;
}

/**
 * Implements a Drupal action; Send a configurable e-mail.
 *
 * @ingroup actions
 */
function dgb_send_email_action($object, $context) {
  $language_default = variable_get('language_default', (object) array('language' => 'en', 'name' => 'English', 'native' => 'English', 'direction' => 0, 'enabled' => 1, 'plurals' => 0, 'formula' => '', 'domain' => '', 'prefix' => '', 'weight' => 0, 'javascript' => ''));

  switch ($context['hook']) {
    case 'dgb':
      $entry = $context['dgb'];

      // $account - the user has post the entry.
      $account = $object['author_obj'];
      if (isset($account->session)) {
        unset($account->session);
      }
      break;
  }

  $recipient = $context['recipient'];
  if ($recipient == '%author') {
    $recipient = $object['recipient_obj']->mail;
  }

  // Prepare the language conditions to send the e-mail.
  $language = $language_default;
  if (isset($context['email_language']) && variable_get('language_count', 1) > 1) {
    switch ($context['email_language']) {
      case 1:
        $language = $language_default;
        break;

      case 2:
        $language = user_preferred_language($object['recipient_obj']);
        break;
    }
  }

  $params = array(
    'account'  => $account,
    'owner'    => $object['recipient_obj'],
    'object'   => $object,
    'context'  => $context,
    'language' => $language->language,
    'entry'    => $entry
  );

  if (drupal_mail('dgb', 'dgb_send_email_action', $recipient, $language->language, $params)) {
    if ($context['email_user_message'] == TRUE) {
      drupal_set_message(t('An e-mail was sent to the guestbook owner.'), 'status');
    }

    watchdog('actions', 'DGB: Sent e-mail to %recipient', array('%recipient' => $recipient));
  }
  else {
    watchdog('error', 'DGB action: Unable to send e-mail to %recipient', array('%recipient' => $recipient));
  }
}

/**
 * Implements a Drupal action; Unpublish a entry if it contains certain, not allowed strings.
 *
 * @param array $entry
 *   A guestbook entry.
 * @param $context
 *   An array providing more information about the context of the call to this action.
 *   Unused here, since this action currently only supports the insert and update ops of
 *   the dgb_entry hook, both of which provide a complete $entry.
 *
 * @see dgb_entry_unpublish_by_keyword_action_form()
 * @see dgb_entry_unpublish_by_keyword_action_submit()
 *
 * @ingroup actions
 */
function dgb_entry_unpublish_by_keyword_action($entry, $context) {
  foreach ($context['keywords'] as $keyword) {
    if (stripos($entry['message'], $keyword) !== false) {
      db_query('UPDATE {dgb} SET status = %d WHERE id = %d', DGB_ENTRY_NOT_PUBLISHED, $entry['id']);

      /**
       * Hide a previously declared entry added status message. @see dgb_message_action()
       * Add the new message.
       */
      $messages = drupal_get_messages('status');
      drupal_set_message(t('The guestbook entry has received the status not be published. It contains not allowed text.'), 'error');

      $subject = truncate_utf8($entry['message'], 32, false, true);
      watchdog('actions', 'DGB: Entry contains certain, not allowed strings. Subject: %subject; Host: !host', array('%subject' => $subject, '!host' => $entry['hostname']));
      break;
    }
  }
}

/**
 * Form builder; Prepare a form for blacklisted keywords.
 *
 * @param $context
 *   An array providing more information about the context of the call to this action.
 *   Unused here, since this action currently only supports the insert and update ops of
 *   the comment hook, both of which provide a complete $entry object.
 *
 * @see dgb_entry_unpublish_by_keyword_action()
 * @see dgb_entry_unpublish_by_keyword_action_submit()
 *
 * @ingroup forms
 */
function dgb_entry_unpublish_by_keyword_action_form($context) {
  $form['keywords'] = array(
    '#title' => t('Keywords'),
    '#type' => 'textarea',
    '#description' => t('The entry will be unpublished if it contains any of the character sequences above. Use a comma-separated list of character sequences. Example: funny, bungee jumping, http, www, "Company, Inc.". Character sequences are NOT case-sensitive.'),
    '#default_value' => isset($context['keywords']) ? drupal_implode_tags($context['keywords']) : ''
  );

  return $form;
}

/**
 * Form submission handler for dgb_entry_unpublish_by_keyword_action_form().
 *
 * @see dgb_entry_unpublish_by_keyword_action_form()
 */
function dgb_entry_unpublish_by_keyword_action_submit($form, $form_state) {
  return array('keywords' => drupal_explode_tags($form_state['values']['keywords']));
}

/**
 * Provides replacements informations for the form
 * of the advanced configuration of the "DGB: Send e-mail" action.
 *
 * @return string
 *   A rendered table contains the replacement informations.
 * @see dgb_send_email_action_form()
 */
function _dgb_send_email_action_replacements() {
  $output = '';
  $rows = array();

  $header = array(t('Replacement'), t('Description'));
  $replacements = array(
    '%site_name'      => t('The website name.'),
    '%uri'            => t("URL of the website."),
    '%uri_brief'      => t('Brief URL of the website (without http://).'),
    '%author_name'    => t("Guestbook entry author's name."),
    '%author_mailto'  => t("Guestbook entry author's e-mail."),
    '%entry_short'    => t('Abridged entry text with 64 characters.'),
    '%entry_medium'   => t('Abridged entry text with 256 characters.'),
    '%entry_full'     => t('The full entry text.'),
    '%dgb_owner_name' => t('Guestbook owner name.'),
    '%dgb_uri'        => t("URL of the guestbook."),
    '%dgb_bief'       => t('Brief URL of the guestbook (without http://).')
  );

  foreach ($replacements as $replacement => $description) {
    $rows[] = array(
      $replacement,
      $description
    );
  }

  $output = theme('table', $header, $rows, array('class' => 'table-action-replacements dgb-action-send-email'));

  return $output;
}
