<?php

namespace Brooter\PropertyBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Brooter\PropertyBundle\Entity\PostProperty;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * FloorPlans
 *
 * @ORM\Table(name="floor_plans")
 * @ORM\Entity(repositoryClass="Brooter\PropertyBundle\Repository\FloorPlansRepository")
 * @Vich\Uploadable
 */
class FloorPlans
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
     * @ORM\Column(name="Title", type="string", length=255)
     */
    private $title;

    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     *
     * @Vich\UploadableField(mapping="floorplans_image", fileNameProperty="imageFilePath")
     *
     * @var File
     */
    private $imageFile;

    /**
     * @var string
     *
     * @ORM\Column(name="ImageFilePath", type="string", length=255)
     */
    private $imageFilePath;

    /**
     * @ORM\Column(type="datetime")
     *
     * @var \DateTime
     */
    private $updatedAt;


    /**
     * @ORM\ManyToOne(targetEntity="Brooter\PropertyBundle\Entity\PostProperty",  cascade={"persist"}, inversedBy="floorPlans")
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
     * Set title
     *
     * @param string $title
     *
     */
    public function setTitle($title)
    {
        $this->title = $title;

    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }


    /**
     * @param mixed $postProperty
     */
    public function setPostProperty($postProperty)
    {
        $this->postProperty = $postProperty;
    }

    public function addPostProperty(PostProperty $postProperty)
    {
        $this->setPostProperty($postProperty);
    }

    /**
     * If manually uploading a file (i.e. not using Symfony Form) ensure an instance
     * of 'UploadedFile' is injected into this setter to trigger the  update. If this
     * bundle's configuration parameter 'inject_on_load' is set to 'true' this setter
     * must be able to accept an instance of 'File' as the bundle will inject one here
     * during Doctrine hydration.
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile $image
     *
     * @return FloorPlans
     */
    /**
     * @param File $imageFile
     */
    public function setImageFile(File $imageFile = null)
    {
        $this->imageFile = $imageFile;

        if($imageFile)
        {
            $this->updatedAt=new \DateTime('now');
        }
        return $this;
    }

    /**
     * @return File
     */
    public function getImageFile()
    {
        return $this->imageFile;
    }

    /**
     * @param string $imageFilePath
     */
    public function setImageFilePath($imageFilePath)
    {
        $this->imageFilePath = $imageFilePath;
    }

    /**
     * @return string
     */
    public function getImageFilePath()
    {
        return $this->imageFilePath;
    }


    /**
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @param \DateTime $updatedAt
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }


}

