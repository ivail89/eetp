<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Educations
 *
 * @ORM\Table(name="educations")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\EducationsRepository")
 */
class Educations
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="education_name", type="string", length=127)
     */
    private $educationName;

    /**
     * @ORM\OneToMany(targetEntity="Users", mappedBy="educations")
     */
    private $users;
    
    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set educationName
     *
     * @param string $educationName
     *
     * @return Educations
     */
    public function setEducationName($educationName)
    {
        $this->educationName = $educationName;

        return $this;
    }

    /**
     * Get educationName
     *
     * @return string
     */
    public function getEducationName()
    {
        return $this->educationName;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->users = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add user
     *
     * @param \AppBundle\Entity\Users $user
     *
     * @return Educations
     */
    public function addUser(\AppBundle\Entity\Users $user)
    {
        $this->users[] = $user;

        return $this;
    }

    /**
     * Remove user
     *
     * @param \AppBundle\Entity\Users $user
     */
    public function removeUser(\AppBundle\Entity\Users $user)
    {
        $this->users->removeElement($user);
    }

    /**
     * Get users
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUsers()
    {
        return $this->users;
    }
}
