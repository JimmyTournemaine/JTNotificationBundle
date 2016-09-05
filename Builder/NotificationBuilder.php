<?php
namespace JT\NotificationBundle\Builder;

use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use JT\NotificationBundle\Entity\Notification;

class NotificationBuilder implements NotificationBuilderInterface
{
    private $notification;

    private $router;

    private $iconResolver;

    private $titleResolver;

    private $descriptionResolver;

    private $linkResolver;

    public function __construct(RouterInterface $router)
    {
        $this->router = $router;
        $this->notification = new Notification();
        $this->configureIconOptions();
        $this->configureTitleOptions();
        $this->configureDescriptionOptions();
        $this->configureLinkOptions();
    }

    public function addIcon($value, array $options = array())
    {
        $resolvedOptions = $this->iconResolver->resolve($options);

        $this->notification->setIcon($value);
        $this->notification->setIconOptions($resolvedOptions);

        return $this;
    }

    public function addTitle($title, array $options = array())
    {
        $resolvedOptions = $this->titleResolver->resolve($options);

        $this->notification->setTitle($title);
        $this->notification->setTitleOptions($resolvedOptions);

        return $this;
    }

    public function addDescription($description, array $options = array())
    {
        $resolvedOptions = $this->descriptionResolver->resolve($options);

        $this->notification->setDescription($description);
        $this->notification->setDescriptionOptions($resolvedOptions);

        return $this;
    }

    public function addLink($link, array $options = array())
    {
        $resolvedOptions = $this->linkResolver->resolve($options);
        $this->notification->setLink(($resolvedOptions['type'] == 'url') ? $link : $this->router->generate($link, ((isset($resolvedOptions['parameters'])) ? $resolvedOptions['parameters'] : array())));

        return $this;
    }

    public function addUser($user)
    {
        $this->notification->setUsers(array($user));
    }

    public function addUsers($users)
    {
        $this->notification->setUsers($users);
    }

    public function getNotification()
    {
        return $this->notification;
    }

    protected function configureIconOptions()
    {
        $resolver = new OptionsResolver();
        $resolver->setDefaults(array(
            'type' => 'icon',
            'prefix' => 'fa',
            'trans_parameters' => [],
            'trans_domain' => 'messages'
        ));
        $resolver->setRequired('type');
        $resolver->setRequired('alt');
        $resolver->setAllowedValues('type', array(
            'custom',
            'icon',
            'image'
        ));
        $this->iconResolver = $resolver;
    }

    protected function configureTitleOptions()
    {
        $resolver = new OptionsResolver();
        $resolver->setDefaults(array(
            'trans_parameters' => [],
            'trans_domain' => 'messages'
        ));
        $this->titleResolver = $resolver;
    }

    protected function configureDescriptionOptions()
    {
        $resolver = new OptionsResolver();
        $resolver->setDefaults(array(
            'trans_parameters' => [],
            'trans_domain' => 'messages'
        ));
        $this->descriptionResolver = $resolver;
    }

    protected function configureLinkOptions()
    {
        $resolver = new OptionsResolver();
        $resolver->setDefaults(array(
            'type' => 'route',
            'parameters' => []
        ));
        $resolver->setRequired('type');
        $resolver->setAllowedValues('type', array(
            'url',
            'route'
        ));
        $this->linkResolver = $resolver;
    }
}
