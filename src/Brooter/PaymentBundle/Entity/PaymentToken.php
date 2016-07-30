<?php

namespace Brooter\PaymentBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Payum\Core\Model\Token;

/**
 * PaymentToken
 *
 * @ORM\Table(name="payment_token")
 * @ORM\Entity(repositoryClass="Brooter\PaymentBundle\Repository\PaymentTokenRepository")
 */
class PaymentToken extends Token
{
    
}

