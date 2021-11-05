<?php

namespace Drupal\dccr2021\Form;

use Drupal\Component\Utility\Xss;
use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Link;
use Drupal\Core\Url;

class CustomAdminForm extends ConfigFormBase {

  /**
   * Config settings.
   *
   * @var string
   */
  const SETTINGS = 'dccr2021.config';

  /**
   * @inheritdoc
   */
  public function getFormId() {
    return 'custom_admin_form';
  }

  /**
   * @inheritdoc
   */
  public function getEditableConfigNames() {
    return [
      static::SETTINGS,
    ];
  }

  /**
   * @inheritdoc
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config(static::SETTINGS);
    $form['texto'] = [
      '#attributes' => [
        'placeholder' => t('Add some text here.'),
      ],
      '#default_value' => $config->get('texto'),
      '#type' => 'textfield',
      '#title' => 'El texto',
    ];

    if ($config->get('texto')) {
      $form['text'] = [
        '#markup' => Link::fromTextAndUrl(t('Siguiente ejemplo'), Url::fromRoute('dccr2021.custom-5', ['el_valor' => $config->get('texto')]))->toString(),
      ];
    }

    return parent::buildForm($form, $form_state);
  }

  /**
   * @inheritdoc
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    if (!preg_match('/salvar [\d\w\s\-_]+/', $form_state->getValue('texto'))) {
      $form_state->setErrorByName('texto', t('El valor debe contener "salvar" para poder continuar.'));
    }
  }

  /**
   * @inheritdoc
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $this
      ->configFactory
      ->getEditable(static::SETTINGS)
      ->set('texto', Xss::filter($form_state->getValue('texto')))
      ->save();
    $this->messenger()->addStatus('Configuración salvada.');
  }

}