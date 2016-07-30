<?php

namespace Brooter\PaymentBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Payum\Core\Model\ArrayObject;

/**
 * Payment
 *
 * @ORM\Table(name="payment")
 * @ORM\Entity(repositoryClass="Brooter\PaymentBundle\Repository\PaymentRepository")
 */
class Payment extends ArrayObject
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;


}

