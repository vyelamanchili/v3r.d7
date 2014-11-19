<?php

/**
 * @file dgb-latest-entries-block-list.tpl.php
 * Default theme implementation for the entry list in
 * the 'DGB latest entries' block.
 *
 * Available variables:
 * - $sub_title: The rendered sub title.
 * - $entry_list: The rendered entry list.
 * - $items: Associative array, keyed with entry ID and
 *           the rendered entry display link.
 *
 * These variable are provided for context.
 * - $user: Full user object.
 *
 * @see template_preprocess_dgb_latest_entries_block_list()
 * @see theme_dgb_latest_entries_block_list()
 */
?>
<?php if ($entry_list): ?>
  <div class="sub-title">
    <?php print $sub_title; ?>
  </div>
  <?php print $entry_list; ?>
<?php endif; ?>