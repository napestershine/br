<?php

namespace Brooter\AdminBundle\Entity;

use Brooter\PropertyBundle\Entity\PostProperty;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * PropertyCate
 *
 * @ORM\Table(name="property_cate")
 * @ORM\Entity(repositoryClass="Brooter\AdminBundle\Repository\PropertyCateRepository")
 */
class PropertyCate
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
     * @ORM\Column(name="PropCateName", type="string", length=255)
     */
    private $propCateName;


    /**
     *
     *
     * @ORM\OneToMany(targetEntity="Brooter\AdminBundle\Entity\PropSubCate", mappedBy="propertyCategory")
     */
    private $propSubCate;

    /**
     * @ORM\OneToMany(targetEntity="Brooter\PropertyBundle\Entity\PostProperty", mappedBy="propType",cascade={"persist"})
     */
    private $postProperty;


    public function __construct() {
        $this->propSubCate= new ArrayCollection();
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
     * Set propCateName
     *
     * @param string $propCateName
     *
     * @return PropertyCate
     */
    public function setPropCateName($propCateName)
    {
        $this->propCateName = $propCateName;

        return $this;
    }

    /**
     * Get propCateName
     *
     * @return string
     */
    public function getPropCateName()
    {
        return $this->propCateName;
    }


    public function __toString()
    {
        return $this->propCateName;
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
        $postProperty->addPropertyCate($this);
        $this->postProperty->add($postProperty);
    }
    public function removePostProperty(PostProperty $postProperty)
    {
        $this->postProperty->removeElement($postProperty);
    }


    /**
     * @return mixed
     */
    public function getPropSubCate()
    {
        return $this->propSubCate;
    }

    public function addPropSubCate(PropSubCate $propSubCate)
    {
        $$propSubCate->addPropertyCate($this);
        $this->propSubCate->add($propSubCate);
    }
    public function removePropSubCate(PropSubCate $propSubCate)
    {
        $this->propSubCate->removeElement($propSubCate);
    }
}

