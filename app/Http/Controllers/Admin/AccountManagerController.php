<?php

namespace App\Http\Controllers\Admin;

use App\Components\Core\ResponseHelpers;
use App\Http\Controllers\Controller;
use App\Http\Requests\AccountManagerStoreRequest;
use App\Http\Requests\AccountManagerUpdateRequest;
use App\Models\AccountManager;
use GuzzleHttp\Psr7\Request;

class AccountManagerController extends Controller
{
    use ResponseHelpers;
  
    public function index()
    {
        $accountManagers = AccountManager::where('parent_id',auth()->user()->id)->orderBy('created_at','desc')->get();
        return $this->respondOk($accountManagers);

    }

    public function store(AccountManagerStoreRequest $request)
    {
        $data = [];
        $data = $request->validated();
        $data['parent_id']= auth()->user()->id;
        $accountManager = AccountManager::create($data);
        if($accountManager){
            return $this->respondCreated($accountManager,"Created successfully.");
        }
        return $this->respondError("Failed to create new account manager");
    }

    public function update(AccountManagerUpdateRequest $request, $id)
    {
        $data = [];
        $data = $request->validated();
        $data['parent_id']=auth()->user()->id;
        $accountManager = AccountManager::where('id',$id)->update($data);
        if($accountManager){
            return $this->respondCreated($accountManager,"Updated successfully.");
        }
        return $this->respondError("Failed to create new account manager");
    }

    public function destroy($id)
    {
        $accountManager = AccountManager::findOrFail($id);
        $accountManager->delete();
        return $this->respondDeleted("Manager deleted successfully");
    }



    //assigning account manager to users

    public function assignAccountManager(Request $request){
        
    }
}
