<?php

namespace App\Http\Controllers;

use App\Http\Requests\AssetRequest;
use App\Interfaces\AssetInterface;
use App\Interfaces\AttachmentInterface;
use App\Models\Asset;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AssetController extends Controller
{
    public $assetRepository;

    public function __construct(AssetInterface $assetRepository, AttachmentInterface $attachmentRepository)
    {
        $this->assetRepository = $assetRepository;
        $this->attachmentRepository = $attachmentRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allAssets = $this->assetRepository->all();
        $assetTypes = ['Technical asset', 'Other'];
        return view('admin.assets.show', compact('allAssets', 'assetTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $assetTypes = ['Technical asset', 'Other'];
        return view('admin.assets.create', compact('assetTypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AssetRequest $request)
    {
        try {
            if($asset = $this->assetRepository->store($request)) {
                $request->attachable_id = $asset['id'];
                // Upload images
                $this->attachmentRepository->store($request);
            }else{
                return back()->with('danger', 'Asset not added successfully.');
            }
        }
        catch(\Exception $e) {
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function show(Asset $asset)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $assetTypes = ['Technical asset', 'Other'];
        $assetRec = $this->assetRepository->getById($id);
        return view('admin.assets.edit', compact('assetTypes', 'assetRec'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Asset  $asset
     * @return \Illuminate\Http\Response
     */

    // This function is called via api
    public function update(Request $request)
    {
        if($asset = $this->assetRepository->update($request)) {
            $request->attachable_id = $request->id;

            // If an image is removed
            if(!empty($request->removedImages)) {
                // Separate ids
                $removedImagesArr = explode(',', $request->removedImages);

                // Delete images
                foreach ($removedImagesArr as $key => $val) {
                    $this->attachmentRepository->delete($val);
                }
            }
            // If new image is uploaded
            if($request->hasFile('photos')) {
                // Upload images
                $this->attachmentRepository->store($request);
            }
            return back()->with('success', 'Asset udpated successfully.');
        }else{
            return back()->with('danger', 'Asset not udpated successfully.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if($this->assetRepository->delete($request)) {
            // Delete attachable files
            $this->attachmentRepository->deleteByAttachableId($request->id);
            return back()->with('success', 'Asset deleted successfully.');
        } else {
            return back()->with('danger', 'Asset not deleted successfully');
        }
    }
}
