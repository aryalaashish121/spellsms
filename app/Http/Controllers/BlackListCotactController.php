<?php

namespace App\Http\Controllers;

use App\Components\Core\ResponseHelpers;
use App\Jobs\CheckJob;
use App\Models\BlackListContact;
use Illuminate\Http\Request;

class BlackListCotactController extends Controller
{
    use ResponseHelpers;
    public function index(){
        $blacklist = BlackListContact::orderBy('created_at','desc')->get();
        return $this->respondOk($blacklist);
    }

    public function store(Request $request){

        $data = $request->validate([
            'name'=>'nullable',
            'mobile'=>'required|unique:black_list_contacts,mobile'
        ]);
        CheckJob::dispatch();

        try{
            $insert = BlackListContact::create($data);
            if($insert){
                return $this->respondCreated($insert,"Contact added to Black list");
            }
            return $this->respondError("Something went wrong. Please try again!");
        }catch(\Exception $err){
            return $this->respondWithError($err->getMessage());

        }
    }

    public function destroy($id){
            $contact = BlackListContact::findOrFail($id);
            $contact->delete();
            return $this->respondDeleted("Deleted successfully");
    }
}
