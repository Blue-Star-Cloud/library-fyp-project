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
				<h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Notes Form</h1>
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
						<a href={{route("notes")}} class="text-muted text-hover-primary">Notes</a>
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
			<form action="{{route('notestore')}}" method="POST">
				@else
				<form action="{{route('updatenote')}}" method="POST">
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
									<input hidden type="text" name="id" value="{{$note->id ?? ''}}" class="form-control form-control-solid">
									<div class="row">
										<!--begin::Col-->
										<div class="col-md-6 fv-row mb-5">
											<label class="form-label">Title</label>
											<input name="title" id="inputTitle" required value="{{$note->title ?? ''}}" type="text" class="form-control form-control-solid">
										</div>
										<!--end::Col-->
										<!--begin::Col-->
										<div class="col-md-6 fv-row mb-5">
											<label class="form-label">Date</label>
											<input readonly="readonly" type="date" name="date" value="{{ date('Y-m-d') }}" id="date" class="form-control form-control-solid">
										</div>
										<!--end::Col-->
										<!--begin::Col-->
										<div class="col-md-6 fv-row mb-5">
											<label class="form-label">Assign To</label>
											@if (empty($note))
											<select id="student" name="student_id" required class="form-select form-select-solid">
												<option value="1" selected="selected">Student Name</option>
												@foreach($userslist as $user)
												@if($user->role =='student')
												<option data-class-id="{{ $user->assigned_class }}"  value="{{$student_id = $user->id}}">{{ $user->name }}</option>
												@endif
												@endforeach
											</select>
											@else
											<select id="student" name="student_id" required class="form-select form-select-solid">
												<option data-class-id="{{ $note->student->assigned_class ?? '' }}" value="{{$student_id = $note->student_id}}" selected="selected">{{$note->student->name}}</option>
											</select>
											@endif
										</div>
										<input type="hidden" id="class_id" name="class_id" value="{{ $note->student_class_id ?? '' }}"/>

										<div class="col-md-6 fv-row mb-5">
											<label class="form-label">Class Notes</label>
											<select id="notes" name="note_id" class="form-select form-select-solid">
												<option value="1" selected="selected">Class Note Name</option>

											</select>

										</div>

										<div class="col-md-6 fv-row mb-5">
											<label class="form-label">Assignment</label>
											<select id="assignments" name="assignment_id" class="form-select form-select-solid">
												<option value="1" selected="selected">Assignment Name</option>

											</select>

										</div>
										<!--end::Col-->
										<!--begin::Col-->
										<input hidden name="teacher_id" id="teacher_id" class="form-select form-select-solid" value="{{Auth::id()}}">
										<!--end::Col-->

										
									</div>

									<div class="row mt-4">
										<div class="col-md-6">
											<div id="topic-details-card" class="card shadow-sm" style="display:none;">
												<div class="card-header">
													<h3 class="card-title">Topic Details</h3>
												</div>
												<div class="card-body" id="topic-details-content">
													<!-- Dynamic content here -->
												</div>
											</div>
										</div>

										<div class="col-md-6">
											<div id="assignment-details-card" class="card shadow-sm" style="display:none;">
												<div class="card-header">
													<h3 class="card-title">Assignment Details</h3>
												</div>
												<div class="card-body" id="assignment-details-content">
													<!-- Dynamic content here -->
												</div>
											</div>
										</div>
									</div>

									<br>
									<hr>
									<div class="mb-0 mt-1">
										<label class="form-label">Objective Comments</label>
										<textarea name="objectives_comments" id="inputObjectivesComments" class="form-control form-control-solid placeholder-gray-600 fw-bold fs-4 ps-9 pt-7" required rows="6" name="message">{{$note->objectives_comments ?? ''}}</textarea>
									</div>
									<div class="mb-0 mt-1">
										<label class="form-label">Reading Ability</label>
										<textarea name="reading_ability_progress" id="inputReadingAbilityProgress" class="form-control form-control-solid placeholder-gray-600 fw-bold fs-4 ps-9 pt-7" required rows="6" name="message">{{$note->reading_ability_progress ?? ''}}</textarea>
									</div>
									<div class="mb-0 mt-1">
										<label class="form-label">Reading Comprehension</label>
										<textarea name="vipers_progress" id="inputVipersProgress" class="form-control form-control-solid placeholder-gray-600 fw-bold fs-4 ps-9 pt-7" required rows="6" name="message">{{$note->vipers_progress ?? ''}}</textarea>
									</div>
									<div class="mb-0 mt-1">
										<label class="form-label">Recommendation</label>
										<select name="class_objectives" id="inputClassObjectives"
											class="form-select form-select-solid @error('vocabulary') is-invalid @enderror"
											{{ !(Auth::user()->role === 'teacher' || Auth::user()->role === 'admin') ? 'disabled' : '' }}
											required
											oninvalid="this.setCustomValidity('Please select a score')"
											oninput="this.setCustomValidity('')">

											<!-- Default "Select Option" -->
											<option value="" disabled {{ !($note->class_objectives ?? '') ? 'selected' : '' }}>Select Option</option>

											<!-- Option for 'Move up' -->
											<option value="move_up" {{ ($note->class_objectives ?? '') == 'move_up' ? 'selected' : '' }}>Move up</option>

											<!-- Option for 'Move down' -->
											<option value="move_down" {{ ($note->class_objectives ?? '') == 'move_down' ? 'selected' : '' }}>Move down</option>

											<!-- Option for 'Maintain' -->
											<option value="maintain" {{ ($note->class_objectives ?? '') == 'maintain' ? 'selected' : '' }}>Maintain</option>

										</select>

										@error('vocabulary')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
										@enderror
									</div>
									<!--begin::Submit-->
									<button type="submit" class="btn btn-primary float-end mt-5">Submit</button>
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

