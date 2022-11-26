<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c) (https://www.linkedin.com/in/artemiy-karkusha/)
 */
declare(strict_types=1);

namespace ArtemiiKarkusha\AdobeCommercePreparingToCertification\Cron;

class UploadInformationAboutItemsToDeliveryServices
{
    /**
     * Cronjob Description
     *
     * @return void
     */
    public function execute(): void
    {
        $this->doSomething();
    }

    /**
     * @return void
     */
    private function doSomething(): void
    {
        // connect to delivery service
        // upload items
    }
}
