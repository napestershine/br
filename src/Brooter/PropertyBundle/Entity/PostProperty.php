<?php

namespace Brooter\PropertyBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * PostProperty
 *
 * @ORM\Table(name="post_property")
 * @ORM\Entity(repositoryClass="Brooter\PropertyBundle\Repository\PostPropertyRepository")
 */
class PostProperty
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
     * @ORM\Column(name="title",type="string",length=255)
     */
    private $title;

    /**
     * @ORM\ManyToOne(targetEntity="Brooter\AdminBundle\Entity\PropertyCate", inversedBy="postProperty")
     * @ORM\JoinColumn(name="PropCate_id", referencedColumnName="id")
     */
    private $propType;


    /**
     * @ORM\ManyToOne(targetEntity="Brooter\AdminBundle\Entity\ListPropFor", inversedBy="postProperty")
     * @ORM\JoinColumn(name="ListPropFor_id", referencedColumnName="id")
     */
    private $listPropFor;



    /**
     * @ORM\OneToOne(targetEntity="Brooter\AdminBundle\Entity\Area", inversedBy="postProperty")
     * @ORM\JoinColumn(name="Area_id", referencedColumnName="id")
     */
    private $area;

    /**
     * @ORM\OneToOne(targetEntity="Brooter\AdminBundle\Entity\Address", inversedBy="postProperty")
     * @ORM\JoinColumn(name="Address_id", referencedColumnName="id")
     */
    private $address;



    /**
     * @ORM\Column(name="noofbedroom",type="integer")
     */
    private $noofbedroom;


    /**
     * @ORM\Column(name="noofbathroom",type="integer")
     */
    private $noofbathroom;


    /**
     * @ORM\Column(name="noofbalcony",type="integer")
     */
    private $noofbalcony;


    /**
     * @ORM\Column(name="totalfloor",type="integer")
     */
    private $totalfloor;


    /**
     * @ORM\Column(name="expected_price",type="float")
     */
    private $expectedPrice;


    /**
     * @ORM\ManyToOne(targetEntity="Brooter\AdminBundle\Entity\PropertyOnFloor", inversedBy="postProperty")
     * @ORM\JoinColumn(name="PropertyOnFloor_id", referencedColumnName="id")
     */
    private $propOnFloor;

    /**
     * @ORM\OneToOne(targetEntity="Brooter\AdminBundle\Entity\ReservedParking", inversedBy="postProperty")
     * @ORM\JoinColumn(name="ReservedParking_id", referencedColumnName="id")
     */
    private $reservedParking;



    /**
     * @ORM\ManyToOne(targetEntity="Brooter\AdminBundle\Entity\Availability", inversedBy="postProperty")
     * @ORM\JoinColumn(name="Availability_id", referencedColumnName="id")
     */
    private $availability;



    /**
     * @ORM\ManyToOne(targetEntity="Brooter\AdminBundle\Entity\AgeOfProperty", inversedBy="postProperty")
     * @ORM\JoinColumn(name="AgeOfProperty_id", referencedColumnName="id")
     */
    private $ageOfProp;
    /**
     * @ORM\ManyToOne(targetEntity="Brooter\AdminBundle\Entity\Ownership", inversedBy="postProperty")
     * @ORM\JoinColumn(name="Ownership_id", referencedColumnName="id")
     */
    private $ownership;


    /**
     * @ORM\ManyToMany(targetEntity="Brooter\AdminBundle\Entity\Overlooking", inversedBy="postProperty")
     * @ORM\JoinTable(name="PostProp_Overlooking")
     */
    private $overLooking;


    /**
     * @ORM\ManyToMany(targetEntity="Brooter\AdminBundle\Entity\WaterSource", inversedBy="postProperty")
     * @ORM\JoinTable(name="PostProp_WaterSource")
     */
    private $waterSource;



    /**
     * @ORM\ManyToMany(targetEntity="Brooter\AdminBundle\Entity\PowerBackup", inversedBy="postProperty")
     * @ORM\JoinTable(name="PostProp_PowerBackup")
     */
    private $powerBackup;



    /**
     * @ORM\ManyToMany(targetEntity="Brooter\AdminBundle\Entity\TypeOfFlooring", inversedBy="postProperty")
     * @ORM\JoinTable(name="PostProp_TypeOfFlooring")
     */
    private $typeOfFlooring;


    /**
     * @ORM\ManyToOne(targetEntity="Brooter\AdminBundle\Entity\furnished", inversedBy="postProperty")
     * @ORM\JoinColumn(name="Furnished_id", referencedColumnName="id")
     */
    private $_furnished;


    /**
     * @ORM\ManyToMany(targetEntity="Brooter\AdminBundle\Entity\PropFeatureAmen", inversedBy="postProperty")
     * @ORM\JoinTable(name="PostProp_PropFeatureAmen")
     */
    private $propFeatureAmen;



    /**
     * @ORM\ManyToOne(targetEntity="Brooter\AdminBundle\Entity\PropPossesion", inversedBy="postProperty")
     * @ORM\JoinColumn(name="PropPoss_id", referencedColumnName="id")
     */
    private $propPossesion;


    /**
     * @ORM\ManyToOne(targetEntity="Brooter\AdminBundle\Entity\PropertyFacing", inversedBy="postProperty")
     * @ORM\JoinColumn(name="PropertyFacing_id", referencedColumnName="id")
     */
    private $propertyFacing;


    /**
     * @ORM\ManyToOne(targetEntity="Brooter\AdminBundle\Entity\MaterialUsed", inversedBy="postProperty")
     * @ORM\JoinColumn(name="MaterialUsed_id", referencedColumnName="id")
     */
    private $materialUsed;



    private $floorPlans;

    /**
     * @ORM\OneToMany(targetEntity="Brooter\PropertyBundle\Entity\PropertySpecification", mappedBy="postProperty",cascade={"persist"})
     */
    private $propertySpecification;

    /**
     * @ORM\ManyToOne(targetEntity="Brooter\PropertyBundle\Entity\YearBuilt", inversedBy="postProperty")
     * @ORM\JoinColumn(name="YearBuilt_id", referencedColumnName="id")
     */
    private $yearBuilt;


    /**
     * @var array
     *
     * @ORM\Column(name="images", type="array", nullable=true)
     */
    private $images;

    /**
     * @ORM\Column(name="description",type="text")
     */
    private $description;

    /**
     * Get id
     *
     * @return int
     */
    public function _construct()
    {

        $this->overLooking=new \Doctrine\Common\Collections\ArrayCollection();
        $this->waterSource=new \Doctrine\Common\Collections\ArrayCollection();
        $this->powerBackup=new \Doctrine\Common\Collections\ArrayCollection();
        $this->typeOfFlooring=new \Doctrine\Common\Collections\ArrayCollection();
        $this->propFeatureAmen=new \Doctrine\Common\Collections\ArrayCollection();
        $this->floorPlans=new \Doctrine\Common\Collections\ArrayCollection();
        $this->propertySpecification=new \Doctrine\Common\Collections\ArrayCollection();

    }
    public function getId()
    {
        return $this->id;
    }
    public function getPropType()
    {
        return $this->propType;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @return mixed
     */
    public function getArea()
    {
        return $this->area;
    }

    /**
     * @return mixed
     */
    public function getAvailability()
    {
        return $this->availability;
    }

    /**
     * @return mixed
     */
    public function getFurnished()
    {
        return $this->_furnished;
    }

    /**
     * @return mixed
     */
    public function getListPropFor()
    {
        return $this->listPropFor;
    }

    /**
     * @return mixed
     */
    public function getOverLooking()
    {
        return $this->overLooking;
    }

    /**
     * @return mixed
     */
    public function getOwnership()
    {
        return $this->ownership;
    }

    /**
     * @return mixed
     */
    public function getPowerBackup()
    {
        return $this->powerBackup;
    }

    /**
     * @return mixed
     */
    public function getPropFeatureAmen()
    {
        return $this->propFeatureAmen;
    }

    /**
     * @return mixed
     */
    public function getPropPossesion()
    {
        return $this->propPossesion;
    }

    /**
     * @return mixed
     */
    public function getReservedParking()
    {
        return $this->reservedParking;
    }

    /**
     * @return mixed
     */
    public function getTypeOfFlooring()
    {
        return $this->typeOfFlooring;
    }

    /**
     * @return mixed
     */
    public function getWaterSource()
    {
        return $this->waterSource;
    }


    /**
     * @return mixed
     */
    public function getAgeOfProp()
    {
        return $this->ageOfProp;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return mixed
     */
    public function getNoofbalcony()
    {
        return $this->noofbalcony;
    }

    /**
     * @return mixed
     */
    public function getNoofbathroom()
    {
        return $this->noofbathroom;
    }

    /**
     * @return mixed
     */
    public function getNoofbedroom()
    {
        return $this->noofbedroom;
    }

    /**
     * @return mixed
     */
    public function getPropOnFloor()
    {
        return $this->propOnFloor;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return mixed
     */
    public function getTotalfloor()
    {
        return $this->totalfloor;
    }

    /**
     * @return mixed
     */
    public function getFloorPlans()
    {
        return $this->floorPlans;
    }

    /**
     * @return array
     */
    public function getImages()
    {
        return $this->images;
    }

    /**
     * @return mixed
     */
    public function getMaterialUsed()
    {
        return $this->materialUsed;
    }

    /**
     * @return mixed
     */
    public function getPropertyFacing()
    {
        return $this->propertyFacing;
    }

    /**
     * @return mixed
     */
    public function getPropertySpecification()
    {
        return $this->propertySpecification;
    }

    /**
     * @return mixed
     */
    public function getYearBuilt()
    {
        return $this->yearBuilt;
    }

    /**
     * @return mixed
     */
    public function getExpectedPrice()
    {
        return $this->expectedPrice;
    }

    public function addFloorPlans(FloorPlans $floorPlans)
    {
        $this->floorPlans->add($floorPlans);
    }
    public function removeFloorPlans(FloorPlans $floorPlans)
    {
        $this->floorPlans->remove($floorPlans);
    }
}

