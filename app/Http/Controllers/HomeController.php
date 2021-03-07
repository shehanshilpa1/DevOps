<?php

namespace App\Http\Controllers;

use Auth;
use View;
use Session;
use Redirect;
use Response;
use App\Http\Models\User;
use App\Http\Models\Role;
use App\Http\Models\News;
use Illuminate\Http\Request;
use App\Http\Helpers\CommonHelper;
use App\Http\Services\UserService;
use App\Http\Services\ImageService;
use App\Http\Services\AdminService;
use App\Http\RequestHandlers\CreateNewsRequestHandler;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        return View::make('home');
    }

    /*News*/
    public function getNews()
    {
        $news = News::orderBy('id', 'DESC')->paginate(10);
        return View::make('pages.news_list')->with('newses', $news);
    }

    public function getCreateNewsPage()
    {
        return View::make('pages.create_news');
    }

    public function createNews(CreateNewsRequestHandler $request, AdminService $adminService)
    {
        $rtnObj = $adminService->createNews($request->all());
        Session::flash('message', $rtnObj['message']);
        Session::flash('type', $rtnObj['type']);
        if ($rtnObj['type'] == 'danger') {
            return Redirect::back()->withInput();
        }
        return Redirect::route('get-news-list');
    }

    public function getUpdateNewsPage($id)
    {
        $news = News::find($id);
        return View::make('pages.update_news')->with('news', $news);
    }

    public function getUpdateNews(CreateNewsRequestHandler $request, AdminService $adminService)
    {
        $rtnObj = $adminService->updateNews($request->all());
        Session::flash('message', $rtnObj['message']);
        Session::flash('type', $rtnObj['type']);
        if ($rtnObj['type'] == 'danger') {
            return Redirect::back()->withInput();
        }
        return Redirect::route('get-news-list');
    }

    public function uploadImageForCKEditor(Request $request)
    {
        $funcNum  = $request::get('CKEditorFuncNum');
        $message  = $url = '';
        if (Input::hasFile('upload')) {
            $file = Input::file('upload');
            $imageService = new ImageService;
            $url = $imageService->uploadImageByFile($file, 'images/ck');
            if ($url=='') {
                $message = 'Couldn\'t upload the image';
            } else {
                $url = CommonHelper::getImagePath($url);
                $message = 'Uploaded the image';
            }
        } else {
            $message = 'No file uploaded.';
        }
        return '<script>window.parent.CKEDITOR.tools.callFunction('.$funcNum.', "'.$url.'", "'.$message.'")</script>';
    }
}
