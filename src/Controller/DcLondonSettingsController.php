<?php

namespace Drupal\dclondon\Controller;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

class DcLondonSettingsController extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return ['dclondon.settings'];
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'dclondon_settings_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['greeter_text'] = [
      '#default_value' => $this->config('dclondon.settings')->get('greeter_text'),
      '#required' => TRUE,
      '#title' => t('Greeter text'),
      '#type' => 'textfield',
    ];

    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $this->config('dclondon.settings')
      ->set('greeter_text', $form_state->getValue('greeter_text'))
      ->save();

    parent::submitForm($form, $form_state);
  }
}
