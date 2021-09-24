<?php

namespace App\Http\Controllers\ContactGroup;

use App\Components\Core\ResponseHelpers;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContactGroupStoreRequest;
use App\Models\ContactGroup;
use Exception;
use Illuminate\Http\Request;

class ContactGroupController extends Controller
{
    use ResponseHelpers;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contactGroups = ContactGroup::orderBy('created_at','desc')->get();
        return $this->respondOk($contactGroups);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContactGroupStoreRequest $request)
    {
        $data = $request->validated();

        try {
            $store_contact_group = ContactGroup::create([
                'name' => $data['name'],
                'parent_id' => auth()->user()->id,
            ]);
            return $this->respondCreated($store_contact_group, "New Contact Group Created");
        } catch (Exception $err) {
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
        $data = ContactGroup::findOrFail($id);
        try {
            $data->delete();
            return $this->respondDeleted("Deleted Successfully");
        } catch (Exception $err) {
            return $this->respondWithError($err->getMessage());
        }
    }
}
