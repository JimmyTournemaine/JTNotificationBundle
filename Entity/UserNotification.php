<?php
namespace JT\NotificationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JT\NotificationBundle\Model\AbstractUserNotification;

/**
 * @ORM\Table(name="notification_user")
 * @ORM\Entity
 * @author Jimmy Tournemaine <jimmy.tournemaine@yahoo.fr>
 */
class UserNotification extends AbstractUserNotification
{
    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\ManyToOne("JT\NotificationBundle\Entity\Notification")
     * @ORM\JoinColumn(nullable=false)
     */
    protected $notification;

    /**
     * @ORM\ManyToOne("JT\NotificationBundle\Model\NotifyableInterface")
     * @ORM\JoinColumn(nullable=false)
     */
    protected $user;

    /**
     * @ORM\Column(name="opened", type="boolean")
     */
    protected $opened;

    /**
     * @ORM\Column(name="opened_at", type="datetime", nullable=true)
     */
    protected $openedAt;
}