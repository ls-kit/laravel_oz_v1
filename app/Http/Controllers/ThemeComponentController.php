<?php

namespace App\Http\Controllers;

use App\Models\ThemeComponent;
use Illuminate\Http\Request;
use Laravel\Ui\Presets\Vue;
use File;
use RealRashid\SweetAlert\Facades\Alert;
class ThemeComponentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $themeComponents = ThemeComponent::all();
        return view('themes.index', compact('themeComponents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('themes.create');
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
        Alert::success('Component Created', 'component created successfully!');
        return redirect()->route('components.index');
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
        $component = ThemeComponent::find($id);

        if($request->hasFile('source')){

            $file = $request->file('source');
            $file->storeAs(public_path('shop_themes'), $request->name.'.txt');
        }

        if($request->hasFile('image')){
            $file = $request->file('image');
            $imageName = time().'-'. $request->name.'.'.$file->getClientOriginalExtension();
            $file->storeAs(public_path('images'), $imageName);
            $component->image = $imageName;

        }


        $component->name = $request->name;
        $component->label = $request->label;
        $component->description = $request->description;
        $component->save();
        Alert::success('Component Updated', 'component updated successfully!');
        return redirect()->route('components.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $component = ThemeComponent::find($id);
        // delete file
        $file = public_path('shop_themes/'.$component->name.'.txt');
        if(File::exists($file)){
            File::delete($file);
        }
        $component->delete();
        return redirect()->route('components.index');
    }
}
