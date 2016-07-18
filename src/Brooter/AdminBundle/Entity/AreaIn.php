<?php

namespace Brooter\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AreaIn
 *
 * @ORM\Table(name="area_in")
 * @ORM\Entity(repositoryClass="Brooter\AdminBundle\Repository\AreaInRepository")
 */
class AreaIn
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
     * @ORM\Column(name="AreaInName", type="string", length=255)
     */
    private $areaInName;


    /**
     * @ORM\OneToOne(targetEntity="Area", inversedBy="areaIn")
     * @ORM\JoinColumn(name="area_id", referencedColumnName="id")
     */
    private $area;

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
     * Set areaInName
     *
     * @param string $areaInName
     *
     * @return AreaIn
     */
    public function setAreaInName($areaInName)
    {
        $this->areaInName = $areaInName;

        return $this;
    }

    /**
     * Get areaInName
     *
     * @return string
     */
    public function getAreaInName()
    {
        return $this->areaInName;
    }
}

