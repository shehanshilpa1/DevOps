<?php

namespace App\Http\Controllers;

use Auth;
use Mail;
use View;
use Config;
use Session;
use Redirect;
use Response;
use App\Mail\SendEmail;
use App\Http\Models\User;
use App\Http\Models\Role;
use Illuminate\Http\Request;
use App\Http\Models\News;
use App\Http\Helpers\CommonHelper;
use App\Http\Services\UserService;
use App\Http\Services\AdminService;
use App\Http\Services\ImageService;

class GeneralController extends Controller
{
    public function getHomePage()
    {
        $newses = News::where('status', 1)->orderBy('id', 'DESC')->paginate(18);
        return View::make('general.home')->with('newses', $newses);
    }

    public function getAboutUsPage()
    {
        return View::make('general.about');
    }

    public function getContactPage()
    {
        return View::make('general.contact');
    }

    public function getNewsPage($slug)
    {
        $news = News::where('slug', $slug)->where('status', 1)->get();
        if (count($news)==0) {
            abort(404);
        }
        $news = $news->first();
        //$news->content = str_replace('', '', $news->content);
        //dd($news);
        return View::make('general.news-single')->with('news', $news);
    }

    public function getCategoryNewsPages()
    {
        $newses = News::where('status', 1)->orderBy('id', 'DESC')->paginate(18);
        return View::make('general.cat-news')->with('newses', $newses);
    }

    public function submitContactUsForm(Request $request)
    {
        try {
            Mail::to(Config::get('common.email'))
                        ->send(new SendEmail($request->all()));
        } catch (Exception $e) {
            Session::flash('message', 'Couldn\'t send the contact email.');
            Session::flash('type', 'danger');
            return Redirect::back()->withInput();
        }
        Session::flash('message', 'Successfully sent the message. You will hear back from us soon!');
        Session::flash('type', 'success');
        return Redirect::back();
    }
}
