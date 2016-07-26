<?php

namespace Brooter\AdminBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * MaterialUsed
 *
 * @ORM\Table(name="material_used")
 * @ORM\Entity(repositoryClass="Brooter\AdminBundle\Repository\MaterialUsedRepository")
 */
class MaterialUsed
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
     * @ORM\Column(name="MaterialName", type="string", length=255)
     */
    private $materialName;

    /**
     * @ORM\OneToMany(targetEntity="Brooter\PropertyBundle\Entity\PostProperty", mappedBy="postProperty")
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
     * Set materialName
     *
     * @param string $materialName
     *
     * @return MaterialUsed
     */
    public function setMaterialName($materialName)
    {
        $this->materialName = $materialName;

        return $this;
    }

    /**
     * Get materialName
     *
     * @return string
     */
    public function getMaterialName()
    {
        return $this->materialName;
    }

    public function __toString()
    {
        return $this->materialName;
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
        $postProperty->addMaterialUsed($this);
        $this->postProperty->add($postProperty);
    }
    public function removePostProperty(PostProperty $postProperty)
    {
        $this->postProperty->removeElement($postProperty);
    }
}

