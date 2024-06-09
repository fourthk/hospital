<?php

namespace App\Http\Controllers;

use App\Models\Medichine;
use App\Http\Requests\StoreMedichineRequest;
use App\Http\Requests\UpdateMedichineRequest;
use App\Models\MedichineCategory;
use GuzzleHttp\Psr7\Request;

class MedichineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(StoreMedichineRequest $request)
    {
        if (isset($request['search'])) {
            $medichines = Medichine::with('medichineCategory')->where('name', 'LIKE', '%' . $request['search'] . '%')->paginate(10);
        } else {
            $medichines = Medichine::with('medichineCategory')->paginate(10);
        }
        return view('admin.medichine.index', [
            'title' => 'Victoria | Medichine',
            'page' => 'medichine',
            'medichines' => $medichines
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $medichine_category = MedichineCategory::all();

        return view('admin.medichine.create', [
            'title' => 'Victoria | Medichine add',
            'page' => 'medichine',
            'medichine_categories' => $medichine_category
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMedichineRequest $request)
    {
        $validatedData = $request->validate([
            'id_category' => 'string',
            'name' => 'string',
            'price' => 'numeric',
            'description' => 'string'
        ]);

        $medichine = Medichine::create([
            'id_category' => $validatedData['id_category'],
            'name' => $validatedData['name'],
            'price' => $validatedData['price'],
            'description' => $validatedData['description'],
        ]);

        $medichine->save();

        if ($medichine->wasRecentlyCreated) {
            return redirect('admin/medichine')->with('success', 'Data berhasil dibuat');
        } else {
            return redirect('admin/medichine')->with('error', 'Data gagal dibuat');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Medichine $medichine)
    {
        $medichine_category = MedichineCategory::all();

        return view('admin.medichine.show', [
            'title' => 'Victoria | Medichine edit',
            'page' => 'medichine',
            'medichine_categories' => $medichine_category,
            'medichine' => $medichine
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Medichine $medichine)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMedichineRequest $request, Medichine $medichine)
    {
        $validatedData = $request->validate([
            'id' => 'string',
            'id_category' => 'string',
            'name' => 'string',
            'price' => 'numeric',
            'description' => 'string'
        ]);

        $medichine->id_category = $validatedData['id_category'];
        $medichine->name = $validatedData['name'];
        $medichine->price = $validatedData['price'];
        $medichine->description = $validatedData['description'];

        $medichine->save();

        return redirect('admin/medichine')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Medichine $medichine)
    {
        $medichine->delete();
        return redirect('admin/medichine')->with('success', 'Data berhasil dihapus');
    }
}
