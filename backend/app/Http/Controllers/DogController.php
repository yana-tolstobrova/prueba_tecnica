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

    public function store(Request $request)
    {
        $data = $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
            'breed' => 'required',
            'size' => 'required',
            'color' => 'required',
        ]);

        try {
            $imageFile = $request->file('photo');
            $uploadedFile = $imageFile->getRealPath();
        
            $uploadApi = new UploadApi();
            $cloudinaryUpload = $uploadApi->upload($uploadedFile);
        
            $imageUrl = $cloudinaryUpload['secure_url'];

            $data['photo'] = $imageUrl;
            
            $dog = Dog::create($data);
            
            return response()->json([
                'success' => true,
                'message' => 'Dog created successfully',
                'dog' => $dog,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to create dog',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function show(Dog $dog)
    {
        try {
            return response()->json([
                'success' => true,
                'dog' => $dog,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to fetch dog',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function update(Request $request, Dog $dog)
    {
        try {
            $data = $request->validate([
                'photo' => $request->hasFile('photo') ? 'image|mimes:jpeg,png,jpg,svg|max:2048' : 'required',
                'breed' => 'required',
                'size' => 'required',
                'color' => 'required',
            ]);

            if ($request->hasFile('photo')) {
                $imageFile = $request->file('photo');
                $uploadedFile = $imageFile->getRealPath();
            
                $uploadApi = new UploadApi();
                $cloudinaryUpload = $uploadApi->upload($uploadedFile);
            
                $imageUrl = $cloudinaryUpload['secure_url'];
            
                $data['photo'] = $imageUrl;
            }
            else{
                $data['photo'] = $request->input('photo');
            }

            $dog->update($data); 

            return response()->json([
                'success' => true,
                'message' => 'Dog updated successfully',
                'dog' => $dog,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to update dog',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function destroy(Dog $dog)
    {
        try {
            $dog->delete();

            return response()->json([
                'success' => true,
                'message' => 'Dog deleted successfully',
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete dog',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function search(Request $request)
    {
        $searchTerm = strtolower($request->input('search_term'));

        $dogs = Dog::where(function ($query) use ($searchTerm) {
            $query->whereRaw('LOWER(breed) LIKE ?', ["%$searchTerm%"])
                ->orWhereRaw('LOWER(size) LIKE ?', ["%$searchTerm%"])
                ->orWhereRaw('LOWER(color) LIKE ?', ["%$searchTerm%"]);
        })->get();

        return response()->json($dogs);
    }
}

