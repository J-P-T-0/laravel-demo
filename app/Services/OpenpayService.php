<?php
namespace App\Services;
use Openpay\Data\Openpay;


class OpenpayService extends Openpay
{
    private $openpay;

    public function __construct()
    {

        $this->openpay = Openpay::getInstance(
            config('openpay.id'),
            config('openpay.private_key'),
            config('openpay.country_code'),
            config('openpay.public_ip'),
        );
        return $this->openpay;
    }

    public function createCustomer($data)
    {
        return $this->openpay->customers->add($data);
    }

    public function createCharge($customerId, $chargeData)
    {
        $customer = $this->openpay->customers->get($customerId);
        return $customer->charges->create($chargeData);
    }

    public function getCharge($customerId, $chargeId)
    {
        $customer = $this->openpay->customers->get($customerId);
        return $customer->charges->get($chargeId);
    }
}
