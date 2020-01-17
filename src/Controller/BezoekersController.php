<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use App\Repository\LessenRepository;
use App\Repository\TrainingRepository;
use App\Repository\UserRepository;
use App\Repository\RegistrerenRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;


class BezoekersController extends AbstractController
{


    /**
     * @Route("/inloggen.html.twig")
     */

    public function inloggen()
    {
        return $this->render('inloggen.html.twig', [
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

    public function inschrijvenOverzicht(TrainingRepository $trainingRepository, LessenRepository $lessenRepository, RegistrerenRepository $registrerenRepository): Response
    {
        return $this->render('inschrijven.html.twig', [
            'trainings' => $trainingRepository->findAll(),
            'lessens' => $lessenRepository->findAll(),
            'registrerens' => $registrerenRepository->findAll(),
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
     * @Route("/gedragsregel")
     */

    public function gedragsregels()
    {
        return $this->render('gedragsregel.html.twig');
    }

    /**
     * @Route("/registreren)
     */

//    public function registreren()
//    {
//        return $this->render('registreren.html.twig', [
//            'title' => ucwords(str_replace('-', ' ', '-')),
//        ]);
//    }

    /**
     * @Route("/new", name="user_new", methods={"GET","POST"})
     */
    public function userNew(Request $request, UserPasswordEncoderInterface $encoder): Response
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $role = array('ROLE_USER');
            $user->setRoles($role);
            $entityManager = $this->getDoctrine()->getManager();
            $encoded = $encoder->encodePassword($user, $user->getPassword());

            $user->setPassword($encoded);
            $entityManager->persist($user);
            $entityManager->flush();

            return $this->redirectToRoute('user_index');
        }

        return $this->render('user/new.html.twig', [
            'user' => $user,
            'form' => $form->createView(),
        ]);
    }


    /**
     * @Route("/training", name="training_index", methods={"GET"})
     */
    public function trainingIndex(TrainingRepository $trainingRepository, UserRepository $userRepository): Response
    {
        return $this->render('training/index.html.twig', [
            'trainings' => $trainingRepository->findAll(),
            'users' => $userRepository->findAll()

        ]);
    }
}


