<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Memo;
use Illuminate\Support\Facades\Auth;

class MemoController extends Controller
{
    public function index(Request $request)
    {
        $query = Memo::where('user_id', Auth::id());

        if ($search = $request->input('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('content', 'like', "%{$search}%");
            });
        }

        $memos = $query->latest()->paginate(5)->withQueryString();

        return view('memos.index', compact('memos', 'search'));
    }


    public function create()
    {
        return view('memos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

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
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $memo = Memo::where('id', $id)->where('user_id', Auth::id())->firstOrFail();

        $memo->update([
            'title' => $request->input('title') ?? '',
            'content' => $request->input('content') ?? '',
        ]);

        return redirect('/');
    }

    public function destroy($id)
    {
        $memo = Memo::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        $memo->delete();
        return redirect('/');
    }
}
