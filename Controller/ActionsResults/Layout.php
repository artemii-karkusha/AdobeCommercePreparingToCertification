<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c) (https://www.linkedin.com/in/artemiy-karkusha/)
 */

declare(strict_types=1);

namespace ArtemiiKarkusha\AdobeCommercePreparingToCertification\Controller\ActionsResults;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\View\Result\LayoutFactory as ResultLayoutFactory;

class Layout implements HttpGetActionInterface
{
    /**
     * @param ResultLayoutFactory $resultLayoutFactory
     */
    public function __construct(private ResultLayoutFactory $resultLayoutFactory) {}

    /**
     * @inheritDoc
     */
    public function execute(): ResultInterface
    {
        $resultLayout = $this->resultLayoutFactory->create();
        $resultLayout->addDefaultHandle();
        $resultLayout->getLayout()->getUpdate()->load(['example_result_layout_page']);
        return $resultLayout;
    }
}
