<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c) (https://www.linkedin.com/in/artemiy-karkusha/)
 */

declare(strict_types=1);

namespace ArtemiiKarkusha\AdobeCommercePreparingToCertification\Controller\ActionsResults;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\View\Result\PageFactory as ResultPageFactory;

class Page implements HttpGetActionInterface
{
    /**
     * @param ResultPageFactory $resultPageFactory
     */
    public function __construct(private ResultPageFactory $resultPageFactory) {}

    /**
     * @inheritDoc
     */
    public function execute(): ResultInterface
    {
        return $this->resultPageFactory->create();
    }
}
