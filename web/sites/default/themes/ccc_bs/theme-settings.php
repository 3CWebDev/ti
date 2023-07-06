<?php

/**
 * @file
 * Provides an additional config form for theme settings.
 */

use Drupal\Core\Form\FormStateInterface;

// Set theme name to use in the key values.
//$theme_name = \Drupal::theme()->getActiveTheme()->getName();

/**
 * Implements hook_form_system_theme_settings_alter().
 *
 * Form override for theme settings.
 */
function ccc_bs_form_system_theme_settings_alter(array &$form, FormStateInterface $form_state) {


  $form['options_settings']['social_options_settings'] = [
      '#group' => 'bootstrap',
      '#type' => 'details',
      '#title' => t('Social Media Settings'),
  ];
  $form['options_settings']['social_options_settings']['facebook'] = [
      '#type' => 'textfield',
      '#title' => t('Facebook URL'),
      '#default_value' => theme_get_setting('facebook'),
  ];
  $form['options_settings']['social_options_settings']['twitter'] = [
      '#type' => 'textfield',
      '#title' => t('Twitter URL'),
      '#default_value' => theme_get_setting('twitter'),
  ];
  $form['options_settings']['social_options_settings']['youtube'] = [
      '#type' => 'textfield',
      '#title' => t('YouTube URL'),
      '#default_value' => theme_get_setting('youtube'),
  ];
  $form['options_settings']['social_options_settings']['googleplus'] = [
      '#type' => 'textfield',
      '#title' => t('Google+ URL'),
      '#default_value' => theme_get_setting('googleplus'),
  ];
  $form['options_settings']['social_options_settings']['linkedin'] = [
      '#type' => 'textfield',
      '#title' => t('LinkedIn URL'),
      '#default_value' => theme_get_setting('linkedin'),
  ];
  $form['options_settings']['social_options_settings']['pinterest'] = [
      '#type' => 'textfield',
      '#title' => t('Pinterest URL'),
      '#default_value' => theme_get_setting('pinterest'),
  ];
  $form['options_settings']['social_options_settings']['instagram'] = [
      '#type' => 'textfield',
      '#title' => t('Instagram URL'),
      '#default_value' => theme_get_setting('instagram'),
  ];
  $form['options_settings']['social_options_settings']['tripadvisor'] = [
    '#type' => 'textfield',
    '#title' => t('Trip Advisor URL'),
    '#default_value' => theme_get_setting('tripadvisor'),
  ];

}
