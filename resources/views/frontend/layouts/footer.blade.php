{{-- Footer --}}
<footer class="py-5" style="background-color:#153b8a;color:#fff;">
    <div class="container">
        <div class="row g-4 align-items-start">
            <div class="col-lg-5 col-md-6">
                <a href="{{ localizedRoute('home') }}" class="d-inline-flex align-items-center mb-3">
                    <img src="{{ asset(config('settings.site_footer_logo')) }}" alt="{{ __('KazNU logo') }}" style="height:48px;" class="me-2">
                </a>
                <h5 class="mb-2" style="font-weight:700;">{{ __('Institute of Professional Development and Continuing Education') }}</h5>
                <p class="mb-0">{{ __('Al-Farabi Kazakh National University.') }}</p>
            </div>
            <div class="col-lg-4 col-md-6">
                <h5 class="mb-3" style="font-weight:700;">{{ __('Contact') }}</h5>
                <ul class="list-unstyled mb-0">
                    <li class="mb-2"><strong>{{ __('Address') }}:</strong> {{ __('Republic of Kazakhstan, 050040') }}, {{ __('Almaty city, al-Farabi avenue, 71') }}</li>
                    <li class="mb-2"><strong>{{ __('Phone') }}:</strong> +7 (727) 377-33-33</li>
                    <li class="mb-2"><strong>{{ __('Email') }}:</strong> <a href="mailto:info@kaznu.kz" class="link-light text-decoration-none">info@kaznu.kz</a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-6">
                <h5 class="mb-3" style="font-weight:700;">{{ __('Menu') }}</h5>
                <ul class="list-unstyled mb-0">
                    <li class="mb-2"><a class="link-light text-decoration-none" href="{{ localizedRoute('home') }}">{{ __('Home') }}</a></li>
                    <li class="mb-2"><a class="link-light text-decoration-none" href="{{ localizedRoute('services') }}">{{ __('Services') }}</a></li>
                    <li class="mb-2"><a class="link-light text-decoration-none" href="{{ localizedRoute('application-form') }}">{{ __('Application form') }}</a></li>
                    <li class="mb-2"><a class="link-light text-decoration-none" href="{{ localizedRoute('documents') }}">{{ __('Documents') }}</a></li>
                    <li class="mb-2"><a class="link-light text-decoration-none" href="{{ localizedRoute('blog.index') }}">{{ __('Blog') }}</a></li>
                    <li class="mb-2"><a class="link-light text-decoration-none" href="{{ localizedRoute('courses.index') }}">{{ __('Courses') }}</a></li>
                    <li class="mb-2"><a class="link-light text-decoration-none" href="{{ localizedRoute('contact.index') }}">{{ __('Contact') }}</a></li>
                </ul>
            </div>
        </div>
        <hr class="my-4" style="border-color: rgba(255,255,255,.15);">
        <div class="text-center small" style="opacity:.85;">
            © 2025 {{ __('Al-Farabi Kazakh National University.') }} {{ __('All rights reserved.') }}
        </div>
    </div>
</footer>
