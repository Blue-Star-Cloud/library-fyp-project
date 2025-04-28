@extends('layouts.app')
@section('content')
<div class="kt-app-main-content d-flex flex-column app-container container-fluid">
    <!--begin::Toolbar-->
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        <!--begin::Toolbar container-->
        <div id="kt_app_toolbar_container" class="d-flex flex-stack w-100">
            <!--begin::Page title-->
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <!--begin::Title-->
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Dashboard</h1>
                <!--end::Title-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">
                        <a href={{route("dashboard")}} class="text-muted text-hover-primary">Home</a>
                    </li>
                    <!--end::Item-->
                </ul>
                <!--end::Breadcrumb-->
            </div>
        </div>
        <!--end::Toolbar container-->
    </div>
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <!--begin::Content container-->
        <div id="kt_app_content_container" class="">
            <!--begin::Row-->
            <!--begin::Col-->
            <div class="row g-5 g-xl-10">

                <!--begin::Row-->
                @if(Auth::user()->role == 'teacher' OR Auth::user()->role =='admin')
                <div class="row gy-5 gx-xl-10">
                    <!--begin::Col-->
                    <div class="col-sm-6 col-xl-2 mb-xl-10">
                        <!--begin::Card widget 2-->
                        <div class="card h-lg-100">
                            <!--begin::Body-->
                            <div class="card-body d-flex justify-content-between align-items-start flex-column">
                                <!--begin::Icon-->
                                <div class="m-0">
                                    <i class="ki-duotone ki-compass fs-2hx text-gray-600">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                </div>
                                <!--end::Icon-->
                                <!--begin::Section-->
                                <div class="d-flex flex-column my-7">
                                    <!--begin::Number-->
                                    <span class="fw-semibold fs-3x text-gray-800 lh-1 ls-n2">{{$totalBooks}}</span>
                                    <!--end::Number-->
                                    <!--begin::Follower-->
                                    <div class="m-0">
                                        <span class="fw-semibold fs-6 text-gray-500">Total Books</span>
                                    </div>
                                    <!--end::Follower-->
                                </div>
                                <!--end::Section-->

                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Card widget 2-->
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-sm-6 col-xl-2 mb-xl-10">
                        <!--begin::Card widget 2-->
                        <div class="card h-lg-100">
                            <!--begin::Body-->
                            <div class="card-body d-flex justify-content-between align-items-start flex-column">
                                <!--begin::Icon-->
                                <div class="m-0">
                                    <i class="ki-duotone ki-chart-simple fs-2hx text-gray-600">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                        <span class="path4"></span>
                                    </i>
                                </div>
                                <!--end::Icon-->
                                <!--begin::Section-->
                                <div class="d-flex flex-column my-7">
                                    <!--begin::Number-->
                                    <span class="fw-semibold fs-3x text-gray-800 lh-1 ls-n2">{{$totalGenres}}</span>
                                    <!--end::Number-->
                                    <!--begin::Follower-->
                                    <div class="m-0">
                                        <span class="fw-semibold fs-6 text-gray-500">Total Genre</span>
                                    </div>
                                    <!--end::Follower-->
                                </div>
                                <!--end::Section-->

                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Card widget 2-->
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-sm-6 col-xl-2 mb-xl-10">
                        <!--begin::Card widget 2-->
                        <div class="card h-lg-100">
                            <!--begin::Body-->
                            <div class="card-body d-flex justify-content-between align-items-start flex-column">
                                <!--begin::Icon-->
                                <div class="m-0">
                                    <i class="ki-duotone ki-abstract-39 fs-2hx text-gray-600">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                </div>
                                <!--end::Icon-->
                                <!--begin::Section-->
                                <div class="d-flex flex-column my-7">
                                    <!--begin::Number-->
                                    <span class="fw-semibold fs-3x text-gray-800 lh-1 ls-n2">{{$totalReviews}}</span>
                                    <!--end::Number-->
                                    <!--begin::Follower-->
                                    <div class="m-0">
                                        <span class="fw-semibold fs-6 text-gray-500">Total Reviews</span>
                                    </div>
                                    <!--end::Follower-->
                                </div>
                                <!--end::Section-->

                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Card widget 2-->
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-sm-6 col-xl-2 mb-xl-10">
                        <!--begin::Card widget 2-->
                        <div class="card h-lg-100">
                            <!--begin::Body-->
                            <div class="card-body d-flex justify-content-between align-items-start flex-column">
                                <!--begin::Icon-->
                                <div class="m-0">
                                    <i class="ki-duotone ki-map fs-2hx text-gray-600">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                    </i>
                                </div>
                                <!--end::Icon-->
                                <!--begin::Section-->
                                <div class="d-flex flex-column my-7">
                                    <!--begin::Number-->
                                    <span class="fw-semibold fs-3x text-gray-800 lh-1 ls-n2">{{ $totalClasses }}</span>
                                    <!--end::Number-->
                                    <!--begin::Follower-->
                                    <div class="m-0">
                                        <span class="fw-semibold fs-6 text-gray-500">Total Classes</span>
                                    </div>
                                    <!--end::Follower-->
                                </div>
                                <!--end::Section-->

                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Card widget 2-->
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-sm-6 col-xl-2 mb-5 mb-xl-10">
                        <!--begin::Card widget 2-->
                        <div class="card h-lg-100">
                            <!--begin::Body-->
                            <div class="card-body d-flex justify-content-between align-items-start flex-column">
                                <!--begin::Icon-->
                                <div class="m-0">
                                    <i class="ki-duotone ki-abstract-35 fs-2hx text-gray-600">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                </div>
                                <!--end::Icon-->
                                <!--begin::Section-->
                                <div class="d-flex flex-column my-7">
                                    <!--begin::Number-->
                                    <span class="fw-semibold fs-3x text-gray-800 lh-1 ls-n2">{{$totalQuestions}}</span>
                                    <!--end::Number-->
                                    <!--begin::Follower-->
                                    <div class="m-0">
                                        <span class="fw-semibold fs-6 text-gray-500">Total Questions</span>
                                    </div>
                                    <!--end::Follower-->
                                </div>
                                <!--end::Section-->

                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Card widget 2-->
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-sm-6 col-xl-2 mb-5 mb-xl-10">
                        <!--begin::Card widget 2-->
                        <div class="card h-lg-100">
                            <!--begin::Body-->
                            <div class="card-body d-flex justify-content-between align-items-start flex-column">
                                <!--begin::Icon-->
                                <div class="m-0">
                                    <i class="ki-duotone ki-abstract-26 fs-2hx text-gray-600">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                </div>
                                <!--end::Icon-->
                                <!--begin::Section-->
                                <div class="d-flex flex-column my-7">
                                    <!--begin::Number-->
                                    <span class="fw-semibold fs-3x text-gray-800 lh-1 ls-n2">{{$studentCount}}</span>
                                    <!--end::Number-->
                                    <!--begin::Follower-->
                                    <div class="m-0">
                                        <span class="fw-semibold fs-6 text-gray-500">Total Students</span>
                                    </div>
                                    <!--end::Follower-->
                                </div>
                                <!--end::Section-->

                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Card widget 2-->
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Row-->
                @endif


                
                <div class="col-xl-8">
                    <!--begin::Col-->
                    <figure class="highcharts-figure">
                        <div id="container"></div>
                    </figure>

                </div>
                
                <!--end::Row-->

                <!--begin::Col-->
               
                <div class="col-xl-4">
                    <!--begin::List widget 21-->
                    <div class="card card-flush h-xl-100">
                        <!--begin::Header-->
                        <div class="card-header border-0 pt-5">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bold text-gray-900">Active Assignments</span>
                                <!-- <span class="text-muted mt-1 fw-semibold fs-7">Avg. 72% completed lessons</span> -->
                            </h3>
                            <!--begin::Toolbar-->
                            <div class="card-toolbar">
                                <a href="/assignmentslist" class="btn btn-sm btn-light">All Assignments</a>
                            </div>
                            <!--end::Toolbar-->
                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="card-body pt-5">
                            <!--begin::Item-->
                            @php
                            $colors = ['danger', 'success', 'info', 'primary', 'warning', 'dark'];
                            @endphp




                            @foreach ($assignmentslist as $assignment)
                            @php
                            $randomColor = $colors[array_rand($colors)];
                            @endphp
                            <div class="d-flex flex-stack">
                                <!--begin::Wrapper-->
                                <div class="d-flex align-items-center me-3">
                                    <!--begin::Logo-->
                                    <div class="symbol symbol-40px me-4">
                                        <div class="symbol-label fs-2 fw-semibold bg-{{ $randomColor }} text-inverse-{{ $randomColor }}">{{ strtoupper(substr($assignment['name'], 0, 1)) }}</div>
                                    </div>
                                    <!--end::Logo-->
                                    <!--begin::Section-->
                                    <div class="flex-grow-1">
                                        <!--begin::Text-->
                                        <a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bold lh-0">{{$assignment['name']}}</a>
                                        <!--end::Text-->
                                        <!--begin::Description-->
                                        <span class="text-gray-500 fw-semibold d-block fs-6">{{$assignment->student['name']}}</span>
                                        <!--end::Description=-->
                                    </div>
                                    <!--end::Section-->
                                </div>
                                <!--begin::Separator-->
                                <!--end::Separator-->
                                <!--end::Wrapper-->

                            </div>
                            <!--end::Item-->
                            <div class="separator separator-dashed my-3"></div>

                            @endforeach


                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::List widget 21-->
                </div>
                <!--end::Col-->

            </div>


            <div class="separator separator-dashed my-3"></div>


            <!--end::Content container-->
            @if(Auth::user()->role == 'teacher' OR Auth::user()->role =='admin')
            <div class="col-xl-12">
                <!--begin::Chart widget 18-->
                <div class="card card-flush h-xl-100">
                    <!--begin::Header-->
                    <div class="card-header pt-7">
                        <!--begin::Title-->
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bold text-gray-800">Students Activity</span>
                            <span class="text-gray-500 mt-1 fw-semibold fs-6">Students per Class</span>
                        </h3>
                        <!--end::Title-->
                        <!--begin::Toolbar-->
                        <div class="card-toolbar">
                            <!--begin::Daterangepicker(defined in src/js/layout/app.js)-->
                            <div>

                            </div>
                            <!--end::Daterangepicker-->
                        </div>
                        <!--end::Toolbar-->
                    </div>
                    <!--end::Header-->
                    <!--begin::Body-->
                    <div class="card-body d-flex align-items-end px-0 pt-3 pb-5">
                        <!--begin::Chart-->
                        <div id="kt_charts_widget_18_chart" class="h-325px w-100 min-h-auto ps-4 pe-6"></div>
                        <!--end::Chart-->
                    </div>
                    <!--end: Card Body-->
                </div>
                <!--end::Chart widget 18-->
            </div>
            @endif
            <!--end::Col-->
        </div>
        <!--end::Content-->
        <!--end::Content-->




    </div>

    @endsection
    @section('footerjs')
    $(document).ready(function () {
    $.ajax({
    url: "/chart-data-book",
    method: "GET",
    dataType: "json",
    success: function (response) {
    Highcharts.chart('container', {
    chart: {
    type: 'pie'
    },
    title: {
    text: 'Books by Genre'
    },
    tooltip: {
    valueSuffix: '%'
    },
    plotOptions: {
    series: {
    allowPointSelect: true,
    cursor: 'pointer',
    dataLabels: {
    enabled: true
    }
    }
    },
    series: [
    {
    name: 'Books',
    colorByPoint: true,
    data: response // Populated dynamically
    }
    ]
    });
    },
    error: function (error) {
    console.error("Error fetching data: ", error);
    }
    });
    });


    @endsection