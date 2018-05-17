<?php

namespace App\Http\Controllers;

use App\Attachment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\JsonResponse;
use App\Category;
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
        return redirect()->route('Backend::home');
    }
    public function showAll(){
        $images = Attachment::all();
        $categorie = Category::all();
        $temp_images = null;
        foreach($categorie as $c){
            if(1){
                //return $c->Attachments()->first();
                $c->image = $c->Attachments()->get();
            }else {
                $c->image = null;
            }
        }
        foreach ($categorie as $key=>$c){
            if(isset($c->image[0]) == false)
               $categorie[$key]->image = null;
        }
        return new JsonResponse($categorie,200);
    }
}
