<?php

namespace App\Http\Controllers;
use DB;
use App\galleries; 
use Illuminate\Http\Request;
use Auth;

use App\Http\Requests;

class GalleryController extends Controller{
    private $table = 'galleries';
    //list galleries
    public function index(){
    // get all gallery
        $galleries = DB::table($this->table)->get();
    	//render view
    	return view('gallery/index', compact('galleries'));
    }
    // show create from
    public function create(){

        if(!Auth::check()){
            return \Redirect::route('gallery.index');
        }
    	//render view
    	return view('gallery/create');
    }
    // Store Gallerry
    public function store(Request $request){
        //  get r
        $name = $request->input('name');
        $descripstion = $request->input('descripstion');
        $cover_image = $request->file('cover_image');
        $owner_id = 1;

        //
        if($cover_image){
// die('yes');
          $cover_image_filename = $cover_image->getClientOriginalName();
          $cover_image->move(public_path('images'), $cover_image_filename);
        }else{
// die('no');
            $cover_image_filename = 'noimage.jpg';

        }
        // Insert Gallery
        DB::table($this->table)->insert(
            [
                'name'          => $name,
                'description'   => $descripstion,
                'cover_image'   => $cover_image_filename,
                'owner_id'      => $owner_id
            ]
            );
        // set Message
        \Session::flash('message','Gallery Added');

        // redirect

        return \Redirect::route('gallery.index')->with('message','Gallery Create');

    }
    public function show($id){
        // die($id);
    	// get gallery
        $gallery = DB::table($this->table)->where('id',$id)->first();
        $photos = DB::table('photos')->where('gallery_id',$id)->get();
        return view('gallery/show', compact('gallery','photos'));
    }
}
