<section class="intro-section py-80 pt_120 xs_pt_80" >


<style>
.intro-section{
  position: relative; overflow: hidden;
  color:#1f2845;
  background: linear-gradient(180deg,#fff 0%,#f4f7ff 100%);
  border-top:1px solid rgba(223,163,89,.30);
}

/* БОЛЕЕ СИЛЬНОЕ свечение слева/справа */
.intro-section::before,
.intro-section::after{
  content:"";
  position:absolute; top:-25%; bottom:-25%;
  width:80%;                 /* шире = заметнее */
  pointer-events:none; z-index:0;
  filter: blur(18px);        /* меньше blur = четче и ярче */
  opacity: .95;              /* сильнее общее свечение */
  /* лёгкая пульсация яркости */
  animation-duration: 8s;
  animation-timing-function: ease-in-out;
  animation-iteration-count: infinite;
}

/* движение + пульсация */
@keyframes glowL { from{ transform:translateX(-4%) scale(1.05) } to{ transform:translateX(-12%) scale(1.10) } }
@keyframes glowR { from{ transform:translateX(4%)  scale(1.05) } to{ transform:translateX(12%)  scale(1.10) } }
@keyframes pulse  { 0%,100%{ opacity:.90 } 50%{ opacity:1 } }

.intro-section::before{
  left:-12%;
  background: radial-gradient(ellipse at left center,
    rgba(223,163,89,.55) 0%,      /* ярче центр */
    rgba(223,163,89,.32) 20%,
    rgba(223,163,89,.14) 42%,
    rgba(223,163,89,0)   64%);
  animation-name: glowL, pulse;   /* движение + пульс */
}

.intro-section::after{
  right:-12%;
  background: radial-gradient(ellipse at right center,
    rgba(223,163,89,.55) 0%,
    rgba(223,163,89,.32) 20%,
    rgba(223,163,89,.14) 42%,
    rgba(223,163,89,0)   64%);
  animation-name: glowR, pulse;
}

/* контент поверх */
.intro-section > *{ position: relative; z-index: 1; }

@media (prefers-reduced-motion: reduce){
  .intro-section::before, .intro-section::after{ animation: none; }
}
</style>


    <style>
        
        .intro-logos-item-1,
.intro-logos-item-2{
  display: flex;
  flex-direction: column;
  align-items: center;
  text-align: center;
  width: clamp(220px, 26vw, 360px); /* одинаковая ширина карточек */
}

/* фиксируем высоту подзаголовков, чтобы низ карточек был в одной линии */
.intro-logos-item-1 h1,
.intro-logos-item-2 h1{
  margin-top: 14px;
  font-size: clamp(14px, 1.6vw, 20px);
  font-weight: 300;
  color: rgb(113,113,113);
  line-height: 1.35;
  max-width: 420px;
  min-height: 3.2em; /* подравнивает высоту текста между карточками */
}

/* на всякий случай переопределим старые !important высоты картинок внутри бейджа */
.intro-logos .logo-badge__inner img{
  height: auto !important;
  width: auto !important;
  max-height: 100% !important;
  max-width: 100% !important;
}
        /* Контейнер логотипов */
.intro-logos {
  flex-wrap: wrap;
  gap: clamp(16px, 3vw, 40px);
}

/* Карточка подписи под логотипом */
.intro-logos-item-1 h1,
.intro-logos-item-2 h1{
  margin-top: 14px;
  font-size: clamp(14px, 1.6vw, 20px);
  font-weight: 300;
  color: rgb(113,113,113);
  line-height: 1.35;
  max-width: 420px;
}

/* ==== КРУГЛОЕ ВЫДЕЛЕНИЕ ==== */
.logo-badge{
  /* легко настраиваемые переменные */
  --size: clamp(84px, 12vw, 140px);   /* диаметр белой «таблетки» внутри */
  --ring: 5px;                        /* толщина кольца */
  --pad: 10px;                        /* внутренний отступ от кольца до белого круга */

  position: relative;
  display: grid;
  place-items: center;
  width: calc(var(--size) + var(--ring)*2 + var(--pad)*2);
  height: calc(var(--size) + var(--ring)*2 + var(--pad)*2);
  border-radius: 50%;

  /* градиентное кольцо */
  background:
    /* слой содержимого */
    linear-gradient(#fff, #fff) padding-box,
    /* слой границы (градиент-колечко) */
    conic-gradient(from 180deg, #3aa8ff, #153b8a, #3aa8ff) border-box;
  border: var(--ring) solid transparent;

  /* лёгкая глубина */
  box-shadow:
    0 8px 24px rgba(21, 59, 138, 0.16),
    0 2px 6px rgba(21, 59, 138, 0.10);
  transition: transform .2s ease, box-shadow .2s ease;
}

.logo-badge:hover{
  transform: translateY(-2px);
  box-shadow:
    0 12px 28px rgba(21, 59, 138, 0.20),
    0 4px 10px rgba(21, 59, 138, 0.12);
}

/* белая круглая «таблетка» внутри кольца */
.logo-badge__inner{
  width: var(--size);
  height: var(--size);
  border-radius: 50%;
  background: #fff;
  display: grid;
  place-items: center;
  padding: clamp(10px, 2.2vw, 16px); /* чтобы логотипы «дышали» внутри круга */
}

/* сам логотип: встаёт по центру, не обрезается */
.logo-badge__inner img{
  max-width: 100%;
  max-height: 100%;
  height: auto;
  display: block;
}

/* Мобильные мелочи */
@media (max-width: 576px){
  .intro-logos { gap: 16px; }
}

    </style>
    <div class="container text-center">
        <div class="d-flex justify-content-center align-items-center gap-5 mb-4 wow fadeInUp intro-logos">
           

        <div class="intro-logos-item-1">
  <div class="logo-badge">
    <div class="logo-badge__inner">
      <img src="{{ asset('frontend/assets/images/ipk-logo.png') }}" alt="IPK">
    </div>
  </div>
  <h1>{{ __('Institute of Professional Development and Continuing Education') }}</h1>
</div>

<div class="intro-logos-item-2">
  <div class="logo-badge">
    <div class="logo-badge__inner">
      <img src="{{ asset('frontend/assets/images/farabi-logo.png') }}" alt="Farabi">
    </div>
  </div>
  <h1>{{ __('Al-Farabi Kazakh National University') }}</h1>
</div>



        </div>

        <h1 class="display-5 fw-bold mb-3 wow fadeInUp" data-wow-delay="0.05s">
            {{ __('Institute title') }}
        </h1>
        <p class="lead text-muted mb-4 wow fadeInUp" data-wow-delay="0.1s" style="max-width:900px;margin:0 auto;">
            {{ __('Institute subtitle') }}
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
        
         margin-top: 100px;
    }
        .intro-logos-item-1 h1{
            padding-top: 10px;
            font-size: 20px;
             font-weight: 200;
             
            color:rgb(113, 113, 113);
        }
        .intro-logos-item-2 h1{
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