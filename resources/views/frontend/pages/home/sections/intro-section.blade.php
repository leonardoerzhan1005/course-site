<section class="intro-section py-80 pt_120 xs_pt_80">
    <style>
        .intro-logos img{height:56px;width:auto}
        @media (max-width: 576px){.intro-logos img{height:40px}}
    </style>
    <div class="container text-center">
        <div class="d-flex justify-content-center align-items-center gap-5 mb-4 wow fadeInUp intro-logos">
           

       <div class="intro-logos-item">
        <img src="{{ asset('frontend/assets/images/ipk-logo.png') }}" alt="IPK"/>
        <h1 >
            {{ __('Institute of Professional Development and Continuing Education') }}
        </h1>
        
     </div>
       <div class="intro-logos-item">
        <img src="{{ asset('frontend/assets/images/farabi-logo.png') }}" alt="Farabi"/>
        <h1>
            {{ __('Al-Farabi Kazakh National University') }}
        </h1>
        </div>



        </div>

        <h1 class="display-5 fw-bold mb-3 wow fadeInUp" data-wow-delay="0.05s">
            {{ __('Institute title (kk)') }}
        </h1>
        <p class="lead text-muted mb-4 wow fadeInUp" data-wow-delay="0.1s" style="max-width:900px;margin:0 auto;">
            {{ __('Institute subtitle (kk)') }}
        </p>

        <div class="d-flex justify-content-center gap-3 mt-3 wow fadeInUp" data-wow-delay="0.15s">
            <a href="{{ localizedRoute('services') }}" class="common_btn">{{ __('Our programs') }}</a>
            <a href="{{ localizedRoute('application-form') }}" class="btn btn-outline-primary px-4" style="border-radius:8px;">
                {{ __('Apply') }}
            </a>
        </div>
    </div>
</section>

<style>
    .intro-section{
        margin: 100px;
        padding: 100px;
    }
        .intro-logos-item h1{
            padding-top: 10px;
            font-size: 20px;
             font-weight: 200;
             
            color:rgb(113, 113, 113);
        }
        
    .intro-logos img{height:100px !important;width:auto !important}
    @media (max-width: 576px){.intro-logos img{height:40px}}
    @media (max-width: 1200px){.intro-logos img{height:30px}}
    @media (max-width: 992px){.intro-logos img{height:20px}}
    @media (max-width: 768px){.intro-logos img{height:15px}}
    @media (max-width: 576px){.intro-logos img{height:10px}}
    @media (max-width: 480px){.intro-logos img{height:8px}}
    @media (max-width: 320px){.intro-logos img{height:6px}}
    @media (max-width: 240px){.intro-logos img{height:4px}}
    @media (max-width: 160px){.intro-logos img{height:2px}}
    @media (max-width: 120px){.intro-logos img{height:1px}}
</style>