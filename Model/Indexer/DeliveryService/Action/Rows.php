<?php

/**
 * @author Artemii Karkusha
 * @copyright Copyright (c) (https://www.linkedin.com/in/artemiy-karkusha/)
 */
declare(strict_types=1);

namespace ArtemiiKarkusha\AdobeCommercePreparingToCertification\Model\Indexer\DeliveryService\Action;

class Rows
{
    /**
     * Refresh entities index
     *
     * @param int[] $entityIds
     * @return void
     */
    public function reindex(array $entityIds = []): void
    {
        // Split $entityIds into chunks
        // foreach ($entityIdsChunks as $entityIdsChunk) {
        // build entity index data for each $entity
        // update index data using  the generated entities index data
    }
}
