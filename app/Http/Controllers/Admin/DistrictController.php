<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\province;
use Illuminate\Http\Request;
use Inertia\Inertia;
use function Pest\PendingCalls\pr;
use function Termwind\render;

class DistrictController extends Controller
{
    public function save(Request $request)
    {
//        dd($request->all());
        $imagePath = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName(); // Unique name for the file
            $imagePath = $image->storeAs('uploads/images', $imageName, 'public'); // Save in the 'public/uploads/images' directory
        }

        $mostlyPopular = $request->has('MostlyPopular') && is_array($request->input('MostlyPopular'))
            ? implode(',', $request->input('MostlyPopular'))
            :  $request->input('MostlyPopular');

        $save = District::create([
            'province_id' => $request->input('province_id'),
            'name' => $request->input('name'),
            'about' => $request->input('about'),
            'location' => $request->input('location'),
            'mostly_popular' => $mostlyPopular,
            'travel_season' => $request->input('travelSeason'),
            'image' => $imagePath,
        ]);
        if ($save) {
            return redirect()->route('district.index')->with('success', 'District saved successfully!');
        }
    }

    public function getAdminDistrict()
    {
        $districts = District::latest()->paginate(3);
        return Inertia::render('Admin/District/Index',[
            'districts' => $districts,
        ]);

    }

    public function getAdminDistrictCreate()
    {
        $provinces = Province::all();
        return Inertia::render('Admin/District/create',[
        'provinces' => $provinces,
        ]);
    }



    public function edit($id)
    {
//        dd($id);
//        $provinces = Province::all();
//        return Inertia::render('Admin/District/create',[
//            'provinces' => $provinces,
//        ]);

        $provinces = Province::all();
        $districts = District::findOrFail($id);
        $getProvincesIdValue = Province::findOrFail($districts->province_id);
        return Inertia::render('Admin/District/edit', [
            'provinces' => $provinces,
            'districts' => $districts,
           'getProvincesIdValue'=>$getProvincesIdValue
        ]);
    }


    public function update(Request $request, $id)
    {
//        dd($request->all());
        try {
            $district = District::findOrFail($id);

            $imagePath = $district->image; // Retain the current image path

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '_' . $image->getClientOriginalName(); // Unique name for the file
                $imagePath = $image->storeAs('uploads/images', $imageName, 'public'); // Save in the 'public/uploads/images' directory
            }

            $mostlyPopular = $request->has('MostlyPopular') && is_array($request->input('MostlyPopular'))
                ? implode(',', $request->input('MostlyPopular'))
                :  $request->input('MostlyPopular');


//            dd($imagePath);


            $update = $district->update([
                'province_id' => $request->input('province_id'),
                'name' => $request->input('name'),
                'about' => $request->input('about'),
                'location' => $request->input('location'),
                'mostly_popular' => $mostlyPopular,
                'travel_season' => $request->input('travelSeason'),
                'image' => $imagePath,
            ]);
            if ($update) {
                return redirect()->route('district.index')->with('success', 'District saved successfully!');
            }
        } catch (\Exception $exception) {
            dd($exception);
        }
    }
}
