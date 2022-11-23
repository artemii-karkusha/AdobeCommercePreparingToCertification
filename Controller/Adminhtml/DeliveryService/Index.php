<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c) (https://www.linkedin.com/in/artemiy-karkusha/)
 */
declare(strict_types=1);

namespace ArtemiiKarkusha\AdobeCommercePreparingToCertification\Controller\Adminhtml\DeliveryService;

use Magento\Backend\App\Action;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Controller\ResultInterface;

/**
 * DeliveryService backend index (list) controller.
 */
class Index extends Action implements HttpGetActionInterface
{
    /**
     * Authorization level of a basic admin session.
     */
    const ADMIN_RESOURCE = 'ArtemiiKarkusha_AdobeCommercePreparingToCertification::delivery_service_management';

    /**
     * Execute action based on request and return result.
     *
     * @return ResultInterface|ResponseInterface
     */
    public function execute()
    {
        $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);

        $resultPage->setActiveMenu(
            'ArtemiiKarkusha_AdobeCommercePreparingToCertification::delivery_service_management'
        );
        $resultPage->addBreadcrumb(__('DeliveryService'), __('DeliveryService'));
        $resultPage->addBreadcrumb(__('Manage DeliveryServices'), __('Manage DeliveryServices'));
        $resultPage->getConfig()->getTitle()->prepend(__('DeliveryService List'));

        return $resultPage;
    }
}
