<?php
namespace JT\NotificationBundle\Notification\Type;

use JT\NotificationBundle\Builder\NotificationBuilderInterface;

abstract class AbstractType
{
    abstract public function buildNotification(NotificationBuilderInterface $builder, array $options);
}
