<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Memo;
use Illuminate\Support\Facades\Auth;

class MemoController extends Controller
{
    public function index()
    {
        $memos = Auth::user()->memos;
        return view('memos.index', compact('memos'));
    }

    public function create()
    {
        return view('memos.create');
    }

    public function store(Request $request)
    {
        Auth::user()->memos()->create($request->only(['title', 'content']));
        return redirect('/');
    }

    public function edit($id)
    {
        $memo = Memo::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        return view('memos.edit', compact('memo'));
    }

    public function update(Request $request, $id)
    {
        $memo = Memo::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        $memo->update($request->only(['title', 'content']));
        return redirect('/');
    }

    public function destroy($id)
    {
        $memo = Memo::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        $memo->delete();
        return redirect('/');
    }
}
