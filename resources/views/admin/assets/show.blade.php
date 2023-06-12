@extends('admin.components.master')

@section('content')

    <div class="container-fluid dashboard-content ">

        <!-- pageheader  -->
        @section('page_title')
            Assets
        @endsection

        @section('page_name')
            Assets List
        @endsection
        <!-- end pageheader  -->

        <div class="row">
            <!-- ============================================================== -->
            <!-- basic table  -->
            <!-- ============================================================== -->
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <h5 class="card-header">Assets List</h5>
                    <div class="card-body">
                        @include('admin.includes.message')
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered first" id="assetTableData">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Number</th>
                                        <th>Description</th>
                                        <th>Type</th>
                                        <th>Brand</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($allAssets as $key => $asset)
                                    <tr>
                                        <td>{{++$key}}</td>
                                        <td>{{$asset->asset_name}}</td>
                                        <td>{{$asset->asset_number}}</td>
                                        <td>{{$asset->asset_description}}</td>
                                        <td>{{$asset->asset_type}}</td>
                                        <td>{{$asset->brand_name}}</td>
                                        <td>
                                            <a href="{{route('admin.assets.edit', $asset->id)}}" class="btn btn-sm btn-info"><i class="fas fa-edit"></i></a>
                                            <form action="{{ route('admin.assets.delete') }}" method="post">
                                                {{csrf_field()}}
                                                @method('delete')
                                                <input type="hidden" name="id" value="{{$asset->id}}">
                                                <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Number</th>
                                        <th>Description</th>
                                        <th>Type</th>
                                        <th>Brand</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end basic table  -->
            <!-- ============================================================== -->
        </div>

    </div>

@endsection

@section('scripts')
    <script>

        $(document).ready(function() {
            // SHOW OTHER OPTION ON ASSET TYPE CHANGE
            $('#asset_type_update').on('change', function() {
                if($(this).val() == 'Other') {

                    var other = $('#asset_other_type').val();
                    $otherContent =
                        `<div class="form-group">
                        <label for="otherAsset" class="col-form-label">Enter Asset type: </label>
                        <span class="text-danger">*</span>
                        <input id="otherAsset" type="text" class="form-control" name="otherAsset" required placeholder="Enter Asset" value="${other}">
                    </div>`;

                    $('#otherAssets').html($otherContent);

                }else{
                    $otherContent = '';
                }
                $('#otherAssets').html($otherContent);
            })

        });

    </script>
@endsection
