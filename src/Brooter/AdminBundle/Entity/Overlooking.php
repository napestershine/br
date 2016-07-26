<?php

namespace Brooter\AdminBundle\Entity;

use Brooter\PropertyBundle\Entity\PostProperty;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Overlooking
 *
 * @ORM\Table(name="overlooking")
 * @ORM\Entity(repositoryClass="Brooter\AdminBundle\Repository\OverlookingRepository")
 */
class Overlooking
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
     * @ORM\Column(name="OverLookingType", type="string", length=255)
     */
    private $overLookingType;


    /**
     * @ORM\ManyToMany(targetEntity="Brooter\PropertyBundle\Entity\PostProperty", mappedBy="overLooking", cascade={"persist"})
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
     * Set overLookingType
     *
     * @param string $overLookingType
     *
     * @return Overlooking
     */
    public function setOverLookingType($overLookingType)
    {
        $this->overLookingType = $overLookingType;

        return $this;
    }

    /**
     * Get overLookingType
     *
     * @return string
     */
    public function getOverLookingType()
    {
        return $this->overLookingType;
    }

    public function __toString()
    {
        return $this->overLookingType;
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
        $postProperty->addOverlooking($this);
        $this->postProperty->add($postProperty);
    }
    public function removePostProperty(PostProperty $postProperty)
    {
        $this->postProperty->removeElement($postProperty);
    }
}

