<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Users
 *
 * @ORM\Table(name="users")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UsersRepository")
 */
class Users
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
     * @ORM\Column(name="username", type="string", length=127)
     */
    private $username;

    /** 
    * @ORM\ManyToOne(targetEntity="Educations", inversedBy="users")
     */
    private $educations;
    
     /**
     * @ORM\ManyToMany(targetEntity="Cities", inversedBy="users")
     */
    private $cities;
     
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
     * Set username
     *
     * @param string $username
     *
     * @return Users
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set educations
     *
     * @param \AppBundle\Entity\Educations $educations
     *
     * @return Users
     */
    public function setEducations(\AppBundle\Entity\Educations $educations = null)
    {
        $this->educations = $educations;

        return $this;
    }

    /**
     * Get educations
     *
     * @return \AppBundle\Entity\Educations
     */
    public function getEducations()
    {
        return $this->educations;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->cities = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add city
     *
     * @param \AppBundle\Entity\Cities $city
     *
     * @return Users
     */
    public function addCity(\AppBundle\Entity\Cities $city)
    {
        $this->cities[] = $city;

        return $this;
    }

    /**
     * Remove city
     *
     * @param \AppBundle\Entity\Cities $city
     */
    public function removeCity(\AppBundle\Entity\Cities $city)
    {
        $this->cities->removeElement($city);
    }

    /**
     * Get cities
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCities()
    {
        return $this->cities;
    }
}
