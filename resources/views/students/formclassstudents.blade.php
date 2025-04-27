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
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Students</h1>
                <!--end::Title-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">
                        <a href={{route("dashboard")}} class="text-muted text-hover-primary">Home</a>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">
                        <a href={{route("users")}} class="text-muted text-hover-primary">Students</a>
                    </li>
                    <!--end::Item-->
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page title-->
            <div class="d-flex align-items-center gap-2 gap-lg-3">



                <!--begin:: Add New-->
                <a href={{route("form")}} class="btn btn-sm fw-bold btn-success" data-bs-toggle="modal" data-bs-target={{route("form")}}><i class="fa-solid fa-plus me-1 fs-4"></i>Add New</a>
                <!--end::Primary button-->

                <!--begin:: Export-->
                <!-- <a href="#" class="btn btn-sm fw-bold btn-info"><i class="fa-duotone fa-download me-1 fs-4"></i>Export</a> -->
                <button type="button" class="btn btn-sm fw-bold btn-info" id="assignStudentsBtn" disabled>
                    Bulk Class Assign
                </button>
                <button type="button" class="btn btn-sm fw-bold btn-danger" id="assignStudentsBtnBook" disabled>
                    Bulk Book Assign
                </button>
                <!--end:: Export-->
                

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
                                    <th> <input type="checkbox" id="selectAll"></th>
                                    <th class="ps-3">User Name</th>
                                    <th class="">Email</th>
                                    <th class="">OR Level</th>
                                    <th class="">Interest</th>
                                    <th class="">Class</th>
                                    <th class="">Date Of Birth</th>
                                    <th class="">Current Book Name</th>
                                    <th class="pe-3 text-end" data-orderable="false">Actions</th>
                                </tr>

                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->
                            <tbody>
                                @foreach ($userslist as $user)
                                @if($user->role =='student')

                                <tr>
                                    <td class="align-middle">
                                        <div class="text-dark fw-bold d-block"> <input type="checkbox" name="students[]" value="{{ $user->id }}"></div>
                                    </td>
                                    <td class="align-middle ps-3">
                                        <div class="d-flex align-items-center">
                                            <div class="symbol symbol-50px me-3 bg-light">
                                                <img src="assets/media/svg/avatars/001-boy.svg"
                                                    class="" alt="" />
                                            </div>
                                            <div class="d-flex justify-content-start flex-column">
                                                <div class="text-dark fw-bold d-block">{{$user['name']}}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="align-middle">
                                        <div class="text-dark fw-bold d-block">{{$user['email']}}</div>
                                    </td>
                                    <td class="align-middle">
                                        <div class="text-dark fw-bold d-block">{{$user['or_level']}}</div>
                                    </td>
                                    <td class="align-middle">
                                        <div class="text-dark fw-bold d-block">
                                            {{ $user->genre && $user->genre->isNotEmpty() ? $user->genre->pluck('genre_name')->implode(', ') : 'N/A' }}
                                        </div>
                                    </td>
                                    <td class="align-middle">
                                        <div class="text-dark fw-bold">{{ $user->class ? $user->class->class_name : 'N/A' }}</div>
                                    </td>
                                    <td class="align-middle">
                                        <div class="text-dark fw-bold">{{$user['date_of_birth']}}</div>
                                    </td>
                                    <td class="align-middle">
                                        <div class="text-dark fw-bold">{{$user->book ? $user->book->title : 'N/A' }}</div>
                                    </td>


                                    <td class="align-middle text-end pe-3">
                                        <a href="{{route('profile-student',['id'=>$user['id']])}}"
                                            class="btn btn-light-success btn-icon h-35px w-35px">
                                            <i class="fa-duotone fa-eye fs-4  h-35px w-35px align-items-center justify-content-center"
                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                title="Profile View"></i>
                                        </a>
                                        <a href="{{route('assign',['id'=>$user['id']])}}" class="btn btn-light-danger btn-icon h-35px w-35px"><i class="fa-duotone fa-swatchbook fs-4 h-35px w-35px align-items-center justify-content-center" data-bs-toggle="tooltip" data-bs-placement="top"
                                                title="Assign"></i>
                                        </a>
                                        <a href="{{route('viewstudentnotes',['id'=>$user['id']])}}" class="btn btn-light-info btn-icon h-35px w-35px">
                                            <i class="fa-duotone fa-note-sticky fs-4 h-35px w-35px align-items-center justify-content-center" data-bs-toggle="tooltip" data-bs-placement="top"
                                                title="Notes"></i></a>

                                        <a href="{{route('edit',['id'=>$user['id']])}}" class="btn btn-light-primary btn-icon h-35px w-35px">
                                            <i class="fa-duotone fa-pen fs-4  h-35px w-35px align-items-center justify-content-center" title="Edit" data-bs-toggle="tooltip" data-bs-placement="top"></i></a>

                                        <a href="{{route('delete',['id'=>$user['id']])}}" button type="button"
                                            class=" btn btn-light-danger btn-icon h-35px w-35px"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Delete">
                                            <i class="fa-duotone fa-trash fs-4 h-35px w-35px align-items-center justify-content-center"></i>
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




    <!-- Assign Students Modal -->
    <div class="modal fade" id="assignStudentsModal" tabindex="-1" aria-labelledby="assignStudentsModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="assignStudentsModalLabel">Assign Students to Class</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="assignStudentsForm" action="{{ route('assignStudents') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="classSelect" class="form-label">Select Class</label>
                            <select class="form-control" name="class_id" id="classSelect" required>
                                <option value="">-- Select Class --</option>
                                @foreach ($classes as $class)
                                <option value="{{ $class->id }}">{{ $class->class_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <input type="hidden" name="student_ids" id="selectedStudents">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Assign</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


     <!-- Assign Students Book Modal -->
     <div class="modal fade" id="assignStudentsModalBook" tabindex="-1" aria-labelledby="assignStudentsModalBookLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="assignStudentsModalBookLabel">Assign Books to Student</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="assignStudentsBookForm" action="{{ route('assignStudentsBook') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                       <strong>Click Assign to automatically assign books to selected students</strong>
                        <input type="hidden" name="student_ids" id="selectedStudentsBook">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Assign</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--end::Row-->
    @endsection


    @section('scripts')

    <script>
        $(document).ready(function() {
            // Select All Checkbox
            $('#selectAll').on('change', function() {
                console.log('clicked');
                $('input[name="students[]"]').prop('checked', $(this).prop('checked'));
                toggleAssignButton();
            });

            // Individual Checkboxes
            $('input[name="students[]"]').on('change', function() {
                toggleAssignButton();
                console.log('clicked');

            });

            // Bulk assign students
            function toggleAssignButton() {
                let selected = $('input[name="students[]"]:checked').length;
                $('#assignStudentsBtnBook').prop('disabled', selected === 0);
                $('#assignStudentsBtn').prop('disabled', selected === 0);
            }

            // Open Modal and Pass Selected Students
            $('#assignStudentsBtn').on('click', function() {
                let selectedStudents = [];
                $('input[name="students[]"]:checked').each(function() {
                    selectedStudents.push($(this).val());
                });
                $('#selectedStudents').val(selectedStudents.join(',')); // Store student IDs in hidden input
                $('#assignStudentsModal').modal('show'); // Show modal
            });

            // Open Modal and Pass Selected Students
            $('#assignStudentsBtnBook').on('click', function() {
                let selectedStudents = [];
                $('input[name="students[]"]:checked').each(function() {
                    selectedStudents.push($(this).val());
                });
                $('#selectedStudentsBook').val(selectedStudents.join(',')); // Store student IDs in hidden input
                $('#assignStudentsModalBook').modal('show'); // Show modal
            });
        });
    </script>


    @endsection