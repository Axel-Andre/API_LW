<?php

namespace App\Concerns;

use App\Attachment;

trait AttachableConcern {

    public static function bootAttachableConcern()
    {
        self::deleted(function ($subject) {
            foreach ($subject->attachments()->get() as $attachment) {
                $attachment->delete();
            }
        });

    }
    public function attachments(){
        return $this->morphMany(Attachment::class,'attachable');
    }

}