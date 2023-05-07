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

    public function __construct(Service $adminVoiceoversService)
    {
        $this->adminVoiceoversService = $adminVoiceoversService;
    }

    public function index()
    {
        $voiceovers = Voiceover::paginate(10);

        return view('admin.voiceovers.index', compact('voiceovers'));
    }

    public function create()
    {
        return view('admin.voiceovers.create');
    }

    public function store(StoreRequest $request)
    {

        $data = $request->validated();

        $this->adminVoiceoversService->store($data);

        return redirect()->route('admin.voiceovers.index');
    }

    public function edit(Voiceover $voiceover)
    {
        return view('admin.voiceovers.edit', compact('voiceover'));
    }

    public function update(UpdateRequest $request, Voiceover $voiceover)
    {
        $data = $request->validated();

        $this->adminVoiceoversService->update($data, $voiceover);

        return redirect()->route('admin.voiceovers.index');
    }

    public function destroy(Voiceover $voiceover)
    {
        $voiceover->delete();
    }
}
