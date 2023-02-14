<?php

namespace Drupal\balidea_module\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Returns responses for Balidea Module routes.
 */
class BalideaModuleController extends ControllerBase {

  /**
   * Builds the response.
   */
  public function build() {
    $config = $this->config('balidea_module.settings');
    $build['content'] = [
      '#theme' => 'balides_render',
      '#text_settings' => $config->get('text'),
      '#integer_settings' => $config->get('integer'),
    ];

    return $build;
  }

}
