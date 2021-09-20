<?php

namespace App\Http\Controllers\Message;

use App\Components\Core\ResponseHelpers;
use App\Http\Controllers\Controller;
use App\Http\Resources\CampagignCategoryResource;
use App\Models\CampaignCategory;
use App\Models\Message\Campaigns;
use Illuminate\Http\Request;

class CampaignsController extends Controller
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Message\Campaigns  $campaigns
     * @return \Illuminate\Http\Response
     */
    public function show(Campaigns $campaigns)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Message\Campaigns  $campaigns
     * @return \Illuminate\Http\Response
     */
    public function edit(Campaigns $campaigns)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Message\Campaigns  $campaigns
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Campaigns $campaigns)
    {
        //
    }

    
    public function getCategories(){
        $categories = CampaignCategory::all();
        return $this->respondOk($categories);
    }   
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Message\Campaigns  $campaigns
     * @return \Illuminate\Http\Response
     */
    public function destroy(Campaigns $campaigns)
    {
        //
    }
}
