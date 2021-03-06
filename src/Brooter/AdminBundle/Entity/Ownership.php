<?php

namespace Brooter\AdminBundle\Entity;

use Brooter\PropertyBundle\Entity\PostProperty;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Ownership
 *
 * @ORM\Table(name="ownership")
 * @ORM\Entity(repositoryClass="Brooter\AdminBundle\Repository\OwnershipRepository")
 */
class Ownership
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
     * @ORM\Column(name="OwnershipType", type="string", length=255)
     */
    private $ownershipType;



    /**
     * @ORM\OneToMany(targetEntity="Brooter\PropertyBundle\Entity\PostProperty", mappedBy="ownership",cascade={"persist"})
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
     * Set ownershipType
     *
     * @param string $ownershipType
     *
     * @return Ownership
     */
    public function setOwnershipType($ownershipType)
    {
        $this->ownershipType = $ownershipType;

        return $this;
    }

    /**
     * Get ownershipType
     *
     * @return string
     */
    public function getOwnershipType()
    {
        return $this->ownershipType;
    }

    public function __toString()
    {
        return $this->ownershipType;
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
        $postProperty->addOwnership($this);
        $this->postProperty->add($postProperty);
    }
    public function removePostProperty(PostProperty $postProperty)
    {
        $this->postProperty->removeElement($postProperty);
    }
}

