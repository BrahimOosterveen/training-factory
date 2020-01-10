<?php


namespace App\Controller;


use App\Entity\Lessen;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LedenController extends AbstractController
{
    /**
     * @Route("/inschrijven/datum/{date}" , name="app_inschrijven")
     */

    public function datumLesson($date)
    {


        return $this->render('inschrijven.html.twig', [
            'page_name' => 'app_inschrijven'
        ]);
    }

    /**
     * @Route("/inschrijven/datum/{date}" , name="app_latere_inschrijvingen")
     */

    public function latereLesson($date)
    {
        return $this->render('inschrijven.html.twig', [
            'page_name' => 'app_latere_inschrijvingen'
        ]);
    }


}