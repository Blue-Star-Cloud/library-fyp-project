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
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Create
                        Book</h1>
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
                            <a href={{ route('books') }} class="text-muted text-hover-primary">Books</a>
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
                @if (empty($book))
                    <form action="{{ route('bookstore') }}" method="POST" enctype="multipart/form-data">
                    @else
                        <form action="{{ route('updatebook') }}" method="POST" enctype="multipart/form-data">
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
                                            <input hidden type="text" name="id" value="{{ $book->id ?? '' }}"
                                                class="form-control form-control-solid">
                                            <!--begin::Col-->
                                            <div class="col-md-6 fv-row mb-5">
                                                <label class="form-label">Publisher</label>
                                                <input type="text" name="publisher" value="{{ $book->publisher ?? '' }}"
                                                    id="inputPublisher"
                                                    class="form-control form-control-solid @error('publisher') is-invalid @enderror">
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
                                                <input type="text" name="title" value="{{ $book->title ?? '' }}"
                                                    id="inputTitle"
                                                    class="form-control form-control-solid @error('title') is-invalid @enderror">
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
                                                <input type="text" name="author" value="{{ $book->author ?? '' }}"
                                                    id="inputAuthor"
                                                    class="form-control form-control-solid @error('author') is-invalid @enderror">
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
                                                <select name="genre[]" class="form-select form-select-solid"
                                                    data-control="select2" multiple size="4" required>
                                                    <option value="1" disabled>Select Genre</option>
                                                    @foreach ($genrelist as $genre)
                                                        <option value="{{ $genre->id }}"
                                                            @if (isset($book) && $book?->genres?->pluck('id')->contains($genre->id)) selected @endif>
                                                            {{ $genre->genre_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-md-6 fv-row mb-5">
                                                <label class="form-label">Category</label>
                                                <select name="category" id="inputQuestionType" class="form-select form-select-solid" required>
                                                    <option disabled {{ empty($book) ? 'selected' : '' }}>Select Category</option>
                                                    <option value="Fiction" {{ !empty($book) && $book['category'] == 'Fiction' ? 'selected' : '' }}>Fiction</option>
                                                    <option value="Non-Fiction" {{ !empty($book) && $book['category'] == 'Non-Fiction' ? 'selected' : '' }}>Non-Fiction</option>
                                                </select>
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
                                                <input type="text" name="description"
                                                    value="{{ $book->description ?? '' }}" id="inputDescription"
                                                    class="form-control form-control-solid @error('description') is-invalid @enderror">
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
                                                <select name="or_level" id="inputOrLevel"
														class="form-select form-select-solid @error('or_level') is-invalid @enderror"
														required
														oninvalid="this.setCustomValidity('Please select an OR level')"
														oninput="this.setCustomValidity('')">

														<option value="" disabled {{ empty($book->or_level) ? 'selected' : '' }}>
															Select OR Level
														</option>

														@for ($i = 1; $i <= 20; $i++)
															<option value="{{ $i }}"
																{{ (isset($book->or_level) && $book->or_level == $i) ? 'selected' : '' }}>
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
                                            <div class="col-md-12 fv-row mb-5">
                                                <label class="form-label">Content</label>
                                                <textarea rows="6" name="content" required id="inputContent"
                                                    class="form-control form-control-solid @error('content') is-invalid @enderror">{{ $book->content ?? '' }}</textarea>
                                                @error('content')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-md-12 fv-row mb-5">
                                                <label class="form-label">Image</label>
                                                <input name="image" type="file" name="image"
                                                    class="form-control form-control-solid" required>
                                                    @error('image')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <!--end::Col-->
                                            <div class="mb-0 mt-1">
                                                <!--begin::Submit-->
                                                <button type="submit"
                                                    class="btn btn-primary float-end mt-5">Submit</button>
                                                <a href="{{ route('users') }}" class="btn btn-warning">Cancel</a>
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
