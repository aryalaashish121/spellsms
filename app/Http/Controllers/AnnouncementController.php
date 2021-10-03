<?php

namespace App\Http\Controllers;

use App\Components\Core\ResponseHelpers;
use App\Models\Announcement;
use App\Models\User;
use App\Notifications\NewAnnouncement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;

class AnnouncementController extends Controller
{
  use ResponseHelpers;

  public function index(){
    $announcement= Announcement::where('parent_id',auth()->user()->id)->orderBy('created_at','desc')->get();
    // dd($announcement);
    return $this->respondOk($announcement);
  }
    public function createNotification(Request $request){
        $data = $request->validate([
            'title'=>'required',
            'content'=>'required',
            'usertype'=>'required'
        ]);
        $usertype = $data['usertype'];
        $stringUsertype = implode(",",$usertype);

        try{
          DB::beginTransaction();
          $myusers = User::with('roles')
          ->where('parent_id',auth()->user()->id)
          ->whereHas('roles',function($q) use($usertype)
          {
              $q->wherein('id',$usertype);
          })->get();

          //save to database
          $announcement = Announcement::create([
            'parent_id'=>auth()->user()->id,
            'title'=>$data['title'],
            'usertype'=>$stringUsertype,
            'content'=>$data['content']
          ]);

          $notify = Notification::send($myusers, new NewAnnouncement($data));
          DB::commit();
           return $this->respondCreated($announcement,"New Anouncement created");
        }catch(\Exception $err){
          DB::rollBack();
          $this->respondWithError($err->getMessage());
        }
     
    }

    public function destroy($id){
      $announcement = Announcement::findOrFail($id);
      $announcement->delete();
      return $this->respondDeleted("Deleted successfully");
    }

    public function deleteSelected(Request $request){
        $announcements = Announcement::whereIn('id',$request->ids)->delete();
      return $this->respondDeleted("Deleted successfully");
    }

  
}
