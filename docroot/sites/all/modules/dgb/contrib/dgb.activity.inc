<?php

/**
 * @file:
 * Activity module integration for the Drupal Guestbook (DGB) module.
 */

/**
 * Implementation of hook_activity_info().
 */
function dgb_activity_info() {
  $info = new stdClass();
  $info->api = 2;
  $info->name = 'Drupal Guestbook';
  $info->object_type = 'dgb';
  $info->path = drupal_get_path('module', 'dgb') . '/contrib';
  $info->eid_field = 'id';
  $info->objects = array('recipient' => 'dgb', 'author' => 'dgb');
  $info->hooks = array('dgb' => array('insert', 'update', 'view', 'delete'));
  $info->realms = array('dgb' => 'Guestbook entry');
//  $info->type_options = array();
  $info->list_callback = 'dgb_entry_list_activity_actions';
  $info->context_load_callback = 'dgb_entry_load_activity_context';

  return $info;
}

/**
 * Implementation of hook_activity_grants().
 */
function dgb_activity_grants($activity) {
  $grants = array();

  $grants = array();
  if (!empty($activity->id)) {
    $grants = array(
      'entry_author' => array(
        $activity->id
      ),
    );
  }

  return $grants;
}

/**
 * Implementation of hook_activity_access_grants().
 */
function dgb_activity_access_grants($account) {
  $grants = array();

  // Select the entries you have created.
  $created_result = db_query("SELECT id FROM {dgb} WHERE author = %d", $account->uid);
  while ($created = db_fetch_object($created_result)) {
    $grants['entry_author'][] = $created->id;
  }

  return $grants;
}

/**
 * Implementation of hook_activity_token_list().
 */
function dgb_activity_token_list($type = 'all') {
  if ($type == 'dgb' || $type == 'all') {
    $tokens['dgb']['activity-entry-id']                  = t('Activity') .': '. t('The entry ID.');

    $tokens['dgb']['activity-entry-date-time']           = t('Activity') .': '. t('The themed date and time of creation of the entry.');
    $tokens['dgb']                                       += token_get_date_token_info(t('Activity') .': '. t('Entry creation'));

    $tokens['dgb']['activity-entry-author-uid']          = t('Activity') .': '. t('Activity') .': '. t('User ID of the entry author.');
    $tokens['dgb']['activity-entry-author-name']         = t('Activity') .': '. t('User name of the entry author.');
    $tokens['dgb']['activity-entry-author-name-raw']     = t('Activity') .': '. t('Unfiltered user name of the entry author. <em>Warning: Token value contains raw user input</em>.');
    $tokens['dgb']['activity-entry-author-picture-path'] = t('Activity') .': '. t('The path of the the picture of the entry author - if the picture available.');
    $tokens['dgb']['activity-entry-author-picture']      = t('Activity') .': '. t('The themed picture of the entry author - if the picture available.');

    $tokens['dgb']['activity-entry-author-path']         = t('Activity') .': '. t("Path of the entry author's profile.");
    $tokens['dgb']['activity-entry-author-link']         = t('Activity') .': '. t("Themed link to the entry author's profile.");
    $tokens['dgb']['activity-entry-author-url']          = t('Activity') .': '. t("URL of the entry author's profile page -aliased.");

    $tokens['dgb']['activity-entry-short']               = t('Activity') .': '. t('Abridged entry text with 64 characters.');
//    $tokens['dgb']['activity-entry-short-link']          = 'The 64 characters text as link to the entry.';
    $tokens['dgb']['activity-entry-medium']              = t('Activity') .': '. t('Abridged entry text with 256 characters.');
    $tokens['dgb']['activity-entry-full']                = t('Activity') .': '. t('The full entry text.');

    $tokens['dgb']['activity-entry-author-realname']     = t('Activity') .': '. t('Realname of the entry author.');
    $tokens['dgb']['activity-entry-author-realname-raw'] = t('Activity') .': '. t('Unfiltered realname of the entry author. <em>Warning: Token value contains raw user input</em>.');
  }

  return $tokens;
}

