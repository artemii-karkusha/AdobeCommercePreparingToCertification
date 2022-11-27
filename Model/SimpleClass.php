<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c) (https://www.linkedin.com/in/artemiy-karkusha/)
 */
declare(strict_types=1);

namespace ArtemiiKarkusha\AdobeCommercePreparingToCertification\Model;

use ArtemiiKarkusha\AdobeCommercePreparingToCertification\Api\SimpleInterface;

class SimpleClass implements SimpleInterface
{
    /**
     * @param string $stringParam
     */
    public function __construct(private string $stringParam = ''){}

    /**
     * @inheritDoc
     */
    public function doSomething(): void
    {
        echo $this->stringParam;
    }
}
