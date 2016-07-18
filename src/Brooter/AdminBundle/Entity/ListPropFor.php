<?php

namespace Brooter\AdminBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * ListPropFor
 *
 * @ORM\Table(name="list_prop_for")
 * @ORM\Entity(repositoryClass="Brooter\AdminBundle\Repository\ListPropForRepository")
 */
class ListPropFor
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
     * @ORM\Column(name="ListPropForName", type="string", length=255)
     */
    private $listPropForName;


    /**
     * @ORM\OneToMany(targetEntity="Brooter\PropertyBundle\Entity\PostProperty", mappedBy="listPropFor")
     */
    private $postProperty;

    public function _construct()
    {
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
     * Set listPropForName
     *
     * @param string $listPropForName
     *
     * @return ListPropFor
     */
    public function setListPropForName($listPropForName)
    {
        $this->listPropForName = $listPropForName;

        return $this;
    }

    /**
     * Get listPropForName
     *
     * @return string
     */
    public function getListPropForName()
    {
        return $this->listPropForName;
    }
}

