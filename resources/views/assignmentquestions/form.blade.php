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
                        Assignments Questions Form</h1>
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
                            <a href={{ route('assignments') }} class="text-muted text-hover-primary">Assignment</a>
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
                <form action="{{ route('updateanswerquestions') }}" method="POST">
                    @csrf

                    <!--begin::Row-->
                    <div class="row g-5 g-xl-10">
                        <div class="col-xl-12">
                            <div class="card ">
                                <div class="card-header align-items-center px-3 min-h-50px">
                                    <h3 class=" mb-0">Assignment Questions</h3>
                                </div>
                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}"
                                    class="form-control form-control-solid">
                                <input type="hidden" name="user_role" value="{{ Auth::user()->role }}"
                                    class="form-control form-control-solid">
                                @foreach ($assignmentquestionslist as $index => $assignmentquestion)
                                <div class="card-body p-3 pt-0">
                                    <div class="mb-5 mt-3">
                                        <div class="bg-light p-3 rounded border shadow-sm">
                                            <h4 class="mb-0 text-info fw-semibold">Assigned Book : {{ $assignmentquestion->assignment->student->current_book_name ?? '' }}</h4>
                                        </div>
                                    </div>
    
                                    <input type="hidden" name="questions[{{$index}}][id]" value="{{$assignmentquestion->id ?? ''}}" class="form-control form-control-solid">
                                    <input type="hidden" name="book_id" value="{{ $assignmentquestion->assignment->student->book_id ?? 0 }}" class="form-control form-control-solid">


                                        <div class="row">
                                            <!--begin::Col-->
                                            <div class="col-md-6 fv-row mb-5">
                                                <label class="form-label">Question</label>
                                                <input name="title" id="inputTitle" disabled
                                                    value="{{ $assignmentquestion->question['question_text'] ?? '' }}"
                                                    type="text" class="form-control form-control-solid">
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <div class="mb-0 mt-1">
                                            <label class="form-label">Answer</label>
                                            <textarea {{ empty($assignmentquestion['answer_field']) ? '' : 'disabled' }}
                                                name="questions[{{ $index }}][answer_field]"
                                                class="form-control form-control-solid placeholder-gray-600 fw-bold fs-4 ps-9 pt-7" rows="6">{{ $assignmentquestion['answer_field'] ?? '' }}</textarea>
                                            <!--begin::Submit-->

                                            <!--end::Submit-->
                                        </div>
                                    </div>
                                @endforeach
                                @if (
                                            ($assignmentquestion->assignment['status'] == 'Pending Feedback' && Auth::user()->role == 'teacher') || 
                                            ($assignmentquestion->assignment['status'] == 'Completed' && (Auth::user()->role == 'teacher' || Auth::user()->role == 'student'))
                                        )
                                        <div class="row p-3 pt-0">
                                            <div class="col-md-2 mb-3">
                                                <label class="form-label">Vocabulary Score</label>
                                                
                                                <select name="vocabulary" id="inputVocabulary"
                                                    class="form-select form-select-solid @error('vocabulary') is-invalid @enderror"
                                                    {{ !(Auth::user()->role === 'teacher' || Auth::user()->role === 'admin') ? 'disabled' : '' }}
                                                    required
                                                    oninvalid="this.setCustomValidity('Please select a score')"
                                                    oninput="this.setCustomValidity('')">
                                                    <option value="" disabled {{ empty($assignmentquestion->assignment->vocabulary) ? 'selected' : '' }}>Select Score</option>
                                                    <!-- Display the selected value for both teachers/admins and students -->
                                                    @for ($i = 1; $i <= 5; $i++)
                                                        <option value="{{ $i }}" 
                                                            {{ ($assignmentquestion->assignment->vocabulary ?? '') == $i ? 'selected' : '' }}>
                                                            {{ $i }}
                                                        </option>
                                                    @endfor
                                                </select>
                                    
                                                @error('vocabulary')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-md-2 mb-3">
                                                <label class="form-label">Inference Score</label>
                                                
                                                <select name="inference" id="inputInference"
                                                    class="form-select form-select-solid @error('inference') is-invalid @enderror"
                                                    {{ !(Auth::user()->role === 'teacher' || Auth::user()->role === 'admin') ? 'disabled' : '' }}
                                                    required
                                                    oninvalid="this.setCustomValidity('Please select a score')"
                                                    oninput="this.setCustomValidity('')">
                                                    <option value="" disabled {{ empty($assignmentquestion->assignment->vocabulary) ? 'selected' : '' }}>Select Score</option>
                                                    <!-- Display the selected value for both teachers/admins and students -->
                                                    @for ($i = 1; $i <= 5; $i++)
                                                        <option value="{{ $i }}" 
                                                            {{ ($assignmentquestion->assignment->inference ?? '') == $i ? 'selected' : '' }}>
                                                            {{ $i }}
                                                        </option>
                                                    @endfor
                                                </select>
                                    
                                                @error('inference')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-md-2 mb-3">
                                                <label class="form-label">Prediction Score</label>
                                                
                                                <select name="prediction" id="inputPrediction"
                                                    class="form-select form-select-solid @error('prediction') is-invalid @enderror"
                                                    {{ !(Auth::user()->role === 'teacher' || Auth::user()->role === 'admin') ? 'disabled' : '' }}
                                                    required
                                                    oninvalid="this.setCustomValidity('Please select a score')"
                                                    oninput="this.setCustomValidity('')">
                                                    <option value="" disabled {{ empty($assignmentquestion->assignment->vocabulary) ? 'selected' : '' }}>Select Score</option>
                                                    <!-- Display the selected value for both teachers/admins and students -->
                                                    @for ($i = 1; $i <= 5; $i++)
                                                        <option value="{{ $i }}" 
                                                            {{ ($assignmentquestion->assignment->prediction ?? '') == $i ? 'selected' : '' }}>
                                                            {{ $i }}
                                                        </option>
                                                    @endfor
                                                </select>
                                    
                                                @error('prediction')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-md-2 mb-3">
                                                <label class="form-label">Explanation Score</label>
                                                
                                                <select name="explanation" id="inputExplanation"
                                                    class="form-select form-select-solid @error('explanation') is-invalid @enderror"
                                                    {{ !(Auth::user()->role === 'teacher' || Auth::user()->role === 'admin') ? 'disabled' : '' }}
                                                    required
                                                    oninvalid="this.setCustomValidity('Please select a score')"
                                                    oninput="this.setCustomValidity('')">
                                                    <option value="" disabled {{ empty($assignmentquestion->assignment->vocabulary) ? 'selected' : '' }}>Select Score</option>
                                                    <!-- Display the selected value for both teachers/admins and students -->
                                                    @for ($i = 1; $i <= 5; $i++)
                                                        <option value="{{ $i }}" 
                                                            {{ ($assignmentquestion->assignment->explanation ?? '') == $i ? 'selected' : '' }}>
                                                            {{ $i }}
                                                        </option>
                                                    @endfor
                                                </select>
                                    
                                                @error('explanation')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-md-2 mb-3">
                                                <label class="form-label">Retrieval Score</label>
                                                
                                                <select name="retrieval" id="inputRetrieval"
                                                    class="form-select form-select-solid @error('retrieval') is-invalid @enderror"
                                                    {{ !(Auth::user()->role === 'teacher' || Auth::user()->role === 'admin') ? 'disabled' : '' }}
                                                    required
                                                    oninvalid="this.setCustomValidity('Please select a score')"
                                                    oninput="this.setCustomValidity('')">
                                                    <option value="" disabled {{ empty($assignmentquestion->assignment->vocabulary) ? 'selected' : '' }}>Select Score</option>
                                                    <!-- Display the selected value for both teachers/admins and students -->
                                                    @for ($i = 1; $i <= 5; $i++)
                                                        <option value="{{ $i }}" 
                                                            {{ ($assignmentquestion->assignment->retrieval ?? '') == $i ? 'selected' : '' }}>
                                                            {{ $i }}
                                                        </option>
                                                    @endfor
                                                </select>
                                    
                                                @error('retrieval')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-md-2 mb-3">
                                                <label class="form-label">Summarise Score</label>
                                                
                                                <select name="summarise" id="inputSummarise"
                                                    class="form-select form-select-solid @error('summarise') is-invalid @enderror"
                                                    {{ !(Auth::user()->role === 'teacher' || Auth::user()->role === 'admin') ? 'disabled' : '' }}
                                                    required
                                                    oninvalid="this.setCustomValidity('Please select a score')"
                                                    oninput="this.setCustomValidity('')">
                                                    <option value="" disabled {{ empty($assignmentquestion->assignment->vocabulary) ? 'selected' : '' }}>Select Score</option>
                                                    <!-- Display the selected value for both teachers/admins and students -->
                                                    @for ($i = 1; $i <= 5; $i++)
                                                        <option value="{{ $i }}" 
                                                            {{ ($assignmentquestion->assignment->summarise ?? '') == $i ? 'selected' : '' }}>
                                                            {{ $i }}
                                                        </option>
                                                    @endfor
                                                </select>
                                    
                                                @error('summarise')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                
                                @endif
                                @if (
                                    $assignmentquestion->assignment['status'] == 'Pending Feedback' ||
                                        $assignmentquestion->assignment['status'] == 'Completed')
                                    <div class="card-body p-3 pt-0">
                                        <div class="mb-0 mt-1">
                                            <label class="form-label">Feedback</label>
                                            <textarea name="feedback" class="form-control form-control-solid placeholder-gray-600 fw-bold fs-4 ps-9 pt-7"
                                                rows="6"
                                                {{ !(
                                                    $assignmentquestion->assignment['status'] === 'Pending Feedback' &&
                                                    (Auth::user()->role === 'teacher' || Auth::user()->role === 'admin')
                                                )
                                                    ? 'disabled'
                                                    : '' }}>{{ $assignmentquestion->assignment['feedback'] ?? '' }}</textarea>
                                        </div>
                                    </div>
                                    @if (
                                        $assignmentquestion->assignment['status'] == 'Pending Feedback' &&
                                            (Auth::user()->role == 'teacher' || Auth::user()->role == 'admin'))
                                        <button type="submit" class="btn btn-primary float-end mt-5">Submit</button>
                                    @endif
                                @endif
                                @if ($assignmentquestion->assignment['status'] == 'Not Completed')
                                    <button type="submit" class="btn btn-primary float-end mt-5">Submit</button>
                                @endif
                            </div>
                        </div>
                    </div>
                    <!--end::Row-->

            </div>
            <!--end::Content container-->
        </div>
        <!--end::Content-->


    @endsection
