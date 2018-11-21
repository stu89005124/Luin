<?php

namespace App\Http\Controllers;

use App\Example;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ExampleController extends Controller
{
    public function index()
    {
        $example = Example::all();
        // dd($example);
        return view('example/index', [
            'example' => $example,
        ]);
    }
    public function update(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|min:3',
        ]);

        $example = Example::create($validated);
        //導頁面
        return redirect('example');

        // $example = new Example();
        // $example->title = $request->title;
        // $example->save();

    }
    public function destroy(Request $request, Example $example)
    {
        $example->delete();
        return redirect('example');
    }

    public function index1()
    {
        $example = Example::all();
        // dd($example);

        return response()->json(['result', true]);
    }
}
