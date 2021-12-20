<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Figure;
use App\Entity\Photo;

class HomeController extends AbstractController
{  
     /**
     * @Route("/home", name="home")
     */
    public function displayHome(): Response
    {
        $figure = new Figure;
        $name = $figure->getName();
        $photo = $figure->getPhotos();

        $newPhoto = new Photo;
        $nPhoto = $newPhoto->getName();
         
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController','photo'=>$photo,'name'=>$name
        ]);
    }
}