@section('scripts')

<script>
	$(document).ready(function() {

$('#student').change(function() {
	let studentId = $(this).val();
	let classId = $(this).find(':selected').data('class-id');
	
	$('#class_id').val(classId); // Set hidden class_id input


	if (studentId) {
		// Fetch Notes
		$.ajax({
			url: `/notes/${classId}`,
			type: 'GET',
			success: function(data) {
				$('#notes').empty().append('<option value="">Select Note</option>');
				data.forEach(function(note) {
					$('#notes').append(`<option value="${note.id}">${note.title}</option>`);
				});
				$('#notes').prop('disabled', false);
			}
		});

		// Fetch Assignments
		$.ajax({
			url: `/assignments/${studentId}`,
			type: 'GET',
			success: function(data) {
				$('#assignments').empty().append('<option value="">Select Assignment</option>');
				data.forEach(function(assignment) {
					$('#assignments').append(`<option value="${assignment.id}">${assignment.name}</option>`);
				});
				$('#assignments').prop('disabled', false);
			}
		});
	} else {
		$('#notes').prop('disabled', true).empty();
		$('#assignments').prop('disabled', true).empty();
	}

	// Clear details
	$('#topic-details').empty();
	$('#assignment-details').empty();
});

$('#topic-details-card').hide();
    $('#assignment-details-card').hide();

    $('#notes').change(function() {
        let noteId = $(this).val();
        if (noteId) {
            $.ajax({
                url: `/note-detail/${noteId}`,
                type: 'GET',
                success: function(data) {
                    $('#topic-details-content').html(`
                        <div class="mb-2"><strong>Topic:</strong> ${data.class_topics}</div>
                        <div><strong>Objective:</strong> ${data.class_objectives}</div>
                    `);
                    $('#topic-details-card').fadeIn();
                }
            });
        } else {
            $('#topic-details-card').fadeOut();
            $('#topic-details-content').empty();
        }
    });

    $('#assignments').change(function() {
        let assignmentId = $(this).val();
        if (assignmentId) {
            $.ajax({
                url: `/assignment-detail/${assignmentId}`,
                type: 'GET',
                success: function(data) {
                    $('#assignment-details-content').html(`
                        <div class="mb-2"><strong>Feedback:</strong> ${data.feedback}</div>
                        <div class="mb-2"><strong>Vocabulary:</strong> ${data.vocabulary}</div>
                        <div class="mb-2"><strong>Inference:</strong> ${data.inference}</div>
                        <div class="mb-2"><strong>Prediction:</strong> ${data.prediction}</div>
                        <div class="mb-2"><strong>Explanation:</strong> ${data.explanation}</div>
                        <div class="mb-2"><strong>Retrieval:</strong> ${data.retrieval}</div>
                        <div><strong>Summarise:</strong> ${data.summarise}</div>
                    `);
                    $('#assignment-details-card').fadeIn();
                }
            });
        } else {
            $('#assignment-details-card').fadeOut();
            $('#assignment-details-content').empty();
        }
    });


});



