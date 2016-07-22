<?php

namespace Brooter\PropertyBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * YearBuilt
 *
 * @ORM\Table(name="year_built")
 * @ORM\Entity(repositoryClass="Brooter\PropertyBundle\Repository\YearBuiltRepository")
 */
class YearBuilt
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
     * @ORM\Column(name="YearOfBuilding", type="string", length=255)
     */
    private $yearOfBuilding;



    /**
     * @ORM\OneToMany(targetEntity="Brooter\PropertyBundle\Entity\PostProperty", mappedBy="postProperty")
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
     * Set yearOfBuilding
     *
     * @param string $yearOfBuilding
     *
     * @return YearBuilt
     */
    public function setYearOfBuilding($yearOfBuilding)
    {
        $this->yearOfBuilding = $yearOfBuilding;

        return $this;
    }

    /**
     * Get yearOfBuilding
     *
     * @return string
     */
    public function getYearOfBuilding()
    {
        return $this->yearOfBuilding;
    }
}

