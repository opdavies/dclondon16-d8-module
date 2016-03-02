<?php

namespace Drupal\dclondon\Controller;

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
    return [
      '#markup' => t('Hello, @name.', ['@name' => $name]),
    ];
  }

}
