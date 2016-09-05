<?php

namespace JT\NotificationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JT\NotificationBundle\Model\AbstractNotification;

/**
 * Notification
 *
 * @ORM\Table(name="notification")
 * @ORM\Entity(repositoryClass="JT\NotificationBundle\Repository\NotificationRepository")
 * @ORM\HasLifecycleCallbacks
 */
class Notification extends AbstractNotification
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $icon;

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    protected $iconOptions;

    /**
     * @ORM\Column(type="string")
     */
    protected $title;

    /**
     * @ORM\Column(type="array")
     */
    protected $titleOptions;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $description;

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    protected $descriptionOptions;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $link;

    /**
     * @ORM\PrePersist()
     */
    public function onPersist()
    {
        $this->createdAt = new \DateTime();
    }
}

