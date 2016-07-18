<?php

namespace Brooter\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TypeOfFlooring
 *
 * @ORM\Table(name="type_of_flooring")
 * @ORM\Entity(repositoryClass="Brooter\AdminBundle\Repository\TypeOfFlooringRepository")
 */
class TypeOfFlooring
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
     * @ORM\Column(name="FlooringTypeName", type="string", length=255)
     */
    private $flooringTypeName;



    /**
     * @ORM\ManyToMany(targetEntity="Brooter\PropertyBundle\Entity\PostProperty", mappedBy="typeOfFlooring")
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
     * Set flooringTypeName
     *
     * @param string $flooringTypeName
     *
     * @return TypeOfFlooring
     */
    public function setFlooringTypeName($flooringTypeName)
    {
        $this->flooringTypeName = $flooringTypeName;

        return $this;
    }

    /**
     * Get flooringTypeName
     *
     * @return string
     */
    public function getFlooringTypeName()
    {
        return $this->flooringTypeName;
    }
}

