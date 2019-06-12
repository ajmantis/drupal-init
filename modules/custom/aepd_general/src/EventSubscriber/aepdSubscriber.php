<?php

namespace Drupal\aepd_general\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\EventDispatcher\Event;
use \Drupal\Core\Entity\EntityInterface;
use Drupal\scheduler\SchedulerEvent;

/**
 * Class aepdSubscriber.
 */
class aepdSubscriber implements EventSubscriberInterface {


  /**
   * Constructs a new aepdSubscriber object.
   */
  public function __construct() {

  }

  /**
   * {@inheritdoc}
   */
  static function getSubscribedEvents() {
    $events['scheduler.pre_publish'][]= ['setAdvertiseOn',40];

    return $events;
  }

  /**
   * This method is called whenever the scheduler.pre_publish event is
   * dispatched.
   *
   * @param SchedulerEvent $event
   */
  public function setAdvertiseOn(SchedulerEvent $event) {
    // If node is published by schedule, we save publish on
    // date in field_advertise_on field
    $node = $event->getNode();
    if ($node->hasField('field_advertise_on') && isset($node->get('publish_on')->getValue()[0]['value'])) {
      $publish_on =  date('Y-m-d\TH:i:s', $node->get('publish_on')->getValue()[0]['value']);
      $node->set('field_advertise_on', $publish_on);
    }
  }

}
