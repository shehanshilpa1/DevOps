<?php

namespace App\Http\Services;

use App\Http\Services\BaseService;
use App\Http\Models\User;
use App\Http\Models\Role;
use Auth;
use DB;
use Image;
use Exception;

class ImageService extends BaseService
{
	public function uploadImageByURL($image, $destination)
	{
        $filename = time();
        $ext = pathinfo($image, PATHINFO_EXTENSION);
        $imgOri = Image::make($image);
        $imgPath = $destination . '/' . $filename .'.'.$ext;
        $imgOri->save(public_path($imgPath));
        return $imgPath;
	}

	public function uploadImageByFile($image, $destination)
	{
        $filename = time();
        $imgOri = Image::make($image);
        $ext = $image->getClientOriginalExtension();
        $imgPath = $destination . '/' . $filename .'.'.$ext;
        $imgOri->save(public_path($imgPath));
        return $imgPath;
	}
}