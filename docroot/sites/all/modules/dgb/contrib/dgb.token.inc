<?php

/**
* @file
*   Token module support for the Drupal Guestbook (DGB) module.
*/

/**
 * Implementation of hook_token_list().
 */
function dgb_token_list($type = 'all') {
  if ($type == 'dgb' || $type == 'all') {
    $tokens['dgb']['dgb-uid']            = t('DGB') .': '. t('The guestbook ID as guestbook owner uid.');
    $tokens['dgb']['dgb-link']           = t('DGB') .': '. t('The themed link to the guestbook.');

    $tokens['dgb']['dgb-owner-uid']      = t('DGB') .': '. t('User ID of the guestbook owner.');
    $tokens['dgb']['dgb-owner-link']     = t('DGB') .': '. t("The themed link to the guestbook owner's profile.");
    $tokens['dgb']['dgb-owner-name']     = t('DGB') .': '. t('User name of the guestbook owner.');
    $tokens['dgb']['dgb-owner-name-raw'] = t('DGB') .': '. t('Unfiltered user name of the guestbook owner. <em>Warning: Token value contains raw user input</em>.');

    if (function_exists('realname_make_name') == true) {
      $tokens['dgb']['dgb-owner-realname']     = t('DGB') .': '. t('Realname of the guestbook owner.');
      $tokens['dgb']['dgb-owner-realname-raw'] = t('DGB') .': '. t('Unfiltered realname of the guestbook owner. <em>Warning: Token value contains raw user input</em>.');
    }
  }

  return $tokens;
}

/**
 * Implementation of hook_token_values().
 */
function dgb_token_values($type, $object = NULL, $options = array()) {
  $values = array();

  switch ($type) {
    case 'dgb':
    default:
      // Pathauto context.
      if (($object->src && $object->dst) || empty($object->src)) {
        // Recipient object; The recipient is the drupal guestbook owner.
        $recipient = user_load(array('uid' => $object->uid));
        // Adjust for the anonymous user name.
        if (!$recipient->uid && !$recipient->name) {
          $recipient->name = variable_get('anonymous', t('Anonymous'));
        }
      }
      // Other contexts; E. g. Activity
      elseif (!isset($object->src)) {
        // The $object contains two user object variables:
        // - Author object
        // - Recipient object; The recipient is the drupal guestbook owner.
        $recipient = $object->recipient_obj;
      }

      // If the recipient uid 0 it is the site guestbook.
      // We fake the name and use the site guestbook title.
      if ($recipient->uid == 0) {
        $recipient->name = variable_get('dgb_site_title', t('Site guestbook'));
        // The site guestbook has never a realname.
        // We use simply the site guestbook title as realname.
        if (function_exists('realname_make_name') == true) {
          $recipient->realname = $recipient->name;
        }
      }

      $values['dgb-uid']                = $recipient->uid;
      $values['dgb-link']               = l(t('Guestbook'), dgb_dgb_path($recipient->uid), array('attributes' > array('title' => t('Visit the guestbook'))));

      $values['dgb-owner-uid']          = $recipient->uid;
      $values['dgb-owner-link']         = theme('username', $recipient);
      $values['dgb-owner-name']         = check_plain($recipient->name);
      $values['dgb-owner-name-raw']     = $recipient->name;

      $values['dgb-owner-realname']     = $recipient->realname ? check_plain($recipient->realname) : check_plain($recipient->name);
      $values['dgb-owner-realname-raw'] = $recipient->realname ? $recipient->realname : $recipient->name;
      
      break;
  }

  return $values;
}
