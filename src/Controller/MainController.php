<?php

namespace App\Controller;

use App\Repository\ReservationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    #[Route('/main', name: 'app_main')]
    public function index(ReservationRepository $reservation): Response
    {
        
            $events = $reservation->findAll();
    
            $rdvs = [];
    
           foreach($events as $event){
            $rdvs[] = [
                'id_res' => $event->getId_res(),
                
                'date_debut' => $event->getDateDebut(),

                'date_fin' => $event->getDateFin(),
                'id_v' => $event->getIdV(),
                'id_v' => $event->getIdCl(),
               
    
            ];
           }
    
           $data =json_encode($rdvs);
    
            return $this->render('main/index.html.twig', compact('data'));
        
        }
}
