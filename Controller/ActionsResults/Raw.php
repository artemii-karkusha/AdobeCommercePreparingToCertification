<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c) (https://www.linkedin.com/in/artemiy-karkusha/)
 */

declare(strict_types=1);

namespace ArtemiiKarkusha\AdobeCommercePreparingToCertification\Controller\ActionsResults;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\Result\RawFactory as ResultRawFactory;
use Magento\Framework\Controller\ResultInterface;

/**
 * Controller example with result object the Raw
 */
class Raw implements HttpGetActionInterface
{
    /**
     * @param ResultRawFactory $resultRawFactory
     */
    public function __construct(
        private ResultRawFactory $resultRawFactory
    ) {
    }

    /**
     * @inheritDoc
     */
    public function execute(): ResultInterface
    {
        return $this->resultRawFactory->create()
            ->setContents(
                $this->getContent()
            );
    }

    /**
     * @return string
     */
    private function getContent(): string
    {
        return 'A legendary actor and director reflects on the innumerable films he watched during his first decades as an audience member. ';
    }
}
