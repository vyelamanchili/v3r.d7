<?php

/**
 * @file:
 * Author Pane 2.x module integration for the Drupal Guestbook (DGB) module.
 */

/**
 * Implementation of hook_preprocess_author_pane().
 */
function dgb_preprocess_author_pane(&$variables) {
  global $user;

  // Author Pane 2.x has "caller" variable to let different modules have their
  // own templates and thus preprocesses. We must check it so we insert link
  // only when it's needed.
  $caller = $variables['caller'];
  if (empty($caller)) {
    return;
  }

  $account = $variables['account'];
  if (dgb_access_dgb($account) == true && arg(2) != 'dguestbook' && $account->dgb_status) {
    $variables['dgb_link'] = l(t('Guestbook'), dgb_dgb_path($account->uid), array('attributes' => array('class' => 'author-dgb-icon')));
  }
}
