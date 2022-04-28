<?php

namespace App\Http\Controllers;

use App\Models\ThemeComponent;
use Illuminate\Http\Request;
use Laravel\Ui\Presets\Vue;

class ThemeComponentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('theme.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('themes.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'source' => 'required',
            'image' => 'required',
        ]);


        if(ThemeComponent::where('name', $request->name)->exists()){
            return redirect()->back()->with('error', 'Component already exists');
        }

        // save file
        $file = $request->file('source');
        $file->storeAs(public_path('shop_themes'), $request->name.'.txt');

        $file = $request->file('image');
        $imageName = time().'-'. $request->name.'.'.$file->getClientOriginalExtension();
        $file->storeAs(public_path('images'), $imageName);

        $component = new ThemeComponent();
        $component->name = $request->name;
        $component->label = $request->label;
        $component->description = $request->description;
        $component->image = $imageName;
        $component->save();
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $component = ThemeComponent::find($id);

        return view('themes.update', compact('component'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);


        $file = $request->file('source');
        $file->storeAs(public_path('shop_themes'), $request->name.'.txt');

        $file = $request->file('image');
        $imageName = time().'-'. $request->name.'.'.$file->getClientOriginalExtension();
        $file->storeAs(public_path('images'), $imageName);

        $component = ThemeComponent::find($id);
        $component->name = $request->name;
        $component->label = $request->label;
        $component->description = $request->description;
        $component->image = $imageName;
        $component->save();
        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
