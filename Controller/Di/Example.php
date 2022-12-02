<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c) (https://www.linkedin.com/in/artemiy-karkusha/)
 */
declare(strict_types=1);

namespace ArtemiiKarkusha\AdobeCommercePreparingToCertification\Controller\Di;

use JsonException;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\Result\RawFactory;
use ArtemiiKarkusha\AdobeCommercePreparingToCertification\Api\ExampleHowDiIsUsedInterface;
use Magento\Framework\Controller\ResultInterface;

class Example implements HttpGetActionInterface
{
    /**
     * @param RawFactory $rawFactory
     * @param ExampleHowDiIsUsedInterface $exampleHowDiIsUsed
     */
    public function __construct(
        private RawFactory $rawFactory,
        private ExampleHowDiIsUsedInterface $exampleHowDiIsUsed
    ) {
    }

    /**
     * @inheritDoc
     */
    public function execute(): ResultInterface
    {
        $rawResponse = $this->rawFactory->create();

        try {
            $exampleHowDiIsUsedContains = json_encode((array)$this->exampleHowDiIsUsed, JSON_THROW_ON_ERROR);
            $rawResponse->setContents($exampleHowDiIsUsedContains);
        } catch (JsonException $jsonException) {
            $rawResponse->setContents($jsonException->getMessage());
        }

        return $rawResponse;
    }
}
