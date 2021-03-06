<?php

namespace Brooter\AdminBundle\Entity;

use Brooter\PropertyBundle\Entity\PostProperty;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * PropPossesion
 *
 * @ORM\Table(name="prop_possesion")
 * @ORM\Entity(repositoryClass="Brooter\AdminBundle\Repository\PropPossesionRepository")
 */
class PropPossesion
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
     * @ORM\Column(name="PropPossesionOn", type="string", length=255)
     */
    private $propPossesionOn;



    /**
     * @ORM\OneToMany(targetEntity="Brooter\PropertyBundle\Entity\PostProperty", mappedBy="propPossesion", cascade={"persist"})
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
     * Set propPossesionOn
     *
     * @param string $propPossesionOn
     *
     * @return PropPossesion
     */
    public function setPropPossesionOn($propPossesionOn)
    {
        $this->propPossesionOn = $propPossesionOn;

        return $this;
    }

    /**
     * Get propPossesionOn
     *
     * @return string
     */
    public function getPropPossesionOn()
    {
        return $this->propPossesionOn;
    }

    public function __toString()
    {
        return $this->propPossesionOn;
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
        $postProperty->addPropPossession($this);
        $this->postProperty->add($postProperty);
    }
    public function removePostProperty(PostProperty $postProperty)
    {
        $this->postProperty->removeElement($postProperty);
    }

}

