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
				<h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Student Information</h1>
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
					    <a href={{route("teacherusers")}} class="text-muted text-hover-primary">Teachers</a>
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
                <a href="#" class="btn btn-sm fw-bold btn-info"><i class="fa-duotone fa-download me-1 fs-4"></i>Export</a>
                <!--end:: Export-->
            </div>
	   
		</div>
		<!--end::Toolbar container-->

	</div>


	
	<!--begin::Content-->
	<div id="kt_app_content" class="app-content flex-column-fluid">
		<!--begin::Content container-->
		<div id="kt_app_content_container" class="">
			@if (empty($book))
				<form action="{{route('bookstore')}}" method="POST">
			@else
				<form action="{{route('updatebook')}}" method="POST">
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
															<h3 class=" mb-0">Create Book</h3>
														</div>
														<div class="card-body p-3 pt-0">
															<div class="row">
																<!--begin::Col-->
																<input hidden type="text" name="id" value="{{$book->id ?? ''}}" class="form-control form-control-solid">
																<!--begin::Col-->
																<div class="col-md-6 fv-row mb-5">
																	<label class="form-label">Publisher</label>
																	<input type="text" name="publisher" value="{{$book->publisher ?? ''}}" id="inputPublisher" class="form-control form-control-solid @error('publisher') is-invalid @enderror">
																	@error('publisher')
																	<span class="invalid-feedback" role="alert">
																		<strong>{{ $message }}</strong>
																	</span>
																@enderror
																</div>
																<!--end::Col-->
																<!--begin::Col-->
																<div class="col-md-6 fv-row mb-5">
																	<label class="form-label">Title</label>
																	<input type="text" name="title" value="{{$book->title ?? ''}}" id="inputTitle" class="form-control form-control-solid @error('title') is-invalid @enderror">
																	@error('title')
																	<span class="invalid-feedback" role="alert">
																		<strong>{{ $message }}</strong>
																	</span>
																@enderror
																</div>
																<!--end::Col-->
																<!--begin::Col-->
																<div class="col-md-6 fv-row mb-5">
																	<label class="form-label">Author</label>
																	<input type="text" name="author" value="{{$book->author ?? ''}}" id="inputAuthor" class="form-control form-control-solid @error('author') is-invalid @enderror">
																	@error('author')
																	<span class="invalid-feedback" role="alert">
																		<strong>{{ $message }}</strong>
																	</span>
																@enderror
																</div>
																<!--end::Col-->
																<!--begin::Col-->
																<div class="col-md-6 fv-row mb-5">
																	<label class="form-label">Genre</label>
																	<input type="text" name="genre" value="{{$book->genre ?? ''}}" id="inputGenre" class="form-control form-control-solid @error('genre') is-invalid @enderror">
																	@error('genre')
																	<span class="invalid-feedback" role="alert">
																		<strong>{{ $message }}</strong>
																	</span>
																@enderror
																</div>
																<!--end::Col-->
																<!--begin::Col-->
																<div class="col-md-6 fv-row mb-5">
																	<label class="form-label">Category</label>
																	<input type="text" name="category" value="{{$book->category ?? ''}}" id="inputCategory" class="form-control form-control-solid @error('category') is-invalid @enderror">
																	@error('category')
																	<span class="invalid-feedback" role="alert">
																		<strong>{{ $message }}</strong>
																	</span>
																@enderror
																</div>
																<!--end::Col-->
																<!--begin::Col-->
																<div class="col-md-6 fv-row mb-5">
																	<label class="form-label">Description</label>
																	<input type="text" name="description" value="{{$book->description ?? ''}}" id="inputDescription" class="form-control form-control-solid @error('description') is-invalid @enderror">
																	@error('description')
																	<span class="invalid-feedback" role="alert">
																		<strong>{{ $message }}</strong>
																	</span>
																@enderror
																</div>
																<!--end::Col-->

																<!--begin::Col-->
																<div class="col-md-6 fv-row mb-5">
																	<label class="form-label">OR Level</label>
																	<input type="text" name="or_level" value="{{$book->or_level ?? ''}}"  id="inputOrLevel" class="form-control form-control-solid @error('or_level') is-invalid @enderror">
																	@error('or_level')
																		<span class="invalid-feedback" role="alert">
																			<strong>{{ $message }}</strong>
																		</span>
																	@enderror
																</div>
																<!--end::Col-->
															<div class="mb-0 mt-1">
																<!--begin::Submit-->
																<button type="submit" class="btn btn-primary float-end mt-5">Submit</button>
																<a href="{{route('users')}}" class="btn btn-warning">Cancel</a>
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