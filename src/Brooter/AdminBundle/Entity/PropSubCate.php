<?php

namespace Brooter\AdminBundle\Entity;

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
}

