<?php

/**
 * @file dgb-entry-comment.tpl.php
 * Default theme implementation for guestbook entry comments.
 *
 * Available variables:
 * - $submitted: By line with name.
 * - $comment: The entry comment.
 *
 * These two variables are provided for context.
 * - $entry: Full entry array.
 * - $user: Full user object.
 *
 * @see template_preprocess_dgb_entry_comment()
 * @see theme_dgb_entry_comment()
 */
?>
<?php if ($comment): ?>
<div class="dgb-comment">
  <div class="dgb-comment-submitted">
    <?php print $submitted; ?>
  </div>
  <div class="dgb-comment-content">
    <?php print $comment; ?>
  </div>
</div>
<?php endif; ?>