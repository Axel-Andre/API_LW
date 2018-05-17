<?php

namespace App;

use App\Concerns\AttachableConcern;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    use AttachableConcern;

    public $timestamps = false;

    public $fillable = ['title','image','position','parent_id','have_child','only_for_adult','only_for_premium'];

    public function removeAttachable($attachable = null){
        $attachable = null;
        $this->image = null;
        $this->save();
        return true;
    }
    public function Attachments(){
        return $this->hasMany("App\Attachment","attachable_id","id");
    }

}
