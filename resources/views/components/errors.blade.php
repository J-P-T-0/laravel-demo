@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>@lang( $error )</li>
        @endforeach
    </ul>
@endif
