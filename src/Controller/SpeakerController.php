<?php

namespace Drupal\dclondon\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Logger\LoggerChannelFactoryInterface;
use Drupal\dclondon\Service\GreeterInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class SpeakerController extends ControllerBase {

  /**
   * @var GreeterInterface
   */
  private $greeter;

  /**
   * @var LoggerChannelFactoryInterface
   */
  private $logger;

  public function __construct(GreeterInterface $greeter, LoggerChannelFactoryInterface $logger) {
    $this->greeter = $greeter;
    $this->logger = $logger;
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

    $this->logger->get('default')->info($name);

    return [
      '#markup' => $this->t(
        \Drupal::config('dclondon.settings')->get('greeter_text'),
        ['@name' => $name]
      ),
    ];
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    $speakerGreeter = $container->get('dclondon.speaker_greeter');
    $logger = $container->get('logger.factory');

    return new static($speakerGreeter, $logger);
  }

}
