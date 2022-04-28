<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingController extends Controller
{
    /**
     * Change Shopify theme
     *
     * @return \Illuminate\Http\Response
     */
    public function configureTheme(Request $request){
        // return $request;
        $shop = Auth::user();
        $themes = $shop->api()->rest('GET', '/admin/api/2022-04/themes.json');
        $shopThemes = $themes['body']['themes'];
        $searchedThemeRole = "main";
        //search for the right theme id with the main role
        $activeTheme = array_filter(
            $shopThemes->toArray(),
            function ($e) use (&$searchedThemeRole) {
                return $e['role'] == $searchedThemeRole;
            }
        );
        // return $activeTheme;
        $activeThemeId = $activeTheme[0]['id'];

        $theme_path = public_path('shop_themes/'.$request->name.'.txt');
        $theme_content = file_get_contents($theme_path);
        // return $theme_content;

        //Snippet to pass to rest api request
        $data = array(
            'asset'=> [
                'key' => 'snippets/'.$request->name.'.liquid',
                'value' => $theme_content
            ]
        );
        $shop->api()->rest('PUT', '/admin/api/2022-04/themes/'.$activeThemeId.'/assets.json', $data);

        // Save activated shop
        // Setting::updateOrCreate([
        //     'shop_id' => $shop->name,
        //     'shop_active_theme_id' => $activeThemeId,
        //     'activated' => true,
        // ]) ?  ['message' => 'Theme setup successfully'] : ['message' => 'Theme setup error!'];

        return Setting::updateOrCreate([
            'shop_id' => $shop->name,
            'shop_active_theme_id' => $activeThemeId,
            'activated' => true,
        ]) ?  ['message' => 'Theme setup successfully'] : ['message' => 'Theme setup error!'];

        // return response()->json(['success' => 'Theme has been configured successfully.']);
    }

    public function scriptInstall()
    {
        $shop = Auth::user();
        $domain = 'https://'.env('SHOPIFY_SHOP_DOMAIN');

        $shop = Auth::user();
        $data = array(
            "script_tag"=> [
                "display_scope"=> "all",
                "src"=> "$domain/js/ls-app.js",

                "event"=> "onload"
            ]

        );
        $shop->api()->rest('POST', '/admin/api/2022-04/script_tags.json', $data);

        return Setting::updateOrCreate([
            'shop_id' => $shop->name,
            'name' => 'script_tag',
            'src' => $domain.'/js/ls-app.js',
            'activated' => true,
        ]) ?  ['message' => 'Theme setup successfully'] : ['message' => 'Theme setup error!'];
        return response('success');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $script_setting = Setting::where('name', 'script_tag')->first();
        return view('settings', compact('script_setting'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function show(Setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function edit(Setting $setting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Setting $setting)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Setting $setting)
    {
        //
    }
}
