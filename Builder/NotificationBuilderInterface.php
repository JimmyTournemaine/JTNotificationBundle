<?php
namespace JT\NotificationBundle\Builder;

interface NotificationBuilderInterface
{
    public function addIcon($property, array $options);
    public function addTitle($property, array $options);
    public function addDescription($property, array $options);
    public function addLink($property, array $options);
    public function getNotification();
}