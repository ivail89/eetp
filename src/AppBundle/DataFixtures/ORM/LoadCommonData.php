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
                
        for ($l = 0; $l < count($arrayCities); $l++){
            $city = new Cities();
            $city->setCityName($arrayCities[$l]);
            for ($i = 0; $i < count($arrayEducations); $i++){
                $education = new Educations();
                $education->setEducationName($arrayEducations[$i]);
                $countMembers = rand(2, 5);
                for ($j = 0; $j < $countMembers; $j++){
                    $user = new Users();
                    $user->setUsername($arrayNames[rand(0,9)]);
                    $user->setEducations($education);
                    $user->addCity($city);
                    $manager->persist($user);
                }
                $manager->persist($education);
            }
            $manager->persist($city);
        }
        $manager->flush();
    }
}