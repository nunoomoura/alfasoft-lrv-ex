@props(['errors'])

@if ($errors->any())
    <div {{ $attributes }}>
        <div class="font-medium text-red-600">
            {{ __('Whoops! Something went wrong.') }}
        </div>

        <ul class="mt-3 list-disc list-inside text-sm text-red-600">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

{{-- Success messages --}}
@if (false)
    <div {{ $attributes }}>
        <div class="font-medium text-red-600">
            {{ __('Success!') }}
        </div>

        <ul class="mt-3 list-disc list-inside text-sm text-red-600">
            {{-- Success Message --}}
        </ul>
    </div>
@endif
