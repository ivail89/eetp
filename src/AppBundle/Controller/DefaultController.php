<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Users;
use AppBundle\Entity\Educations;
use AppBundle\Entity\Cities;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $city = $this->getDoctrine()
            ->getRepository(Cities::class)
            ->findAll();
        
        $education = $this->getDoctrine()
            ->getRepository(Educations::class)
            ->findAll();
        
        $user = $this->getDoctrine()
            ->getRepository(Users::class)
            ->findAll();

        return $this->render('base.html.twig', [
            'city' => $city, 
            'education' => $education,
            'user' => $user
        ]);

    }
}

