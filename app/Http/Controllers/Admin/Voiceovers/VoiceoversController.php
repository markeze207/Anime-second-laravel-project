<?php

namespace App\Http\Controllers\Admin\Voiceovers;

use App\Http\Controllers\Controller;
use App\Models\Voiceover;
use App\Http\Requests\Admin\Voiceovers\StoreRequest;
use App\Http\Requests\Admin\Voiceovers\UpdateRequest;
use App\Service\Admin\Voiceovers\Service;

class VoiceoversController extends Controller
{

    protected $adminVoiceoversService;

    /**
     * Get service
     */
    public function __construct(Service $adminVoiceoversService)
    {
        $this->adminVoiceoversService = $adminVoiceoversService;
    }

    /**
     * Show the voiceovers list
     */
    public function index()
    {
        $voiceovers = Voiceover::paginate(10);

        return view('admin.voiceovers.index', compact('voiceovers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.voiceovers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {

        $data = $request->validated();

        $this->adminVoiceoversService->store($data);

        return redirect()->route('admin.voiceovers.index');
    }

    /**
     * Display the specified resource edit form.
     */
    public function edit(Voiceover $voiceover)
    {
        return view('admin.voiceovers.edit', compact('voiceover'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Voiceover $voiceover)
    {
        $data = $request->validated();

        $this->adminVoiceoversService->update($data, $voiceover);

        return redirect()->route('admin.voiceovers.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Voiceover $voiceover)
    {
        $voiceover->delete();
    }
}
