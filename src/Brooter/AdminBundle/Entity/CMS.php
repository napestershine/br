<?php

namespace Brooter\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CMS
 *
 * @ORM\Table(name="c_m_s")
 * @ORM\Entity(repositoryClass="Brooter\AdminBundle\Repository\CMSRepository")
 */
class CMS
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
     * @ORM\Column(name="aboutus", type="text")
     */
    private $aboutus;

    /**
     * @var string
     *
     * @ORM\Column(name="dmca", type="text")
     */
    private $dmca;

    /**
     * @var string
     *
     * @ORM\Column(name="terms", type="text")
     */
    private $terms;

    /**
     * @var string
     *
     * @ORM\Column(name="privacypolicy", type="text")
     */
    private $privacypolicy;

    /**
     * @var string
     *
     * @ORM\Column(name="copyright", type="text")
     */
    private $copyright;


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
     * Set aboutus
     *
     * @param string $aboutus
     *
     * @return CMS
     */
    public function setAboutus($aboutus)
    {
        $this->aboutus = $aboutus;

        return $this;
    }

    /**
     * Get aboutus
     *
     * @return string
     */
    public function getAboutus()
    {
        return $this->aboutus;
    }

    /**
     * Set dmca
     *
     * @param string $dmca
     *
     * @return CMS
     */
    public function setDmca($dmca)
    {
        $this->dmca = $dmca;

        return $this;
    }

    /**
     * Get dmca
     *
     * @return string
     */
    public function getDmca()
    {
        return $this->dmca;
    }

    /**
     * Set terms
     *
     * @param string $terms
     *
     * @return CMS
     */
    public function setTerms($terms)
    {
        $this->terms = $terms;

        return $this;
    }

    /**
     * Get terms
     *
     * @return string
     */
    public function getTerms()
    {
        return $this->terms;
    }

    /**
     * Set privacypolicy
     *
     * @param string $privacypolicy
     *
     * @return CMS
     */
    public function setPrivacypolicy($privacypolicy)
    {
        $this->privacypolicy = $privacypolicy;

        return $this;
    }

    /**
     * Get privacypolicy
     *
     * @return string
     */
    public function getPrivacypolicy()
    {
        return $this->privacypolicy;
    }

    /**
     * Set copyright
     *
     * @param string $copyright
     *
     * @return CMS
     */
    public function setCopyright($copyright)
    {
        $this->copyright = $copyright;

        return $this;
    }

    /**
     * Get copyright
     *
     * @return string
     */
    public function getCopyright()
    {
        return $this->copyright;
    }
}

