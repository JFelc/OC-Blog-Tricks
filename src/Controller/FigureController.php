<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Figure;
use App\Entity\Photo;
use Doctrine\ORM\EntityManager;
use App\Repository\FigureRepository;
use App\Repository\PhotoRepository;
use Doctrine\ORM\EntityManagerInterface;

class FigureController extends AbstractController
{
    /**
     * @Route("/tricks/{id}", name="figure")
     */
    public function displayFigure(FigureRepository $repo): Response
    {
        
        $url = $_SERVER['REQUEST_URI'];
        $exploded = explode('/',$url);
        $figure = new Figure;
        $tricks = $repo->find($exploded[2]);
        //var_dump($tricks);
        //$finalGroupe = $repo->find($tricks->groupe->id);


         
        return $this->render('figure/index.html.twig', [
            'controller_name' => 'FigureController','tricks' => $tricks
        ]);
    }
    /**
     * @Route("/tricks/delete/{id}", name="deleteFigure")
     */

    public function delete(PhotoRepository $photoRepo,EntityManagerInterface $manager): Response
    {
        $url = $_SERVER['REQUEST_URI'];
        $exploded = explode('/',$url);

        $photo = $photoRepo->find($exploded[2]);
        $figure = $photo->getFigure();
        //$figure->removePhoto($photo);
        $manager->remove($figure);
        $manager->flush();
        
        return $this->render('temp.html.twig', [
            'controller_name' => 'FigureController', 'figure'=>$figure
        ]);
    }
}
