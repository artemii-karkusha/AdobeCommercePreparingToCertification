<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c) (https://www.linkedin.com/in/artemiy-karkusha/)
 */

declare(strict_types=1);

namespace ArtemiiKarkusha\AdobeCommercePreparingToCertification\Model\Indexer\DeliveryService\Action;

/**
 * Class Full reindex action
 */
class Full
{
    /**
     * Refresh entities index
     *
     * @return $this
     */
    public function execute(): Full
    {
        $this->createTables();
        $this->clearReplicaTables();
        $this->reindex();
        $this->switchTables();

        return $this;
    }

    /**
     * Run reindexation
     *
     * @return void
     */
    private function reindex(): void
    {
        // Run reindexation
    }

    /**
     * Create the store tables
     *
     * @return void
     */
    private function createTables(): void
    {
        // Create the store tables
    }

    /**
     * Truncates the replica tables
     *
     * @return void
     */
    private function clearReplicaTables(): void
    {
        // Truncates the replica tables
    }

    /**
     * Switches the active table
     *
     * @return void
     */
    private function switchTables(): void
    {
        // Switches the active table
    }
}
