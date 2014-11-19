<?php

/**
 * @file dgb-entry-admin-overview.tpl.php
 * 
 * Default theme implementation for the content administration page
 * of the DGB entries.
 *
 * Available variables:
 * - $destination: The destination string.
 *                 As example: destination=admin/content/dgb?page=1
 * - $current_rows: Number of entries of the current page.
 * - $setting_rows: The saved row value.
 * - $setting_exinclude: The saved value to exclude or include entries.
 *
 * These variables are provided for content display.
 * - $content_options: 'Update options' fieldset.
 * - $content_top_jump: Dummy link to navigate to the table bottom.
 *                      Available are current rows equal to or greater 50.
 * - $content_below_jump: Dummy link to navigate to the table top.
 *                        Available are current rows equal to or greater 50.
 * - $content_table: The entries table itself.
 * - $content_exinclude: Exclude or include entries.
 * - $content_rows: Entries per page.
 * - $content_pager: The pager.
 * - $content_form: Form API values which are printed with the other contents!
 *
 * These variable are provided for context.
 * - $user: Full user object.
 *
 * @see template_preprocess_dgb_entry_admin_overview()
 * @see theme_dgb_entry_admin_overview()
 */
?>
<?php
print $content_top_jump;
print $content_options;

if ($current_rows >= 50) {
  print $content_pager;
}

print $content_table;
print $content_below_jump;
?>
<div class="clear-block">
  <div class="dgb_table-extras">
    <?php print $content_exinclude; ?>
  </div>
  <div class="dgb_table-extras">
    <?php print $content_rows; ?>
  </div>
  <?php print $content_pager; ?>
</div>
<?php print $content_form; ?>