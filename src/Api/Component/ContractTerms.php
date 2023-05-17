<?php

namespace Jaytaph\Spacetraders\Api\Component;

class ContractTerms
{
    public \DateTime $deadline;
    public int $paymentOnAccepted;
    public int $paymentOnFulfilled;
    /** @var ContractDelivery[] */
    public array $deliveries;

    public static function fromJson(array $data): self
    {
        $result = new self();
        $result->deadline = new \DateTime($data['deadline']);
        $result->paymentOnAccepted = $data['payment']['onAccepted'];
        $result->paymentOnFulfilled = $data['payment']['onFulfilled'];
        $result->deliveries = array_map(
            fn (array $delivery) => ContractDelivery::fromJson($delivery),
            $data['deliver']
        );

        return $result;
    }
}
