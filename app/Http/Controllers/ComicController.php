<?php

namespace App\Http\Controllers;

use App\Comic;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comics = Comic::all();
        
        return view('comics.index', compact('comics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('comics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $new_comic = new Comic();
        $data['slug']= $this->makeSlug($data['title']);
        
        if(!$data['thumb']){
            $data['thumb'] = 'https://i.pinimg.com/originals/bd/29/cc/bd29cccfe6f31ff008079c20872944d4.jpg';
        }
        if(!$data['type']){
            $data['type'] = 'comic';
        }
        $new_comic->fill($data);
        
        $new_comic->save();
        return redirect()->route('comics.show',$new_comic);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comic = Comic::find($id);
        if($comic){
            return view('comics.show',compact('comic'));
        }
        abort(404, 'Comic not found in the database');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comic = Comic::find($id);
        if($comic){
            return view('comics.edit', compact('comic'));
        }
        abort(404, 'Comic not found');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comic $comic)
    {
        $data =  $request->all();
        $data['slug']= $this->makeSlug($data['title']);
        if(!$data['thumb'] || $data['thumb'] === ''){
            $data['thumb'] = 'https://i.pinimg.com/originals/bd/29/cc/bd29cccfe6f31ff008079c20872944d4.jpg';
        }
        if(!$data['type']){
            $data['type'] = 'comic';
        }
        $comic->update($data);
        return redirect()->route('comics.show', $comic);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comic $comic)
    {
        $comic->delete();
        return redirect()->route('comics.index');
    }

    private function makeSlug($stringToSlug){
        $slug = Str::slug($stringToSlug, '-');
        if(Comic::where('slug',$slug)->exists()){
            $slug = $this->incrementSlug($slug);
        }
        return $slug;
    }

    private function incrementSlug($slug){
        $original = $slug;
        $count = 2;
        while(Comic::where('slug',$slug)->exists()){
            $slug = "{$original}-".$count++;
        }
        return $slug;
    }
}
