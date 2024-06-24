@extends('admin.admin_dashboard')
@section('admin')
<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Brand</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">all</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                <a href="{{ route('add.brand') }}" type="button" class="btn btn-primary">Add Brand</a>
            </div>
        </div>
    </div>
    <!--end breadcrumb-->
    <h6 class="mb-0 text-uppercase">Brands</h6>
    <hr/>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Brand name</th>
                            <th>Brand image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($brands as $key => $item)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $item->brand_name }}</td>
                            <td><img src="{{ asset($item->brand_image) }}" style="width: 70px;height:40px" alt=""></td>
                            <td>
                                <a href="" class="btn btn-success btn-xs"><i class="bx bx-edit"></i></a>
                                <a href="" class="btn btn-danger btn-xs"><i class="bx bx-trash"></i></a>
                            </td>

                        </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>


</div>
@endsection
@section('data_table_css')
<link href="{{ asset('adminbackend/assets/plugins/datatable/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet" />
@endsection
@section('data_table_js')
<script src="{{ asset('adminbackend/assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('adminbackend/assets/plugins/datatable/js/dataTables.bootstrap5.min.js')}}"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
      } );
</script>
<script>
    // $(document).ready(function() {
    //     var table = $('#example2').DataTable( {
    //         lengthChange: false,
    //         buttons: [ 'copy', 'excel', 'pdf', 'print']
    //     } );

    //     table.buttons().container()
    //         .appendTo( '#example2_wrapper .col-md-6:eq(0)' );
    // } );
</script>
@endsection
