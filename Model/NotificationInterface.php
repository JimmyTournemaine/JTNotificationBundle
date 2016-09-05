<?php
namespace JT\NotificationBundle\Model;

interface NotificationInterface
{

    public function getId();

    public function getIcon();

    public function setIcon($icon);

    public function getIconOptions();

    public function setIconOptions($iconOptions);

    public function getTitle();

    public function setTitle($title);

    public function getTitleOptions();

    public function setTitleOptions($titleOptions);

    public function getDescription();

    public function setDescription($description);

    public function getDescriptionOptions();

    public function setDescriptionOptions($descriptionOptions);

    public function getLink();

    public function setLink($link);
}
