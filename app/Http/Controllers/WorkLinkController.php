<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\worklinks;

class WorkLinkController extends Controller
{
    public function store()
    {
        $name = request('name');
        $link = request('link');
        $region = request('region');

        worklinks::create([
            'name' => $name,
            'link' => $link,
            'link_region' => $region,
            'status' => 'check'
        ]);

        $link = worklinks::where('link_region', $region)->get();

        return response()->json($link);
    }

    public function getWorkLink()
    {
        $region = request('region');
        $link = worklinks::where('link_region', $region)->get();

        return response()->json($link);
    }

    public function edit_work_link()
    {
        $name = request('name');
        $link = request('link');
        $status = request('status');
        $id = request('id');
        $link_region = request('link_region');

        $links = worklinks::where('id', $id)->get();
        foreach ($links as $lk) {
            $lk->name = $name;
            $lk->link = $link;
            $lk->status = $status;
            $lk->save();
        }

        $link = worklinks::where('link_region', $link_region)->get();
        return response()->json($link);
    }

    public function delete_link()
    {
        $id = request('id');
        $link_region = request('link_region');

        $link = worklinks::find($id);
        $link->delete();

        $link = worklinks::where('link_region', $link_region)->get();
        return response()->json($link);
    }
}
