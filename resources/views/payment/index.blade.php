<x-layout>
    <script src="https://openpay.s3.amazonaws.com/openpay.v1.min.js"></script>
    <script src="https://openpay.s3.amazonaws.com/openpay-data.v1.min.js"></script>
    <form id="payment-form" action="{{route('payment.processPayment')}}" method="POST">
        @csrf
        <input type="text" data-openpay-card="card_number" placeholder="Número de tarjeta">
        <input type="text" data-openpay-card="name" placeholder="Nombre del titular">
        <input type="text" data-openpay-card="expiration_month" placeholder="Mes de expiración">
        <input type="text" data-openpay-card="expiration_year" placeholder="Año de expiración">
        <input type="text" data-openpay-card="cvv2" placeholder="CVV">
        <input type="hidden" name="token_id" id="token_id">
        <button type="button" onclick="createToken()">Pagar</button>
    </form>

    <a href="{{route('payment.addCustomer')}}">Pli</a>


</x-layout>
