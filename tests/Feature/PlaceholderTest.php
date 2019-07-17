<?php

namespace Tests\Feature;

use App\Http\Controllers\PlaceholderController;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PlaceholderTest extends TestCase
{
    /**@test*/
    public function only_admin_can_upload_images(){
        $response = $this->get('/placeholder')->assetRedirect('/login');
    }

    /**@test*/
    public function imageupload ($value='')
    {
        # code...
    }
    //  public function testAvatarUpload()
    // {
    //     Storage::fake('avatars');

    //     $file = UploadedFile::fake()->image('avatar.jpg');

    //     $response = $this->json('POST', '/avatar', [
    //         'avatar' => $file,
    //     ]);

    //     // Assert the file was stored...
    //     Storage::disk('avatars')->assertExists($file->hashName());

    //     // Assert a file does not exist...
    //     Storage::disk('avatars')->assertMissing('missing.jpg');
    // }
}
