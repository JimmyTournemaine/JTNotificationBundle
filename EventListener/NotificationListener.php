<?php
namespace JT\NotificationBundle\EventListener;

use Doctrine\ORM\Event\LifecycleEventArgs;
use JT\NotificationBundle\Entity\Notification;
use JT\NotificationBundle\Entity\UserNotification;

class NotificationListener
{
    public function prePersist(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();

        if (!$entity instanceof Notification) {
            return;
        }

        if($entity->getUsers() === null){
            throw new \Exception("You must set at least a user who will receive the notification.");
        }
        if($entity->getTitle() === null){
            throw new \Exception("You must set the title of your notification.");
        }
    }

    public function postPersist(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();

        if (!$entity instanceof Notification) {
            return;
        }

        $em = $args->getEntityManager();

        foreach ($entity->getUsers() as $user)
        {
            $notifUser = new UserNotification();
            $notifUser->setUser($user);
            $notifUser->setNotification($entity);
            $em->persist($notifUser);
        }

        $em->flush();
    }
}
