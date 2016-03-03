<?php

namespace Drupal\dclondon\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\dclondon\Service\GreeterInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class SpeakerController extends ControllerBase {

  /**
   * @var GreeterInterface
   */
  private $greeter;

  public function __construct(GreeterInterface $greeter) {
    $this->greeter = $greeter;
  }

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
    $name = $this->greeter->greet($name);

    return [
      '#markup' => t('Hello, @name.', ['@name' => $name]),
    ];
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    $speakerGreeter = $container->get('dclondon.speaker_greeter');

    return new static($speakerGreeter);
  }

}
