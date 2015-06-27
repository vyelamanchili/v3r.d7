<?php

/**
 * @file
 * Administer Drupal Guestbook Import.
 *
 *   The form on the page allows to execute the import.
 */

/**
 * Provides the import function page.
 */
function dgb_import_form() {
  $form = array();

  $data = dgb_import_info();
  $info_table = _dgb_import_info_table($data);

  drupal_set_title('DGB guestbook migration - import guestbooks');

  $form['#data'] = $data;

  $description = t('Import of all <em>Guestbook</em> entries to the <em>Drupal Guestbook</em>.') .'<br />';
  $form['import'] = array(
    '#type' => 'fieldset',
    '#title' => t('Import'),
    '#description' => $description,
    '#collapsible' => false,
    '#collapsed' => false,
  );
  $form['import']['info'] = array(
    '#value' => '<div>'. $info_table .'</div>',
  );
  $form['possible'] = array(
    '#type' => 'value',
    '#value' => $data['possible']
  );

  if ($data['possible'] == true && $data['src']['count'] > 0) {
    if (variable_get('dgb_import_import_locked', 0) == 1) {
      $form['import']['import_locked'] = array(
        '#type' => 'checkbox',
        '#title' => t('Import lock'),
        '#description' => t('Uncheck this field to unlock the import function for a entry import.'),
        '#default_value' => variable_get('dgb_import_import_locked', 0)
      );
    }

    $form['submit'] = array(
      '#type' => 'submit',
      '#name' => 'import',
      '#value' => t('Import now!'),
      '#prefix' => '<div class="description">'. t('Note: The entry import will be executed immediately without confirmation. The operation can not be undone.') .'</div>'
    );
  }

  return $form;
}

/**
 * Submit callback from import function page.
 */
function dgb_import_form_submit($form, &$form_state) {
  if ($form_state['values']['possible'] == true && $form_state['values']['import_locked'] == 0) {
    variable_set('dgb_import_import_locked', 1);

    // Store info data to use later in the batch process.
    variable_set('dgb_import_import_info', $form['#data']);

    $function = 'dgb_import_execute_guestbook_batch';
    $batch = $function();
    batch_set($batch);
  }
  if ($form_state['values']['import_locked'] == 1) {
    drupal_set_message(t('No entry import executed. The import function is locked.'), 'status');
  }

  // Redirection takes place as usual.
  $form_state['redirect'] = 'admin/settings/dgb/import';
}

/**
 * Provides the user update function page.
 */
function dgb_user_update_form() {
  $form = array();

  $data = dgb_import_update_info();
  $info_table = _dgb_import_user_update_info_table($data);

  drupal_set_title('DGB guestbook migration - update user data');

  $description = t('Update the special guestbook data of all users.') .'<br />';
  $form['user_update'] = array(
    '#type' => 'fieldset',
    '#title' => t('Update'),
    '#description' => $description,
    '#collapsible' => false,
    '#collapsed' => false,
  );

  $form['user_update']['info'] = array(
    '#value' => '<div>'. $info_table .'</div>',
  );
  $form['necessary'] = array(
    '#type' => 'value',
    '#value' => $data['necessary']
  );

  if ($data['necessary'] == true) {
   $form['submit'] = array(
      '#type' => 'submit',
      '#name' => 'user_update',
      '#value' => t('Update now!'),
      '#prefix' => '<div class="description">'. t('Note: The user data update will be executed immediately without confirmation. The operation can not be undone.') .'</div>'
    );
  }

  return $form;
}

/**
 * Submit callback from user update function page.
 */
function dgb_user_update_form_submit($form, &$form_state) {
  if ($form_state['values']['necessary'] == true) {
    $function = 'dgb_import_execute_user_update_batch';
    $batch = $function();
    batch_set($batch);
  }
  // Redirection takes place as usual.
  $form_state['redirect'] = 'admin/settings/dgb/user-update';
}
