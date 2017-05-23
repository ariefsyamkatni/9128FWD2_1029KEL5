<?php

namespace App\Http\Controllers;
use DB;
use App\photos;
use Illuminate\Http\Request;
use App\Http\Requests;
// use Auth;

class photoController extends Controller{
    private $table='photos';
    

    // show create from
    public function create($id){
        // if(!Auth::check()){
        //     return \Redirect::route('gallery.index');
        // }
        
        $gallery_id = $id;
    	// die('PHOTO/CREATE');
        return view('photo/create',compact('gallery_id'));
    }
    // Store photo
    public function Store(Request $request){

        // echo $request->gallery_id;
        $gallery_id = $request -> input('gallery_id');
       $title = $request->input('title');
        $descripstion = $request->input('descripstion');
        $location = $request->input('location');
        $image = $request->file('image');
        $owner_id = 1;

        //
        if($image){
// die('yes');
          $image_filename = $image->getClientOriginalName();
          $image->move(public_path('images'), $image_filename);
        }else{
// die('no');
            $image_filename = 'noimage.jpg';

        }
        // Insert Gallery
        DB::table($this->table)->insert(
            [
                'gallery_id'          => $gallery_id,
                'title'          => $title,
                'description'   => $descripstion,
                'location'   => $location,
                'image'   => $image_filename,
                'owner_id'      => $owner_id
            ]
            );
        // set Message
        \Session::flash('message','Photo Added');

        // redirect

        return \Redirect::route('gallery.show',array('id' => $gallery_id));
 
    }

    // show photo details
    public function details($id){
    	$photo = DB::table($this->table)->where('id', $id)->first();

        // 
        return view('photo/details',compact('photo'));
    }
    public function destroy($id)
    {
        $photo::find($id)->delete();
        return redirect('gallery.show');
    }
}
