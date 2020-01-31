<?php

namespace App\Controller;

use App\Entity\Registreren;
use App\Form\RegistrerenType;
use App\Repository\RegistrerenRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/registreren")
 */
class RegistrerenController extends AbstractController
{
    /**
     * @Route("/", name="registreren_index", methods={"GET"})
     */
    public function index(RegistrerenRepository $registrerenRepository): Response
    {
        return $this->render('registreren/trainingindex.html.twig', [
            'registrerens' => $registrerenRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="registreren_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $registreren = new Registreren();
        $form = $this->createForm(RegistrerenType::class, $registreren);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($registreren);
            $entityManager->flush();

            return $this->redirectToRoute('registreren_index');
        }

        return $this->render('registreren/new.html.twig', [
            'registreren' => $registreren,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="registreren_show", methods={"GET"})
     */
    public function show(Registreren $registreren): Response
    {
        return $this->render('registreren/show.html.twig', [
            'registreren' => $registreren,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="registreren_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Registreren $registreren): Response
    {
        $form = $this->createForm(RegistrerenType::class, $registreren);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('registreren_index');
        }

        return $this->render('registreren/edit.html.twig', [
            'registreren' => $registreren,
            'form' => $form->createView(),
        ]);
    }
}
