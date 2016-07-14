<?php

namespace Brooter\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class BrooterUserBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
