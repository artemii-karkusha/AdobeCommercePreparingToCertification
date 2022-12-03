<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c) (https://www.linkedin.com/in/artemiy-karkusha/)
 */

declare(strict_types=1);

namespace ArtemiiKarkusha\AdobeCommercePreparingToCertification\Model\Email;

use ArtemiiKarkusha\AdobeCommercePreparingToCertification\Api\EmailNotifierInterface;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Exception\MailException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Mail\Template\TransportBuilder;
use Magento\Store\Model\App\Emulation;
use Magento\Store\Model\StoreManagerInterface;
use Psr\Log\LoggerInterface;
use Magento\User\Model\NotificatorException;

class EmailNotifier implements EmailNotifierInterface
{
    /**
     * @param StoreManagerInterface $storeManager
     * @param TransportBuilder $transportBuilder
     * @param Emulation $emulation
     * @param LoggerInterface $logger
     */
    public function __construct(
        private StoreManagerInterface $storeManager,
        private TransportBuilder $transportBuilder,
        private Emulation $emulation,
        private LoggerInterface $logger
    ) {
    }

    /**
     * @inheritDoc
     */
    public function sendEmail(string $templateIdentifier, string $sendToEmail, string $storeCode): void
    {
        try {
            $this->emulation->startEnvironmentEmulation($this->storeManager->getStore($storeCode)->getId());
            $transport = $this->transportBuilder->setTemplateIdentifier($templateIdentifier)
                ->setTemplateOptions(
                    ['area' => 'frontend', 'store' => $this->storeManager->getStore($storeCode)->getId()]
                )
                ->setTemplateVars([])
                ->setFromByScope('general')
                ->addTo($sendToEmail)
                ->getTransport();
            $transport->sendMessage();
        } catch (MailException|NoSuchEntityException|LocalizedException $exception) {
            $this->logger->error(
                $exception->getMessage(),
                [__CLASS__]
            );
            throw (new NotificatorException(__($exception->getMessage()), $exception));
        }

        $this->emulation->stopEnvironmentEmulation();
    }
}
