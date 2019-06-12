<?php

namespace Drupal\video_embed_field\Form;

use Drupal\Core\Cache\Cache;
use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class VideoEmbedFieldSettingsForm.
 */
class VideoEmbedFieldSettingsForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return ['video_embed_field.settings'];
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'video_embed_field_settings';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['privacy_mode'] = [
      '#title' => $this->t('Privacy mode'),
      '#type' => 'checkbox',
      '#default_value' => $this->config('video_embed_field.settings')
        ->get('privacy_mode'),
    ];

    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $values = $form_state->getValues();
    $this->config('video_embed_field.settings')
      ->set('privacy_mode', $values['privacy_mode'])
      ->save();

    Cache::invalidateTags(['config:video_embed_field.settings']);
  }

}
