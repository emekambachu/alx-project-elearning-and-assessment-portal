<?php

namespace App\Http\Controllers\Learning;

use App\Http\Controllers\Controller;
use App\Models\Learning\LaffResource;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class LaffResourceController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => ['required'],
            'type' => 'required',
        ]);

        $laff = new LaffResource();
        $laff->type = $request->type;
        $laff->title = $request->title;
        $laff->description = $request->description;
       
        $laff->type = $request->type;

        if($request->type =='video'){
            $request->validate([
                'video_url' => 'required',
            ]);

            $laff->video_url = $request->video_url;
        }

        if($request->type =='audio'){
            $request->validate([
                'file' => 'required',
            ]);
        $fileName =  $laff->title. '_' . time() . '.'. $request->file->extension();  
        $request->file->move(public_path('files/audio'), $fileName);
        $laff->audio_url = 'files/audio'.$fileName;
        }

        if($request->type =='doc'){

            $request->validate([
                'file' => 'required',
            ]);

            $fileName =  $laff->title. '_' . time() . '.'. $request->file->extension();  
            $request->file->move(public_path('files/document'), $fileName);
            $laff->doc_url = 'files/document'.$fileName;
            }

        $laff->user_id = 1;
        $laff->save();

        return $this->success('Resource uploaded successfully', $laff, Response::HTTP_CREATED);
    }


    public function videoResouces(Request $request)
    {
      $videos = LaffResource::where('type','video')->get();
      
      return $this->success('Resource uploaded successfully', $videos, Response::HTTP_OK);
    }
}
