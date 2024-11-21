<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ImageCarousel;
use Illuminate\Support\Facades\File;


class ImageCarouselController extends Controller
{
    public function index(){
        return view('admin.CarouselImages.admin', ['img_info' => ImageCarousel::all()]);

    }

    public function create(){
        return view('admin.CarouselImages.create');

    }

    public function show(ImageCarousel $img){
        return view('admin.CarouselImages.show', ['img_info' => $img]);

    }

    public function store(Request $request){
        $request->validate([
            'file-upload' => 'required|mimes:png,jpg,jpeg|max:10240', // 10MB max file size
            'event-name' => 'required',
            'month' => 'required',
            'time' => 'required',
            'description' => 'required',
            'right' => 'required',
            'left' => 'required',
            'priority' => 'required|integer|gte:1|unique:image_carousels,priority', // Unique priority >= 1
        ]);
        
        
        
        $newImageName = time() . '-' . $request['event-name'] . '.' . $request['file-upload']->extension();
        
            ImageCarousel::create([
                'img_path' => $newImageName,
                'event_name' => request('event-name'),
                'month' => request('month'),
                'time' => request('time'),
                'description' => request('description'),
                'left' => request('left'),
                'right' => request('right'),
                'buttom' => request('buttom'),
                'priority'=>request('priority'),
            ]);
        
        $request['file-upload']->move('carousel-images', $newImageName);
        
        
            return redirect ('/admin/carousel-image/');
    }

    public function destroy(ImageCarousel $imageCarousel){

    
        // Define the path to the image
        $filePath = public_path('carousel-images/' . $imageCarousel->img_path);
        
        // Check if the file exists, then delete it
        if (File::exists($filePath)) {
            File::delete($filePath);
        }
        
        // Delete the database record
        $imageCarousel->delete();
    
        return redirect('/admin/carousel-image')->with('success', 'Image and record deleted successfully.');
    }


}
