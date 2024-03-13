<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class SettingsController extends Controller
{
    public function Suspension(){
        
        $settings = Setting::latest()->get();

        return view('superadmin.suspension.suspension',compact('settings'));
    }

    public function ReasonStore(Request $request){    


        $setting_id = Setting::insertGetId([

        'reason' => $request->reason,
        
        'created_at' => Carbon::now(),   

            ]);
        $notification = array(
            'message' => 'Setting Created Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('suspension')->with($notification);

    }

    public function AppInActive($id){

        Setting::findOrFail($id)->update([

            'suspension_status' => '1',
            'updated_by' => auth()->user()->name,

        ]);

        $notification = array(
            'message' => 'App Suspended',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
     }


    public function AppActive($id){

        Setting::findOrFail($id)->update([

            'suspension_status' => '0',
            'updated_by' => auth()->user()->name,
        ]);

        $notification = array(
            'message' => 'App Activated',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
        
     }

}
