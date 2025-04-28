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
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Notes Form
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
                            <a href={{ route('notes') }} class="text-muted text-hover-primary">Notes</a>
                        </li>
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
            </div>
            <!--end::Toolbar container-->
        </div>


        <!--begin::Content-->
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <!--begin::Content container-->
            <div id="kt_app_content_container" class="">
                @if (empty($note))
                    <form action="{{ route('classnotestore') }}" method="POST">
                    @else
                        <form action="{{ route('classnoteupdate') }}" method="POST">
                @endif
                @csrf
                <!--begin::Row-->
                <div class="row g-5 g-xl-10">
                    <div class="col-xl-12">
                        <div class="card ">
                            <div class="card-header align-items-center px-3 min-h-50px">
                                <h3 class=" mb-0">Create Note</h3>
                            </div>
                            <div class="card-body p-3 pt-0">
                                <input hidden type="text" name="id" value="{{ $note->id ?? '' }}"
                                    class="form-control form-control-solid">
                                <input hidden type="text" name="form_class_id" value="{{ $class->id ?? '' }}"
                                    class="form-control form-control-solid">
                                <div class="row">
                                    <!--begin::Col-->
                                    <div class="col-md-6 fv-row mb-5">
                                        <label class="form-label">Title</label>
                                        <input name="title" id="inputTitle" value="{{ $note->title ?? '' }}"
                                            type="text"
                                            class="form-control form-control-solid @error('title') is-invalid @enderror"{{ Auth::user()->role == 'student' ? 'disabled' : '' }}>
                                        @error('title')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-md-6 fv-row mb-5">
                                        <label class="form-label">Date</label>
                                        <input readonly="readonly" type="date" name="date" value="{{ date('Y-m-d') }}"
                                            id="date"
                                            class="form-control form-control-solid"{{ Auth::user()->role == 'student' ? 'disabled' : '' }}>
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <input hidden name="teacher_id"
                                        id="teacher_id"class="form-select form-select-solid @error('class_topics') is-invalid @enderror"
                                        value="{{ Auth::id() }}">
                                    <!--end::Col-->
                                </div>
                                <div class="mb-0 mt-1">
                                    <label class="form-label">Weekly Class Topics</label>
                                    <textarea name="class_topics" id="inputClassTopics"
                                        class="form-control form-control-solid placeholder-gray-600 fw-bold fs-4 ps-9 pt-7 @error('class_topics') is-invalid @enderror"
                                        rows="6" name="message" {{ Auth::user()->role == 'student' ? 'disabled' : '' }}>{{ $note->class_topics ?? '' }}</textarea>
                                    @error('class_topics')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <label class="form-label">Weekly Learning Objectives</label>
                                    <textarea name="class_objectives" id="inputClassTopics"
                                        class="form-control form-control-solid placeholder-gray-600 fw-bold fs-4 ps-9 pt-7 @error('class_objectives') is-invalid @enderror"
                                        rows="6" name="message" {{ Auth::user()->role == 'student' ? 'disabled' : '' }}>{{ $note->class_objectives ?? '' }}</textarea>
                                    @error('class_objectives')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <!--begin::Submit-->
                                    @if (Auth::user()->role == 'teacher' or Auth::user()->role == 'admin')
                                        <button type="submit" class="btn btn-primary float-end mt-5">Submit</button>
                                    @endif
                                    <!--end::Submit-->
                                    <!--begin::Submit-->
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
        <!--end::Content-->
    @endsection
