<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\OpenpayService;
use Illuminate\Support\Facades\Auth;
use Openpay\Data\Openpay;
use Openpay\Data\OpenpayApiError;
use Openpay\Data\OpenpayApiAuthError;
use Openpay\Data\OpenpayApiRequestError;
use Openpay\Data\OpenpayApiConnectionError;
use Openpay\Data\OpenpayApiTransactionError;
use Exception;
use Illuminate\Http\JsonResponse;
class PaymentController extends Controller
{
    public function index(){
        return view('payment.index');
    }

    public function addCustomer(){
        $openpay = Openpay::getInstance(
            config('openpay.id'),
            config('openpay.private_key'),
            config('openpay.country_code'),
            config('openpay.public_ip'));;

        $customerData = array(
            'external_id' => Auth::id(),
            'name' => Auth::user()->name,
            'last_name' => Auth::user()->lastname,
            'email' => Auth::user()->email,
            'phone_number' => '4421112233',
            'address' => array(
                'line1' => 'Privada Rio No. 12',
                'line2' => 'Co. El Tintero',
                'line3' => '',
                'postal_code' => '76920',
                'state' => 'Querétaro',
                'city' => 'Querétaro.',
                'country_code' => 'MX'));

        $customer = $openpay->customers->add($customerData);
        return view('payment.index');
    }


    public function processPayment(){
        $openpay = Openpay::getInstance(
            config('openpay.id'),
            config('openpay.private_key'),
            config('openpay.country_code'),
            config('openpay.public_ip'));;
            ;

        $chargeData = array(
            'external_id' => '1',
            'method' => 'card',
            'amount' => 100,
            'description' => 'Cargo inicial a mi cuenta',
            'order_id' => 'ORDEN-00070');

        $customer = $openpay->customers->get('a9ualumwnrcxkl42l6mh');
        $charge = $customer->charges->create($chargeData);
        return view('payment.index');
    }
}
