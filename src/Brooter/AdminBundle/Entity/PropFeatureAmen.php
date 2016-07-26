<?php

namespace Brooter\AdminBundle\Entity;

use Brooter\PropertyBundle\Entity\PostProperty;
use Doctrine\Common\Collections\ArrayCollection;
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
     * @ORM\ManyToMany(targetEntity="Brooter\PropertyBundle\Entity\PostProperty", mappedBy="propFeatureAmen", cascade={"persist"})
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

    public function __toString()
    {
        return $this->featureAmenName;
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
        $postProperty->addPropFeatureAmen($this);
        $this->postProperty->add($postProperty);
    }
    public function removePostProperty(PostProperty $postProperty)
    {
        $this->postProperty->removeElement($postProperty);
    }

}

