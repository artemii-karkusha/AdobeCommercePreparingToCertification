<?php

declare(strict_types=1);

namespace ArtemiiKarkusha\AdobeCommercePreparingToCertification\Api\Data;

interface DeliveryServiceInterface
{
    /**
     * String constants for property names
     */
    const ENTITY_ID = "entity_id";
    const NAME = "name";
    const STATUS = "status";
    const PHONE = "phone";

    /**
     * Getter for EntityId.
     *
     * @return int|null
     */
    public function getEntityId(): ?int;

    /**
     * Setter for EntityId.
     *
     * @param int $entityId
     *
     * @return DeliveryServiceInterface
     */
    public function setEntityId(int $entityId): DeliveryServiceInterface;

    /**
     * Getter for Name.
     *
     * @return string
     */
    public function getName(): string;

    /**
     * Setter for Name.
     *
     * @param string $name
     *
     * @return DeliveryServiceInterface
     */
    public function setName(string $name): DeliveryServiceInterface;

    /**
     * Getter for Status.
     *
     * @return int
     */
    public function getStatus(): int;

    /**
     * Setter for Status.
     *
     * @param int $status
     *
     * @return DeliveryServiceInterface
     */
    public function setStatus(int $status): DeliveryServiceInterface;

    /**
     * Getter for Phone.
     *
     * @return string
     */
    public function getPhone(): string;

    /**
     * Setter for Phone.
     *
     * @param string $phone
     *
     * @return DeliveryServiceInterface
     */
    public function setPhone(string $phone): DeliveryServiceInterface;
}
