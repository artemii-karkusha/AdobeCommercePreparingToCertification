<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c) (https://www.linkedin.com/in/artemiy-karkusha/)
 */

declare(strict_types=1);

namespace ArtemiiKarkusha\AdobeCommercePreparingToCertification\Controller\ActionsResults;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\View\Result\Layout as ResultLayout;
use Magento\Framework\View\Result\LayoutFactory as ResultLayoutFactory;
use Psr\Log\LoggerInterface;

/**
 * Controller example with result object the Layout
 */
class Layout implements HttpGetActionInterface
{
    /**
     * @param ResultLayoutFactory $resultLayoutFactory
     * @param LoggerInterface $logger
     * @param array $handles
     */
    public function __construct(
        private ResultLayoutFactory $resultLayoutFactory,
        private LoggerInterface $logger,
        private array $handles = []
    ) {
    }

    /**
     * @inheritDoc
     */
    public function execute(): ResultInterface
    {
        return $this->loadUpdatedLayoutByHandles();
    }

    /**
     * Load updated layout by handles
     *
     * @return ResultLayout
     */
    private function loadUpdatedLayoutByHandles(): ResultLayout
    {
        $resultLayout = $this->resultLayoutFactory->create();
        $resultLayout->addDefaultHandle();

        try {
            $resultLayout->getLayout()->getUpdate()->load($this->getHandles());
        } catch (LocalizedException $localizedException) {
            $this->logger->error(
                $localizedException->getMessage(),
                [__CLASS__]
            );
        }

        return $resultLayout;
    }

    /**
     * Get handles
     *
     * @return string[]
     */
    private function getHandles(): array
    {
        return $this->handles;
    }
}
