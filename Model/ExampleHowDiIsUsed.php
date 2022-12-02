<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c) (https://www.linkedin.com/in/artemiy-karkusha/)
 */
declare(strict_types=1);

namespace ArtemiiKarkusha\AdobeCommercePreparingToCertification\Model;

use ArtemiiKarkusha\AdobeCommercePreparingToCertification\Api\ExampleHowDiIsUsedInterface;
use ArtemiiKarkusha\AdobeCommercePreparingToCertification\Api\SimpleInterface;
use Magento\Framework\DataObject;

/**
 * Example how DI is used with all injectable types.
 */
class ExampleHowDiIsUsed implements ExampleHowDiIsUsedInterface
{
    /**
     * @param SimpleInterface $objectParam
     * @param string $stringParam
     * @param bool $boolParam
     * @param int $numberParam
     * @param string $globalInitParam
     * @param string $constantParam
     * @param array $arrayParam
     */
    public function __construct(
        private SimpleInterface $objectParam,
        private string $stringParam = '',
        private bool $boolParam = false,
        private int $numberParam = 0,
        private string $globalInitParam = '',
        private string $constantParam = '',
        private array $arrayParam = [],
    ) {
    }

    /**
     * @inheritDoc
     */
    public function doSomething(): void
    {
        $this->objectParam->doSomething();
    }

    /**
     * @return array
     */
    public function __toArray(): array
    {
        return (new DataObject([
            'objectParam' => $this->objectParam::class,
            'stringParam'  => $this->stringParam,
            'boolParam'  => $this->boolParam,
            'numberParam'  => $this->numberParam,
            'globalInitParam'  => $this->globalInitParam,
            'constantParam'  => $this->constantParam,
            'arrayParam'  => $this->arrayParam,
        ]))->debug();
    }
}
