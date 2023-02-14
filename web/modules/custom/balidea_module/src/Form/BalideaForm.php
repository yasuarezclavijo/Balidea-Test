<?php

namespace Drupal\balidea_module\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Balidea settings.
 */
class BalideaForm extends ConfigFormBase {
  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'balidea_settings';
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'balidea_module.settings',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form = parent::buildForm($form, $form_state);
    $settings = $this->config('balidea_module.settings');

    $form['text'] = [
      '#title' => $this->t('Title'),
      '#type' => 'text_format',
      '#format' => $settings->get('text')['format'],
      '#default_value' => $settings->get('text')['value'] ?? '',
    ];

    $form['integer'] = [
      '#title' => $this->t('Integer'),
      '#type' => 'textfield',
      '#attributes' => [
        ' type' => 'number',
      ],
      '#default_value' => $settings->get('integer') ?? '',
    ];
    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $settings = $this->configFactory->getEditable('balidea_module.settings');
    // Save configurations.
    $settings
      ->set('text', $form_state->getValue('text'))
      ->set('integer', $form_state->getValue('integer'))
      ->save();
  }

}
