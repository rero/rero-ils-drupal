<?php

namespace Drupal\rero_ils_block\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Render\Markup;

/**
 * Provides a 'RERO ILS' Angular Block.
 *
 * @Block(
 *   id = "rero_ils_block",
 *   admin_label = @Translation("RERO ILS Block")
 * )
 */
class ReroIlsBlock extends BlockBase {
  public function build() {
    return [
      '#markup' => Markup::create('<div class="container rero-ils-ui"><public-search-root></public-search-root></div>'),
      '#attached' => [
        'library' => [
          'rero_ils_block/angular_app',
        ],
      ],
    ];
  }
}
