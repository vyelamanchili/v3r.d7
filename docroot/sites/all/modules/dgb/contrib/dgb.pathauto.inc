<?php

/**
* @file
*   Pathauto functions for the Drupal Guestbook (DGB) module.
*/

/**
 * Implementation of hook_pathauto().
 */
function dgb_pathauto($op) {
  switch ($op) {
    case 'settings':
      $settings = array();
      $settings['module']           = 'dgb';
      $settings['token_type']       = 'dgb';
      $settings['groupheader']      = t('User guestbook paths');
      $settings['patterndescr']     = t('Pattern for user guestbook page paths: ');
      $settings['patterndefault']   = t('users/[dgb-uid]/dguestbook');
      // Create aliases.
      $settings['bulkname']         = t('Bulk generate aliases for user guestbook paths that are not aliased');
      $settings['bulkdescr']        = t('Generate aliases for all existing user guestbook paths which do not already have aliases.');
      // Update aliases.
      $settings['bulk_update']      = t('Bulk update aliases for user guestbook paths that are aliased');
      $settings['bulk_updatedescr'] = t('Update aliases for all existing user guestbook paths which have aliases.');

      return (object) $settings;

    default:
      break;
  }
}

///**
// * Implementation of hook_user_operations().
// */
//function guestbook_user_operations() {
//  $operations['guestbook_update_alias'] = array(
//    'label' => t('Update URL alias'),
//    'callback' => 'guestbook_user_update_alias_multiple',
//    'callback arguments' => array('bulkupdate', TRUE),
//  );
//  return $operations;
//}
//
///**
// * Update the URL aliases for multiple user accounts.
// *
// * @param $uids
// *   An array of user account IDs.
// * @param $op
// *   Operation being performed on the accounts ('insert', 'update' or
// *   'bulkupdate').
// * @param $message
// *   A boolean if TRUE will display a message about how many accounts were
// *   updated.
// */
//function guestbook_user_update_alias_multiple($uids, $op, $message = FALSE) {
//dsm('guestbook_user_update_alias_multiple');
//  foreach ($uids as $uid) {
//    if ($account = user_load($uid)) {
//      pathauto_user_update_alias($account, $op);
//    }
//  }
//  if ($message) {
//    drupal_set_message(format_plural(count($uids), 'Updated URL alias for 1 user account.', 'Updated URL aliases for @count user accounts.'));
//  }
//}

/**
 * Implementation of hook_path_alias_types().
 */
function dgb_path_alias_types() {
  $objects['user/%/dguestbook'] = t('User guestbooks');
  return $objects;
}

/**
 * Bulk generate new aliases for all user Drupal Guestbooks without aliases.
 */
function dgb_pathauto_bulkupdate() {
  $query = "SELECT uid, name, src, dst FROM {users} LEFT JOIN {url_alias} ON CONCAT_WS('/', 'user', CAST(uid AS CHAR), 'dguestbook') = src WHERE uid > 0 AND src IS NULL";
  $result = db_query_range($query, 0, variable_get('pathauto_max_bulk_update', 50));

  $count = 0;
  $placeholders = array();
  while ($user = db_fetch_object($result)) {
    $placeholders = pathauto_get_placeholders('dgb', $user);

    $source = 'user/'. $user->uid .'/dguestbook';
    if (pathauto_create_alias('dgb', 'bulkupdate', $placeholders, $source, $user->uid)) {
      ++$count;
    }
  }

  drupal_set_message(format_plural($count,
    'Bulk generation of user Drupal Guestbooks completed, one alias generated.',
    'Bulk generation of user Drupal Guestbooks completed, @count aliases generated.'));
}

/**
 * Bulk update aliases for all user Drupal Guestbooks with aliases.
 *
 * @see guestbook_form_alter()
 */
function dgb_dgb_bulk_update() {
  module_load_include('inc', 'pathauto');
  
  $query = "SELECT uid, name, src, dst FROM {users} LEFT JOIN {url_alias} ON CONCAT_WS('/', 'user', CAST(uid AS CHAR), 'dguestbook') = src WHERE uid > 0 AND src IS NOT NULL";
  $result = db_query_range($query, 0, variable_get('pathauto_max_bulk_update', 50));

  $count = 0;
  $placeholders = array();
  while ($user = db_fetch_object($result)) {
    $placeholders = pathauto_get_placeholders('dgb', $user);

    if (pathauto_create_alias('dgb', 'update', $placeholders, "user/{$user->uid}/dguestbook", $user->uid)) {
      ++$count;
    }
  }

  drupal_set_message(format_plural($count,
    'Bulk update of user Drupal Guestbooks completed, one alias updated.',
    'Bulk update of user Drupal Guestbooks completed, @count aliases updated.'));
}
