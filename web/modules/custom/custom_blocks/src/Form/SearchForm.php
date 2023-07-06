<?php

/**
 * @file
 * Contains \Drupal\custom_blocks\Form\SearchForm.
 */
namespace Drupal\custom_blocks\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Drupal\Core\Url;

class SearchForm extends FormBase {
  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'custom_search_form';
  }
  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['search'] = array(
      '#type' => 'textfield',
      '#title' => t(''),
      '#attributes' => array(
        'placeholder' => t('search transfers'),
      ),
    );

    $form['actions']['#type'] = 'actions';
    $form['actions']['submit'] = array(
      '#type' => 'submit',
      '#value' => $this->t('Search'),
      '#button_type' => 'primary',
    );
    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $values = $form_state->getValues();
    if (isset($values['search'])){
      $search_term = $values['search'];
      $url = Url::fromRoute('view.stock_transfers_new.page_1');
      $url->setRouteParameters(array('search' => $search_term));
      $form_state->setRedirectUrl($url);
    }

  }
}