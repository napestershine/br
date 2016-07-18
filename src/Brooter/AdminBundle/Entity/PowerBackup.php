<?php

namespace Brooter\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PowerBackup
 *
 * @ORM\Table(name="power_backup")
 * @ORM\Entity(repositoryClass="Brooter\AdminBundle\Repository\PowerBackupRepository")
 */
class PowerBackup
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
     * @ORM\Column(name="PowerBackupName", type="string", length=255)
     */
    private $powerBackupName;


    /**
     * @ORM\ManyToMany(targetEntity="Brooter\PropertyBundle\Entity\PostProperty", mappedBy="powerBackup")
     */
    private $postProperty;


    public function _construct()
    {
        $this->postProperty=new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set powerBackupName
     *
     * @param string $powerBackupName
     *
     * @return PowerBackup
     */
    public function setPowerBackupName($powerBackupName)
    {
        $this->powerBackupName = $powerBackupName;

        return $this;
    }

    /**
     * Get powerBackupName
     *
     * @return string
     */
    public function getPowerBackupName()
    {
        return $this->powerBackupName;
    }
}

