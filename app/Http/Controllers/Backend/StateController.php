<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\PropertyType;
use App\Models\State;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class StateController extends Controller
{
    public function AllState()
    {
        $state = State::latest()->get();
        return view('backend.state.all_state', compact('state'));
    } // End Method

    public function AddState()
    {

        return view('backend.state.add_state');
    }

    public function StoreState(Request $request)
    {
        if($request->file('state_image')){
            $manager = new ImageManager(new Driver());
            $name_gen=hexdec(uniqid()).'.'.$request->file('state_image')->getClientOriginalExtension();
            $image= $manager->read($request->file('state_image'));
            $image=$image->resize(370,275);
            $image->toJpeg(80)->Save(base_path(('public/upload/state/'.$name_gen)));
            $save_url= 'upload/state/'.$name_gen;

        }

        State::insert([
            'state_name' => $request->state_name,
            'state_image' => $save_url,
        ]);

        $notification = array(
            'message' => 'State Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.state')->with($notification);
    }
}
