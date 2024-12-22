@extends('website.layouts.main')

@section('content')
    <!--================ Hero sm Banner start =================-->
    <section class="hero-banner hero-banner--sm mb-30px">
        <div class="container">
            <div class="hero-banner--sm__content">
                <h1>{{ __('website.Blog Details') }}</h1>
                <nav aria-label="breadcrumb" class="banner-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('website.index') }}">{{ __('website.Home') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('website.Blog') }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>
    <!--================ Hero sm Banner end =================-->


    <!--================Blog Area =================-->
    <section class="blog_area single-post-area section-margin--medium">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 posts-list">
                    <div class="single-post row">
                        <div class="col-lg-12">
                            <div class="feature-img">
                                <img class="img-fluid" src="img/blog/feature-img1.jpg" alt="">
                            </div>
                        </div>
                        <div class="col-lg-3  col-md-3">
                            <div class="blog_info text-right">

                                <ul class="blog_meta list">
                                    <li>
                                        <a href="#">
                                            <i class="lnr lnr-user"></i>

                                            <span>{{ $user->name }}</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="lnr lnr-calendar-full"></i>
                                            <span>{{ $project->created_at->format('d M Y') }}</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a id="views-counter" href="#">
                                            <i class="lnr lnr-eye"></i>
                                            <span>1 {{ __('website.Views') }}</span>
                                        </a>
                                    </li>

                                </ul>
                                <ul class="social-links">
                                    @foreach ($socialLinks as $socialLink)
                                        <li>
                                            <a href="{{ $socialLink->link }}">
                                                <i class="{{ $socialLink->icon }}"></i>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-9 blog_details">
                            <h2>{{ $project->name }}</h2>
                            <p class="excert">
                                {{ $project->description }}
                            </p>


                        </div>

                    </div>


                </div>
                <div class="col-lg-4">

                    <div class="project-slider owl-carousel owl-theme">
                        @foreach ($project->images as $image)
                            <div class="item">
                                <img class="img-fluid" src="{{ asset('storage/' . $image->image) }}" alt="Project Image"
                                    style="width: 100%; height: auto;">
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </section>


    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const counterElement = document.getElementById("views-counter");
            const viewsSpan = counterElement.querySelector("span"); // تحديد العنصر <span> داخل الرابط
            let currentViews = 1; // القيمة الابتدائية لعدد المشاهدات
            const increment = Math.floor(Math.random() * 10) + 1; // قيمة عشوائية للزيادة

            function updateViews() {
                currentViews += increment;
                viewsSpan.innerText = currentViews.toLocaleString() +
                " {{ __('website.Views') }}"; // تحديث النص داخل <span>
            }

            // تحديث الرقم كل 10 ثوانٍ
            setInterval(updateViews, 10000);
        });
    </script>
@endsection
