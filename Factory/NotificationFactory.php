<?php
namespace JT\NotificationBundle\Factory;

use Doctrine\Common\Proxy\Exception\InvalidArgumentException;
use JT\NotificationBundle\Entity\Notification;
use JT\NotificationBundle\Builder\NotificationBuilder;
use JT\NotificationBundle\Notification\Type\AbstractType;
use JT\NotificationBundle\Builder\NotificationBuilderInterface;

class NotificationFactory
{
    private $builder;

    public function __construct(NotificationBuilderInterface $builder)
    {
        $this->builder = $builder;
    }

    public function createNotification($type, array $options = array())
    {
        $notificationType = new $type;
        if (!$notificationType instanceof AbstractType){
            throw new \InvalidArgumentException("The notification type must extends JT\NotificationBundle\Notification\Type\AbstractType, $type given.");
        }

        $notificationType->buildNotification($this->builder, $options);

        return $this->builder->getNotification();
    }
}