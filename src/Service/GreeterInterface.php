<?php

namespace Drupal\dclondon\Service;

interface GreeterInterface {

  /**
   * Greet someone.
   *
   * @param string $name
   *   The raw name of the person.
   *
   * @return string
   *   The formatted name.
   */
  public function greet($name);

}
