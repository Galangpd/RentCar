<?php

namespace App\Http\Controllers\Admin;

use App\Models\Car;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CarStoreRequest;
use App\Http\Requests\Admin\CarUpdateRequest;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars = Car::latest()->get();

        return view('admin.cars.index', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.cars.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CarStoreRequest $request)
    {
    // Validasi input
    $validated = $request->validated();

    // Mengatur nilai default untuk checkbox
    $features = ['p3k', 'charger', 'audio', 'ac'];
    foreach ($features as $feature) {
        $validated[$feature] = $request->has($feature) ? true : false;
    }

    // Mengupload gambar jika ada
    if ($request->hasFile('gambar')) {
        $gambar = $request->file('gambar')->store('assets/cars', 'public');
    } else {
        $gambar = null;
    }

    // Membuat slug dari nama mobil
    $slug = Str::slug($request->nama_mobil, '-');

    // Menambahkan data gambar dan slug ke dalam array validated
    $validated['gambar'] = $gambar;
    $validated['slug'] = $slug;

    // Menyimpan data ke database
    Car::create($validated);

    return redirect()->route('admin.cars.index')->with([
        'message' => 'Data sukses ditambahkan',
        'alert-type' => 'success',
    ]);
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Car $car)
    {
        return view('admin.cars.edit', compact('car'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CarUpdateRequest $request, Car $car)
    {
        if ($request->validated()) {
            $data = $request->validated();

            // Handle image upload
            if ($request->hasFile('gambar')) {
                // Delete the old image if exists
                if ($car->gambar) {
                    Storage::disk('public')->delete($car->gambar);
                }

                // Store the new image
                $data['gambar'] = $request->file('gambar')->store('assets/cars', 'public');
            }

            $features = ['p3k', 'charger', 'audio', 'ac'];
            foreach ($features as $feature) {
                $data[$feature] = $request->has($feature) ? true : false;
            }

            // Generate slug
            $data['slug'] = Str::slug($request->nama_mobil, '-');

            // Update the car data
            $car->update($data);

            return redirect()->route('admin.cars.index')->with([
                'message' => 'Data sukses diedit',
                'alert-type' => 'info',
            ]);
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car)
    {
        if ($car->gambar) {
            unlink('storage/'. $car->gambar);
        }
        $car->delete();

        return redirect()->back()->with([
            'message' => 'Data berhasil dihapus',
            'alert-type' => 'Danger'
        ]);
    }
}
