<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\EventRepository;
use App\Repository\LieuRepository;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Lieu;
use App\Entity\Event;
use Doctrine\Persistence\ManagerRegistry;

class EventController extends AbstractController
{
    #[Route('/manif', name: 'events')]
    /*public function index(): Response
    {
        return $this->render('event/index.html.twig', [
            'controller_name' => 'EventController',
        ]);
    }*/

    public function events(
        EntityManagerInterface $entityManager,
        EventRepository $EventRepository,
        ManagerRegistry $doctrine)
    {
        // récupération de tous les posts
        $events = $EventRepository->findAll();

        //$manif = $doctrine->getRepository(Event::class)->findAll();

        // $lieu = $manif->getLieu();




        return $this->render('manif/index.html.twig', [
            'events' => $events,
            //'lieux' => $lieu
        ]);


    }
}
