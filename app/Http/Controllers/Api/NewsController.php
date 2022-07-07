<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return [News::with('staff')->where('is_active', 1)
        ->orderBy('id', 'desc')
        ->get()];
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
        $news = new News();
        $news->staff_id = $request->staff_id;
        $news->title = $request->title;
        $news->content = $request->content;
        $news->date_post = $request->date_post;
        $news->picture = $request->picture;
        $news->is_active = 1;

        $news->save();
        return $this->show($news->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return News::with('staff')->findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $news = $this->show($request->id);
        $news->staff_id = $request->staff_id;
        $news->title = $request->title;
        $news->content = $request->content;
        $news->date_post = $request->date_post;
        $news->picture = $request->picture;
        $news->is_active = 1;

        $news->save();
        return $news;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $news = $this->show($id);
        $news->is_active = -1;

        $news->save();
    }
}
