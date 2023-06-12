@extends('admin.components.master')

@section('content')

        <!-- pageheader  -->
        @section('page_title')
            Assets
        @endsection

        @section('page_name')
            Add Assets
        @endsection
        <!-- end pageheader  -->

        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="section-block" id="basicform">
                    <h3 class="section-title">Assets</h3>
                </div>
                <div class="card">
                    <h5 class="card-header">Add assets</h5>
                    <div class="card-body">

                        @include('admin.includes.message')

                        <form method="post" action="{{ route('admin.assets.store') }}" enctype="multipart/form-data">

                            {{csrf_field()}}

                            <div class="form-group">
                                <label for="asset_name" class="col-form-label">Asset name: </label>
                                <span class="text-danger">*</span>
                                <input id="asset_name" type="text" class="form-control" name="asset_name" placeholder="Enter asset name" value="{{ old('asset_name') }}" required>
                                @if($errors->has('asset_name'))
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $errors->first('asset_name') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="Description">Description</label>
                                <span class="text-danger">*</span>
                                <textarea class="form-control" id="Description" rows="3" name="asset_description" required placeholder="Enter Description">{{ old('asset_description') }}</textarea>
                                @if($errors->has('asset_description'))
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $errors->first('asset_description') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="asset_type">Asset type</label>
                                <span class="text-danger">*</span>
                                <select class="form-control" id="asset_type" name="asset_type" required>
                                    <option value="">Select Asset Type</option>
                                    @foreach($assetTypes as $assetType)
                                        @if(old('asset_type') == $assetType)
                                            <option value="{{$assetType}}" selected>{{$assetType}}</option>
                                        @else
                                            <option value="{{$assetType}}">{{$assetType}}</option>
                                        @endif
                                    @endforeach
                                </select>
                                @if($errors->has('asset_type'))
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $errors->first('asset_type') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div id="otherAssets" class="d-none">
                                <div class="form-group">
                                    <label for="otherAsset" class="col-form-label">Enter Asset type: </label>
                                    <span class="text-danger">*</span>
                                    <input id="otherAsset" type="text" class="form-control" name="otherAsset" placeholder="Enter Asset" value="{{ old('otherAsset') }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="brand_name" class="col-form-label">Brand name: </label>
                                <span class="text-danger">*</span>
                                <input id="brand_name" type="text" class="form-control" name="brand_name" required placeholder="Enter brand name" value="{{ old('brand_name') }}">
                                @if($errors->has('brand_name'))
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $errors->first('brand_name') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="photos" class="col-form-label">Photos: </label>
                                <span class="text-danger">*</span>
                                <div class="custom-file mb-3">
                                    <span class="text-danger">*</span>
                                    <input type="text" name="selected_images" value="" />
                                    <input type="file" class="custom-file-input" id="photos" name="photos[]" accept="image/*" multiple>
                                    <label class="custom-file-label" for="photos" >File Input</label>
                                    <div class="selected-images">

                                    </div>
                                </div>
                                @if($errors->has('photos'))
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $errors->first('photos') }}</strong>
                                    </span>
                                @endif
                            </div>

{{--                            <input type="file" name="hh" id="">--}}

{{--                            <input type="hidden" id="hiddenInput" name="hiddenImages">--}}

{{--                            <div id="selectedImagesContainer"></div>--}}

                            <div class="form-row">
                                <div class="form-group col-lg-6">
                                    <label for="date_of_purchase" class="col-form-label">Date of Purchase: </label>
                                    <input id="date_of_purchase" type="date" class="form-control" name="date_of_purchase" placeholder="Enter Purchase date"  value="{{ old('date_of_purchase') }}">
                                    @if($errors->has('date_of_purchase'))
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $errors->first('date_of_purchase') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group col-lg-6">
                                    <label for="purchase_amount" class="col-form-label">Purchase Amount: </label>
                                    <input id="purchase_amount" type="number" class="form-control" name="purchase_amount" placeholder="Enter Purchase Amount"  value="{{ old('purchase_amount') }}">
                                    @if($errors->has('purchase_amount'))
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $errors->first('purchase_amount') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-row">

                                <div class="form-group col-lg-6">
                                    <label for="dealer_name" class="col-form-label">Dealer name: </label>
                                    <input id="dealer_name" type="text" class="form-control" name="dealer_name" placeholder="Enter Dealer name"  value="{{ old('dealer_name') }}">
                                    @if($errors->has('dealer_name'))
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $errors->first('dealer_name') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group col-lg-6">
                                    <label for="invoice" class="col-form-label">Invoice: </label>
                                    <input id="invoice" type="text" class="form-control" name="invoice" placeholder="Enter Invoice" value="{{ old('invoice') }}">
                                    @if($errors->has('invoice'))
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $errors->first('invoice') }}</strong>
                                        </span>
                                    @endif
                                </div>

                            </div>

                            <input type="submit" value="Submit" name="submit" class="btn btn-primary">

                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection
@section('styles')
    <style>
        .image-preview{
            width: 150px;
            border-radius: 3px;
        }
    </style>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {

            // Show or hide asset type on change
            $('#asset_type').on('change', function() {
                if($(this).val() == 'Other') {
                    $('#otherAssets').removeClass('d-none');
                    $('#otherAsset').prop("required", true);
                }else{
                    $('#otherAssets').addClass('d-none');
                    $('#otherAsset').removeAttr('required');
                }
            });


        });
    </script>
@endsection
