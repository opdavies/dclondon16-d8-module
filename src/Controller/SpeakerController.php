<?php

namespace Drupal\dclondon\Controller;

use Drupal\dclondon\Service\SpeakerGreeter;

class SpeakerController {

  /**
   * Say hello to a speaker.
   *
   * @param string $name
   *   The name of the speaker.
   *
   * @return array
   *   A render array.
   */
  public function hello($name) {
    $greeter = new SpeakerGreeter();
    $name = $greeter->greet($name);

    return [
      '#markup' => t('Hello, @name.', ['@name' => $name]),
    ];
  }

}
