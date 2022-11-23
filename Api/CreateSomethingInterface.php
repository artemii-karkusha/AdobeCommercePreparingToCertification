<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c) (https://www.linkedin.com/in/artemiy-karkusha/)
 */
declare(strict_types=1);

namespace ArtemiiKarkusha\AdobeCommercePreparingToCertification\Api;

use Magento\Framework\DataObject;

/**
 * @api
 */
interface CreateSomethingInterface
{
    /**
     * @api
     * @param string $somethingName
     * @return DataObject
     * 1.1
     * Only How example for ACL. It isn't usable.
     */
    public function execute(string $somethingName): DataObject;
}
