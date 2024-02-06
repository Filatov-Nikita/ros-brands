<?php

namespace App\Models\Actions\Attachments;

use App\Models\DataTransferObjects\Attachments\CreateImageData;
use App\Models\Attachment;

class CreateImage
{
    public function __invoke(CreateImageData $data): Attachment
    {
        $pathOnDisk = $this->storeFile($data);

        return $this->createImage($data, $pathOnDisk);
    }

    private function storeFile(CreateImageData $data): string
    {
        $result = $data->image->store($data->directory, $data->disk);

        if ($result === false) {
            throw new Exception();
        }

        return $result;
    }

    private function createImage(
        CreateImageData $data,
        string $pathOnDisk,
    ): Attachment {
        [$width, $height] = getimagesize($data->image->path());

        /** @var Attachment $image */
        $image = Attachment::make();

        $image->disk = $data->disk;
        $image->path = $pathOnDisk;
        $image->size_in_bytes = $data->image->getSize(); // bytes

        $image->height = $height;
        $image->width = $width;

        $image->type = $data->type;
        $image->media_type = $data->media_type;

        $image->owner()->associate($data->owner);
        $image->domain()->associate($data->relatable);

        $image->save();

        return $image;
    }
}
