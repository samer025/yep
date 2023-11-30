<?php

namespace App\Controller;

use App\Repository\FactureRepository;
use App\Repository\ReservationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends AbstractController
{
    #[Route('/back', name: 'app_back')]
    public function back(): Response
    {
        return $this->render('back.html.twig', [
            'controller_name' => 'TestController',
        ]);
    }

    #[Route('/front', name: 'app_front')]
    public function front(): Response
    {
        return $this->render('front.html.twig', [
            'controller_name' => 'TestController',
        ]);
    }


    #[Route('/indexbackfacture', name: 'app_back_facture', methods: ['GET'])]
    public function indexf(FactureRepository $factureRepository): Response
    {
        return $this->render('facture/indexback.html.twig', [
            'factures' => $factureRepository->findAll(),
        ]);

       
    }
    
    #[Route('/indexbackreservation', name: 'app_back_reservation', methods: ['GET'])]
    public function indexr(ReservationRepository $reservationRepository): Response
    {
        return $this->render('reservation/indexback.html.twig', [
            'reservations' => $reservationRepository->findAll(),
        ]);

       
    }
}
