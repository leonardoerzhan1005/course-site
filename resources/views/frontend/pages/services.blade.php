@extends('frontend.layouts.master')

@section('content')
<div class="services-page-content">
    <!-- Hero Section -->
    <section class="services-hero py-5">
        <div class="services-page-container">
            <div class="row">
                <div class="col-lg-8">
                    <h1 class="display-4 fw-bold mb-4">{{ __('Services') }}</h1>
                    <p class="lead mb-4">{{ __('Services') }}</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="services-section py-5">
        <div class="services-page-container">
                        <div class="services-grid">
                <!-- ЖОО оқытушыларына арналған курстар -->
                <div class="service-card">
                    <div class="service-header">
                        <div class="service-icon">
                            <i class="fas fa-graduation-cap"></i>
                        </div>
                        <h3>{{ __('Courses for university teachers') }}</h3>
                        <p>{{ __('Courses for university teachers') }}</p>
                        <button class="services-btn services-btn-primary">{{ __('Enroll course') }}</button>
                    </div>
                    <div class="service-content">
                        
                        <ul class="course-list">
                            <li><i class="fas fa-check"></i><span>{{ __('Modern pedagogical technologies') }}</span></li>
                            <li><i class="fas fa-check"></i><span>{{ __('Digital education platforms') }}</span></li>
                        </ul>
                    </div>
                    <div class="service-content-right">
                       
                        <ul class="course-list-right">
                            <li><i class="fas fa-check"></i><span>{{ __('Research methodology') }}</span></li>
                            <li><i class="fas fa-check"></i><span>{{ __('Student work skills') }}</span></li>
                        </ul>
                    </div>
                </div>

                <!-- Мектеп және колледж мұғалімдеріне -->
                <div class="service-card">
                    <div class="service-header">
                        <div class="service-icon">
                            <i class="fas fa-chalkboard-teacher"></i>
                        </div>
                        <h3>{{ __('School and college teachers') }}</h3>
                        <p>{{ __('School and college teachers') }}</p>
                        <button class="services-btn services-btn-primary">{{ __('Enroll course') }}</button>
                    </div>
                    <div class="service-content">
                        <h6>{{ __('Course content') }}:</h6>
                        <ul class="course-list">
                            <li><i class="fas fa-check"></i><span>{{ __('New teaching methods') }}</span></li>
                            <li><i class="fas fa-check"></i><span>{{ __('Student motivation') }}</span></li>
                        </ul>
                    </div>
                    <div class="service-content-right">
                        <h6>{{ __('Additional content') }}:</h6>
                        <ul class="course-list-right">
                            <li><i class="fas fa-check"></i><span>{{ __('Critical thinking') }}</span></li>
                            <li><i class="fas fa-check"></i><span>{{ __('Inclusive education') }}</span></li>
                        </ul>
                    </div>
                </div>

                <!-- Күміс университеті -->
                <div class="service-card">
                    <div class="service-header">
                        <div class="service-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <h3>{{ __('Silver University') }}</h3>
                        <p>{{ __('Silver University') }}</p>
                        <button class="services-btn services-btn-primary">{{ __('Enroll course') }}</button>
                    </div>
                    <div class="service-content">
                        
                        <ul class="course-list">
                            <li><i class="fas fa-check"></i><span>{{ __('Computer literacy') }}</span></li>
                            <li><i class="fas fa-check"></i><span>{{ __('Health care') }}</span></li>
                        </ul>
                    </div>
                    <div class="service-content-right">
                        
                        <ul class="course-list-right">
                            <li><i class="fas fa-check"></i><span>{{ __('Handicraft skills') }}</span></li>
                            <li><i class="fas fa-check"></i><span>{{ __('Social adaptation') }}</span></li>
                        </ul>
                    </div>
                </div>

                <!-- Педагогикалық қайта даярлау курстары -->
                <div class="service-card">
                    <div class="service-header">
                        <div class="service-icon">
                            <i class="fas fa-certificate"></i>
                        </div>
                        <h3>{{ __('Pedagogical retraining') }}</h3>
                        <p>{{ __('Pedagogical retraining') }}</p>
                        <button class="services-btn services-btn-primary">{{ __('Enroll course') }}</button>
                    </div>
                    <div class="service-content">
                        <h6>{{ __('Course content') }}:</h6>
                        <ul class="course-list">
                            <li><i class="fas fa-check"></i><span>{{ __('Pedagogical psychology') }}</span></li>
                            <li><i class="fas fa-check"></i><span>{{ __('Teaching methodology') }}</span></li>
                        </ul>
                    </div>
                    <div class="service-content-right">
                        <h6>{{ __('Additional content') }}:</h6>
                        <ul class="course-list-right">
                            <li><i class="fas fa-check"></i><span>{{ __('Education management') }}</span></li>
                            <li><i class="fas fa-check"></i><span>{{ __('Assessment systems') }}</span></li>
                        </ul>
                    </div>
                </div>

                <!-- Кәсіби қайта даярлау -->
                <div class="service-card">
                    <div class="service-header">
                        <div class="service-icon">
                            <i class="fas fa-briefcase"></i>
                        </div>
                        <h3>{{ __('Professional retraining') }}</h3>
                        <p>{{ __('Professional retraining') }}</p>
                        <button class="services-btn services-btn-primary">{{ __('Enroll course') }}</button>
                    </div>
                    <div class="service-content">
                        <h6>{{ __('Course content') }}:</h6>
                        <ul class="course-list">
                            <li><i class="fas fa-check"></i><span>{{ __('New specialty mastery') }}</span></li>
                            <li><i class="fas fa-check"></i><span>{{ __('Practical skills') }}</span></li>
                        </ul>
                    </div>
                    <div class="service-content-right">
                        <h6>{{ __('Additional content') }}:</h6>
                        <ul class="course-list-right">
                            <li><i class="fas fa-check"></i><span>{{ __('Labor market adaptation') }}</span></li>
                            <li><i class="fas fa-check"></i><span>{{ __('Professional certification') }}</span></li>
                        </ul>
                    </div>
                </div>

                <!-- Тілдік курстар -->
                <div class="service-card">
                    <div class="service-header">
                        <div class="service-icon">
                            <i class="fas fa-language"></i>
                        </div>
                        <h3>{{ __('Language courses') }}</h3>
                        <p>{{ __('Language courses') }}</p>
                        <button class="services-btn services-btn-primary">{{ __('Enroll course') }}</button>
                    </div>
                    <div class="service-content">
                        <h6>{{ __('Course content') }}:</h6>
                        <ul class="course-list">
                            <li><i class="fas fa-check"></i><span>{{ __('English language') }}</span></li>
                            <li><i class="fas fa-check"></i><span>{{ __('Kazakh language levels') }}</span></li>
                        </ul>
                    </div>
                    <div class="service-content-right">
                        <h6>{{ __('Additional content') }}:</h6>
                        <ul class="course-list-right">
                            <li><i class="fas fa-check"></i><span>{{ __('Turkish and Chinese languages') }}</span></li>
                            <li><i class="fas fa-check"></i><span>{{ __('International certificates preparation') }}</span></li>
                        </ul>
                    </div>
                </div>

                <!-- Басқару және менеджмент курстары -->
                <div class="service-card">
                    <div class="service-header">
                        <div class="service-icon">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <h3>{{ __('Management and management courses') }}</h3>
                        <p>{{ __('Management and management courses') }}</p>
                        <button class="services-btn services-btn-primary">{{ __('Enroll course') }}</button>
                    </div>
                    <div class="service-content">
                        <h6>{{ __('Course content') }}:</h6>
                        <ul class="course-list">
                            <li><i class="fas fa-check"></i><span>{{ __('Strategic planning') }}</span></li>
                            <li><i class="fas fa-check"></i><span>{{ __('Team management') }}</span></li>
                        </ul>
                    </div>
                    <div class="service-content-right">
                        <h6>{{ __('Additional content') }}:</h6>
                        <ul class="course-list-right">
                            <li><i class="fas fa-check"></i><span>{{ __('Project management') }}</span></li>
                            <li><i class="fas fa-check"></i><span>{{ __('Leadership skills') }}</span></li>
                        </ul>
                    </div>
                </div>

                <!-- Жасанды интеллект және цифрлық технологиялар -->
                <div class="service-card">
                    <div class="service-header">
                        <div class="service-icon">
                            <i class="fas fa-robot"></i>
                        </div>
                        <h3>{{ __('AI and digital technologies') }}</h3>
                        <p>{{ __('AI and digital technologies') }}</p>
                        <button class="services-btn services-btn-primary">{{ __('Enroll course') }}</button>
                    </div>
                    <div class="service-content">
                        <h6>{{ __('Course content') }}:</h6>
                        <ul class="course-list">
                            <li><i class="fas fa-check"></i><span>{{ __('AI fundamentals') }}</span></li>
                            <li><i class="fas fa-check"></i><span>{{ __('Machine learning') }}</span></li>
                        </ul>
                    </div>
                    <div class="service-content-right">
                        <h6>{{ __('Additional content') }}:</h6>
                        <ul class="course-list-right">
                            <li><i class="fas fa-check"></i><span>{{ __('Data analysis') }}</span></li>
                            <li><i class="fas fa-check"></i><span>{{ __('Digital transformation') }}</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

    <!-- Contact Section -->
    <section class="services-contact py-5">
        <div class="services-page-container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <h2 class="fw-bold mb-4">{{ __('Need more info') }}</h2>
                    <p class="lead mb-4">{{ __('Contact for info') }}</p>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <a href="{{ localizedRoute('contact.index') }}" class="services-btn services-btn-outline-primary services-btn-lg services-w-100">
                                <i class="fas fa-phone me-2"></i>{{ __('Contact us') }}
                            </a>
                        </div>
                        <div class="col-md-6">
                            <a href="{{ localizedRoute('application-form') }}" class="services-btn services-btn-primary services-btn-lg services-w-100">
                                <i class="fas fa-file-alt me-2"></i>{{ __('Submit application') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection



<style>
    /* Hero Section */
.services-hero {
  background: #1E3A8A; /* насыщенный синий */
  color: #fff;
  padding: 50px;
  margin-top: 100px;
  text-align: left;
}

.services-hero h1 {
  font-size: 2.25rem;
  font-weight: 700;
  margin-bottom: 1rem;
  text-align: center;
}

.services-hero p {
  font-size: 1.1rem;
  color: #e0e7ff;
}

/* Grid */
.services-grid {
  display: grid;
  grid-template-columns: 1fr;
  padding: 0 100px;
  gap: 2rem;
  margin-top: 2rem;
}

/* Card */
.service-card {
  display: flex;
  align-items: flex-start;
  background: #fff;
  border: 1px solid #e5e7eb;
  border-radius: 12px;
  box-shadow: 0 2px 6px rgba(0,0,0,0.05);
  padding: 2rem;
  transition: box-shadow 0.2s ease;
}

.service-card:hover {
  box-shadow: 0 4px 12px rgba(0,0,0,0.08);
}

/* Header inside card */
.service-header {
  flex: 1;
}

.service-icon {
  width: 48px;
  height: 48px;
  border-radius: 8px;
  background: #eff6ff;
  color: #1E3A8A;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 1.5rem;
  margin-bottom: 1rem;
}

.service-header h3 {
  color: #1E3A8A;
  font-size: 1.25rem;
  font-weight: 600;
  margin-bottom: .5rem;
}

.service-header p {
  color: #4b5563;
  margin-bottom: 1rem;
}

/* Course Content Box */
.service-content,
.service-content-right {
  background: #f9fafb;
  border-radius: 8px;
  padding: 1.25rem;
  flex: 1;
}

.course-list,
.course-list-right {
  list-style: none;
  margin: 0;
  padding: 0;
}

.course-list li,
.course-list-right li {
  margin-bottom: .5rem;
  color: #111827;
  font-size: .95rem;
}

.course-list li i,
.course-list-right li i {
  color: #1E3A8A;
  margin-right: .5rem;
}

/* Buttons */
.services-btn {
  display: inline-block;
  padding: .65rem 1.2rem;
  border-radius: 8px;
  font-weight: 500;
  font-size: .95rem;
  border: none;
  cursor: pointer;
  transition: background .2s ease;
}

.services-btn-primary {
  background: #1E3A8A;
  color: #fff;
}

.services-btn-primary:hover {
  background: #1e40af;
}

.services-btn-outline-primary {
  background: #fff;
  border: 1px solid #1E3A8A;
  color: #1E3A8A;
}

.services-btn-outline-primary:hover {
  background: #f0f5ff;
}

/* Responsive */
@media (min-width: 768px) {
  .services-grid {
    grid-template-columns: repeat(2, 1fr);
  }
}

@media (min-width: 1200px) {
  .services-grid {
    grid-template-columns: 1fr;
  }
}


</style>
