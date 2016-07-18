<?php

namespace Brooter\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PropFeatureAmen
 *
 * @ORM\Table(name="prop_feature_amen")
 * @ORM\Entity(repositoryClass="Brooter\AdminBundle\Repository\PropFeatureAmenRepository")
 */
class PropFeatureAmen
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
     * @ORM\Column(name="FeatureAmenName", type="string", length=255)
     */
    private $featureAmenName;



    /**
     * @ORM\ManyToMany(targetEntity="Brooter\PropertyBundle\Entity\PostProperty", mappedBy="propFeatureAmen")
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
     * Set featureAmenName
     *
     * @param string $featureAmenName
     *
     * @return PropFeatureAmen
     */
    public function setFeatureAmenName($featureAmenName)
    {
        $this->featureAmenName = $featureAmenName;

        return $this;
    }

    /**
     * Get featureAmenName
     *
     * @return string
     */
    public function getFeatureAmenName()
    {
        return $this->featureAmenName;
    }
}

