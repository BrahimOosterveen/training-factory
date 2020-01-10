<?php


namespace App\Controller;

use App\Repository\TrainingRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class home extends AbstractController
{
    /**
     * @Route("/inschrijvingen")
     */

    public function inschrijvingen()
    {
        return $this->render('inschrijvingen.html.twig', [
            'title' => ucwords(str_replace('-', ' ', '-')),
        ]);
    }

    /**
     * @Route("/", name="home")
     */

    public function homepage()
    {
        return $this->render('home.html.twig', [
            'title' => ucwords(str_replace('-', ' ', '-')),
        ]);
    }

    /**
     * @Route("/inschrijven", name="inschrijven")
     */

    public function inschrijvenOverzicht(TrainingRepository $trainingRepository): Response
    {
        return $this->render('inschrijven.html.twig', [
            'trainings' => $trainingRepository->findAll(),
        ]);
    }





    /**
     * @Route("/beheren.html.twig")
     */

    public function beheren()
    {
        return $this->render('beheren.html.twig', [
            'title' => ucwords(str_replace('-', ' ', '-')),
        ]);
    }
    /**
     * @Route("/plannen.html.twig")
     */

    public function plannen()
    {
        return $this->render('plannen.html.twig', [
            'title' => ucwords(str_replace('-', ' ', '-')),
        ]);
    }

    /**
     * @Route("/leden.html.twig")
     */

    public function leden()
    {
        return $this->render('leden.html.twig', [
            'title' => ucwords(str_replace('-', ' ', '-')),
        ]);
    }

    /**
     * @Route("/detail")
     */

    public function detail()
    {
        return $this->render('detail.html.twig', [
            'title' => ucwords(str_replace('-', ' ', '-')),
        ]);
    }

    /**
     * @Route("/registreren.html.twig")
     */

    public function registreren()
    {
        return $this->render('registreren.html.twig', [
            'title' => ucwords(str_replace('-', ' ', '-')),
        ]);
    }
    /**
     * @Route("/lokatie")
     */

    public function lokatieencontact()
    {
        return $this->render('lokatieencontact.html.twig', [
            'title' => ucwords(str_replace('-', ' ', '-')),
        ]);
    }

    /**
 * @Route("/gedragsregel.html.twig")
 */

    public function gedragsregel()
    {
        return $this->render('gedragsregel.html.twig', [
            'title' => ucwords(str_replace('-', ' ', '-')),
        ]);
    }

    /**
     * @Route("/inloggen.html.twig")
     */

    public function inloggen()
    {
        return $this->render('inloggen.html.twig', [
            'title' => ucwords(str_replace('-', ' ', '-')),
        ]);
    }

}