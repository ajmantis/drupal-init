<?php

namespace Drupal\angular_app\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * @Block(
 *   id = "drupal_angular",
 *   admin_label = @Translation("Drupal Angular"),
 *   category = @Translation("Custom"),
 * )
 */
class AngularAppBlock extends BlockBase
{

    /**
     * {@inheritdoc}
     */
    public function build()
    {
        return [
            '#type' => 'html_tag',
            '#tag' => 'app-root', // Selector of the your app root component from the Angular app
            '#theme' => 'angular-calendar',
            '#attached' => [
                'library' => [
                    'angular_app/angular_app', // To load the library only with this block
                ],
            ],
        ];
    }

}