<?php

// src/App/Controller/MicroController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

class MicroController extends Controller
{
   /**
     * @Route("/")
     */
    public function indexAction()
    {
        $number = mt_rand(0, 100);

        $msg = array('user_id' => 1235, 'image_path' => '/path/to/new/pic.png');
        $this->get('old_sound_rabbit_mq.upload_picture_producer')->publish(serialize($msg));

        return new Response(
            '<html><body>Lucky number: '.$number.'</body></html>'
        );
    }
}