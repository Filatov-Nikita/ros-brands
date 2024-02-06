<?php

declare(strict_types=1);

namespace App\Models\DataTransferObjects\Attachments;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;

class CreateImageData
{
    public function __construct(
        public readonly UploadedFile $image,
        public readonly ?Model $relatable,
        public readonly User $owner,
        public readonly string $type = 'image',
        public readonly string $disk = 'public',
        public readonly string $media_type = 'image',
        public readonly string $directory = '',
    ) {
    }
}
