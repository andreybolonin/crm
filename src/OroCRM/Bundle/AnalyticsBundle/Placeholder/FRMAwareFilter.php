<?php

namespace OroCRM\Bundle\AnalyticsBundle\Placeholder;

use OroCRM\Bundle\ChannelBundle\Entity\Channel;

class FRMAwareFilter
{
    /**
     * @var string
     */
    protected $interface;

    /**
     * @param string $interface
     */
    public function __construct($interface)
    {
        $this->interface = $interface;
    }

    /**
     * @param Channel $entity
     * @return bool
     */
    public function isApplicable($entity)
    {
        if (!$entity instanceof Channel) {
            return false;
        }

        $customerIdentity = $entity->getCustomerIdentity();

        return in_array($this->interface, class_implements($customerIdentity));
    }
}
