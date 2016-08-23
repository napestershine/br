<?php

namespace Brooter\PropertyBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * PropertyImage
 *
 * @ORM\Table(name="property_image")
 * @ORM\Entity(repositoryClass="Brooter\PropertyBundle\Repository\PropertyImageRepository")
 */
class PropertyImage
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
     * @ORM\Column(type="string")
     *
     * @Assert\NotBlank(message="Please, upload the slider image in jpg or jpeg or png format.")
     * @Assert\File(mimeTypes={ "image/png", "image/jpeg", "image/jpg" })
     */
    private $filePath;



    /**
     * @ORM\ManyToOne(targetEntity="Brooter\PropertyBundle\Entity\PostProperty",  cascade={"persist"}, inversedBy="propertyImage")
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
     * Set filePath
     *
     * @param string $filePath
     *
     * @return PropertyImage
     */
    public function setFilePath($filePath)
    {
        $this->filePath = $filePath;

        return $this;
    }

    /**
     * Get filePath
     *
     * @return string
     */
    public function getFilePath()
    {
        return $this->filePath;
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

