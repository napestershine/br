<?php

namespace Brooter\PropertyBundle\Entity;

use Brooter\AdminBundle\Entity\Address;
use Brooter\AdminBundle\Entity\AgeOfProperty;
use Brooter\AdminBundle\Entity\Availability;
use Brooter\AdminBundle\Entity\furnished;
use Brooter\AdminBundle\Entity\MaterialUsed;
use Brooter\AdminBundle\Entity\Overlooking;
use Brooter\AdminBundle\Entity\Ownership;
use Brooter\AdminBundle\Entity\PowerBackup;
use Brooter\AdminBundle\Entity\PropertyFacing;
use Brooter\AdminBundle\Entity\PropertyOnFloor;
use Brooter\AdminBundle\Entity\PropFeatureAmen;
use Brooter\AdminBundle\Entity\PropPossesion;
use Brooter\AdminBundle\Entity\ReservedParking;
use Brooter\AdminBundle\Entity\TypeOfFlooring;
use Brooter\AdminBundle\Entity\WaterSource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

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
     * @ORM\ManyToOne(targetEntity="Brooter\AdminBundle\Entity\PropertyCate", inversedBy="postProperty", cascade={"persist"})
     * @ORM\JoinColumn(name="PropCate_id", referencedColumnName="id")
     */
    private $propType;


    /**
     * @ORM\ManyToOne(targetEntity="Brooter\AdminBundle\Entity\ListPropFor", inversedBy="postProperty")
     * @ORM\JoinColumn(name="ListPropFor_id", referencedColumnName="id")
     */
    private $listPropFor;



    /**
     * @ORM\OneToOne(targetEntity="Brooter\AdminBundle\Entity\Area", inversedBy="postProperty", cascade={"persist"})
     * @ORM\JoinColumn(name="Area_id", referencedColumnName="id")
     */
    private $area;

    /**
     * @ORM\OneToOne(targetEntity="Brooter\AdminBundle\Entity\Address", inversedBy="postProperty", cascade={"persist"})
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
     * @ORM\ManyToOne(targetEntity="Brooter\AdminBundle\Entity\PropertyOnFloor", inversedBy="postProperty", cascade={"persist"})
     * @ORM\JoinColumn(name="PropertyOnFloor_id", referencedColumnName="id")
     */
    private $propOnFloor;

    /**
     * @ORM\ManyToOne(targetEntity="Brooter\AdminBundle\Entity\ReservedParking", inversedBy="postProperty",cascade={"persist"})
     * @ORM\JoinColumn(name="ReservedParking_id", referencedColumnName="id")
     */
    private $reservedParking;



    /**
     * @ORM\ManyToOne(targetEntity="Brooter\AdminBundle\Entity\Availability", inversedBy="postProperty",cascade={"persist"})
     * @ORM\JoinColumn(name="Availability_id", referencedColumnName="id")
     */
    private $availability;



    /**
     * @ORM\ManyToOne(targetEntity="Brooter\AdminBundle\Entity\AgeOfProperty", inversedBy="postProperty",cascade={"persist"})
     * @ORM\JoinColumn(name="AgeOfProperty_id", referencedColumnName="id")
     */
    private $ageOfProp;



    /**
     * @ORM\ManyToOne(targetEntity="Brooter\AdminBundle\Entity\Ownership", inversedBy="postProperty",cascade={"persist"})
     * @ORM\JoinColumn(name="Ownership_id", referencedColumnName="id")
     */
    private $ownership;


    /**
     * @ORM\ManyToMany(targetEntity="Brooter\AdminBundle\Entity\Overlooking", inversedBy="postProperty", cascade={"persist"})
     * @ORM\JoinTable(name="PostProp_Overlooking",
     *     joinColumns={
     *      @ORM\JoinColumn(name="Overlooking_id", referencedColumnName="id")
     *     },
     *     inverseJoinColumns={
     *      @ORM\JoinColumn(name="PostProperty_id", referencedColumnName="id")
     *     }
     * )
     */
    private $overLooking;


    /**
     * @ORM\ManyToMany(targetEntity="Brooter\AdminBundle\Entity\WaterSource", inversedBy="postProperty", cascade={"persist"})
     * @ORM\JoinTable(name="PostProp_WaterSource",
     *     joinColumns={
     *      @ORM\JoinColumn(name="WaterSource_id", referencedColumnName="id")
     *     },
     *     inverseJoinColumns={
     *      @ORM\JoinColumn(name="PostProperty_id", referencedColumnName="id")
     *     }
     * )
     */

    private $waterSource;



    /**
     * @ORM\ManyToOne(targetEntity="Brooter\AdminBundle\Entity\PowerBackup", inversedBy="postProperty", cascade={"persist"})
     * @ORM\JoinColumn(name="PowerBackup_id", referencedColumnName="id")
     */
    private $powerBackup;



    /**
     * @ORM\ManyToMany(targetEntity="Brooter\AdminBundle\Entity\TypeOfFlooring", inversedBy="postProperty", cascade={"persist"})
     * @ORM\JoinTable(name="PostProp_TypeOfFlooring",
     *     joinColumns={
     *      @ORM\JoinColumn(name="TypeOfFlooring_id", referencedColumnName="id")
     *     },
     *     inverseJoinColumns={
     *      @ORM\JoinColumn(name="PostProperty_id", referencedColumnName="id")
     *     }
     * )
     */
    private $typeOfFlooring;


    /**
     * @ORM\ManyToOne(targetEntity="Brooter\AdminBundle\Entity\furnished", inversedBy="postProperty", cascade={"persist"})
     * @ORM\JoinColumn(name="Furnished_id", referencedColumnName="id")
     */
    private $_furnished;


    /**
     * @ORM\ManyToMany(targetEntity="Brooter\AdminBundle\Entity\PropFeatureAmen", inversedBy="postProperty", cascade={"persist"})
     * @ORM\JoinTable(name="PostProp_PropFeatureAmen",
     *     joinColumns={
     *      @ORM\JoinColumn(name="PropFeatureAmen_id", referencedColumnName="id")
     *     },
     *     inverseJoinColumns={
     *      @ORM\JoinColumn(name="PostProperty_id", referencedColumnName="id")
     *     }
     * )
     */
    private $propFeatureAmen;

    /**
     * @ORM\ManyToOne(targetEntity="Brooter\AdminBundle\Entity\PropertyFacing", inversedBy="postProperty", cascade={"persist"})
     * @ORM\JoinColumn(name="PropertyFacing_id", referencedColumnName="id")
     */
    private $propertyFacing;


    /**
     * @ORM\ManyToOne(targetEntity="Brooter\AdminBundle\Entity\MaterialUsed", inversedBy="postProperty", cascade={"persist"})
     * @ORM\JoinColumn(name="MaterialUsed_id", referencedColumnName="id")
     */
    private $materialUsed;

    /**
     * @ORM\ManyToOne(targetEntity="Brooter\PropertyBundle\Entity\YearBuilt", inversedBy="postProperty", cascade={"persist"})
     * @ORM\JoinColumn(name="YearBuilt_id", referencedColumnName="id")
     */
    private $yearBuilt;

    /**
     * @ORM\OneToMany(targetEntity="Brooter\PropertyBundle\Entity\FloorPlans" , mappedBy="postProperty", cascade={"persist"})
     */
    protected $floorPlans;

    /**
     * @ORM\OneToMany(targetEntity="Brooter\PropertyBundle\Entity\PropertySpecification", mappedBy="postProperty",cascade={"persist"})
     */
    private $propertySpecification;


    /**
     * @ORM\OneToMany(targetEntity="Brooter\PropertyBundle\Entity\PropertyImage" , mappedBy="postProperty", cascade={"persist"})
     */
    protected $propertyImage;


    /**
     * @ORM\ManyToOne(targetEntity="Brooter\AdminBundle\Entity\PropPossesion", inversedBy="postProperty", cascade={"persist"})
     * @ORM\JoinColumn(name="PropPoss_id", referencedColumnName="id")
     */
    private $propPossesion;


    /**
     * @ORM\Column(name="description",type="text")
     */
    private $description;

    /**
     * PostProperty constructor.
     */
    public function __construct()
    {

        $this->overLooking=new ArrayCollection();
        $this->waterSource=new ArrayCollection();
        $this->typeOfFlooring=new ArrayCollection();
        $this->propFeatureAmen=new ArrayCollection();
        $this->floorPlans=new ArrayCollection();
        $this->propertySpecification=new ArrayCollection();
        $this->propertyImage=new ArrayCollection();




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

    public function getPropType()
    {
        return $this->propType;
    }

    /**
     * @param mixed $propType
     */
    public function setPropType($propType)
    {
        $this->propType = $propType;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    
    public function addAddress(Address $address)
    {
        $address->setPostProperty($this);
        $this->address=$address;
    }
    
    public function removeAddress(Address $address)
    {
        $this->address=null;
    }
    
    /**
     * @param mixed $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }


    /**
     * @return mixed
     */
    public function getArea()
    {
        return $this->area;
    }

    /**
     * @param mixed $area
     */
    public function setArea($area)
    {
        $this->area = $area;
    }


    /**
     * @return mixed
     */
    public function getListPropFor()
    {
        return $this->listPropFor;
    }

    /**
     * @param mixed $listPropFor
     */
    public function setListPropFor($listPropFor)
    {
        $this->listPropFor = $listPropFor;
    }



    /**
     * @return mixed
     */
    public function getNoofbalcony()
    {
        return $this->noofbalcony;
    }

    /**
     * @param mixed $noofbalcony
     */
    public function setNoofbalcony($noofbalcony)
    {
        $this->noofbalcony = $noofbalcony;
    }

    /**
     * @return mixed
     */
    public function getNoofbathroom()
    {
        return $this->noofbathroom;
    }

    /**
     * @param mixed $noofbathroom
     */
    public function setNoofbathroom($noofbathroom)
    {
        $this->noofbathroom = $noofbathroom;
    }

    /**
     * @return mixed
     */
    public function getNoofbedroom()
    {
        return $this->noofbedroom;
    }

    /**
     * @param mixed $noofbedroom
     */
    public function setNoofbedroom($noofbedroom)
    {
        $this->noofbedroom = $noofbedroom;
    }

    /**
     * @return mixed
     */

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }
    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }


    /**
     * @return mixed
     */
    public function getTotalfloor()
    {
        return $this->totalfloor;
    }

    /**
     * @param mixed $totalfloor
     */
    public function setTotalfloor($totalfloor)
    {
        $this->totalfloor = $totalfloor;
    }



    /**
     * @return mixed
     */
    public function getExpectedPrice()
    {
        return $this->expectedPrice;
    }

    /**
     * @param mixed $expectedPrice
     */
    public function setExpectedPrice($expectedPrice)
    {
        $this->expectedPrice = $expectedPrice;
    }


    public function addFloorPlan(FloorPlans $floorPlans)
    {

        $floorPlans->addPostProperty($this);
        $this->floorPlans->add($floorPlans);

    }
    public function removeFloorPlan(FloorPlans $floorPlans)
    {
        $this->floorPlans->removeElement($floorPlans);
    }
    /**
     * @return mixed
     */
    public function getFloorPlans()
    {
        return $this->floorPlans;
    }

    public function addPropertySpecification(PropertySpecification $propertySpecification)
    {
        $propertySpecification->addPostProperty($this);
        $this->propertySpecification->add($propertySpecification);
    }
    public function removePropertySpecification(PropertySpecification $propertySpecification)
    {
        $this->propertySpecification->removeElement($propertySpecification);
    }
    /**
     * @return mixed
     */
    /**
     * @return mixed
     */
    public function getPropertySpecification()
    {
        return $this->propertySpecification;
    }



    public function getPropOnFloor()
    {
        return $this->propOnFloor;
    }

    /**
     * @param mixed $propOnFloor
     */
    public function setPropOnFloor($propOnFloor)
    {
        $this->propOnFloor = $propOnFloor;
    }
    public function addPropertyOnFloor(PropertyOnFloor $propertyOnFloor)
    {
        $this->setPropOnFloor($propertyOnFloor);

    }

    /**
     * @return mixed
     */
    public function getReservedParking()
    {
        return $this->reservedParking;
    }

    /**
     * @param mixed $reservedParking
     */
    public function setReservedParking($reservedParking)
    {
        $this->reservedParking = $reservedParking;
    }

    public function addReservedParking(ReservedParking $reservedParking)
    {
        $this->setReservedParking($reservedParking);
    }

    /**
     * @return mixed
     */
    public function getAvailability()
    {
        return $this->availability;
    }

    /**
     * @param mixed $availability
     */
    public function setAvailability($availability)
    {
        $this->availability = $availability;
    }

    public function addAvailability(Availability $availability)
    {
        $this->setAvailability($availability);
    }

    /**
     * @return mixed
     */
    public function getAgeOfProp()
    {
        return $this->ageOfProp;
    }

    /**
     * @param mixed $ageOfProp
     */
    public function setAgeOfProp($ageOfProp)
    {
        $this->ageOfProp = $ageOfProp;
    }
    public function addAgeOfProperty(AgeOfProperty $ageOfProperty)
    {
        $this->setAgeOfProp($ageOfProperty);
    }

    /**
     * @return mixed
     */
    public function getOwnership()
    {
        return $this->ownership;
    }

    /**
     * @param mixed $ownership
     */
    public function setOwnership($ownership)
    {
        $this->ownership = $ownership;
    }

    public function addOwnership(Ownership $ownership)
    {
        $this->setOwnership($ownership);
    }

    /**
     * @return mixed
     */
    public function getOverLooking()
    {
        return $this->overLooking;
    }



    public function addOverlooking(Overlooking $overlooking)
    {
        if (!$this->overLooking->contains($overlooking)) {
            $this->overLooking->add($overlooking);
        }
    }

    /**
     * @return mixed
     */
    public function getWaterSource()
    {
        return $this->waterSource;
    }

    /**
     * @param mixed $waterSource
     */
    public function addWaterSource(WaterSource $waterSource)
    {
        if (!$this->waterSource->contains($waterSource)) {
            $this->waterSource->add($waterSource);
        }
    }

    /**
     * @return mixed
     */
    public function getPowerBackup()
    {
        return $this->powerBackup;
    }

    /**
     * @param mixed $powerBackup
     */
    public function setPowerBackup($powerBackup)
    {
        $this->powerBackup = $powerBackup;
    }
    /**
     * @param mixed $powerBackup
     */
    public function addPowerBackup(PowerBackup $powerBackup)
    {

        $this->setPowerBackup($powerBackup);
    }

    /**
     * @return mixed
     */
    public function getTypeOfFlooring()
    {
        return $this->typeOfFlooring;
    }

    /**
     * @param mixed $typeOfFlooring
     */
    public function addTypeOfFlooring(TypeOfFlooring $typeOfFlooring)
    {
        if (!$this->typeOfFlooring->contains($typeOfFlooring)) {
            $this->typeOfFlooring->add($typeOfFlooring);
        }
    }


    /**
     * @return mixed
     */
    public function getFurnished()
    {
        return $this->_furnished;
    }

    /**
     * @param mixed $furnished
     */
    public function setFurnished($furnished)
    {
        $this->_furnished = $furnished;
    }

    public function addFurnished(furnished $furnished)
    {
        $this->setFurnished($furnished);
    }


    /**
     * @return mixed
     */
    public function getPropFeatureAmen()
    {
        return $this->propFeatureAmen;
    }

    /**
     * @param mixed $propFeatureAmen
     */
    public function addPropFeatureAmen(PropFeatureAmen $propFeatureAmen)
    {
        if (!$this->propFeatureAmen->contains($propFeatureAmen)) {
            $this->propFeatureAmen->add($propFeatureAmen);
        }
    }


    /**
     * @return mixed
     */
    public function getPropertyFacing()
    {
        return $this->propertyFacing;
    }

    /**
     * @param mixed $propertyFacing
     */
    public function setPropertyFacing($propertyFacing)
    {
        $this->propertyFacing = $propertyFacing;
    }

    public function addPropertyFacing(PropertyFacing $propertyFacing)
    {
        $this->setPropertyFacing($propertyFacing);
    }

    /**
     * @return mixed
     */
    public function getMaterialUsed()
    {
        return $this->materialUsed;
    }

    /**
     * @param mixed $materialUsed
     */
    public function setMaterialUsed($materialUsed)
    {
        $this->materialUsed = $materialUsed;
    }

    public function addMaterialUsed(MaterialUsed $materialUsed)
    {
        $this->setMaterialUsed($materialUsed);
    }


    /**
     * @return mixed
     */
    public function getYearBuilt()
    {
        return $this->yearBuilt;
    }

    /**
     * @param mixed $yearBuilt
     */
    public function setYearBuilt($yearBuilt)
    {
        $this->yearBuilt = $yearBuilt;
    }

    public function addYearBuilt(YearBuilt $yearBuilt)
    {
        $this->setYearBuilt($yearBuilt);
    }

    /**
     * @return mixed
     */
    public function getPropPossesion()
    {
        return $this->propPossesion;
    }

    /**
     * @param mixed $propPossesion
     */
    public function setPropPossesion($propPossesion)
    {
        $this->propPossesion = $propPossesion;
    }

    public function addPropPossession(PropPossesion $propPossesion)
    {
        $this->setPropPossesion($propPossesion);
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }



    public function addPropertyImage(PropertyImage $propertyImage)
    {

        $propertyImage->addPostProperty($this);
        $this->propertyImage->add($propertyImage);

    }
    public function removePropertyImage(FloorPlans $propertyImage)
    {
        $this->propertyImage->removeElement($propertyImage);
    }
    /**
     * @return mixed
     */
    public function getPropertyImage()
    {
        return $this->propertyImage;
    }
}

