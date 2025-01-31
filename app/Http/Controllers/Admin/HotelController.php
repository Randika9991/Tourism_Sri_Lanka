<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SaveDistrictRequest;
use App\Models\District;
use App\Models\Hotel;
use App\Models\province;
use Illuminate\Http\Request;
use Inertia\Inertia;
use function Pest\PendingCalls\pr;
use function Termwind\render;
use Illuminate\Support\Facades\Log; // Import Log facade


class HotelController extends Controller
{

    public function index()
    {
        return Inertia::render('Admin/Hotel/Index');
    }

    public function create()
    {
        try {
//            $hotel =  Hotel::all();
//            dd($hotel);
            $districts = District::with('province')->get();
//            dd($districts->all());
            return Inertia::render('Admin/Hotel/Create',[
                'districts' => $districts,
            ]);
        } catch (\Exception $exception) {
            return Inertia::render('Admin/Hotel/Index');
        }
    }

    public function store(Request $request)
    {
        try {
            // Validate request
            $validatedData = $request->validate([
                'name' => 'required|string',
                'description' => 'nullable|string',
                'location' => 'required|string',
                'province_name' => 'required|string',
                'category' => 'required|string',
                'district_id' => 'required|integer',
                'latitude' => 'nullable|string',
                'longitude' => 'nullable|string',
                'rating' => 'nullable|numeric',
                'price_per_night' => 'nullable|numeric',
                'amenities' => 'nullable|string',
                'room_types' => 'nullable|array',
                'check_in_time' => 'nullable|string',
                'check_out_time' => 'nullable|string',
                'contact_number' => 'nullable|string',
                'email' => 'nullable|email',
                'website' => 'nullable|string',
                'images' => 'nullable|array', // Ensure images is an array
                'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validate each image
            ]);

            // Handle image uploads
            $imagePaths = [];
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    $imageName = time() . '_' . $image->getClientOriginalName();
                    $path = $image->storeAs('uploads/hotels', $imageName, 'public'); // Store in public disk
                    $imagePaths[] = $path; // Store accessible URL
                }
            }

            // Convert arrays to JSON for storage
            $validatedData['room_types'] = json_encode($validatedData['room_types']);
            $validatedData['images'] = json_encode($imagePaths);

            // Save to DB
            $hotel = Hotel::create($validatedData);

            return Inertia::render('Admin/Hotel/Index');

        } catch (\Exception $exception) {
            Log::error('Error in storing hotel', [
                'message' => $exception->getMessage(),
                'file' => $exception->getFile(),
                'line' => $exception->getLine()
            ]);

            return Inertia::render('Admin/Hotel/Index');
        }
    }
}
