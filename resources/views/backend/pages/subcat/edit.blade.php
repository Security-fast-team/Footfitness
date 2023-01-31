@extends('backend.layouts.app')

@section('title', 'Sub-category Management')

@push('third_party_stylesheets')
@endpush

@push('page_css')
@endpush

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <span class="float-left">
                            <h4>Update Sub-category</h4>
                        </span>
                        <span class="float-right">
                            <a href="{{ route('subcat.index') }}" class="btn btn-info">Back</a>
                        </span>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-10 m-auto">
                                <form method="post" action="{{ route('subcat.update', $subcat->id) }}">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" name="id" value="{{ $subcat->id }}">
                                    <div class="form-group">
                                        <label for="cat_id" class="col-form-label">Category <span
                                                class="text-danger">*</span></label>
                                        <select name="cat_id" id="cat_id" class="form-control">
                                            <option value="" hidden>Select Category</option>
                                            @foreach ($cats as $cat)
                                                <option value="{{ $cat->id }}"
                                                    @if ($cat->id == $subcat->cat_id) selected @endif>{{ $cat->title }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('cat_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="inputTitle" class="col-form-label">Title <span
                                                class="text-danger">*</span></label>
                                        <input id="inputTitle" type="text" name="title" placeholder="Enter title"
                                            value="{{ $subcat->title }}" class="form-control">
                                        @error('title')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="img" class="col-form-label">Sub-category Logo <span
                                                class="text-danger">*</span></label>
                                        <input id="img" type="file" name="img" placeholder="Enter logo"
                                            value="{{ $subcat->img }}" class="form-control">
                                        @error('img')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="status" class="col-form-label">Status <span
                                                class="text-danger">*</span></label>
                                        <select name="status" class="form-control">
                                            <option value="active" {{ $subcat->status == 'active' ? 'selected' : '' }}>
                                                Active</option>
                                            <option value="inactive" {{ $subcat->status == 'inactive' ? 'selected' : '' }}>
                                                Inactive</option>
                                        </select>
                                        @error('status')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <button class="btn btn-success" type="submit">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('third_party_scripts')
    <script src="{{ asset('assets/js/DataTable/datatables.min.js') }}"></script>
@endpush

@push('page_scripts')
    <script></script>
@endpush
