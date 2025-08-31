<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Article;
use App\Models\Page;
use App\Models\Contact;
use App\Models\Config;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Mail;
use Validator;
use Carbon\Carbon;

Paginator::useBootstrap();


class HomepageController extends Controller
{
    public function __construct()
    {
        if(Config::find(1)->active==0)
        {
            return redirect()->to('site-bakimda')->send();
        }
        view()->share('pages',Page::where('status',1)->orderBy('order','ASC')->get());
        view()->share('categories',Category::where('status',1)->inRandomOrder()->get());
    }

    public function index()
    {
        $data['articles']=Article::with('getCategory')->where('status',1)->whereHas('getCategory',function($query){
            $query->where('status',1);
        })->orderBy('created_at', 'DESC')->paginate(10);
        $data['articles']->withPath(url('yazilar/sayfa'));
        return view('front.homepage', $data);
    }

    public function single($category,$slug)
    {
        $category=Category::whereSlug($category)->first() ?? abort(403, 'Böyle bir kategori bulunamadı.');
        $article=Article::whereSlug($slug)->whereCategoryId($category->id)->first() ?? abort(403, 'Böyle bir yazı bulunamadı.');
        $article->increment('hit');
        $data['article']=$article;
        return view('front.single',$data);
    }

    public function category($slug)
    {
        $category=Category::whereSlug($slug)->first() ?? abort(403, 'Böyle bir kategori bulunamadı.');
        $data['category']=$category;
        $data['sayi']=Article::where('category_id',$category->id)->where('status',1)->count();
        $data['articles']=Article::where('category_id',$category->id)->where('status',1)->orderBy('created_at', 'DESC')->paginate(2);
        return view('front.category',$data);
    }

    public function page($slug)
    {
        $page=Page::whereSlug($slug)->first() ?? abort(403, 'Böyle bir sayfa bulunamadı.');
        $data['page']=$page;
        return view('front.page',$data);
    }

    public function contact()
    {
        $contact = Contact::all();
        return view('front.contact');
    }

    public function contactpost(Request $request)
    {
        $contact = new Contact;
        $contact->name=$request->name;
        $contact->email=$request->email;
        $contact->topic=$request->topic;
        $contact->message=$request->message;
        $contact->save();
        return redirect()->route('contact')->with('success','Başarıyla Gönderildi.');
    }
}
