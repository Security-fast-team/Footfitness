@extends('backend.layouts.app')

@section('title', 'Product Management')

@push('third_party_stylesheets')
    <link href="{{ asset('assets/backend/js/DataTable/datatables.min.css') }}" rel="stylesheet">
@endpush

@push('page_css')
@endpush

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-12">
                <span class="float-right mb-2"><a href="{{route('product.index')}}" class="btn btn-info btn-sm"><h4>Back</h4></a></span>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Gallery images</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <img src="{{ URL::to($data->photo) }}" class="mr-2 mb-2" style="width:250px" alt="">
                                @foreach($data->productGallery as $image)
                                    <img src="{{ URL::to($image->img) }}" class="mr-2 mb-2" style="width:250px" alt="">
                                @endforeach
                            </td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </div>

@endsection



@push('third_party_scripts')
    <script src="{{ asset('assets/backend/js/DataTable/datatables.min.js') }}"></script>
@endpush

@push('page_scripts')
    <script>
        $(document).ready(function() {
            $('#table').DataTable({
                dom: 'Bfrtip',
                buttons: [{
                    extend: 'pdfHtml5',
                    title: 'District Management',
                    download: 'open',
                    orientation: 'potrait',
                    pagesize: 'LETTER',
                    exportOptions: {
                        columns: [0, 1, 2]
                    }
                },
                    {
                        extend: 'print',
                        exportOptions: {
                            columns: [0, 1, 2]
                        }
                    }, 'pageLength'
                ]
            });
        });
    </script>
@endpush
