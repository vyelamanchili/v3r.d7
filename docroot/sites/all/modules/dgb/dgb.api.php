<?php
// $Id$

/**
 * @file
 * Hooks provided by the Drupal Guestbook (DGB) module.
 */

/**
 * @addtogroup hooks
 * @{
 */

/**
 * The entry is used.
 *
 * @param array $entry
 *   A guestbook entry.
 * @param string $op
 *   A string containing the name of the hook operation. Possible values:
 *   - "insert": The guestbook entry is being inserted.
 *   - "update": The guestbook entry is being updated.
 *   - "view": The guestbook entry is being viewed.
 *     This hook can be used to add additional data to the guestbook entry before theming.
 *   - "validate": The user has just finished editing the guestbook entry and is trying to submit it.
 *     This hook can be used to check or even modify the guestbook entry. Errors should be set with form_set_error().
 *   - "delete": The guestbook entry is being deleted.
 *   - "unpublish": The guestbook entry is being unpublished.
 *   - "publish": The guestbook entry is being published.
 * @param $a3, $a4
 *   Arguments to pass on to the hook, after the $entry and $op arguments.
 *
 * @see dgb_entry()
 * @see dgb_form_entry_form_validate()
 * @see dgb_form_entry_form_submit()
 * @see dgb_form_entry_form_edit_submit()
 * @see dgb_form_comment_form_submit()
 * @see dgb_delete_entry_confirm_submit()
 * @see theme_dgb()
 * @see dgb_update_index()
 * @see dgb_search()
 */
function hook_dgb_entry(&$entry, $op, $a3 = NULL, $a4 = NULL) {
  switch ($op) {
    case 'update':
      if (function_exists('search_wipe')) {
        dgb_search_touch_entry($entry['id']);
      }
      break;

    case 'insert':
      if (function_exists('search_wipe')) {
        dgb_search_touch_entry($entry['id']);
      }
      break;
      
    case 'delete':
      // Remove this entry from the search index if needed.
      if (function_exists('search_wipe')) {
        search_wipe($entry['id'], 'node');
      }
      break;
  }
}

/**
 * The entry comment is used.
 *
 * @param array $entry
 *   A guestbook entry.
 * @param string $op
 *   A string containing the name of the hook operation. Possible values:
 *   - "insert": The guestbook entry comment is being inserted.
 *   - "update": The guestbook entry comment is being updated.
 *     This hook can be used to add additional data to the guestbook entry before theming.
 *   - "validate": The user has just finished editing the guestbook entry comment and is trying to submit it.
 *     This hook can be used to check or even modify the guestbook entry. Errors should be set with form_set_error().
 *   - "delete": The guestbook entry comment is being deleted.
 * @param $a3, $a4
 *   Arguments to pass on to the hook, after the $entry and $op arguments.
 *
 * @see dgb_form_comment_form_submit()
 */
function hook_dgb_entry_comment(&$entry, $op, $a3 = NULL, $a4 = NULL) {
}

/**
 * The guestbook entry command links. The module may modify the links before theming.
 *
 * @param array $links
 *   Links to work with the entry. E. g. edit, delete, add comment ...
 * @param array $entry
 *   A guestbook entry.
 *
 * @see template_preprocess_dgb_entry()
 */
function hook_dgb_entry_link_alter($links, $entry) {
}

/**
 * CSS classes for entry links. The module may modify the classes before theming.
 *
 * @param string $classes
 *   CSS classes for the ul tag, used with theme_links().
 *
 * @see template_preprocess_dgb_entry()
 */
function hook_dgb_entry_link_classes_alter($classes) {
  $classes .= ' dgb-contextual-links';
}

/**
 * The guestbooks list was built in the guestbooks page. The module may modify the structured content before theming.
 *
 * @param array $dgbs
 *   The array contains the entries are viewed.
 *
 * @see dgb_list()
 */
function hook_dgb_list_alter($dgbs) {
}

/**
 * @} End of "addtogroup hooks".
 */
