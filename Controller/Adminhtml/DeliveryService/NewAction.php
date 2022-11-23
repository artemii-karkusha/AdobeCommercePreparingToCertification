<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c) (https://www.linkedin.com/in/artemiy-karkusha/)
 */
declare(strict_types=1);

namespace ArtemiiKarkusha\AdobeCommercePreparingToCertification\Controller\Adminhtml\DeliveryService;

use Magento\Backend\App\Action;
use Magento\Backend\Model\View\Result\Page;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Controller\ResultInterface;

/**
 * New action DeliveryService controller.
 */
class NewAction extends Action implements HttpGetActionInterface
{
    /**
     * Authorization level of a basic admin session.
     *
     * @see _isAllowed()
     */
    const ADMIN_RESOURCE = 'ArtemiiKarkusha_AdobeCommercePreparingToCertification::delivery_service_management';

    /**
     * Create new DeliveryService action.
     *
     * @return Page|ResultInterface
     */
    public function execute()
    {
        /** @var Page $resultPage */
        $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
        $resultPage->setActiveMenu(
            'ArtemiiKarkusha_AdobeCommercePreparingToCertification::delivery_service_management'
        );
        $resultPage->getConfig()->getTitle()->prepend(__('New DeliveryService'));

        return $resultPage;
    }
}
