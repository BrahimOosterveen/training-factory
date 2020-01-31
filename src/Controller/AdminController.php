<?php


namespace App\Controller;


use App\Entity\Training;
use App\Entity\User;
use App\Form\TrainingType;
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
 * @Route("/admin")
 */
class AdminController extends AbstractController
{
    //training
//    /**
//     * @Route("/training/", name="training_index", methods={"GET"})
//     */
//    public function trainingIndex(TrainingRepository $trainingRepository): Response
//    {
//        return $this->render('training/trainingindex.html.twig', [
//            'trainings' => $trainingRepository->findAll(),
//        ]);
//    }

    /**
     * @Route("/training/new", name="training_new", methods={"GET","POST"})
     */
    public function trainingNew(Request $request): Response
    {
        $training = new Training();
        $form = $this->createForm(TrainingType::class, $training);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($training);
            $entityManager->flush();

            return $this->redirectToRoute('training_index');
        }

        return $this->render('admin/new.html.twig', [
            'training' => $training,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/training/{id}", name="training_show", methods={"GET"})
     */
    public function trainingShow(Training $training): Response
    {
        return $this->render('admin/show.html.twig', [
            'training' => $training,
        ]);
    }

    /**
     * @Route("/training/{id}/edit", name="training_edit", methods={"GET","POST"})
     */
    public function trainingEdit(Request $request, Training $training): Response
    {
        $form = $this->createForm(TrainingType::class, $training);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('training_index');
        }

        return $this->render('admin/edit.html.twig', [
            'training' => $training,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/training/{id}", name="training_delete", methods={"DELETE"})
     */
    public function trainingDelete(Request $request, Training $training): Response
    {
        if ($this->isCsrfTokenValid('delete' . $training->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($training);
            $entityManager->flush();
        }

        return $this->redirectToRoute('training_index');
    }

    //user

    /**
     * @Route("/user", name="user_index", methods={"GET"})
     */
    public function userIndex(UserRepository $userRepository): Response
    {
        return $this->render('user/index.html.twig', [
            'users' => $userRepository->findAll(),
        ]);
    }



    /**
     * @Route("/user/{id}", name="user_show", methods={"GET"})
     */
    public function userShow(User $user, RegistrerenRepository $registrerenRepository, LessenRepository $lessenRepository): Response
    {
        return $this->render('user/show.html.twig', [
            'user' => $user,
            'registrerens' => $registrerenRepository->findAll(),
            'lessens' => $lessenRepository->findAll(),
        ]);
    }

    /**
     * @Route("/user/{id}", name="user_delete", methods={"DELETE"})
     */
    public function userDelete(Request $request, User $user): Response
    {
        if ($this->isCsrfTokenValid('delete' . $user->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($user);
            $entityManager->flush();
        }

        return $this->redirectToRoute('home');
    }


    //Instructeur


    /**
     * @Route("/instructeur/beheer", name="instructeur_index", methods={"GET"})
     *
     */
    public function instructeurIndex(UserRepository $user): Response
    {
        $instructors = $user->getInstructor("ROLE_INSTRUCTEUR");
        return $this->render('user/index.html.twig', [
            'users' => $user->findAll(),

        ]);
    }



    /**
     * @Route("/user/new/instructeur", name="instructeur_new", methods={"GET","POST"})
     */
    public function newinstructeuruser(Request $request, UserPasswordEncoderInterface $encoder): Response
    {
        $user = new user();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $role = array('ROLE_INSTRUCTEUR');
            $user->setRoles($role);
            $entityManager = $this->getDoctrine()->getManager();
            $encoded = $encoder->encodePassword($user, $user->getPassword());
            $user->setPassword($encoded);
            $entityManager->persist($user);
            $entityManager->flush();

            return $this->redirectToRoute('instructeur_index');
        }

        return $this->render('user/new.html.twig', [
            'user' => $user,
            'form' => $form->createView(),
        ]);
    }

//disablen




}