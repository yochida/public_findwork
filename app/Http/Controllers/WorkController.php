<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\work;
use App\position;
use App\province;
use App\region;
use Carbon\Carbon;

class WorkController extends Controller
{
    public function store()
    {
        $work = request('work');
        $positions = request('positions');
        $provinces = request('province');
        $regions = request('region');

        // dd(request()->all());
        $work = work::create([
            'topic' => $work['topic'],
            'register_detail' => $work['register_detail'],
            'start_date' => Carbon::createFromFormat('Y-m-d', $work['start_date'])->format('Y-m-d'),
            'finish_date' => Carbon::createFromFormat('Y-m-d', $work['finish_date'])->format('Y-m-d'),
            'announce' => $work['announce'],
            'link' => $work['link'],
            'user_id' => 1,
            'status' => 'new',
        ]);

        foreach ($positions as $position) {
            position::create([
                'work_id' => $work->id,
                'position' => $position['position'],
                'amount' => $position['amount'],
                'detail' => $position['detail'],
                'salary' => $position['salary'],
            ]);
        }

        foreach ($provinces as $province) {
            province::create([
                'work_id' => $work->id,
                'province' => $province,
            ]);
        }

        foreach ($regions as $region) {
            region::create([
                'work_id' => $work->id,
                'region' => $region,
            ]);
        }

        // dd($work->position, $work->province, $work->region);
        return response()->json('success');
    }

    // get dashboard new
    public function getWork_new()
    {
        $works = work::where('status','new')->orderBy('id', 'desc')->get();
        return response()->json($works);
    }

    public function getProvinces()
    {
        $works = work::where('status','new')->orderBy('id', 'desc')->get();
        $provinces = [];

        foreach ($works as $work) {
            array_push($provinces, $work->province);
        }

        return response()->json($provinces);
    }
    public function getRegion()
    {
        $works = work::where('status','new')->orderBy('id', 'desc')->get();
        $regions = [];

        foreach ($works as $work) {
            array_push($regions, $work->region);
        }

        return response()->json($regions);
    }
    public function getPosition()
    {
        $works = work::where('status','new')->orderBy('id', 'desc')->get();
        $positions = [];

        foreach ($works as $work) {
            array_push($positions, $work->position);
        }

        return response()->json($positions);
    }

    
    // get dashboard new

    // get all page
    public function allwork()
    {
        $works = work::whereDate('created_at','>=', Carbon::today() . ' 00:00:00')->whereDate('created_at','<=', Carbon::today() . ' 23:59:59')->orderBy('id', 'desc')->get();
        return response()->json($works);
    }

    public function getProvincesAll()
    {
        $works = work::whereDate('created_at','>=', Carbon::today() . ' 00:00:00')->whereDate('created_at','<=', Carbon::today() . ' 23:59:59')->orderBy('id', 'desc')->get();
        $provinces = [];

        foreach ($works as $work) {
            array_push($provinces, $work->province);
        }

        return response()->json($provinces);
    }
    public function getRegionAll()
    {
        $works = work::whereDate('created_at','>=', Carbon::today() . ' 00:00:00')->whereDate('created_at','<=', Carbon::today() . ' 23:59:59')->orderBy('id', 'desc')->get();
        $regions = [];

        foreach ($works as $work) {
            array_push($regions, $work->region);
        }

        return response()->json($regions);
    }
    public function getPositionAll()
    {
        $works = work::whereDate('created_at','>=', Carbon::today() . ' 00:00:00')->whereDate('created_at','<=', Carbon::today() . ' 23:59:59')->orderBy('id', 'desc')->get();
        $positions = [];

        foreach ($works as $work) {
            array_push($positions, $work->position);
        }

        return response()->json($positions);
    }
    // get all page

