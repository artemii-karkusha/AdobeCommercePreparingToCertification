<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c) (https://www.linkedin.com/in/artemiy-karkusha/)
 */

declare(strict_types=1);

namespace ArtemiiKarkusha\AdobeCommercePreparingToCertification\Controller\ActionsResults;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\Controller\Result\ForwardFactory as ResultForwardFactory;

class Forward implements HttpGetActionInterface
{
    /**
     * @param ResultForwardFactory $resultForwardFactory
     */
    public function __construct(private ResultForwardFactory $resultForwardFactory) {}

    /**
     * @inheritDoc
     */
    public function execute(): ResultInterface
    {
        return $this->resultForwardFactory->create()
            ->setController('ActionsResults')
            ->forward('json');
    }
}
