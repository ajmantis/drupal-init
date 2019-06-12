<?php

namespace Drupal\stepper_angular_app\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * @Block(
 *   id = "drupal_stepper_angular",
 *   admin_label = @Translation("Stepper Angular"),
 *   category = @Translation("Custom"),
 * )
 */
class StepperAngularAppBlock extends BlockBase
{

    /**
     * {@inheritdoc}
     */
    public function build()
    {
        return [
            '#type' => 'html_tag',
            '#tag' => 'app-root', // Selector of the your app root component from the Angular app
            '#theme' => 'angular-stepper',
            '#attached' => [
                'library' => [
                    'stepper_angular_app/stepper_angular_app', // To load the library only with this block
                ],
            ],
        ];
    }

}