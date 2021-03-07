<?php

namespace App\Http\Services;

use Auth;
use DB;
use Config;
use Exception;
use CommonHelper;
use DateTimeUtility;
use App\Http\Models\User;
use App\Http\Models\Role;
use App\Http\Models\News;
use App\Http\Services\BaseService;
use App\Http\Models\PackageRequest;
use App\Http\Services\ImageService;

class AdminService extends BaseService
{

/*News*/
    public function createNews($data)
    {
        try {
            $news = new News;
            $news->title = $data['title'];
            $news->description = $data['description'];
            $news->content = $data['content'];
            $news->status = $data['status'];
            $news->slug = CommonHelper::slugify($data['title']);
            DB::transaction(function () use ($news, $data) {
                $news->save();
                if (isset($data['thumbnail'])) {
                    $imageService = new ImageService;
                    $rtnObj = $imageService->uploadImageByFile($data['thumbnail'], 'images/news', 1200);
                    $news->path = $rtnObj;
                    $news->save();
                }
            });
        } catch (Exception $e) {
            \Log::error($e->getMessage());
            return ['message' => 'Couldn\'t create the news.', 'type' => 'danger'];
        }
        return ['message' => 'Successfully created the news.', 'type' => 'success'];
    }

    public function updateNews($data)
    {
        try {
            $news = News::find($data['id']);
            $news->title = $data['title'];
            $news->description = $data['description'];
            $news->content = $data['content'];
            $news->status = $data['status'];
            DB::transaction(function () use ($news, $data) {
                $news->save();
                if (isset($data['thumbnail'])) {
                    $imageService = new ImageService;
                    $rtnObj = $imageService->uploadImageByFile($data['thumbnail'], 'images/news', 1200);
                    $news->path = $rtnObj;
                    $news->save();
                }
            });
        } catch (Exception $e) {
            \Log::error($e->getMessage());
            return ['message' => 'Couldn\'t update the news.', 'type' => 'danger'];
        }
        return ['message' => 'Successfully updated the news.', 'type' => 'success'];
    }
}