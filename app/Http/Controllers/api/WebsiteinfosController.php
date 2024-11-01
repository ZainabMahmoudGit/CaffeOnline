<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Http\Resources\WebsiteinfosResource;
use App\Models\Websiteinfos;
use Illuminate\Http\Request;

class WebsiteinfosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $websiteinfos = Websiteinfos::all();
        return WebsiteinfosResource::collection($websiteinfos);
    }

  
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Websiteinfos $websiteinfo)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'WebsiteName' => 'required|string|min:2',
            'WebsiteEmail' => 'required|email',
            'WebsitePhone' => 'required|string'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $websiteinfo->update($request->all());

        return response()->json(['message' => 'Website information updated successfully!', 'data' => new WebsiteinfosResource($websiteinfo)], 200);
    }
}
