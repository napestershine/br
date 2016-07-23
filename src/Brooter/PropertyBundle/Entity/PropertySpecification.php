<?php

namespace Brooter\PropertyBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PropertySpecification
 *
 * @ORM\Table(name="property_specification")
 * @ORM\Entity(repositoryClass="Brooter\PropertyBundle\Repository\PropertyFacingRepository")
 */
class PropertySpecification
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
     * @ORM\Column(name="PropSpecificationTitle", type="string", length=255)
     */
    private $propSpecificationTitle;

    /**
     * @var string
     *
     * @ORM\Column(name="PropSpecDesc", type="text")
     */
    private $propSpecDesc;

    /**
     * @ORM\ManyToOne(targetEntity="Brooter\PropertyBundle\Entity\PostProperty", inversedBy="postProperty")
     * @ORM\JoinColumn(name="PostProperty_id", referencedColumnName="id")
     */
    private $postProperty;


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
     * Set propSpecificationTitle
     *
     * @param string $propSpecificationTitle
     *
     * @return PropertyFacing
     */
    public function setPropSpecificationTitle($propSpecificationTitle)
    {
        $this->propSpecificationTitle = $propSpecificationTitle;

        return $this;
    }

    /**
     * Get propSpecificationTitle
     *
     * @return string
     */
    public function getPropSpecificationTitle()
    {
        return $this->propSpecificationTitle;
    }

    /**
     * Set propSpecDesc
     *
     * @param string $propSpecDesc
     *
     * @return PropertyFacing
     */
    public function setPropSpecDesc($propSpecDesc)
    {
        $this->propSpecDesc = $propSpecDesc;

        return $this;
    }

    /**
     * Get propSpecDesc
     *
     * @return string
     */
    public function getPropSpecDesc()
    {
        return $this->propSpecDesc;
    }
}

