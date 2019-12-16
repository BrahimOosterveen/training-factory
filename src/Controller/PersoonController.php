<?php

namespace App\Controller;

use App\Entity\Persoon;
use App\Form\PersoonType;
use App\Repository\PersoonRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/persoon")
 */
class PersoonController extends AbstractController
{
    /**
     * @Route("/", name="persoon_index", methods={"GET"})
     */
    public function index(PersoonRepository $persoonRepository): Response
    {
        return $this->render('persoon/index.html.twig', [
            'persoons' => $persoonRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="persoon_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $persoon = new Persoon();
        $form = $this->createForm(PersoonType::class, $persoon);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($persoon);
            $entityManager->flush();

            return $this->redirectToRoute('persoon_index');
        }

        return $this->render('persoon/new.html.twig', [
            'persoon' => $persoon,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="persoon_show", methods={"GET"})
     */
    public function show(Persoon $persoon): Response
    {
        return $this->render('persoon/show.html.twig', [
            'persoon' => $persoon,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="persoon_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Persoon $persoon): Response
    {
        $form = $this->createForm(PersoonType::class, $persoon);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('persoon_index');
        }

        return $this->render('persoon/edit.html.twig', [
            'persoon' => $persoon,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="persoon_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Persoon $persoon): Response
    {
        if ($this->isCsrfTokenValid('delete'.$persoon->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($persoon);
            $entityManager->flush();
        }

        return $this->redirectToRoute('persoon_index');
    }
}
