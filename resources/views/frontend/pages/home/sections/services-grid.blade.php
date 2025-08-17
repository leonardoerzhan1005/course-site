<section class="pt_120 xs_pt_100 pb_60">
    <style>
        .service-card{border:1px solid rgba(21,59,138,.12)!important;transition:border-color .2s ease, border-width .2s ease, box-shadow .2s ease, transform .2s ease}
        .service-card:hover{border-width:2px!important;border-color:#153b8a!important;box-shadow:0 0.75rem 1.25rem rgba(0,0,0,.08)!important;transform:translateY(-2px)}
    </style>
    <div class="container">
        <div class="row">
            <div class="col-xl-8 m-auto wow fadeInUp">
                <div class="wsus__section_heading mb_30 text-center">
                    <h2 class="mb-2">{{ __('Our Services') }}</h2>
                    <p class="mb-0">{{ __('Enhance your professional competencies through the programs and courses we offer') }}</p>
                </div>
            </div>
        </div>

        <div class="row g-4">
            <div class="col-xl-3 col-md-6 wow fadeInUp" data-wow-delay="0.0s">
                <div class="card h-100 shadow-sm border-0 service-card">
                    <div class="ratio ratio-16x9">
                        <img src="{{ asset('frontend/assets/images/courses_3_img_1.jpg') }}" class="card-img-top object-fit-cover" alt="service"/>
                    </div>
                    <div class="card-body">
                        <div class="wow zoomIn mb-3" data-wow-delay="0.0s" style="width:56px;height:56px;border-radius:50%;background:linear-gradient(135deg,#3b82f6,#1d4ed8);display:flex;align-items:center;justify-content:center;color:#fff;font-size:22px;">
                            <i class="fas fa-graduation-cap"></i>
                        </div>
                        <h5 class="card-title">{{ __('Courses for university teachers') }}</h5>
                        <p class="card-text mb-0">{{ __('Professional development courses for higher education instructors') }}</p>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 wow fadeInUp" data-wow-delay="0.05s">
                <div class="card h-100 shadow-sm border-0 service-card">
                    <div class="ratio ratio-16x9">
                        <img src="{{ asset('frontend/assets/images/courses_3_img_2.jpg') }}" class="card-img-top object-fit-cover" alt="service"/>
                    </div>
                    <div class="card-body">
                        <div class="wow zoomIn mb-3" data-wow-delay="0.05s" style="width:56px;height:56px;border-radius:50%;background:linear-gradient(135deg,#10b981,#059669);display:flex;align-items:center;justify-content:center;color:#fff;font-size:22px;">
                            <i class="fas fa-book-open"></i>
                        </div>
                        <h5 class="card-title">{{ __('School and college teachers') }}</h5>
                        <p class="card-text mb-0">{{ __('Programs for educators of secondary education institutions') }}</p>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="card h-100 shadow-sm border-0 service-card">
                    <div class="ratio ratio-16x9">
                        <img src="{{ asset('frontend/assets/images/courses_3_img_3.jpg') }}" class="card-img-top object-fit-cover" alt="service"/>
                    </div>
                    <div class="card-body">
                        <div class="wow zoomIn mb-3" data-wow-delay="0.1s" style="width:56px;height:56px;border-radius:50%;background:linear-gradient(135deg,#f59e0b,#b45309);display:flex;align-items:center;justify-content:center;color:#fff;font-size:22px;">
                            <i class="fas fa-users"></i>
                        </div>
                        <h5 class="card-title">{{ __('Silver University') }}</h5>
                        <p class="card-text mb-0">{{ __('Educational programs for retirees and the older generation') }}</p>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 wow fadeInUp" data-wow-delay="0.15s">
                <div class="card h-100 shadow-sm border-0 service-card">
                    <div class="ratio ratio-16x9">
                        <img src="{{ asset('frontend/assets/images/courses_3_img_4.jpg') }}" class="card-img-top object-fit-cover" alt="service"/>
                    </div>
                    <div class="card-body">
                        <div class="wow zoomIn mb-3" data-wow-delay="0.15s" style="width:56px;height:56px;border-radius:50%;background:linear-gradient(135deg,#ec4899,#be185d);display:flex;align-items:center;justify-content:center;color:#fff;font-size:22px;">
                            <i class="fas fa-chalkboard-teacher"></i>
                        </div>
                        <h5 class="card-title">{{ __('Pedagogical retraining') }}</h5>
                        <p class="card-text mb-0">{{ __('Retraining and advanced training in the pedagogical specialty') }}</p>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
                <div class="card h-100 shadow-sm border-0 service-card">
                    <div class="ratio ratio-16x9">
                        <img src="{{ asset('frontend/assets/images/courses_3_img_5.jpg') }}" class="card-img-top object-fit-cover" alt="service"/>
                    </div>
                    <div class="card-body">
                        <div class="wow zoomIn mb-3" data-wow-delay="0.2s" style="width:56px;height:56px;border-radius:50%;background:linear-gradient(135deg,#8b5cf6,#6d28d9);display:flex;align-items:center;justify-content:center;color:#fff;font-size:22px;">
                            <i class="fas fa-briefcase"></i>
                        </div>
                        <h5 class="card-title">{{ __('Professional retraining') }}</h5>
                        <p class="card-text mb-0">{{ __('Retraining for other specialties and mastering new skills') }}</p>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 wow fadeInUp" data-wow-delay="0.25s">
                <div class="card h-100 shadow-sm border-0 service-card">
                    <div class="ratio ratio-16x9">
                        <img src="{{ asset('frontend/assets/images/courses_3_img_6.jpg') }}" class="card-img-top object-fit-cover" alt="service"/>
                    </div>
                    <div class="card-body">
                        <div class="wow zoomIn mb-3" data-wow-delay="0.25s" style="width:56px;height:56px;border-radius:50%;background:linear-gradient(135deg,#0ea5e9,#0369a1);display:flex;align-items:center;justify-content:center;color:#fff;font-size:22px;">
                            <i class="fas fa-language"></i>
                        </div>
                        <h5 class="card-title">{{ __('Language courses') }}</h5>
                        <p class="card-text mb-0">{{ __('Courses for learning foreign and the state language') }}</p>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="card h-100 shadow-sm border-0 service-card">
                    <div class="ratio ratio-16x9">
                        <img src="{{ asset('frontend/assets/images/courses_3_img_7.jpg') }}" class="card-img-top object-fit-cover" alt="service"/>
                    </div>
                    <div class="card-body">
                        <div class="wow zoomIn mb-3" data-wow-delay="0.3s" style="width:56px;height:56px;border-radius:50%;background:linear-gradient(135deg,#22c55e,#15803d);display:flex;align-items:center;justify-content:center;color:#fff;font-size:22px;">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <h5 class="card-title">{{ __('Management and management courses') }}</h5>
                        <p class="card-text mb-0">{{ __('Courses to develop management skills for leaders and managers') }}</p>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 wow fadeInUp" data-wow-delay="0.35s">
                <div class="card h-100 shadow-sm border-0 service-card">
                    <div class="ratio ratio-16x9">
                        <img src="{{ asset('frontend/assets/images/courses_3_img_8.jpg') }}" class="card-img-top object-fit-cover" alt="service"/>
                    </div>
                    <div class="card-body">
                        <div class="wow zoomIn mb-3" data-wow-delay="0.35s" style="width:56px;height:56px;border-radius:50%;background:linear-gradient(135deg,#ef4444,#b91c1c);display:flex;align-items:center;justify-content:center;color:#fff;font-size:22px;">
                            <i class="fas fa-microchip"></i>
                        </div>
                        <h5 class="card-title"> {{ __('Artificial intelligence and digital technologies') }}</h5>
                        <p class="card-text mb-0">{{ __('Courses on AI, machine learning and modern digital technologies') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


