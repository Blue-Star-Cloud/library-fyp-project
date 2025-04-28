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
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Genre
                        Information</h1>
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
                            <a href={{ route('genres') }} class="text-muted text-hover-primary">Genre</a>
                        </li>
                        <!--end::Item-->
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page title-->
            </div>
            <!--end::Toolbar container-->
        </div>

        <!--begin::Content-->
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <!--begin::Content container-->
            <div id="kt_app_content_container" class="">
                @if (empty($genre))
                    <form action="{{ route('genrestore') }}" method="POST">
                    @else
                        <form action="{{ route('updategenre') }}" method="POST">
                @endif
                <div id="kt_app_content" class="app-content flex-column-fluid">
                    @csrf
                    <!--begin::Content container-->
                    <div id="kt_app_content_container" class="">
                        <!--begin::Row-->
                        <div class="row g-5 g-xl-10">
                            <div class="col-xl-12">
                                <div class="card ">
                                    <div class="card-header align-items-center px-3 min-h-50px">
                                        <h3 class=" mb-0">Create Genre</h3>
                                    </div>
                                    <div class="card-body p-3 pt-0">
                                        <div class="row">
                                            <!--begin::Col-->
                                            <input hidden type="text" name="id" value="{{ $genre->id ?? '' }}"
                                                class="form-control form-control-solid">
                                            <div class="col-md-6 fv-row mb-5">
                                                <label class="form-label">Genre Name</label>
                                                <input type="text" name="genre_name"
                                                    value="{{ $genre->genre_name ?? '' }}" id="inputGenreName"
                                                    class="form-control form-control-solid @error('genre_name') is-invalid @enderror">
                                                @error('genre_name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <div class="mb-0 mt-1">
                                            <!--begin::Submit-->
                                            <button type="submit" class="btn btn-primary float-end mt-5">Submit</button>
                                            <a href="{{ url()->previous() }}" class="btn btn-warning">Cancel</a>
                                            <!--end::Submit-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end::Row-->

                    </div>
                    <!--end::Content container-->
                </div>
            </div>

        </div>
        <!--end::Content container-->
    </div>
    <!--end::Content-->
    </div>
@endsection
