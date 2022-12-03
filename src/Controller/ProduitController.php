<?php

namespace App\Controller;

use App\Repository\EventRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Events;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProduitController extends AbstractController
{
    #[Route('/produit/{id}', name: 'app_produit')]

    public function events(
        $id,
        EntityManagerInterface $entityManager,
        EventRepository $EventRepository,
        ): Response
    {
        // récupération de tous les posts
        $events = $EventRepository->find($id);

        /*$spectacles = $this->getDoctrine()
            ->getRepository('AppBundle:jobs')
            ->findAll();*/
        //équivalent à SELECT * FROM post

        /*foreach($spectacles as $spectacle)
        {
            $spectacle->getTitre(); // on set les différents champs
        }

        $entityManager->flush(); // on effectue les différentes modifications sur la base de données
        // réelle*/

        return $this->render('produit/index.html.twig', [
            'events' => $events,
        ]);

    }
}
