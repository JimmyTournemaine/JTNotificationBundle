<?php
namespace JT\NotificationBundle\Twig;

use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Authentication\Token\AnonymousToken;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

class NotificationExtension extends \Twig_Extension
{
    private $om;
    private $tokenStorage;
    private $toShow;

    public function __construct(ObjectManager $manager, TokenStorageInterface $tokenStorage, $toShow = 5)
    {
        $this->om = $manager;
        $this->tokenStorage = $tokenStorage;
        $this->toShow = $toShow;
    }

    public function getFunctions()
    {
        return array(
            'jt_notification_render' => new \Twig_SimpleFunction('jt_notification_render', array($this, 'renderFunction'), array(
                'is_safe' => array('html'),
                'needs_environment' => true,
            ))
        );
    }

    public function renderFunction(\Twig_Environment $twig)
    {
        $token = $this->tokenStorage->getToken();
        if ($token instanceof AnonymousToken){
            return;
        }
        $user = $token->getUser();

        $notifications = $this->om->getRepository("JTNotificationBundle:Notification")->findNotificationsOfUser($user, $this->toShow);

        return $twig->render('JTNotificationBundle::notification.html.twig', array('notifications' => $notifications));
    }

    public function getName()
    {
        return 'jt_notification_Extension';
    }
}
