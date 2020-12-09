<?php

namespace App\Http\Controllers\AdminArea;

use App\Http\Controllers\Controller;
use App\Image;
use App\ImageGallery;
use App\Project;
use Illuminate\Http\Request;
use infrastructure\Facades\ImagesFacade;

class ProjectController extends Controller
{
    protected $project;
    protected $galleryImg;
    protected $image;

    public function __construct()
    {
        $this->project = new Project();
        $this->galleryImg = new ImageGallery();
        $this->image = new Image();
    }

    public function index()
    {
        $response['projects'] = $this->project->get();
        return view('AdminArea/pages/Project/all')->with($response);
    }

    public function create()
    {
        return view('AdminArea/pages/Project/new');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        if ($request->has('thumb')) {
            $Thumb = ImagesFacade::up($request->file('thumb'), [2, 12, 9, 10, 13, 14]);
        }
        $data['Thumb_id'] = $Thumb->id;
        $port = $this->project->create($data);
        if ($filess = $request->file('multi')) {
            foreach ($filess as $file) {
                $img = new ImageGallery;
                $multiple = ImagesFacade::up($file, [2, 12, 9, 10, 13, 14]);
                $img->project_id = $port->id;
                $img->image_id = $multiple->id;
                $img->save();
            }
        }
        if ($files = $request->file('multi')) {
            foreach ($files as $img) {
                $profileImage = $img->getClientOriginalName();
                $this->image->name = "$profileImage";
                $this->image->save();
            }
        }
        return redirect('/project/all')->with('success', ' Create successfully');
    }

    public function edit($id)
    {
        $response['projects'] = $this->project->find($id);
        $response['image'] = $this->galleryImg->where('project_id', $id)->get();
        return view('AdminArea/pages/Project/edit')->with($response);
    }

    public function update(Request $request, $id)
    {
 
        if ($request->has('thumb')) {
            $Thumb = ImagesFacade::up($request->file('thumb'), [2, 12, 9, 10, 13, 14]);
           
        }

        $pro = $this->project->find($id);

        $pro->title = $request->title;
        $pro->sub_title = $request->sub_title;
        $pro->location = $request->location;
        $pro->city = $request->city;
        $pro->prech_price = $request->prech_price;
        $pro->telephone = $request->telephone;
        $pro->Thumb_id = $Thumb->id;
        $pro->description = $request->description;
        $pro->facilities  = $request->facilities;
        $pro->update();

        if ($filess = $request->file('multi')) {

            $imgg=$this->galleryImg->where('project_id',$id)->delete();

            foreach ($filess as $file) {
                $port = new ImageGallery;
                $multiple = ImagesFacade::up($file, [2, 12, 9, 10, 13, 14]);
                $port->project_id= $pro->id;
                $port->image_id = $multiple->id;
                $port->save();
            }
        }


        if ($files = $request->file('multi')) {


            foreach ($files as $imgg) {

         
                $galerylImage = $imgg->getClientOriginalName();
                $this->image->name = "$galerylImage";

                $this->image->update();
            }
        
        }
     
        return redirect('/project/all')->with('success', ' Update successfully'); 
    }
}