/**
 * Implementation of hook_activity_token_values().
 */
function dgb_activity_token_values($type, $object = NULL, $options = array()) {
  $values = array();

  switch ($type) {
    case 'dgb':
    default:
      // The $object contains two user object variables:
      // - Author object
      // - Recipient object; The recipient is the guestbook owner.
      $entry = $object;
      $author = $object->author_obj;

      // If the entry author a anonymous visitor with uid 0 prepare the $author object.
      if ($author->uid == 0) {
        $author->name = $entry->anonname ? $entry->anonname : t(variable_get('anonymous', 'Anonymous'));
        // Anonymous has never a realname.
        // We use simply the anonymous system value as realname for a anonymous visitor.
        if (function_exists('realname_make_name') == true) {
          $author->realname = $entry->anonname ? $entry->anonname : t(variable_get('anonymous', 'Anonymous'));
        }
      }

      $message = check_markup($entry->message);

      $values['activity-entry-id'] = $entry->id;

      $values['activity-entry-date-time'] = format_date($entry->created, 'short');
      $values += token_get_date_token_values($entry->created);

      $values['activity-entry-author-uid']          = $author->uid;
      $values['activity-entry-author-name']         = check_plain($author->name);
      $values['activity-entry-author-name-raw']     = $author->name;
      $values['activity-entry-author-picture-path'] = $author->picture ? $author->picture : '';
      $values['activity-entry-author-picture']      = theme('image', $author->picture, '', '', array('class' => 'activity-user-picture')) ? $author->picture : '';
      
      $values['activity-entry-author-path']         = 'user/'. $author->uid;
      $values['activity-entry-author-link']         = theme('activity_username', $author);
      $values['activity-entry-author-url']          = base_path() . drupal_get_path_alias('user/'. $author->uid);

      $values['activity-entry-short']               = truncate_utf8($message, 64, false, true);
//      $values['activity-entry-short-link']        = l(truncate_utf8($message, 64), '');
      $values['activity-entry-medium']              = truncate_utf8($message, 256, false, true);
      $values['activity-entry-full']                = $message;

      $values['activity-entry-author-realname']     = $author->realname ? check_plain($author->realname) : check_plain($author->name);
      $values['activity-entry-author-realname-raw'] = $author->realname ? $author->realname : $author->name;

      break;
  }

  return $values;
}

/**
 * List all the Activity Actions that match the hook and op.
 *
 * @param string $hook
 *  The hook that is to be fired.
 * @param string $op
 *  The op to be used in the hook.
 * @param int $max_age
 *  The max age from now.
 *
 * @return array
 *  An array of arrays with 'id', 'created' and 'actor' keys.
 */
function dgb_entry_list_activity_actions($hook, $op, $max_age) {
  $actions = array();

  if (!empty($max_age)) {
    $min_time = time() - $max_age;
  }
  else {
    $min_time = 0;
  }


  if ($op == 'insert' ) {
    $sql = "SELECT id as id, created as created, author as actor FROM {dgb} WHERE created > %d";
  }

  if (isset($sql)) {
    $result = db_query($sql, $min_time);
    while ($row = db_fetch_array($result)) {
      $actions[] = $row;
    }
  }

  return $actions;
}


/**
 * Load up the context array to pass to activity_record.
 *
 * @param string $hook
 *  The hook that is being fired.
 * @param string $op
 *  The op for that hook.
 * @param string $id
 *  The id for the action.
 *
 * @return array
 *   The context array for activity_record.
 */
function dgb_entry_load_activity_context($hook, $op, $id) {
  $entry = entry_load($id);
  $context = array();
  if (!empty($entry)) {
    $context = array(
      'hook' => $hook,
      'op' => $op,
      'dgb' => (object) $entry,
    );
  }
  return $context;
}
