<?php

namespace App\Http\Controllers\fontend;

use App\Http\Controllers\Controller;
use App\Models\BlogComments;
use App\Models\Blogs;
use App\Models\Faculty;
use App\Models\Services;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request){

        $blog = Faculty::where('status',1)->orderBy('created_at', 'DESC');

        $blog = $blog->paginate(6);

        $data['blog'] = $blog;






        // dd($data1);

        return view('fontend.home',$data, );
    }


    public function detail($id){

        $service = Faculty::where('faculties_id', $id)->get();

        if(empty($service)){
            return redirect('/');
        }

        $data['service'] = $service;

        return view('fontend.faculty-detail',$data);
    }
}

