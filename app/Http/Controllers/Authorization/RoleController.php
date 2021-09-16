<?php

namespace App\Http\Controllers\Authorization;

use App\Components\Core\ResponseHelpers;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    use ResponseHelpers;
   
    public function index(Request $request){

        $roles = Role::orderBy('created_at','desc')->get();
        return $this->respondOk($roles);
    }

    public function store(Request $request){

        $request->validate([
            'name'=> ['required','unique:roles,name']
        ]);
    $role = Role::create([
            'name'=>$request->name,
    ]);
        return $this->respondCreated($role,"Role created successfully");
    }

    public function update(Request $request, $id){
        $request->validate([
            'name'=> ['required','unique:roles,name,except'.$id]
        ]);
        $role = Role::where('id',$id)->update([
            'name'=>$request->name
        ]);
        return $this->respondUpdated("Role updated successfully");
       
    }

    public function destroy($id){
        $role = Role::findOrFail($id);
        try{
            $role->delete();
            return $this->respondDeleted("Deleted successfully");
          
        }catch(Exception $err){
            return $this->respondWithError($err->getMessage());
           
        }
    }
}
