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
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Reviews
                    </h1>
                    <!--end::Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href={{ route('dashboard') }} class="text-muted text-hover-primary">Home</a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href={{ route('reviews') }} class="text-muted text-hover-primary">Reviews</a>
                        </li>
                    </ul>
                    <!--end::Breadcrumb-->
                </div>


            </div>
            <!--end::Toolbar container-->

        </div>



        <!--begin::Row-->
        <div class="row g-5 g-xl-10">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body p-5">
                        <div class="form-group d-flex align-items-center gap-2 mb-5">
                            <label class="fs-6 fw-semibold">Search:</label>
                            <input class="form-control form-control-solid w-250px">
                        </div>
                        <div class="table-responsive">
                            <!--begin::Table-->
                            <table id="kt_datatable_both_scrolls" class="table table-row-bordered gy-5 gs-7 mb-0">
                                <!--begin::Table head-->
                                <thead class="table-light">
                                    <tr class="fw-bold text-muted">
                                        <th class="ps-3">Book Name</th>
                                        <th class="">Student Name</th>
                                        <th class="">Rating</th>
                                        <th class="">Review</th>
                                        <th class="">Date</th>
                                        <th class="pe-3 text-end">Actions</th>
                                    </tr>

                                </thead>
                                <!--end::Table head-->
                                <!--begin::Table body-->
                                <tbody>
                                    @if (empty($selectedid))
                                        @foreach ($reviewslist as $review)
                                            <tr>
                                                <td class="align-middle ps-3">
                                                    <div class="d-flex align-items-center">
                                                        <div class="symbol symbol-50px me-3 bg-light">
                                                            <img src="assets/media/svg/avatars/001-boy.svg" class=""
                                                                alt="" />
                                                        </div>
                                                        <div class="d-flex justify-content-start flex-column">
                                                            <div class="text-dark fw-bold d-block">
                                                                {{ $review->book['title'] }}</div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="align-middle">
                                                    <div class="text-dark fw-bold d-block">{{ $review->student['name'] }}
                                                    </div>
                                                </td>
                                                <td class="align-middle">
                                                    <div class="text-dark fw-bold d-block">{{ $review['rating'] }}</div>
                                                </td>
                                                <td class="align-middle">
                                                    <div class="text-dark fw-bold d-block">{{ $review['comment_text'] }}
                                                    </div>
                                                </td>
                                                <td class="align-middle">
                                                    <div class="text-dark fw-bold d-block">
                                                        {{ $review['created_at']->toDateString() }}</div>
                                                </td>


                                                <td class="align-middle text-end pe-3">

                                                    @if (Auth::user()->id == $review->student_id || Auth::user()->role == 'teacher' || Auth::user()->role == 'admin')
                                                        <a
                                                            href="{{ route('editreview', ['id' => $review['id']]) }}"class="btn btn-light-primary btn-icon h-35px w-35px">
                                                            <i class="fa-duotone fa-pen fs-4  h-35px w-35px align-items-center justify-content-center"
                                                                title="Edit" data-bs-toggle="tooltip"
                                                                data-bs-placement="top"></i></a>
                                                    @endif
                                                    @if (Auth::user()->role == 'teacher' or Auth::user()->role == 'admin')
                                                        <a href="{{ route('deletereview', ['id' => $review['id']]) }}" button
                                                            type="button"
                                                            class=" btn btn-light-danger btn-icon h-35px w-35px"
                                                            data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">
                                                            <i
                                                                class="fa-duotone fa-trash fs-4 h-35px w-35px align-items-center justify-content-center"></i>
                                                        </a>
                                                    @endif


                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                                <!--end::Table body-->
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end::Row-->
    @endsection
