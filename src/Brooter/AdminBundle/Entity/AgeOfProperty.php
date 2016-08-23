<?php

namespace Brooter\AdminBundle\Entity;

use Brooter\PropertyBundle\Entity\PostProperty;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * AgeOfProperty
 *
 * @ORM\Table(name="age_of_property")
 * @ORM\Entity(repositoryClass="Brooter\AdminBundle\Repository\AgeOfPropertyRepository")
 */
class AgeOfProperty
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
     * @ORM\Column(name="PropAge", type="string", length=255)
     */
    private $propAge;


    /**
     * @ORM\OneToMany(targetEntity="Brooter\PropertyBundle\Entity\PostProperty", mappedBy="ageOfProp",cascade={"persist"})
     */
    private $postProperty;

    public function __construct()
    {
        $this->postProperty=new ArrayCollection();
    }

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
     * Set propAge
     *
     * @param string $propAge
     *
     * @return AgeOfProperty
     */
    public function setPropAge($propAge)
    {
        $this->propAge = $propAge;

        return $this;
    }

    /**
     * Get propAge
     *
     * @return string
     */
    public function getPropAge()
    {
        return $this->propAge;
    }



    public function __toString()
    {
        return $this->propAge;
    }

    /**
     * @return mixed
     */
    public function getPostProperty()
    {
        return $this->postProperty;
    }
    public function addPostProperty(PostProperty $postProperty)
    {
        $postProperty->addAgeOfProperty($this);
        $this->postProperty->add($postProperty);
    }
    public function removePostProperty(PostProperty $postProperty)
    {
        $this->postProperty->removeElement($postProperty);
    }

}

