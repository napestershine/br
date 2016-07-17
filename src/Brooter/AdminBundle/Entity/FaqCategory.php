<?php

namespace Brooter\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * FaqCategory
 *
 * @ORM\Table(name="faq_category")
 * @ORM\Entity(repositoryClass="Brooter\AdminBundle\Repository\FaqCategoryRepository")
 */
class FaqCategory
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
     * @ORM\Column(name="name", type="string", length=255, unique=true)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="Faq", mappedBy="faqcategory")
     */
    private $faq;

    /**
     * FaqCategory constructor.
     */
    public function __construct() {
        $this->faq = new ArrayCollection();
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
     * Set name
     *
     * @param string $name
     *
     * @return FaqCategory
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getFaq()
    {
        return $this->faq;
    }

    /**
     * @param mixed $faq
     */
    public function setFaq($faq)
    {
        $this->faq = $faq;
    }

}

