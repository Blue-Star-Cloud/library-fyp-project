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
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                        Assignments Form</h1>
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
                            <a href={{ route('formclassteacher') }} class="text-muted text-hover-primary">Form Classes</a>
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
                @if (empty($formclass))
                    <form action="{{ route('storeformclass') }}" method="POST">
                    @else
                        <form action="{{ route('updateformclass') }}" method="POST">
                @endif
                @csrf
                <!--begin::Row-->
                <div class="row g-5 g-xl-10">
                    <div class="col-xl-12">
                        <div class="card ">
                            <div class="card-header align-items-center px-3 min-h-50px">
                                <h3 class=" mb-0">Create Form Class</h3>
                            </div>
                            <div class="card-body p-3 pt-0">
                                <input hidden type="text" name="id" value="{{ $formclass->id ?? '' }}"
                                    class="form-control form-control-solid">
                                <div class="row">
                                    <!--begin::Col-->
                                    <div class="col-md-6 fv-row mb-5">
                                        <label class="form-label">Name of Class</label>
                                        <input placeholder="Type name of class" value="{{ $formclass->class_name ?? '' }}"
                                            name="class_name" id="inputClassName" type="text"
                                            class="form-control form-control-solid">
                                        @error('class_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-md-6 fv-row mb-5">
                                        <label class="form-label">Assign Teacher</label>

                                        <select name="teacher_id"class="form-select form-select-solid">
                                            <option disabled>{{ $formclass->teacher_name ?? 'Select a teacher' }}</option>
                                            @foreach ($teacherslist as $teacher)
                                                <option value="{{ $teacher['id'] }}"
                                                    @if (isset($formclass) && $formclass->teacher_id == $teacher['id']) selected @endif>
                                                    {{ $teacher['name'] }}
                                                </option>
                                            @endforeach
                                        </select>


                                        @error('teacher_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                    </div>



                                    <!--end::Col-->
                                </div>
                                <!--begin::Submit-->
                                <button type="submit" class="btn btn-primary float-end mt-5">Submit</button>
                                <a href="{{ url()->previous() }}" class="btn btn-warning">Cancel</a>
                                <!--end::Submit-->
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
