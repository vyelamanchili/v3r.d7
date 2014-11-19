<?php

/**
 * @file dgb-entry-submitted.tpl.php
 *
 * Default theme implementation for the submitted line of an entry.
 *
 * Available variables:
 * - $submitted: Name of poster with date and time of guestbook entry.
 * - $created: Date and time of guestbook entry.
 * - $anonemail: The e-mail of a anonymous entry poster.
 * - $anonwebsite: The website URL of a anonymous entry poster.
 *
 * Additional variables:
 * - $eid: The entry ID.
 * - $owner_uid: The guestbook owner. ID 0: The website guestbook.
 * - $author_id: Guestbook entry author name.
 * - $author_name: Guestbook entry author name. Can be link or plain text.
 *
 * These two variables are provided for context:
 * - $entry: Full entry array.
 * - $user: Full user object.
 *
 * @see template_preprocess_dgb_entry_submitted()
 * @see template_preprocess_dgb_entry()
 */
?>
<div class="submitted">
  <?php print $submitted; ?>
  <?php if ($anonemail): ?>
    <?php print $anonemail; ?>
  <?php endif; ?>
  <?php if ($anonwebsite): ?>
    <?php print $anonwebsite; ?>
  <?php endif; ?>
</div>