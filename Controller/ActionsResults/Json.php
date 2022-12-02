<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c) (https://www.linkedin.com/in/artemiy-karkusha/)
 */

declare(strict_types=1);

namespace ArtemiiKarkusha\AdobeCommercePreparingToCertification\Controller\ActionsResults;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\Result\JsonFactory as ResultJsonFactory;
use Magento\Framework\Controller\ResultInterface;

/**
 * Controller example with result object the Json
 */
class Json implements HttpGetActionInterface
{
    /**
     * @param ResultJsonFactory $resultJsonFactory
     */
    public function __construct(
        private ResultJsonFactory $resultJsonFactory
    ) {
    }

    /**
     * @inheritDoc
     */
    public function execute(): ResultInterface
    {
        return $this->resultJsonFactory->create()
            ->setJsonData($this->generateJsonResponse());
    }

    /**
     * @return string
     */
    private function generateJsonResponse(): string
    {
        return <<< JSON
        {
          "status": "success",
          "message": "Some message"
        }
        JSON;
    }
}
