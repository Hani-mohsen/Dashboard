<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function allnotification(){
 $notifications =Notification::all();
        return view('backend.notification.notification_view',compact('notifications'));

    }
    public function addnotification(){
        return view('backend.notification.notification_add');

    }
    public function storenotification(Request $request){
        $request->validate([
            'title' => 'required',
            'message'=> 'required',
            'date'=>'required'
        ]);
        Notification::insert([
            'title' => $request->title,
            'message' => $request->message,
            'date' => $request->date,

        ]);

        $notification = array(
            'message' => 'Notification Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.notification')->with($notification);
    }
    public function deletenotification($id){
        Notification::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Notification Deleted Successfully',
            'alert-type' => 'warning'
        );

        return redirect()->back()->with($notification);
    }
    public function updatenotification(Request $request){
        $notify_id = $request->id;

        Notification::findOrFail($notify_id)->update([
            'title' => $request->title,
            'message' => $request->message,
            'date' => $request->date,

        ]);

        $notification = array(
            'message' => 'Notification Updated  Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.notification')->with($notification);
    }
}
