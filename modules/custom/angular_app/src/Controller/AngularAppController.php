<?php

namespace Drupal\angular_app\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\DependencyInjection\ContainerInterface;


/**
 * Returns responses for angular_app routes.
 */
class AngularAppController extends ControllerBase {

  /**
   * Builds the response.
   */
  public function build() {

      return [
          '#theme' => 'angular-calendar',
          '#attached' => [
              'library' => [
                  'angular_app/angular_app',
              ],
          ],
      ];
  }

}
