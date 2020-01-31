<?php


namespace App\Controller;


use App\Entity\Lessen;
use App\Entity\Registreren;
use App\Entity\User;
use App\Form\LessenType;
use App\Form\UserType;
use App\Repository\LessenRepository;
use App\Repository\RegistrerenRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


/**
 * @Route("/instructeur")
 */
class InstructeurController extends AbstractController
{
    /**
     * @Route("/lessen/", name="lessen_index", methods={"GET"})
     */
    public function index(LessenRepository $lessenRepository): Response
    {
        return $this->render('instructeur/index.html.twig', [
            'lessens' => $lessenRepository->findAll(),
        ]);
    }

    /**
     * @Route("/lessen/new", name="lessen_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $lessen = new Lessen();
        $user = $this->getUser();
        $form = $this->createForm(LessenType::class, $lessen);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $lessen->setInstructeur($user);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($lessen);
            $entityManager->flush();

            return $this->redirectToRoute('lessen_index');
        }

        return $this->render('instructeur/new.html.twig', [
            'lessen' => $lessen,
            'form' => $form->createView(),
        ]);
    }

//    /**
//     * @Route("/lessen/{id}", name="lessen_show", methods={"GET"})
//     */
//    public function show(Lessen $lessen): Response
//    {
//        return $this->render('lessen/show.html.twig', [
//            'lessen' => $lessen,
//        ]);
//    }

    /**
     * @Route("/lessen/{id}/edit", name="lessen_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Lessen $lessen): Response
    {
        $form = $this->createForm(LessenType::class, $lessen);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('lessen_index');
        }

        return $this->render('instructeur/edit.html.twig', [
            'lessen' => $lessen,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/lessen/{id}", name="lessen_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Lessen $lessen): Response
    {
        if ($this->isCsrfTokenValid('delete'.$lessen->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($lessen);
            $entityManager->flush();
        }

        return $this->redirectToRoute('lessen_index');
    }


    /**
     * @Route("/lessen/{id}", name="lessen", methods={"GET"})
     */
    public function show(Lessen $lessen, RegistrerenRepository $registrerenRepository, UserRepository $userRepository): Response
    {
        return $this->render('instructeur/show.html.twig', [
            'lessen' => $lessen,
            'users' => $userRepository->findAll(),
            'registrerens' => $registrerenRepository->findAll(),
        ]);
    }


    /**
     * @Route("/lessen/betaal/{id}", name="user_betaal", methods={"BETAAL"})
     */
    public function betaalt(Request $request, Registreren $registreren): Response
{
        $entityManager = $this->getDoctrine()->getManager();
    $registreren->setBetaling(true);
        $entityManager->flush();

        return $this->redirectToRoute('lessen', ['id'=>$registreren->getLessen()->getId()]);
    }

    /**
     * @Route("/{id}/edit", name="instructeur_edit", methods={"GET","POST"})
     */
    public function instructeurEdit(Request $request, User $user, UserPasswordEncoderInterface $encoder): Response
    {
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $encoded = $encoder->encodePassword($user, $user->getPassword());
            $user->setPassword($encoded);
            $entityManager->persist($user);
            $entityManager->flush();


            return $this->redirectToRoute('home');
        }

        return $this->render('user/edit.html.twig', [
            'user' => $user,
            'form' => $form->createView(),
        ]);
    }
}