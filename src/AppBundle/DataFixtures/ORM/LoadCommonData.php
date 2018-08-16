<?php
namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Users;
use AppBundle\Entity\Educations;
use AppBundle\Entity\Cities;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Collections\ArrayCollection;

class LoadCommonData extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $arrayEducations = ['Secondary', 'Bachelor', 'Master', 'PHD'];
        $arrayCities = ['Moscow', 'Kazan', 'Ishim', 'Sochi'];
        $arrayNames = array ('Smith', 'Johnson', 'Williams', 'Brown', 'Jones', 
            'Miller', 'Davis', 'Garcia', 'Rodriguez', 'Wilson');
                
        for ($i = 0; $i < 4; $i++){
            $education[$i] = new Educations();
            $education[$i]->setEducationName($arrayEducations[$i]);

            $city[$i] = new Cities();
            $city[$i]->setCityName($arrayCities[$i]);
        }

        for ($j = 0; $j < 20; $j++){
            $user = new Users();
            $user->setUsername($arrayNames[rand(0,9)]);
            $user->setEducations($education[rand(0,3)]);
            $user->addCity($city[rand(0,3)]);
            $manager->persist($user);
        }

        for ($i = 0; $i < 4; $i++){
            $manager->persist($city[$i]);
            $manager->persist($education[$i]);
        }
        
        $manager->flush();
    }
}