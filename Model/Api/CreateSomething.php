<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c) (https://www.linkedin.com/in/artemiy-karkusha/)
 */
declare(strict_types=1);

namespace ArtemiiKarkusha\AdobeCommercePreparingToCertification\Model\Api;

use ArtemiiKarkusha\AdobeCommercePreparingToCertification\Api\CreateSomethingInterface;
use Magento\Framework\DataObject;

class CreateSomething implements CreateSomethingInterface
{
    /**
     * @inheritDoc
     */
    public function execute(string $somethingName): DataObject
    {
        return new DataObject([
           'status' => 'success',
           'message' => sprintf('%s have been created.', $somethingName)
        ]);
    }
}
