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
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Assigned
                        Book</h1>
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
                            <a href={{ route('books') }} class="text-muted text-hover-primary">Assigned Books</a>
                        </li>
                        <!--end::Item-->
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page title-->
                <div class="d-flex align-items-center gap-2 gap-lg-3">
                    <!--begin:: Add New-->
                    @if (Auth::user()->role == 'teacher' or Auth::user()->role == 'admin')
                        <a href={{ route('createbook') }} class="btn btn-sm fw-bold btn-success"><i
                                class="fa-solid fa-plus me-1 fs-4"></i>Add New</a>
                    @endif
                    <!--end::Primary button-->

                    <!--begin:: Add New-->
                    <a href="{{ route('reviewform', ['student_id' => Auth::user()->id]) }}"
                        class="btn btn-sm fw-bold btn-success"><i class="fa-solid fa-plus me-1 fs-4"></i>Add Review</a>
                    <!--end::Primary button-->


                </div>

            </div>
            <!--end::Toolbar container-->

        </div>
        <!--end::Toolbar-->
        <!--begin::Content-->
        <!--begin::Content-->
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <!--begin::Content container-->
            <div id="kt_app_content_container" class="">
                <!--begin::Row-->
                <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
                    <!--begin::Col-->
                    @if ($book->isEmpty())
                        <div class="col-xxl-6">
                            <!--begin::Card widget 18-->
                            <div class="card card-flush h-xl-100">
                                <!--begin::Body-->
                                <div class="card-body py-9">
                                    <div class="d-flex flex-column h-100">
                                        <div class="d-flex flex-stack mb-6">
                                            <div class="flex-shrink-0 me-5">
                                                <span class="text-gray-800 fs-1 fw-bold">No Books Available</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end::Body-->
                            </div>
                            <!--end::Card widget 18-->
                        </div>
                    @endif
                    <!--end::Col-->

                    @foreach ($book as $book)
                        <div class="col-xxl-6">
                            <!--begin::Card widget 18-->
                            <div class="card card-flush h-xl-100">
                                <!--begin::Body-->
                                <div class="card-body py-9">

                                    <!--begin::Row-->

                                    <div class="row gx-9 h-100">

                                        <!--begin::Col-->

                                        <div class="col-sm-6 mb-10 mb-sm-0">
                                            <!--begin::Image-->
                                            <div class="bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-400px min-h-sm-100 h-100"
                                                style="background-size: 100% 100%;background-image:url('assets/book-images/{{ $book['image'] }}')">
                                            </div>

                                            <!--end::Image-->
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-sm-6">
                                            <!--begin::Wrapper-->
                                            <div class="d-flex flex-column h-100">
                                                <!--begin::Header-->
                                                <div class="mb-7">
                                                    <!--begin::Headin-->
                                                    <div class="d-flex flex-stack mb-6">
                                                        <!--begin::Title-->
                                                        <div class="flex-shrink-0 me-5">
                                                            <span
                                                                class="text-gray-800 fs-1 fw-bold">{{ Str::limit($book['title'], 20) }}</span>
                                                        </div>
                                                        <!--end::Title-->
                                                    </div>
                                                    <!--end::Heading-->
                                                    <!--begin::Items-->
                                                    <div class="d-flex align-items-center flex-wrap d-grid gap-2">
                                                        <!--begin::Item-->
                                                        <div class="d-flex align-items-center me-5 me-xl-13">
                                                            <!--begin::Symbol-->
                                                            <div class="symbol symbol-30px symbol-circle me-3">
                                                                <img src="assets/media/avatars/300-3.jpg" class=""
                                                                    alt="" />
                                                            </div>
                                                            <!--end::Symbol-->
                                                            <!--begin::Info-->
                                                            <div class="m-0">
                                                                <span
                                                                    class="fw-semibold text-gray-500 d-block fs-8">Author</span>
                                                                <a href="pages/user-profile/overview.html"
                                                                    class="fw-bold text-gray-800 text-hover-primary fs-7">{{ $book['author'] }}</a>
                                                            </div>
                                                            <!--end::Info-->
                                                        </div>
                                                        <!--end::Item-->
                                                        <!--begin::Item-->
                                                        <div class="d-flex align-items-center">
                                                            <!--begin::Symbol-->
                                                            <div class="symbol symbol-30px symbol-circle me-3">
                                                                <span class="symbol-label bg-success">
                                                                    <i class="ki-duotone ki-abstract-41 fs-5 text-white">
                                                                        <span class="path1"></span>
                                                                        <span class="path2"></span>
                                                                    </i>
                                                                </span>
                                                            </div>
                                                            <!--end::Symbol-->
                                                            <!--begin::Info-->
                                                            <div class="m-0">
                                                                <span class="fw-semibold text-gray-500 d-block fs-8">Ratings
                                                                </span>
                                                                <span
                                                                    class="fw-bold text-gray-800 fs-7">{{ (int) $avgRating ?? 0 }}/5</span>
                                                            </div>
                                                            <!--end::Info-->
                                                        </div>
                                                        <!--end::Item-->
                                                    </div>
                                                    <!--end::Items-->
                                                </div>
                                                <!--end::Header-->
                                                <!--begin::Body-->
                                                <div class="mb-6">
                                                    <!--begin::Text-->
                                                    <span
                                                        class="fw-semibold text-gray-600 fs-6 mb-8 d-block">{{ $book['description'] }}</span>
                                                    <!--end::Text-->
                                                    <!--begin::Stats-->
                                                    <div class="d-flex">
                                                        <!--begin::Stat-->
                                                        <div
                                                            class="border border-gray-300 border-dashed rounded min-w-100px w-100 py-2 px-4 me-6 mb-3">
                                                            <!--begin::Date-->
                                                            <span
                                                                class="fs-6 text-gray-700 fw-bold">{{ $book['category'] }}</span>
                                                            <!--end::Date-->
                                                            <!--begin::Label-->
                                                            <div class="fw-semibold text-gray-500">Category</div>
                                                            <!--end::Label-->
                                                        </div>
                                                        <!--end::Stat-->
                                                        <!--begin::Stat-->
                                                        <div
                                                            class="border border-gray-300 border-dashed rounded min-w-100px w-100 py-2 px-4 mb-3">
                                                            <!--begin::Number-->
                                                            <span class="fs-6 text-gray-700 fw-bold">
                                                                <span class="ms-n1" data-kt-countup="true"
                                                                    data-kt-countup-value="{{ $totalReviews ?? 0 }}">0</span></span>
                                                            <!--end::Number-->
                                                            <!--begin::Label-->
                                                            <div class="fw-semibold text-gray-500">Reviews</div>
                                                            <!--end::Label-->
                                                        </div>
                                                        <!--end::Stat-->
                                                    </div>
                                                    <!--end::Stats-->
                                                </div>
                                                <!--end::Body-->
                                                <!--begin::Footer-->
                                                <div class="d-flex flex-stack mt-auto bd-highlight">


                                                    @if (Auth::user()->book_id == $book['id'])
                                                        @if ($canReview)
                                                            <a href="{{ route('reviewform', ['student_id' => Auth::user()->id, 'book_id' => $book['id']]) }}"
                                                                button type="button"
                                                                class=" min-w-100px w-100 py-2 px-4 mb-3"
                                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                                title="Review">
                                                                <i
                                                                    class="badge badge-light-primary flex-shrink-0 align-self-center py-3 px-4 fs-7">Add
                                                                    Review</i>
                                                            </a>
                                                        @endif
                                                    @endif


                                                    <a href="{{ route('showBookReview', ['id' => $book['id']]) }}" button
                                                        type="button" class=" min-w-100px w-100 py-2 px-4 mb-3"
                                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Review">
                                                        <i
                                                            class="badge badge-light-primary flex-shrink-0 align-self-center py-3 px-4 fs-7">View
                                                            Reviews</i>
                                                    </a>



                                                    @if (Auth::user()->role == 'teacher' or Auth::user()->role == 'admin')
                                                        <a href="{{ route('editbook', ['id' => $book['id']]) }}" button
                                                            type="button" class=" btn  btn-icon h-35px w-35px"
                                                            data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                                                            <i
                                                                class="badge badge-light-primary flex-shrink-0 align-self-center py-3 px-4 fs-7">Edit</i>
                                                        </a>


                                                        <a href="apps/projects/project.html"
                                                            class="d-flex align-items-center text-primary opacity-75-hover fs-6 fw-semibold">Assign
                                                            question
                                                            <i class="ki-duotone ki-exit-right-corner fs-4 ms-1">
                                                                <span class="path1"></span>
                                                                <span class="path2"></span>
                                                            </i></a>

                                                        <a href="{{ route('deletebook', ['id' => $book['id']]) }}" button
                                                            type="button"
                                                            class=" btn btn-light-danger btn-icon h-35px w-35px"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Delete">
                                                            <i
                                                                class="fa-duotone fa-trash fs-4 h-35px w-35px align-items-center justify-content-center"></i>
                                                        </a>
                                                    @endif

                                                    <!--end::Actions-->
                                                </div>
                                                <!--end::Footer-->
                                            </div>
                                            <!--end::Wrapper-->
                                        </div>
                                        <!--end::Col-->

                                    </div>



                                    <!--end::Row-->

                                </div>
                                <!--end::Body-->
                            </div>
                            <!--end::Card widget 18-->
                        </div>
                        <!--end::Col-->
                    @endforeach
                </div>
                <!--end::Row-->


                <!--end::Content container-->
            </div>
            <!--end::Content-->
            <!--end::Content-->




        </div>
    @endsection
