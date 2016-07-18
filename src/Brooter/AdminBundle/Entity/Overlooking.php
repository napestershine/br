<?php

namespace Brooter\AdminBundle\Entity;

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
     * @ORM\ManyToMany(targetEntity="Brooter\PropertyBundle\Entity\PostProperty", mappedBy="overLooking")
     */
    private $postProperty;
    
    public function _construct()
    {
        $this->postProperty=new \Doctrine\Common\Collections\ArrayCollection();
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
}

