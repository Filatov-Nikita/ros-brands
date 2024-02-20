<?php

namespace App\Http\Controllers\Crm;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Image;
use App\Models\Look;
use App\Models\Actions\Attachments\CreateImage;
use App\Models\Actions\Attachments\DeleteImage;
use App\Models\DataTransferObjects\Attachments\CreateImageData;

class LookVideoController extends Controller
{
    public function store_video(Request $request, string $look_id, CreateImage $createImage) {
        $request->validate([
            'video_file' => 'required|file|mimes:mp4|extensions:mp4|max:5120',
        ]);

        $file = $request->file('video_file');

        $look = Look::findOrFail($look_id);

        $data = new CreateImageData(
            image: $file,
            relatable: $look,
            owner: $request->user(),
            disk: 'public',
            directory: 'looks/videos',
            type: 'video'
        );

        $createImage($data);

        return to_route('looks.show', [ 'look' => $look_id ]);
    }

    public function remove_video(
        Request $request,
        string $look_id,
        DeleteImage $deleteImage,
    ) {
        $look = Look::findOrFail($look_id);

        $video = $look->video;

        if ($video) {
            $deleteImage($video);
        }

        return to_route('looks.show', [ 'look' => $look_id ]);
    }

    public function update_video(
        Request $request,
        string $look_id,
        DeleteImage $deleteImage,
        CreateImage $createImage,
    ) {
        $request->validate([
            'video_file' => 'required|file|mimes:mp4|extensions:mp4|max:5120',
        ]);

        $file = $request->file('video_file');

        $look = Look::findOrFail($look_id);

        $video = $look->video;

        if ($video) {
            $deleteImage($video);
        }

        $data = new CreateImageData(
            image: $file,
            relatable: $look,
            owner: $request->user(),
            disk: 'public',
            directory: 'looks/videos',
            type: 'video'
        );

        $createImage($data);

        return to_route('looks.show', [ 'look' => $look_id ]);
    }
}
