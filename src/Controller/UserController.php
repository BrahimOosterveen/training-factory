<?php

namespace App\Controller;

use App\Entity\Lessen;
use App\Entity\Registreren;
use App\Entity\User;
use App\Form\UserType;
use App\Repository\LessenRepository;
use App\Repository\RegistrerenRepository;
use App\Repository\TrainingRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * @Route("/user")
 */
class UserController extends AbstractController
{

    /**
     * @Route("/{id}/edit", name="user_edit", methods={"GET","POST"})
     */
    public function userEdit(Request $request, User $user, UserPasswordEncoderInterface $encoder): Response
    {
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $encoded = $encoder->encodePassword($user, $user->getPassword());
            $user->setPassword($encoded);
            $entityManager->persist($user);
            $entityManager->flush();


            return $this->redirectToRoute('user_index');
        }

        return $this->render('user/edit.html.twig', [
            'user' => $user,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/inschrijven/datum/{date}" , name="app_inschrijven")
     */

    public function datumLesson($date)
    {


        return $this->render('user/inschrijven.html.twig', [
            'page_name' => 'app_inschrijven'
        ]);
    }

    /**
     * @Route("/inschrijven/datum/{date}" , name="app_latere_inschrijvingen")
     */

    public function latereLesson($date)
    {
        return $this->render('user/inschrijven.html.twig', [
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
        $reg->setBetaling(false);

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($reg);
        $entityManager->flush();

        return $this->redirectToRoute('inschrijven');
    }

    /**
     * @Route("/lessen/{id}", name="lessen_show", methods={"GET"})
     */
    public function show(Lessen $lessen, RegistrerenRepository $registrerenRepository, UserRepository $userRepository): Response
    {
        return $this->render('instructeur/show.html.twig', [
            'lessen' => $lessen,
            'users' => $userRepository->findAll(),
            'registrerens' => $registrerenRepository->findAll(),
        ]);
    }

    //registreren

    /**
     * @Route("/{id}", name="registreren_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Registreren $registreren): Response
    {
        if ($this->isCsrfTokenValid('delete'.$registreren->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($registreren);
            $entityManager->flush();
        }

        return $this->redirectToRoute('inschrijven');
    }

    /**
     * @Route("/overzicht" , name="overzicht-inschrijven")
     */

    public function overzicht(RegistrerenRepository $registrerenRepository)
    {


        return $this->render('user/overzicht-inschrijvingen.html.twig', [
            'registrerens' => $registrerenRepository->findAll(),
        ]);
    }
}
