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
				<h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Review Form</h1>
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
						<a href={{route("reviews")}} class="text-muted text-hover-primary">Review</a>
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
							{{-- @if (empty($question)) --}}
							<form action="{{route('reviewstore')}}" method="POST">
							{{-- @else
							<form action="{{route('updatequestion')}}" method="POST">
							@endif --}}
							@csrf
                            <!--begin::Row-->
                            <div class="row g-5 g-xl-10">
                                <div class="col-xl-12">
                                    <div class="card ">
										<div class="card-header align-items-center px-3 min-h-50px">
											<h3 class=" mb-0">Create Review</h3>
										</div>
										<div class="card-body p-3 pt-0">
											<input hidden type="text" name="id" value="{{$review->id ?? ''}}" class="form-control form-control-solid">
											<input hidden type="text" name="student_id" value="{{$student['id']}}" class="form-control form-control-solid">
											<div class="row">
												<!--begin::Col-->
												<div class="col-md-6 fv-row mb-5">
													<label class="form-label">Book:</label>
													<select name="book_id"class="form-select form-select-solid">
														<option value="{{$student->book->id}}" selected="selected">{{$student->book->title}}</option>
														@foreach($bookslist as $book)
														<option value="{{$book_id = $book->id}}">{{ $book->title }}</option>
														@endforeach
													</select>
												</div>
												<!--end::Col-->
												<!--begin::Col-->
												<div class="col-md-6 fv-row mb-5">
													<label class="form-label">Rating</label>
													<input name="rating" id="inputRating" value="{{$review->rating ?? ''}}" type="text" class="form-control form-control-solid">
												</div>
												<!--end::Col-->
												<div class="mb-0 mt-1">
													<label class="form-label">Comment</label>
													<textarea name="comment_text" id="inputCommentText" class="form-control form-control-solid placeholder-gray-600 fw-bold fs-4 ps-9 pt-7" rows="6" name="message">{{$review->comment_text ?? ''}}</textarea>
													<!--begin::Submit-->
													<button type="submit" class="btn btn-primary float-end mt-5">Submit</button>
													<!--end::Submit-->
												</div>
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