<?php

namespace Brooter\PropertyBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

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
     * @var string
     *
     * @ORM\Column(name="ImageFilePath", type="string", length=255)
     */
    private $imageFilePath;



//    /**
//     * @ORM\ManyToOne(targetEntity="Brooter\PropertyBundle\Entity\PostProperty", inversedBy="postProperty")
//     * @ORM\JoinColumn(name="PostProperty_id", referencedColumnName="id")
//     */
//    private $postProperty;
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
     * @return FloorPlans
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
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
     * @return FloorPlans
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
    
    public function __toString()
    {
        return $this->title;
    }
}

