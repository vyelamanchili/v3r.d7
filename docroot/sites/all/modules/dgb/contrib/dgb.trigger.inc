<?php
// $Id$

/**
 * @file:
 * Trigger module integration for the Drupal Guestbook (DGB) module.
 */

/**
 * Implementation of hook_trigger_name().
 */
function dgb_dgb($op, $entry) {
  if (function_exists('_trigger_get_hook_aids') == false) {
    return;
  }
  // We support a subset of operations.
  $operations = array('insert' => 'insert', 'update' => 'update', 'view' => 'view', 'delete' => 'delete', 'unpublish' => 'unpublish', 'publish' => 'publish');
  if (!isset($operations[$op])) {
    return;
  }
  $aids = _trigger_get_hook_aids('dgb', $op);
  $context = array(
    'hook' => 'dgb',
    'op' => $op,
    'dgb' => (object)$entry,
    'recipient' => $entry['recipient_obj']->uid,
    'recipientname' => $entry['recipient_obj']->name,
    'author' => $entry['author_obj']->uid
  );
  actions_do(array_keys($aids), $entry, $context);
}
