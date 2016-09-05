<?php
namespace JT\NotificationBundle\Helper;

use JT\NotificationBundle\Factory\NotificationFactory;
use Doctrine\ORM\EntityManager;

class NotificationHelper
{
    private $em;
    private $factory;

    public function __construct(NotificationFactory $factory, EntityManager $manager)
    {
        $this->factory = $factory;
        $this->em = $manager;
    }

    public function send($type, array $options = array(), array $users = array())
    {
        $notification = $this->factory->createNotification($type, $options);
        if ($notification->getUsers() === null && !empty($users)){
            $notification->setUsers($users);
        }

        $this->em->persist($notification);
        $this->em->flush();
    }


}
