<?php

namespace App\Http\Controllers\Admin;

use App\Components\Core\ResponseHelpers;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use App\Models\UserBalance;
use App\Models\UserRoute;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    use ResponseHelpers;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

  
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserStoreRequest $request)
    {
        $userdata = $request->validated();

        try{
            Db::beginTransaction();
            $user = User::create([
                // 'parent_id'=>auth()->user()->id,
                'account_type'=>$userdata['account_type'],
                'company_name'=>$userdata['company_name'],
                'login_id'=>$userdata['login_id'],
                'phone'=>$userdata['phone'],
                'address'=>$userdata['address'],
                'name' => $userdata['name'],
                'email' => $userdata['email'],
                'password' => Hash::make($userdata['password']),
            ]);
            
            $userrole = $user->assignRole('Client');

            $userroute = UserRoute::create([
                'user_id'=>$user->id,
                'route_id'=>$userdata['route_id'],
                'balance'=>$userdata['balance'],
                'validity'=>$userdata['validity'],

            ]);

            DB::commit();
            return $this->respondCreated($user,"New User created successfully");
            
        }catch(Exception $err){
            DB::rollBack();
            return $this->respondError($err->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
