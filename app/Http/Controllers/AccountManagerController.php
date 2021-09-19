<?php

namespace App\Http\Controllers;

use App\Components\Core\ResponseHelpers;
use App\Http\Requests\AccountManagerStoreRequest;
use App\Http\Requests\AccountManagerUpdateRequest;
use App\Models\AccountManager;
use Illuminate\Http\Request;

class AccountManagerController extends Controller
{
    use ResponseHelpers;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accountManagers = AccountManager::all();
        return $this->respondOk($accountManagers);

    }

   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AccountManagerStoreRequest $request)
    {
        $data = [];
        $data = $request->validated();
        $data['parent_id']=1;
        $accountManager = AccountManager::create($data);
        if($accountManager){
            return $this->respondCreated($accountManager,"Created successfully.");
        }
        return $this->respondError("Failed to create new account manager");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AccountManager  $accountManager
     * @return \Illuminate\Http\Response
     */
    public function show(AccountManager $accountManager)
    {
        //
    }

    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AccountManager  $accountManager
     * @return \Illuminate\Http\Response
     */
    public function update(AccountManagerUpdateRequest $request, $id)
    {
        $data = [];
        $data = $request->validated();
        $data['parent_id']=1;
        $accountManager = AccountManager::where('id',$id)->update($data);
        if($accountManager){
            return $this->respondCreated($accountManager,"Updated successfully.");
        }
        return $this->respondError("Failed to create new account manager");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AccountManager  $accountManager
     * @return \Illuminate\Http\Response
     */
    public function destroy(AccountManager $accountManager)
    {
        //
    }
}
