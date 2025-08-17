@php
    $currentLocale = app()->getLocale();
    $supportedLocales = config('locales.supported', ['en', 'ru', 'kk']);
    $localeNames = config('locales.names', [
        'en' => 'English',
        'ru' => 'Русский',
        'kk' => 'Қазақша'
    ]);
    $localeFlags = config('locales.flags', [
        'en' => '🇺🇸',
        'ru' => '🇷🇺',
        'kk' => '🇰🇿'
    ]);
@endphp

<div class="language-switcher dropdown">
    <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="languageDropdown" data-bs-toggle="dropdown" aria-expanded="false">
        {{ $localeFlags[$currentLocale] ?? '🌐' }} {{ $localeNames[$currentLocale] ?? strtoupper($currentLocale) }}
    </button>
    <ul class="dropdown-menu" aria-labelledby="languageDropdown">
        @foreach($supportedLocales as $locale)
            @if($locale !== $currentLocale)
                <li>
                    <a class="dropdown-item" href="{{ route('home', ['locale' => $locale]) }}">
                        {{ $localeFlags[$locale] ?? '🌐' }} {{ $localeNames[$locale] ?? strtoupper($locale) }}
                    </a>
                </li>
            @endif
        @endforeach
    </ul>
</div>
