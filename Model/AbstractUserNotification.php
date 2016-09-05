<?php
namespace JT\NotificationBundle\Model;

abstract class AbstractUserNotification
{
    protected $id;

    protected $notification;

    protected $user;

    protected $opened;

    protected $openedAt;

    public function __construct()
    {
        $this->opened = false;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNotification()
    {
        return $this->notification;
    }

    public function setNotification($notification)
    {
        $this->notification = $notification;
        return $this;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function setUser(NotifyableInterface $user)
    {
        $this->user = $user;
        return $this;
    }

    public function isOpened()
    {
        return $this->opened;
    }

    public function setOpened($opened)
    {
        $this->opened = $opened;
        return $this;
    }

    public function getOpenedAt()
    {
        return $this->openedAt;
    }

    public function setOpenedAt(\DateTime $openedAt)
    {
        $this->openedAt = $openedAt;
        return $this;
    }


}
