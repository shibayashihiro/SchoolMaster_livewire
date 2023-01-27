<div>
    @if ($errors->any())
        <div class="alert alert-danger text-danger mx-auto mb-3" role="alert">

            <p>{{ __('Error') }}</p>

            <ul class="list-group list-unstyled  ">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>

        </div>
    @endif
</div>
