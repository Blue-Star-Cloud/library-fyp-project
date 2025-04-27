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
						<a href={{route("users")}} class="text-muted text-hover-primary">Students</a>
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
			@if (empty($user))
			<form action="{{route('store')}}" method="POST">
				@else
				<form action="{{route('update')}}" method="POST">
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
											<h3 class=" mb-0">Create Student</h3>
										</div>
										<div class="card-body p-3 pt-0">
											<div class="row">
												<!--begin::Col-->
												<input hidden type="text" name="id" value="{{$user->id ?? ''}}" class="form-control form-control-solid">
												<div class="col-md-6 fv-row mb-5">
													<label class="form-label">User Name</label>
													<input type="text" name="name" value="{{$user->name ?? ''}}" id="inputName" class="form-control form-control-solid @error('name') is-invalid @enderror">
													@error('name')
													<span class="invalid-feedback" role="alert">
														<strong>{{ $message }}</strong>
													</span>
													@enderror
												</div>
												<!--end::Col-->
												@if (empty($user))
												<div class="col-md-6 fv-row mb-5">
													<label class="form-label">Email</label>
													<input type="text" name="email" id="inputEmail" class="form-control form-control-solid @error('email') is-invalid @enderror">
													@error('email')
													<span class="invalid-feedback" role="alert">
														<strong>{{ $message }}</strong>
													</span>
													@enderror
												</div>
												<div class="col-md-6 fv-row mb-5">
													<label class="form-label">Password</label>
													<input type="text" name="password" id="inputPassword" class="form-control form-control-solid @error('password') is-invalid @enderror">
													@error('password')
													<span class="invalid-feedback" role="alert">
														<strong>{{ $message }}</strong>
													</span>
													<span class="invalid-feedback" role="alert">
														The password must have one uppercase letter, one number, a special case character and must be minimum 8 letters length
													</span>
													@enderror
												</div>
												@endif
												<!--begin::Col-->
												<div class="col-md-6 fv-row mb-5">
													<label class="form-label">OR Level</label>
													<select name="or_level" id="inputOrLevel"
														class="form-select form-select-solid @error('or_level') is-invalid @enderror"
														required
														oninvalid="this.setCustomValidity('Please select an OR level')"
														oninput="this.setCustomValidity('')">

														<option value="" disabled {{ empty($user->or_level) ? 'selected' : '' }}>
															Select OR Level
														</option>

														@for ($i = 1; $i <= 20; $i++)
															<option value="{{ $i }}"
																{{ (isset($user->or_level) && $user->or_level == $i) ? 'selected' : '' }}>
																{{ $i }}
															</option>
														@endfor
													</select>
													@error('or_level')
														<span class="invalid-feedback" role="alert">
															<strong>{{ $message }}</strong>
														</span>
													@enderror
												</div>
												<!--end::Col-->
												<!--begin::Col-->
												<div class="col-md-6 fv-row mb-5">
													<label class="form-label">Class</label>
													<select name="assigned_class" id="inputClass" class="form-select form-select-solid @error('assigned_class') is-invalid @enderror">
														<option value="" disabled selected>Select Class</option>
														@foreach($classes as $class)
															<option value="{{ $class->id }}" {{ ($user->class->id ?? '') == $class->id ? 'selected' : '' }}>
																{{ $class->class_name }}
															</option>
														@endforeach
													</select>
													@error('assigned_class')
														<span class="invalid-feedback" role="alert">
															<strong>{{ $message }}</strong>
														</span>
													@enderror
												</div>
												<!--end::Col-->
												<!--begin::Col-->

												<div class="col-md-6 fv-row mb-5">
													<label class="form-label">Interests</label>
													<select name="genre[]" class="form-select form-select-solid" data-control="select2" multiple size="4" required>
														<option value="1" disabled>Select Interests</option>
														@foreach ($genrelist as $genre)
															<option value="{{ $genre->id }}"
																@if (isset($user) && $user->genre->pluck('id')->contains($genre->id)) selected @endif>
																{{ $genre->genre_name }}
															</option>
														@endforeach
													</select>
												</div>
												<!--end::Col-->
												<!--begin::Col-->
												<div class="col-md-6 fv-row mb-5">
													<label class="form-label">Date Of Birth</label>
													<input type="date" name="date_of_birth" value="{{$user->date_of_birth ?? ''}}" id="inputDateOfBirth" class="form-control form-control-solid @error('date_of_birth') is-invalid @enderror">
													@error('date_of_birth')
													<span class="invalid-feedback" role="alert">
														<strong>{{ $message }}</strong>
													</span>
													@enderror
												</div>
												<!--end::Col-->
												<!--begin::Col-->
												<select hidden name="role" class="form-select form-select-solid">
													<option value="student" selected="selected">Student</option>
												</select>
												<!--end::Col-->
											</div>
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