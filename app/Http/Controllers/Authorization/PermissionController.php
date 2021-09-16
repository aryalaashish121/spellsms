<?php

namespace App\Http\Controllers\Authorization;

use App\Components\Core\ResponseHelpers;
use Spatie\Permission\Models\Permission;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    use ResponseHelpers;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = Permission::orderBy('created_at','desc')->get();
        return $this->respondOk($permissions);
       
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>['required','unique:permissions,name'],
        ]);

        try{
            $permission = Permission::create([
                'name'=>$request->name
            ]);
            return $this->respondCreated($permission,"Created successfully");
           
        }catch(Exception $err){
            return $this->respondWithError($err->getMessage());
            
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
        $permission = Permission::where('id',$id)->first();
        return $this->respondOk($permission,"fetched successfully");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
     
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>['required','unique:permissions,name,except,'.$id],
        ]);

        try{
            $permission = Permission::where('id',$id)->update([
                'name'=>$request->name
            ]);

            return $this->respondUpdated();
          
        }catch(Exception $err){
            return $this->respondWithError($err->getMessage());
         
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
}
