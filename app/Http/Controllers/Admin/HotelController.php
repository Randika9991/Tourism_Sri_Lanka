<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SaveDistrictRequest;
use App\Http\Requests\StoreHotelRequest;
use App\Http\Requests\UpdateHotelRequest;
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
        try {
            $hotels =  Hotel::with('district')->latest()->paginate(3);
//        dd($hotels);
            return Inertia::render('Admin/Hotel/Index',[
                'hotels' => $hotels,
            ]);
        } catch (\Exception $exception) {
            Log::info('Hotel created successfully', [$exception]);
        }
    }

    public function create()
    {
        try {
            $districts = District::with('province')->get();
            return Inertia::render('Admin/Hotel/Create',[
                'districts' => $districts,
            ]);
        } catch (\Exception $exception) {
            Log::info('Hotel created successfully', [$exception]);
            return Inertia::render('Admin/Hotel/Index');
        }
    }

    public function store(StoreHotelRequest $request)
    {
        try {

            $validatedData = $request->validated();

            $validatedData['amenities'] = $request->has('amenities') && is_array($request->input('amenities'))
                ? implode(',', $request->input('amenities'))
                : $request->input('amenities');

            $imagePaths = [];
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    $imageName = time() . '_' . $image->getClientOriginalName();
                    $path = $image->storeAs('uploads/hotels', $imageName, 'public');
                    $imagePaths[] = $path;
                }
            }

            $validatedData['room_types'] = $request->has('room_types') && is_array($request->input('room_types'))
                ? implode(',', $request->input('room_types'))
                : $request->input('room_types');

            $validatedData['images'] = json_encode($imagePaths);

            $hotel = Hotel::create($validatedData);

            Log::info('Hotel created successfully', ['hotel_id' => $hotel->id]);
        } catch (\Exception $exception) {
//            dd($exception);
            Log::error('Error in storing hotel', [
                'message' => $exception->getMessage(),
                'file' => $exception->getFile(),
                'line' => $exception->getLine()
            ]);

            return back()->with('error', 'Something went wrong!');
        }
    }

    public function edit($id)
    {
        try {
            $hotel = Hotel::with('district')->findOrFail($id);
            $districts = District::with('province')->get();
            $hotel->images = json_decode($hotel->images, true);
            return Inertia::render('Admin/Hotel/edit',[
                'hotel' => $hotel,
                'districts' => $districts,
            ]);
        } catch (\Exception $exception) {
            dd($exception);
        }
    }

    public function update(UpdateHotelRequest $request, $id)
    {
//        dd($request->all());
        try {
            dd($request->all(),$id);
        } catch (\Exception $exception) {
            dd($exception->getMessage());
        }
    }
}
