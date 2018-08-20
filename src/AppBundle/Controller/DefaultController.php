<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
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
     * Вывод данных при запуске страницы
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
    
    //Обработка ajax запроса
    public function listAction (Request $request){
        //массив id отмеченных образований
        $educations = $request->request->get('arrayEducation', array());
        //массив id отмеченных городов
        $cities = $request->request->get('arrayCity', array());
        
        // получаем всех людей удовлетворяющих критериям (Образование + Город)
        $arrayUsers = array();
            $users = $this->getDoctrine()
                ->getRepository(Users::class)
                ->findAllWithEducation($educations, $cities);
            foreach ($users as $user){
                array_push($arrayUsers, $user->getUsername());
            }
        return new JsonResponse($arrayUsers);
    }
}

