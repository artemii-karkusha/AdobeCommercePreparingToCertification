<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c) (https://www.linkedin.com/in/artemiy-karkusha/)
 */
declare(strict_types=1);

namespace ArtemiiKarkusha\AdobeCommercePreparingToCertification\Model\Data;

use ArtemiiKarkusha\AdobeCommercePreparingToCertification\Api\Data\DeliveryServiceInterface;
use Magento\Framework\DataObject;

class DeliveryServiceData extends DataObject implements DeliveryServiceInterface
{
    /**
     * Getter for EntityId.
     *
     * @return int|null
     */
    public function getEntityId(): ?int
    {
        return $this->getData(self::ENTITY_ID) === null ? null
            : (int)$this->getData(self::ENTITY_ID);
    }

    /**
     * Setter for EntityId.
     *
     * @param int $entityId
     *
     * @return DeliveryServiceInterface
     */
    public function setEntityId(int $entityId): DeliveryServiceInterface
    {
        $this->setData(self::ENTITY_ID, $entityId);
        return $this;
    }

    /**
     * Getter for Name.
     *
     * @return string
     */
    public function getName(): string
    {
        return (string)$this->getData(self::NAME);
    }

    /**
     * Setter for Name.
     *
     * @param string $name
     *
     * @return DeliveryServiceInterface
     */
    public function setName(string $name): DeliveryServiceInterface
    {
        $this->setData(self::NAME, $name);
        return $this;
    }

    /**
     * Getter for Status.
     *
     * @return int
     */
    public function getStatus(): int
    {
        return (int)$this->getData(self::STATUS);
    }

    /**
     * Setter for Status.
     *
     * @param int $status
     *
     * @return DeliveryServiceInterface
     */
    public function setStatus(int $status): DeliveryServiceInterface
    {
        $this->setData(self::STATUS, $status);
        return $this;
    }

    /**
     * Getter for Phone.
     *
     * @return string
     */
    public function getPhone(): string
    {
        return (string)$this->getData(self::PHONE);
    }

    /**
     * Setter for Phone.
     *
     * @param string $phone
     *
     * @return DeliveryServiceInterface
     */
    public function setPhone(string $phone): DeliveryServiceInterface
    {
        $this->setData(self::PHONE, $phone);
        return $this;
    }
}
