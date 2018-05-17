<?php

namespace App\Http\Controllers;

use App\Attachment;
use App\Http\Requests\AttachmentRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AttachmentController extends Controller
{

    public function store(AttachmentRequest $request){

        $type = $request->get('attachable_type');
        $file = $request->file('image');

        if(class_exists($type) && method_exists($type,'attachments')){
            $attachment = new Attachment($request->only('attachable_type','attachable_id'));
            $attachment->uploadFile($file);
            $attachment->save();
            return new JsonResponse($attachment,200);
        }else{
            return new JsonResponse(['attachable_type' => 'Ce contenu ne peut recevoir de pièces jointes'],422);
        }

    }

    public function delete(Request $request){
        $id = $request->get('id');
        $attachment = Attachment::find($id);
        $attachable = $attachment->attachable;
        $attachable->removeAttachable($attachment->name);
        if($attachment){
            $attachment->delete();
            return new JsonResponse($request->all(),200);
        }else{
            return new JsonResponse(['error' => 'Ce contenu n\'existe pas'],404);
        }
    }

}
