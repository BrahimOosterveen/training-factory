<?php


namespace App\Controller;


use App\Entity\Lessen;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class LedenController extends AbstractController
{
//    /**
//     * @Route("/inschrijven/")
//     */
//
//    public function inschrijven()
//    {
//
//        if($datum=="vandaag")
//        {
//            $date=new \DateTime("now");
//        }
//        else
//        {
//            $date=new \DateTime("now +1 day");
//        }
//
//
//        $lessons=$this->getDoctrine()->getRepository(Lessen::class)->findBy(['datum'=>$date]);
//        dd($lessons);
//        return $this->render('inschrijven.html.twig', [
//            'title' => ucwords(str_replace('-', ' ', '-')),
//        ]);
//    }

    /**
     * @Route("/news/{slug}")
     */
    public function show($slug)
    {
        return new Response(sprintf(
            'Future page to show the article: "%s"',
            $slug
        ));
    }
}