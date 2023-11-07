@if(Session::has('error'))

    <p class="alert-danger"> {{ Session::get('error')}} </p>


@endif
