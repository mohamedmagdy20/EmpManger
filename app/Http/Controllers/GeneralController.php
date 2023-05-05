<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;
use Yajra\DataTables\Facades\DataTables;


class GeneralController extends Controller
{
    //
    protected $model ;
    protected $mainView = 'dashboard.';

    protected $routePath = 'dashboard.';
    private $pathImages = 'uploads/';
    protected $paginate = 10;


    public function __construct(Model $model)
    {
        $this->model = $model;
    }


    public function viewPath($view)
    {
        return $this->mainView . $view;
    }

    public function getData()
    {
        return $this->model->orderBy('id','DESC')->get();
    }

    public function getQuery()
    {
        return $this->model::latest();
    }

    public function findData($id)
    {
        return $this->model->findOrFail($id);
    }

    public function admin()
    {
        return auth()->user();
    }
    public function storeImage($image , $filePath)
    {
        $imageName = time().'.'.$image->extension();  
        $path = $image->move(public_path($filePath), $imageName);
        return $imageName;    
    }   
    
    
    public function updateImage($newImage = null, $oldImage, $filePath )
    {
        // check if there are image //
        if($oldImage)
        {
            // delete old image 
            unlink($filePath.'/'.$oldImage);   
        }

           // add new image //

        if($newImage !=null)
        {
            $imageName = time().'.'.$newImage->extension();  
            $path = $newImage->move(public_path($filePath), $imageName);
            return $imageName;
        }
        
    }
    
}