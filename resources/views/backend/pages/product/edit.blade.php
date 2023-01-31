@extends('backend.layouts.app')

@section('title', 'Product Management')

@push('third_party_stylesheets')
    <link rel="stylesheet" href="{{ asset('assets/backend/library/summernote/summernote.min.css') }}">
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
                            <h4>Update Product</h4>
                        </span>
                        <span class="float-right">
                            <a href="{{ route('product.index') }}" class="btn btn-info">Back</a>
                        </span>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-10 m-auto">
                                <form method="post" action="{{ route('product.update', $product->id) }}"
                                    enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    @method('PUT')
                                    <div class="form-group">
                                        <label for="inputTitle" class="col-form-label">Title <span
                                                class="text-danger">*</span></label>
                                        <input id="inputTitle" type="text" name="title" placeholder="Enter title"
                                            value="{{ $product->title }}" class="form-control">
                                        @error('title')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="sku" class="col-form-label">Sku number <span
                                                class="text-danger">*</span></label>
                                        <input id="sku" type="text" name="sku" placeholder="Enter sku number"
                                               value="{{ $product->sku }}" class="form-control">
                                        @error('sku')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="summary" class="col-form-label">Why this product <span
                                                class="text-danger">*</span></label>
                                        <textarea class="form-control" id="summary" name="summary">{!! $product->summary !!}</textarea>
                                        @error('summary')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="description" class="col-form-label">Description</label>
                                        <textarea class="form-control" id="description" name="description">{!! $product->description !!}</textarea>
                                        @error('description')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="cat_id">Category <span class="text-danger">*</span></label>
                                        <select name="cat_id" id="cat_id" class="form-control">
                                            <option value="">--Select any category--</option>
                                            @foreach ($categories as $key => $cat_data)
                                                <option value='{{ $cat_data->id }}'
                                                    @if ($cat_data->id == $product->cat_info->id) selected @endif>
                                                    {{ $cat_data->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="price" class="col-form-label">Price(TK) <span
                                                class="text-danger">*</span></label>
                                        <input id="price" type="number" name="price" placeholder="Enter price"
                                            value="{{ $product->price }}" class="form-control">
                                        @error('price')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="discounts" class="col-form-label">Discount(amount)</label>
                                        <input id="discounts" type="number" name="discount" min="0"
                                            placeholder="Enter discount" value="{{ $product->discount }}"
                                            class="form-control">
                                        @error('discount')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="brand_id">Brand</label>
                                        {{-- {{$brands}} --}}

                                        <select name="brand_id" class="form-control">
                                            <option value="">--Select Brand--</option>
                                            @foreach ($brands as $brand)
                                                <option value="{{ $brand->id }}"
                                                    @if ($brand->id == 258) selected @endif>{{ $brand->title }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="condition">Condition</label>
                                        <select name="condition" class="form-control">
                                            <option value="">--Select Condition--</option>
                                            <option value="default" @if ($product->condition == 'default') selected @endif>
                                                Default</option>
                                            <option value="new" @if ($product->condition == 'new') selected @endif>New
                                            </option>
                                            <option value="hot" @if ($product->condition == 'hot') selected @endif>Hot
                                            </option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="stock">In stock <span class="text-danger">*</span></label>
                                        <input id="quantity" type="number" name="stock" min="0"
                                            placeholder="Enter quantity" value="{{ $product->stock }}"
                                            class="form-control">
                                        @error('stock')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="inputPhoto" class="col-form-label">Photo <span
                                                class="text-danger">*</span></label>
                                        <input id="photo" type="file" name="photo"
                                            placeholder="Enter Product Photo" value="{{ $product->photo }}"
                                            class="form-control">
                                        <div id="holder" style="margin-top:15px;max-height:100px;"></div>
                                        @error('photo')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="inputPhoto" class="col-form-label">Product gallery<span
                                                class="text-danger">*</span></label>
                                        <input id="photo" type="file" name="product_gallery[]" multiple
                                               placeholder="Enter Product gallery" value="{{ $product->product_gallery }}"
                                               class="form-control">
                                        <div id="holder" style="margin-top:15px;max-height:100px;"></div>
                                        @error('product_gallery')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="status" class="col-form-label">Status <span
                                                class="text-danger">*</span></label>
                                        <select name="status" class="form-control">
                                            <option value="active">Active</option>
                                            <option value="inactive">Inactive</option>
                                        </select>
                                        @error('status')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <button type="reset" class="btn btn-warning">Reset</button>
                                        <button class="btn btn-success" type="submit">Submit</button>
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
    <script src="{{ asset('assets/backend/library/summernote/summernote.min.js') }}"></script>
@endpush

@push('page_scripts')
    <script>
        $(document).ready(function() {
            $('#summary').summernote({
                placeholder: "Write short description.....",
                tabsize: 2,
                height: 100
            });
        });

        $(document).ready(function() {
            $('#description').summernote({
                placeholder: "Write detail description.....",
                tabsize: 2,
                height: 150
            });
        });
    </script>
@endpush
