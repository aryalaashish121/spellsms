<?php

namespace App\Http\Controllers\Admin;

use App\Components\Core\ResponseHelpers;
use App\Exports\SelectedUsersExport;
use App\Exports\UserExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\ResetPasswordUpdateRequest;
use App\Http\Requests\UserStoreRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Models\UserRoute;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

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
        $users = User::selfUsers()
        ->where('status',true)
        ->orderBy('created_at', 'desc')->get();
        // $users = User::with('roles','parent')->orderBy('created_at','desc')->get();
        return $this->respondOk(new UserResource($users));
    }

    public function suspenUserDetails(){
        $suspenderUsers = User::selfUsers()->where('status',false)->orderBy('updated_at','desc')->get();
        return $this->respondOk($suspenderUsers);
    }

    public function store(UserStoreRequest $request)
    {
        $userdata = $request->validated();

        try {
            DB::beginTransaction();
            $user = User::create([
                'parent_id' => auth()->user()->id,
                'company_name' => $userdata['company_name'],
                'login_id' => $userdata['login_id'],
                'phone' => $userdata['phone'],
                'address' => $userdata['address'],
                'name' => $userdata['name'],
                'email' => $userdata['email'],
                'password' => Hash::make($userdata['password']),
                'expire_password' => $userdata['expire_password'],
            ]);

            $userrole = $user->assignRole($userdata['account_type']);

            $token = $user->createToken($userdata['name']);

            $userroute = UserRoute::create([
                'user_id' => $user->id,
                'route_id' => $userdata['route_id'],
                'balance' => $userdata['balance'],
                'validity' => $userdata['validity'],

            ]);

            if ($userroute) {
                DB::commit();
                return $this->respondCreated($user, "New User created successfully");
            }

            //assing default campaign to user
            
            return $this->respondError("Could not create new user");
        } catch (Exception $err) {
            DB::rollBack();
            return $this->respondBadRequest($err->getMessage());
        }
    }

    public function getUserDetailsBySlug($id)
    {
   try{
    $user = User::with('manager','roles')->where('slug',$id)->first();
    return $this->respondOk($user);
   }catch(\Exception $err){
       return $this->respondWithError($err->getMessage());
   }
        
    }

    public function update(Request $request, $slug)
    {
        $userdata = $request->validated();
        try {
            $user = User::where('slug', $slug)->update([
                // 'parent_id'=>auth()->user()->id,
                'account_type' => $userdata['account_type'],
                'company_name' => $userdata['company_name'],
                'login_id' => $userdata['login_id'],
                'phone' => $userdata['phone'],
                'address' => $userdata['address'],
                'name' => $userdata['name'],
                'email' => $userdata['email'],
                'password' => Hash::make($userdata['password']),
            ]);
            return $this->respondUpdated("User updated successfully");
        } catch (Exception $err) {

            return $this->respondBadRequest($err->getMessage());
        }
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

    public function resetClientPassword(ResetPasswordUpdateRequest $request,$id){
        $user = User::where('slug',$id)->first();
        if(!$user){
            return $this->respondNotFound();
        }
        $user->update([
            'password'=>Hash::make($request->password)
        ]);
        return $this->respondUpdated("User password updated");
    }

    public function makeReseller($id){
        $user = User::where('slug',$id)->first();
        if(!$user){
            return $this->respondNotFound();
        }
        $user->syncRoles(['writer', 'admin']);
    }

    public function export(Request $request)
    {
        $collection = new Collection($request->selectedList);
        return Excel::download(new SelectedUsersExport($collection), 'users.xlsx');
    }
}
