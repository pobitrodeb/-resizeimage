<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class ImageController extends Controller
{
    public function index()
    {
        return view('imageUpload');
    }

    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $image = $request->file('image');
        $imageName = time().'.'.$image->extension();

        $destinationPathThumbnail = public_path('/thumbnail');
        $img = Image::make($image->path());
        $img->resize(100, 100, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPathThumbnail.'/'.$imageName);

        $destinationPath = public_path('/images');
        $image->move($destinationPath, $imageName);

        return back()
            ->with('success','Image Upload successful')
            ->with('imageName',$imageName);
    }

    // Multiple data add
    public function store(Request $request)
    {


        $this->validate($request, [
                'filenames' => 'required',
                'filenames.*' => 'mimes:doc,pdf,docx,zip'
        ]);


        if($request->hasfile('filenames'))
         {
            foreach($request->file('filenames') as $file)
            {
                $name = time().'.'.$file->extension();
                $file->move(public_path().'/files/', $name);
                $data[] = $name;
            }
         }


         $file= new File();
         $file->filenames=json_encode($data);
         $file->save();


        return back()->with('success', 'Data Your files has been successfully added');
    }
}