    public function editWork()
    {
        $work = request('work');
        $positions = request('positions');
        $provinces = request('province');
        $regions = request('region');

        $_work = work::find($work['id']);
        $_work->topic = $work['topic'];
        $_work->register_detail = $work['register_detail'];
        $_work->start_date = $work['start_date'];
        $_work->finish_date = $work['finish_date'];
        $_work->announce = $work['announce'];
        $_work->link = $work['link'];
        $_work->save();

        foreach($_work->position as $position){
            $position->delete();
        }
        foreach($_work->province as $province){
            $province->delete();
        }
        foreach($_work->region as $region){
            $region->delete();
        }

        foreach ($positions as $position) {
            position::create([
                'work_id' => $_work->id,
                'position' => $position['position'],
                'amount' => $position['amount'],
                'detail' => $position['detail'],
                'salary' => $position['salary'],
            ]);
        }

        foreach ($provinces as $province) {
            province::create([
                'work_id' => $_work->id,
                'province' => $province,
            ]);
        }

        foreach ($regions as $region) {
            region::create([
                'work_id' => $_work->id,
                'region' => $region,
            ]);
        }

        return response()->json('success');
    }

    public function delete(){
        $id = request('id');
        $_work = work::find($id);

        foreach($_work->position as $position){
            $position->delete();
        }
        foreach($_work->province as $province){
            $province->delete();
        }
        foreach($_work->region as $region){
            $region->delete();
        }

        $_work->delete();

        return response()->json('success');
    }

    // search by date 
    public function getWrokByDate(){
        $start = request('start_date');
        $finish = request('finish_date');

        $works = work::whereDate('created_at','>=', $start . ' 00:00:00')->whereDate('created_at','<=', $finish . ' 23:59:59')->orderBy('id', 'desc')->get();

        return response()->json($works);
    }
    public function getProvincesByDate(){
        $start = request('start_date');
        $finish = request('finish_date');

        $works = work::whereDate('created_at','>=', $start . ' 00:00:00')->whereDate('created_at','<=', $finish . ' 23:59:59')->orderBy('id', 'desc')->get();

        $provinces = [];

        foreach ($works as $work) {
            array_push($provinces, $work->province);
        }

        return response()->json($provinces);
    }
    
    public function getRegionsByDate(){
        $start = request('start_date');
        $finish = request('finish_date');

        $works = work::whereDate('created_at','>=', $start . ' 00:00:00')->whereDate('created_at','<=', $finish . ' 23:59:59')->orderBy('id', 'desc')->get();

        $regions = [];

        foreach ($works as $work) {
            array_push($regions, $work->region);
        }

        return response()->json($regions);
    }
    public function getPositionsByDate(){
        $start = request('start_date');
        $finish = request('finish_date');

        $works = work::whereDate('created_at','>=', $start . ' 00:00:00')->whereDate('created_at','<=', $finish . ' 23:59:59')->orderBy('id', 'desc')->get();

        $positions = [];

        foreach ($works as $work) {
            array_push($positions, $work->position);
        }

        return response()->json($positions);
    }
    // search by date 
    
    // search by topic 
    public function getWrokByTopic(){
        $search_topic = request('search_topic');

        $works = work::where('topic','like', '%' . $search_topic . '%')->orderBy('id', 'desc')->get();

        return response()->json($works);
    }
    public function getProvincesByTopic(){
        $search_topic = request('search_topic');

        $works = work::where('topic','like', '%' . $search_topic . '%')->orderBy('id', 'desc')->get();

        $provinces = [];

        foreach ($works as $work) {
            array_push($provinces, $work->province);
        }

        return response()->json($provinces);
    }
    
    public function getRegionsByTopic(){
        $search_topic = request('search_topic');

        $works = work::where('topic','like', '%' . $search_topic . '%')->orderBy('id', 'desc')->get();

        $regions = [];

        foreach ($works as $work) {
            array_push($regions, $work->region);
        }

        return response()->json($regions);
    }
    public function getPositionsByTopic(){
        $search_topic = request('search_topic');

        $works = work::where('topic','like', '%' . $search_topic . '%')->orderBy('id', 'desc')->get();

        $positions = [];

        foreach ($works as $work) {
            array_push($positions, $work->position);
        }

        return response()->json($positions);
    }
    // search by topic
}
