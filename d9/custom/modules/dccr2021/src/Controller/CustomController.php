<?php

namespace Drupal\dccr2021\Controller;

use Drupal\Core\Access\AccessResult;
use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Link;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Url;
use Drupal\dccr2021\Form\CustomAdminForm;

/**
 * An example controller.
 */
class CustomController extends ControllerBase {

  /**
   * Demo 1, ruta con contenido básico solo para usuarios con permiso de acceso a contenido.
   */
  public function custom1() {
    $build = [
      'elemento_1' => [
        '#markup' => $this->t('Hola mundo para todos.'),
      ],
      'elemento_2' => [
        '#markup' => '<a href="/dccr2021/demo-2">Siguiente página.</a>'
      ],
    ];
    return $build;
  }

  /**
   * Demo 2, ruta con contenido básico para todos los usuarios.
   */
  public function custom2() {
    $build = [
      '#theme' => 'item_list',
      '#items' => [
        $this->t('para usuarios con permiso de acceso de contenido.'),
        Link::fromTextAndUrl('Ir al demo 3', Url::fromRoute('dccr2021.custom-3')),
      ],
    ];
    return $build;
  }

  /**
   * Demo 3, ruta con contenido básico para todos los usuarios.
   */
  public function custom3() {
    $build = [
      'form' => \Drupal::formBuilder()->getForm('Drupal\dccr2021\Form\CustomForm'),
    ];
    return $build;
  }

  /**
   * Demo 5, ruta con contenido parámetros.
   */
  public function custom5($el_valor) {
    $build = [
      [
        '#markup' => $el_valor,
      ],
      [
        '#markup' => Link::fromTextAndUrl('Ir al demo 6', Url::fromRoute('dccr2021.custom-6'))->toString(),
      ],
    ];
    return $build;
  }

  /**
   * Demo 6, chequeo de accesos.
   */
  public function access6(AccountInterface $account) {
    if (rand(0, 1000) > 500) {
      return AccessResult::allowed();
    }
    return AccessResult::forbidden();
  }

  /**
   * Demo 6, ruta con contenido parámetros.
   */
  public function custom6() {
    $config = \Drupal::config(CustomAdminForm::SETTINGS);
    $build = [
      [
        '#theme' => 'dccr2021_texto',
        '#el_valor_textual' => $config->get('texto'),
      ],
    ];
    return $build;
  }
}