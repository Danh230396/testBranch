<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Image;

use File;

class ImageController extends Controller
{
    function getDelete($id){
    	$image = Image::find($id);
    	$image->delete();
    }
}
