@props(['errors'])

@if ($errors->any())
    <div {{ $attributes }} >
        <div class="error">
            {{ __('Whoops! Etwas ist schiefgelaufen') }}
        </div>

        <ul class="error">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
