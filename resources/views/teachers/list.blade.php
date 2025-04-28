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
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Teachers
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
                            <a href={{ route('teacherusers') }} class="text-muted text-hover-primary">Teachers</a>
                        </li>
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page title-->
                <div class="d-flex align-items-center gap-2 gap-lg-3">
                    <!--begin:: Add New-->
                    <a href={{ route('tform') }} class="btn btn-sm fw-bold btn-success" data-bs-toggle="modal"
                        data-bs-target={{ route('form') }}><i class="fa-solid fa-plus me-1 fs-4"></i>Add New</a>
                    <!--end::Primary button-->

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
                                        <th class="ps-3">User Name</th>
                                        <th class="">Email</th>
                                        <th class="">Class</th>
                                        <th class="">Date Of Birth</th>
                                        <th class="pe-3 text-end" data-orderable="false">Actions</th>
                                    </tr>

                                </thead>
                                <!--end::Table head-->
                                <!--begin::Table body-->
                                <tbody>
                                    @foreach ($userslist as $user)
                                        @if ($user->role == 'teacher')
                                            <tr>
                                                <td class="align-middle ps-3">
                                                    <div class="d-flex align-items-center">
                                                        <div class="symbol symbol-50px me-3 bg-light">
                                                            <img src="assets/media/svg/avatars/001-boy.svg" class=""
                                                                alt="" />
                                                        </div>
                                                        <div class="d-flex justify-content-start flex-column">
                                                            <div class="text-dark fw-bold d-block">{{ $user['name'] }}</div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="align-middle">
                                                    <div class="text-dark fw-bold d-block">{{ $user['email'] }}</div>
                                                </td>
                                                <td class="align-middle">
                                                    <div class="text-dark fw-bold d-block">
                                                        @php $hasClass = false; @endphp

                                                        @foreach ($classlist as $class)
                                                            @if ($user->id == $class->teacher_id)
                                                                {{ $class->class_name }}
                                                                @php $hasClass = true; @endphp
                                                            @endif
                                                        @endforeach
                                                        @if (!$hasClass)
                                                            N/A
                                                        @endif
                                                    </div>
                                                </td>
                                                <td class="align-middle">
                                                    <div class="text-dark fw-bold">{{ $user['date_of_birth'] }}</div>
                                                </td>


                                                <td class="align-middle text-end pe-3">
                                                    <a href="{{ route('profile-student', ['id' => $user['id']]) }}"
                                                        class="btn btn-light-success btn-icon h-35px w-35px">
                                                        <i class="fa-duotone fa-eye fs-4  h-35px w-35px align-items-center justify-content-center"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Profile View"></i>
                                                    </a>
                                                    <a href="{{ route('tedit', ['id' => $user['id']]) }}"
                                                        class="btn btn-light-primary btn-icon h-35px w-35px">
                                                        <i class="fa-duotone fa-pen fs-4  h-35px w-35px align-items-center justify-content-center"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            aria-label="Edit" data-bs-original-title="Edit"
                                                            data-kt-initialized="1"></i></a>
                                                    <a href="{{ route('delete', ['id' => $user['id']]) }}" button
                                                        type="button" class=" btn btn-light-danger btn-icon h-35px w-35px"
                                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">
                                                        <i
                                                            class="fa-duotone fa-trash fs-4 h-35px w-35px align-items-center justify-content-center"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
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
