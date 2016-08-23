<?php

namespace Brooter\PropertyBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Brooter\PropertyBundle\Entity\PostProperty;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * FloorPlans
 *
 * @ORM\Table(name="floor_plans")
 * @ORM\Entity(repositoryClass="Brooter\PropertyBundle\Repository\FloorPlansRepository")
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
     * @ORM\Column(type="string")
     *
     * @Assert\NotBlank(message="Please, upload the slider image in jpg or jpeg or png format.")
     * @Assert\File(mimeTypes={ "image/png", "image/jpeg", "image/jpg" })
     */
    private $imageFilePath;


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
     * Set imageFilePath
     *
     * @param string $imageFilePath
     *
     */
    public function setImageFilePath($imageFilePath)
    {
        $this->imageFilePath = $imageFilePath;
        return $this;
    }

    /**
     * Get imageFilePath
     *
     * @return string
     */
    public function getImageFilePath()
    {
        return $this->imageFilePath;
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

}

