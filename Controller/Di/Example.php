<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c) (https://www.linkedin.com/in/artemiy-karkusha/)
 */
declare(strict_types=1);

namespace ArtemiiKarkusha\AdobeCommercePreparingToCertification\Controller\Di;

use JsonException;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\Controller\Result\RawFactory;
use ArtemiiKarkusha\AdobeCommercePreparingToCertification\Api\ExampleHowDIUsingInterface;

class Example implements HttpGetActionInterface
{
    /**
     * @param RawFactory $rawFactory
     * @param ExampleHowDIUsingInterface $exampleHowDIUsing
     */
    public function __construct(
        private RawFactory $rawFactory,
        private ExampleHowDIUsingInterface $exampleHowDIUsing
    ) {}

    /**
     * @inheritDoc
     */
    public function execute()
    {
        $rawResponse = $this->rawFactory->create();

        try {
            $exampleHowDIUsingContains = json_encode((array)$this->exampleHowDIUsing, JSON_THROW_ON_ERROR);
            $rawResponse->setContents($exampleHowDIUsingContains);
        } catch (JsonException $jsonException) {
            $rawResponse->setContents($jsonException->getMessage());
        }

        return $rawResponse;
    }
}
