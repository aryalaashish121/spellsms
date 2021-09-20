<?php

namespace App\Http\Controllers\Message;

use App\Components\Core\ResponseHelpers;
use App\Http\Controllers\Controller;
use App\Http\Requests\SenderIdStoreRequest;
use App\Models\Message\SenderID;
use Exception;
use Illuminate\Http\Request;

class SenderIdController extends Controller
{
    use ResponseHelpers;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = SenderID::orderBy('created_at','desc')->get();
        return $this->respondOk($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SenderIdStoreRequest $request)
    {
        $data = [];
        $data = $request->validated();
        $data['parent_id'] = auth()->user()->id;
        try{
            $create = SenderID::create($data);
            return $this->respondCreated($create,"New sender id created successfully");
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $senderId = SenderID::findOrFail($id);
        try{
            $senderId->delete();
            return $this->respondDeleted();
        }catch(Exception $err){
            return $this->respondWithError($err->getMessage());
        }
    }
}
