<?php

namespace App\Repositories;

use App\Interfaces\AssetInterface;
use App\Interfaces\AttachmentInterface;
use App\Models\Attachment;

class AttachmentRepository implements AttachmentInterface
{
    public function all() {
        return Attachment::all();
    }

    public function getById($id) {
        return Attachment::findOrFail($id);
    }

    public function getByAttachableId($attachable_id){
        return Attachment::where('attachable_id', $attachable_id)->get();
    }

    public function delete($id) {
        $attachment =  $this->getById($id);
        // DELETE FILE FROM FOLDER
        if(\File::exists(public_path($attachment->path))){
            \File::delete(public_path($attachment->path));
        }

        if($attachment->delete()) {
            return true;
        }
        return false;
    }

    // Delete multiple
    public function deleteByAttachableId($attachable_id) {
        $attachments =  $this->getByAttachableId($attachable_id);

        foreach($attachments as $key => $attachment) {
            // DELETE FILE FROM FOLDER
            if(\File::exists(public_path($attachment->path))){
                \File::delete(public_path($attachment->path));
            }
            $attachment->delete();
        }

        return true;
    }


    public function store($request) {
        // Get fields from type of uploading
        if($request->type = 'assets') {
            $request->path = 'assets/images/assets';
            $request->type = 'assets';
            $request->attachable_type = 'App\Asset';
        }

        // Upload Image
        if($request->hasFile('photos')) {
            $files = $request->file('photos');
            foreach ($files as $key => $file) {
                $imgName = 'ASS'.$key.time().'.'.$file->getClientOriginalExtension();
                $file->move(public_path($request->path), $imgName);

                // Save image to database
                Attachment::create([
                    'image_name' => $imgName,
                    'storage_path' => $request->path,
                    'path' => $request->path.'/'.$imgName,
                    'type' => $request->type,
                    'attachable_id' => $request->attachable_id,
                    'attachable_type' => $request->attachable_type
                ]);

            }
        }
        return true;
    }

}
