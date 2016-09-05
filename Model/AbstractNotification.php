<?php
namespace JT\NotificationBundle\Model;

abstract class AbstractNotification implements NotificationInterface
{
    protected $id;

    protected $icon;

    protected $iconOptions;

    protected $title;

    protected $titleOptions;

    protected $description;

    protected $descriptionOptions;

    protected $link;

    protected $createdAt;

    protected $users;

    public function getId()
    {
        return $this->id;
    }

    public function getIcon()
    {
        return $this->icon;
    }

    public function setIcon($icon)
    {
        $this->icon = $icon;
        return $this;
    }

    public function getIconOptions()
    {
        return $this->iconOptions;
    }

    public function setIconOptions($iconOptions)
    {
        $this->iconOptions = $iconOptions;
        return $this;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    public function getTitleOptions()
    {
        return $this->titleOptions;
    }

    public function setTitleOptions($titleOptions)
    {
        $this->titleOptions = $titleOptions;
        return $this;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    public function getDescriptionOptions()
    {
        return $this->descriptionOptions;
    }

    public function setDescriptionOptions($descriptionOptions)
    {
        $this->descriptionOptions = $descriptionOptions;
        return $this;
    }

    public function getLink()
    {
        return $this->link;
    }

    public function setLink($link)
    {
        $this->link = $link;
        return $this;
    }

    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    public function getUsers()
    {
        return $this->users;
    }

    public function setUsers(array $users)
    {
        $this->users = $users;
        return $this;
    }

}