<?php

namespace App\Http\Controllers;

use App\Models\Title;
use App\Http\Requests\TitleRequest;

class TitleController extends Controller
{
    public function index()
    {
        return Title::paginate(10);
    }

    public function store(TitleRequest $request)
    {
        $title = Title::create($request->validated());
        return response()->json($title);
    }

    public function show(Title $title)
    {
        return response()->json($title);
    }

    public function update(TitleRequest $request, Title $title)
    {
        $title->update($request->validated());
        return response()->json($title);
    }

    public function destroy(Title $title)
    {
        $title->delete();
        return response()->noContent();
    }
}
