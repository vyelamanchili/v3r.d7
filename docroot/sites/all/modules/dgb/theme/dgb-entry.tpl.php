<?php
// $Id$

/**
 * @file dgb-entry.tpl.php
 * Default theme implementation for a guestbook entry.
 *
 * Available variables:
 * - $entry_classes: CSS classes for the entry body.
 * - $eid: The entry ID.
 * - $owner_uid: The guestbook owner. ID 0: The website guestbook.
 * - $submitted: By line with name, date and time.
 * - $picture: Guestbook entry authors picture.
 *
 * - $message: Body of the guestbook entry.
 * - $entry_comment: The entry comment from guestbook owner.
 *
 * - $status: Guestbook entry status. Possible values are:
 *            dgb-entry-unpublished or dgb-entry-published.
 * - $links_source: Various entry links as array if available by user permissions.
 * - $links: Various entry links if available by user permissions.
 *
 * These two variables are provided for context:
 * - $entry: Full entry array.
 * - $user: Full user object.
 *
 * @see template_preprocess_dgb_entry()
 * @see theme_dgb()
 */
?>
<div id="dgb-entry-<?php print $eid; ?>" class="dgb-entry <?php print $status; ?> <?php print $zebra; ?> <?php print $entry_classes; ?> clear-block">
  <a id="entry-<?php print $eid; ?>"></a>
  <div class="meta">
    <?php print $picture ?>
    <?php print $submitted; ?>
  </div>
  <div class="dgb-message">
    <?php print $message; ?>
  </div>
  <?php if ($entry_comment): ?>
    <a name="comment-entry"></a>
    <?php print $entry_comment; ?>
  <?php endif; ?>
    <?php print $links; ?>
</div>