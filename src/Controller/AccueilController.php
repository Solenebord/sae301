<?php

namespace App\Controller;


use App\Entity\Event;
use App\Repository\EventRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccueilController extends AbstractController
{
    #[Route('/accueil', name: 'app_accueil')]

   /* public function index(): Response

    {
        return $this->render('accueil/index.html.twig', [
            'controller_name' => 'AccueilController',
        ]);

    }*/

    public function events(
        EntityManagerInterface $entityManager,
        EventRepository $EventRepository,
        ManagerRegistry $doctrine)
    {
        // récupération de tous les posts
        $events = $EventRepository->findAll();

        $manif = $doctrine->getRepository(Event::class)->findAll();

        // $lieu = $manif->getLieu();




        return $this->render('accueil/index.html.twig', [
            'events' => $events,
            //'lieux' => $lieu
        ]);



    }
}
