<?php


namespace App\Controller;


use App\Entity\Lessen;
use App\Entity\Registreren;
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
    /**
     * @Route("/inschrijven/{id}" , name="app_nu_inschrijvingen")
     */

    public function inschrijvenLesson($id)
    {
        $les = $this->getDoctrine()
            ->getRepository(Lessen::class)
            ->find($id);

        $user=$this->getUser();

        $reg=new Registreren();
        $reg->setLessen($les);
        $reg->setUser($user);
        $reg->setBetaling(true);

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($reg);
        $entityManager->flush();

        return $this->redirectToRoute('home');
    }


}