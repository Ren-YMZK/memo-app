<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Memo;

class MemoController extends Controller
{
    public function index()
    {
        $memos = Memo::all();
        return view('memos.index', compact('memos'));
    }

    public function create()
    {
        return view('memos.create');
    }

    public function store(Request $request)
    {
        Memo::create($request->only(['title', 'content']));
        return redirect('/');
    }

    public function edit($id)
    {
        $memo = Memo::findOrFail($id);
        return view('memos.edit', compact('memo'));
    }

    public function update(Request $request, $id)
    {
        $memo = Memo::findOrFail($id);
        $memo->update($request->only(['title', 'content']));
        return redirect('/');
    }

    public function destroy($id)
    {
        $memo = Memo::findOrFail($id);
        $memo->delete();
        return redirect('/');
    }
}
