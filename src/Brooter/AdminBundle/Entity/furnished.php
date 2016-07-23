<?php

namespace Brooter\AdminBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * furnished
 *
 * @ORM\Table(name="furnished")
 * @ORM\Entity(repositoryClass="Brooter\AdminBundle\Repository\furnishedRepository")
 */
class furnished
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
     * @ORM\Column(name="FurnishedTypeName", type="string", length=255)
     */
    private $furnishedTypeName;



    /**
     * @ORM\OneToOne(targetEntity="Brooter\PropertyBundle\Entity\PostProperty", mappedBy="_furnished")
     */
    private $postProperty;

    public function _construct()
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
     * Set furnishedTypeName
     *
     * @param string $furnishedTypeName
     *
     * @return furnished
     */
    public function setFurnishedTypeName($furnishedTypeName)
    {
        $this->furnishedTypeName = $furnishedTypeName;

        return $this;
    }

    /**
     * Get furnishedTypeName
     *
     * @return string
     */
    public function getFurnishedTypeName()
    {
        return $this->furnishedTypeName;
    }

    public function __toString()
    {
        return $this->furnishedTypeName;
    }

}

