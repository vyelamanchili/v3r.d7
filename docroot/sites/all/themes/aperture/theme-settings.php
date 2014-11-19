<?php

function aperture_settings($settings) {
  $form = array();
  $options = array(
    'babyblue' => t('Baby Blue'),
    'beige' => t('Beige'),
    'black' => t('Black'),
    'blue' => t('Blue'),
    'blue-stripe' => t('Blue Stripe'),
    'green' => t('Green'),
    'green-stripe' => t('Green Stripe'),
    'grey' => t('Grey'),
    'orange-stripe' => t('Orange Stripe'),
    'red' => t('Red'),
    'white' => t('White'),
    'yellow' => t('Yellow'),
    'yellow-stripe' => t('Yellow Stripe'),
  );
  $form['colour'] = array(
    '#type' => 'select',
    '#title' => t('Colour scheme'),
    '#options' => $options,
    '#default_value' => isset($options[$settings['colour']]) ? $settings['colour'] : 'beige',
  );
  return $form;
}
