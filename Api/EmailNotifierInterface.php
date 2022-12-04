<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c) (https://www.linkedin.com/in/artemiy-karkusha/)
 */
declare(strict_types=1);

namespace ArtemiiKarkusha\AdobeCommercePreparingToCertification\Api;

use Magento\Framework\Exception\MailException;

interface EmailNotifierInterface
{
    /**
     * @param string $templateIdentifier
     * @param string $sendToEmail
     * @param string $storeCode
     * @return void
     *
     * @throws MailException
     */
    public function sendEmail(string $templateIdentifier, string $sendToEmail, string $storeCode): void;
}
