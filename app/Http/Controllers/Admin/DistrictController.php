<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

use App\Models\District;
use App\Models\DistrictTranslation;
use App\Models\ProvinceTranslation;

class DistrictController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $locale = Session::get('locale');
        $district = DistrictTranslation::where('locale', $locale)->orderBy('district_id', 'DESC')->get();
        return view('admin.district.index', compact('district'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $locale = Session::get('locale');
        $province = ProvinceTranslation::where('locale', $locale)->get();
        return view('admin.district.create', compact('province'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datas = $request->all();
        $data = new District();
        $data->user_id = Auth::User()->id;
        $data->status = 'true';
        $data->fill([
            'en' => [
                'name' => $datas['name:en'],
                'province_id' => $datas['province_id:en'],
                'prefix' => $datas['prefix:en'],
            ],
            'vi' => [
                'name' => $datas['name:vi'],
                'province_id' => $datas['province_id:vi'],
                'prefix' => $datas['prefix:vi'],
            ],
            'cn' => [
                'name' => $datas['name:cn'],
                'province_id' => $datas['province_id:cn'],
                'prefix' => $datas['prefix:cn'],
            ]
        ]);
        $data->save();
        return redirect('admin/district')->with('success','updated successfully');
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
        $locale = Session::get('locale');
        $district = DistrictTranslation::where('district_id', $id)->get();
        $province = ProvinceTranslation::where('locale', $locale)->get();
        return view('admin.district.edit', compact('district', 'province', 'id', 'locale'));
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
        $datas = $request->all();
        $District = District::find($id);
        $District->fill([
            'en' => [
                'name' => $datas['name:en'],
                'province_id' => $datas['province_id:en'],
                'prefix' => $datas['prefix:en'],
            ],
            'vi' => [
                'name' => $datas['name:vi'],
                'province_id' => $datas['province_id:vi'],
                'prefix' => $datas['prefix:vi'],
            ],
            'cn' => [
                'name' => $datas['name:cn'],
                'province_id' => $datas['province_id:cn'],
                'prefix' => $datas['prefix:cn'],
            ]
        ]);
        $District->save();

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
