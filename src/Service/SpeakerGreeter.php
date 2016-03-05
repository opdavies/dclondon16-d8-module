<?php

namespace Drupal\dclondon\Service;

class SpeakerGreeter implements GreeterInterface {

  /**
   * @var boolean
   */
  private $shout;

  public function __construct($shout) {
    $this->shout = $shout;
  }

  /**
   * {@inheritdoc}
   */
  public function greet($name) {
    if ($this->shout) {
      $name = strtoupper($name);
    }
    else {
      $name = ucfirst($name);
    }

    return $name;
  }

}
