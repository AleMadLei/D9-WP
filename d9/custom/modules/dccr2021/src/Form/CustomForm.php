<?php

namespace Drupal\dccr2021\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Link;
use Drupal\Core\Url;

class CustomForm extends FormBase {

  /**
   * @inheritdoc
   */
  public function getFormId() {
    return 'custom_form';
  }

  /**
   * @inheritdoc
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['texto'] = [
      '#attributes' => [
        'placeholder' => t('Add some text here.'),
      ],
      '#type' => 'textfield',
      '#title' => 'El texto',
    ];

    if ($form_state->getValue('texto')) {
      $form['elementos'] = [
        '#prefix' => '<div class="el-contenedor">',
        '#suffix' => '</div>',
        '#type' => 'container',
        'primero' => [
          '#type' => '#markup',
          '#markup' => t('@siguiente is the value added.', ['@siguiente' => $form_state->getValue('texto')]),
        ],
        'segundo' => [
          '#markup' => Link::fromTextAndUrl('Ir al formulario administrativo', Url::fromRoute('dccr2021.custom-4'))->toString(),
        ],
      ];
    }

    $form['actions'] = [
      '#type' => 'actions',
      'submit' => [
        '#type' => 'submit',
        '#value' => t('Enviar'),
      ],
    ];

    return $form;
  }

  /**
   * @inheritdoc
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    if ($form_state->getValue('texto') !== 'siguiente') {
      $form_state->setErrorByName('texto', t('El valor debe ser "siguiente" para poder continuar.'));
    }
  }

  /**
   * @inheritdoc
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $form_state->setRebuild();
  }
}