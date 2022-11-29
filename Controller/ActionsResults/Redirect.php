<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c) (https://www.linkedin.com/in/artemiy-karkusha/)
 */

declare(strict_types=1);

namespace ArtemiiKarkusha\AdobeCommercePreparingToCertification\Controller\ActionsResults;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\Controller\Result\RedirectFactory as ResultRedirectFactory;

class Redirect implements HttpGetActionInterface
{
    /**
     * @param ResultRedirectFactory $resultRedirectFactory
     */
    public function __construct(private ResultRedirectFactory $resultRedirectFactory) {}

    /**
     * @inheritDoc
     */
    public function execute(): ResultInterface
    {
        return $this->resultRedirectFactory->create()
            ->setPath(
                $this->getRedirectUPath()
            );
    }

    /**
     * @return string
     */
    private function getRedirectUPath(): string
    {
        return '/';
    }
}
