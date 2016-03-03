<?php

namespace Drupal\dclondon\Service;

class SpeakerGreeter implements GreeterInterface {

  /**
   * {@inheritdoc}
   */
  public function greet($name) {
    return ucfirst($name);
  }

}
