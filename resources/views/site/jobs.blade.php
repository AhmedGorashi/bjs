
@section('title')
@lang('site.bjs') | @lang('site.index')
@endsection
@extends('layouts.site.app')

@section('content')

<main>

    <!-- Hero Area Start-->
    <div class="slider-area ">
        <div class="single-slider section-overly slider-height2 d-flex align-items-center" data-background="{{ asset('site_files/assets/img/hero/about.jpg')}}">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap text-center">
                            <h2>Get your job</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero Area End -->
    <!-- Job List Area Start -->
    <div class="job-listing-area pt-120 pb-120">
        <div class="container">
            <div class="row">

                <div class="col-xl-12 col-lg-12 col-md-12">
                    <!-- Featured_job_start -->
                    <section class="featured-job-area">
                        <div class="container">
                            <!-- Count of Job list Start -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="count-job mb-35">
                                        <span>{{$jobs_count}} Jobs found</span>
                                    </div>
                                </div>
                            </div>
                            <!-- Count of Job list End -->
                            <!-- single-job-content -->
                            @foreach ($jobs as $job)
                            <div class="single-job-items mb-30">
                                <div class="job-items">
                                    <div class="company-img">
                                        <a href="{{route('site.job_details',$job->id)}}"><img src="{{ asset('site_files/assets/img/icon/job-list1.png')}}" alt=""></a>
                                    </div>
                                    <div class="job-tittle job-tittle2">
                                        <a href="{{route('site.job_details',$job->id)}}">
                                            <h4>{{$job->name}}</h4>
                                        </a>
                                        <ul>
                                            <li>Ibook</li>
                                            <li><i class="fas fa-map-marker-alt"></i>{{$job->location}}</li>
                                            <li>{{$job->salary}}</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="items-link items-link2 f-right">
                                    <a href="{{route('site.job_details',$job->id)}}">Full Time</a>
                                    <span>{{date("Y/m/d",strtotime($job->created_at))}}</span>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </section>
                    <!-- Featured_job_end -->
                </div>
            </div>
        </div>
    </div>
    <!-- Job List Area End -->
    <!--Pagination Start  -->
    {{-- <div class="pagination-area pb-115 text-center">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="single-wrap d-flex justify-content-center">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-start">
                                <li class="page-item active"><a class="page-link" href="#">01</a></li>
                                <li class="page-item"><a class="page-link" href="#">02</a></li>
                                <li class="page-item"><a class="page-link" href="#">03</a></li>
                            <li class="page-item"><a class="page-link" href="#"><span class="ti-angle-right"></span></a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!--Pagination End  -->

</main>

@endsection
