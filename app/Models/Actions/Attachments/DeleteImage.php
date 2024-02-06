<?php

namespace App\Models\Actions\Attachments;

use App\Models\Attachment;
use Illuminate\Support\Facades\Storage;

class DeleteImage
{
    public function __invoke(Attachment $image): void
    {
        Storage::disk($image->disk)->delete($image->path);
        $image->delete();
    }
}
