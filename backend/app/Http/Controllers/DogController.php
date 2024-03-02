<?php

namespace App\Http\Controllers;

use App\Models\Dog;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Cloudinary\Configuration\Configuration;
use Cloudinary\Api\Upload\UploadApi;

Configuration::instance([
    'cloud' => [
      'cloud_name' =>  env('CLOUDINARY_CLOUD_NAME'), 
      'api_key' => env('CLOUDINARY_API_KEY'), 
      'api_secret' => env('CLOUDINARY_API_SECRET'),],
    'url' => [
      'secure' => true]]);

class DogController extends Controller
{
    public function index()
    {
        $dogs = Dog::all();
        return response()->json($dogs);
    }

    /*public function store(Request $request)
    {
        $data = $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
            'breed' => 'required',
            'size' => 'required',
            'color' => 'required',
        ]);

        try {
            $dog = Dog::create($request->all());
            return response()->json([
                'success' => true,
                'message' => 'Dog created successfully',
                'dog' => $dog,
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to create dog',
                'error' => $e->getMessage(),
            ], 500);
        }
    }*/

    public function store(Request $request)
    {
        $data = $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
            'breed' => 'required',
            'size' => 'required',
            'color' => 'required',
        ]);

        try {
            // Upload photo to Cloudinary
            $imageFile = $request->file('photo');
            $uploadedFile = $imageFile->getRealPath();
        
            $uploadApi = new UploadApi();
            $cloudinaryUpload = $uploadApi->upload($uploadedFile);
        
            $imageUrl = $cloudinaryUpload['secure_url'];

            // Create Dog model with Cloudinary URL
            $data['photo'] = $imageUrl;
            $dog = Dog::create($data);
            
            return response()->json([
                'success' => true,
                'message' => 'Dog created successfully',
                'dog' => $dog,
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to create dog',
                'error' => $e->getMessage(),
            ], 500);
        }
    }



    /**
     * Display the specified resource.
     */
    public function show(Dog $dog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dog $dog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dog $dog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dog $dog)
    {
        //
    }
}
