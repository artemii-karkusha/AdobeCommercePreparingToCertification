<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c) (https://www.linkedin.com/in/artemiy-karkusha/)
 */

declare(strict_types=1);

namespace ArtemiiKarkusha\AdobeCommercePreparingToCertification\Controller;

use Magento\Framework\App\Action\Forward as ActionForward;
use Magento\Framework\App\ActionFactory;
use Magento\Framework\App\ActionInterface;
use Magento\Framework\App\Request\Http as RequestHttp;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\App\RouterInterface;

class CustomRouter implements RouterInterface
{
    /**
     * @param ActionFactory $actionFactory
     */
    public function __construct(private ActionFactory $actionFactory)
    {
    }

    /**
     * Validate and Match Cms Page and modify request
     *
     * @param RequestInterface $request
     * @return ActionInterface
     * @noinspection PhpParamsInspection
     */
    public function match(RequestInterface $request): ActionInterface
    {
        if (
            $this->canBeProcessed($request) &&
            $this->isRequestContainsMatchedIdentifier($request)
        ) {
            $this->setUpRequest($request);
        }

        return $this->actionFactory->create(ActionForward::class);
    }

    /**
     * @param RequestInterface $request
     * @return bool
     */
    private function canBeProcessed(RequestInterface $request): bool
    {
        return $request instanceof RequestHttp;
    }

    /**
     * @param RequestHttp $request
     * @return bool
     */
    private function isRequestContainsMatchedIdentifier(RequestHttp $request): bool
    {
        $identifier = trim($request->getPathInfo(), '/');
        return str_contains($identifier, 'customrouter');
    }

    /**
     * @param RequestHttp $request
     * @return void
     */
    private function setUpRequest(RequestHttp $request): void
    {
        $request->setModuleName('customrouter')
            ->setControllerName('page')
            ->setActionName('index')
            ->setParam(
                'param',
                3
            );
    }
}
