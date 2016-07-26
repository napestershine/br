<?php

namespace Brooter\PropertyBundle\Entity;

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


    /**
     * @ORM\OneToMany(targetEntity="Brooter\PropertyBundle\Entity\FloorPlans", mappedBy="postProperty",cascade={"persist"})
     */
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
     * @ORM\Column(name="images", type="string", nullable=true)
     * @Assert\File(mimeTypes={ "image/png", "image/jpeg", "image/jpg" })
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

        $this->overLooking=new ArrayCollection();
        $this->waterSource=new ArrayCollection();
        $this->powerBackup=new ArrayCollection();
        $this->typeOfFlooring=new ArrayCollection();
        $this->propFeatureAmen=new ArrayCollection();
        $this->floorPlans=new ArrayCollection();
        $this->propertySpecification=new ArrayCollection();
        $this->images=new ArrayCollection();



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
    public function getOverLooking()
    {
        return $this->overLooking;
    }

    /**
     * @param mixed $overLooking
     */
    public function setOverLooking($overLooking)
    {
        $this->overLooking = $overLooking;
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
     * @return mixed
     */
    public function getPropFeatureAmen()
    {
        return $this->propFeatureAmen;
    }

    /**
     * @param mixed $propFeatureAmen
     */
    public function setPropFeatureAmen($propFeatureAmen)
    {
        $this->propFeatureAmen = $propFeatureAmen;
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
    public function setTypeOfFlooring($typeOfFlooring)
    {
        $this->typeOfFlooring = $typeOfFlooring;
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
    public function setWaterSource($waterSource)
    {
        $this->waterSource = $waterSource;
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
    public function getFloorPlans()
    {
        return $this->floorPlans;
    }

    /**
     * @param mixed $floorPlans
     */
    public function setFloorPlans($floorPlans)
    {
        $this->floorPlans = $floorPlans;
    }
    /**
     * @return array
     */
    public function getImages()
    {
        return $this->images;
    }

    /**
     * @param array $images
     */
    public function setImages($images)
    {
        $this->images = $images;
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
    /**
     * @return mixed
     */
    public function getPropertySpecification()
    {
        return $this->propertySpecification;
    }

    /**
     * @param mixed $propertySpecification
     */
    public function setPropertySpecification($propertySpecification)
    {
        $this->propertySpecification = $propertySpecification;
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


    public function addFloorPlans(FloorPlans $floorPlans)
    {
        $this->floorPlans->add($floorPlans);
    }
    public function removeFloorPlans(FloorPlans $floorPlans)
    {
        $this->floorPlans->remove($floorPlans);
    }

    public function addPropertySpecification(PropertySpecification $propertySpecification)
    {
        $propertySpecification->setPostProperty($this);


        $this->propertySpecification->add($propertySpecification);
    }
    public function removePropertySpecification(PropertySpecification $propertySpecification)
    {
        $this->propertySpecification->removeElement($propertySpecification);
    }





}

