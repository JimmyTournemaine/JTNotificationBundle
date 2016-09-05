<?php

namespace JT\NotificationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class NotificationController extends Controller
{
    public function openAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $className = $this->getParameter('jt_notification.class');
        $notification = $em->getRepository($className)->find($id);
        if(null == $notification){
            throw $this->createNotFoundException();
        }

        $notification->setRead(true);
        $em->persist($notification);
        $em->flush();

        return $this->redirect($notification->getUrl());
    }
}
