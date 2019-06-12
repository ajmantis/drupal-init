<?php

namespace Drupal\stepper_angular_app\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\DependencyInjection\ContainerInterface;


/**
 * Returns responses for stepper_angular_app routes.
 */
class StepperAngularAppController extends ControllerBase {

  /**
   * Builds the response.
   */
  public function build() {

        return [
            '#theme' => 'angular-stepper',
            '#attached' => [
                'library' => [
                    'stepper_angular_app/stepper_angular_app',
                ],
            ],
        ];
    }

}
