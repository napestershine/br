<?php

namespace Brooter\AdminBundle\Entity;

use Brooter\PropertyBundle\Entity\PostProperty;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * PropSubCate
 *
 * @ORM\Table(name="prop_sub_cate")
 * @ORM\Entity(repositoryClass="Brooter\AdminBundle\Repository\PropSubCateRepository")
 */
class PropSubCate
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
     * @ORM\Column(name="PropSubCateName", type="string", length=255)
     */
    private $propSubCateName;




    /**
     * @ORM\ManyToOne(targetEntity="Brooter\AdminBundle\Entity\PropertyCate", inversedBy="propSubCate")
     * @ORM\JoinColumn(name="PropCate_id", referencedColumnName="id")
     */
    private $propertyCategory;
    // ...



    /**
     * @ORM\OneToMany(targetEntity="Brooter\PropertyBundle\Entity\PostProperty", mappedBy="propSubCate",cascade={"persist"})
     */
    private $postProperty;


    public function __construct() {

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
     * Set propSubCateName
     *
     * @param string $propSubCateName
     *
     * @return PropSubCate
     */
    public function setPropSubCateName($propSubCateName)
    {
        $this->propSubCateName = $propSubCateName;

        return $this;
    }

    /**
     * Get propSubCateName
     *
     * @return string
     */
    public function getPropSubCateName()
    {
        return $this->propSubCateName;
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
        $postProperty->addPropSubCate($this);
        $this->postProperty->add($postProperty);
    }
    public function removePostProperty(PostProperty $postProperty)
    {
        $this->postProperty->removeElement($postProperty);
    }


    /**
     * @return mixed
     */
    public function getPropertyCategory()
    {
        return $this->propertyCategory;
    }

    /**
     * @param mixed $propertyCategory
     */
    public function setPropertyCategory($propertyCategory)
    {
        $this->propertyCategory = $propertyCategory;
    }
    
    public function addPropertyCate(PropertyCate $propertyCategory)
    {
        $this->setPropertyCategory($propertyCategory);
    }

    public function __toString()
    {
        // TODO: Implement __toString() method.
        return $this->propSubCateName;
    }
}