$(document).ready(function() {
    let selectedNoteId = '{{ $note->class_notes_id ?? '' }}';
    let selectedAssignmentId = '{{ $note->assignment_id ?? '' }}';
    let classId = $('#student option:selected').data('class-id');
    let studentId = $('#student').val();

    $('#class_id').val(classId);

    if (studentId) {
        // Load Notes for Class
        $.ajax({
            url: `/notes/${classId}`,
            type: 'GET',
            success: function(data) {
                $('#notes').empty().append('<option value="">Select Note</option>');
                data.forEach(function(note) {
                    $('#notes').append(`<option value="${note.id}" ${note.id == selectedNoteId ? 'selected' : ''}>${note.title}</option>`);
                });
            }
        });

        // Load Assignments for Student
        $.ajax({
            url: `/assignments/${studentId}`,
            type: 'GET',
            success: function(data) {
                $('#assignments').empty().append('<option value="">Select Assignment</option>');
                data.forEach(function(assignment) {
                    $('#assignments').append(`<option value="${assignment.id}" ${assignment.id == selectedAssignmentId ? 'selected' : ''}>${assignment.name}</option>`);
                });
            }
        });

		if (selectedNoteId) {
            $.ajax({
                url: `/note-detail/${selectedNoteId}`,
                type: 'GET',
                success: function(data) {
                    $('#topic-details-content').html(`
                        <div class="mb-2"><strong>Topic:</strong> ${data.class_topics}</div>
                        <div><strong>Objective:</strong> ${data.class_objectives}</div>
                    `);
                    $('#topic-details-card').fadeIn();
                }
            });
        } else {
            $('#topic-details-card').fadeOut();
            $('#topic-details-content').empty();
        }

		if (selectedAssignmentId) {
            $.ajax({
                url: `/assignment-detail/${selectedAssignmentId}`,
                type: 'GET',
                success: function(data) {
                    $('#assignment-details-content').html(`
                        <div class="mb-2"><strong>Feedback:</strong> ${data.feedback}</div>
                        <div class="mb-2"><strong>Vocabulary:</strong> ${data.vocabulary}</div>
                        <div class="mb-2"><strong>Inference:</strong> ${data.inference}</div>
                        <div class="mb-2"><strong>Prediction:</strong> ${data.prediction}</div>
                        <div class="mb-2"><strong>Explanation:</strong> ${data.explanation}</div>
                        <div class="mb-2"><strong>Retrieval:</strong> ${data.retrieval}</div>
                        <div><strong>Summarise:</strong> ${data.summarise}</div>
                    `);
                    $('#assignment-details-card').fadeIn();
                }
            });
        } else {
            $('#assignment-details-card').fadeOut();
            $('#assignment-details-content').empty();
        }
    }

	// $('#topic-details-card').hide();
    // $('#assignment-details-card').hide();

   
    // Same change event handlers to reload notes/assignments if someone changes student
});

</script>



@endsection