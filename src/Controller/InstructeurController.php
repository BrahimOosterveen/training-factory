<?php


namespace App\Controller;


use App\Entity\Lessen;
use App\Form\LessenType;
use App\Repository\LessenRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


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
        return $this->render('lessen/index.html.twig', [
            'lessens' => $lessenRepository->findAll(),
        ]);
    }

    /**
     * @Route("/lessen/new", name="lessen_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $lessen = new Lessen();
        $form = $this->createForm(LessenType::class, $lessen);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($lessen);
            $entityManager->flush();

            return $this->redirectToRoute('lessen_index');
        }

        return $this->render('lessen/new.html.twig', [
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

        return $this->render('lessen/edit.html.twig', [
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
}