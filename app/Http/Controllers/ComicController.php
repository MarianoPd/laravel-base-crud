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
        $comics = Comic::orderBy('id','desc')->paginate(6);
        
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
        $request->validate($this->validationData(),$this->validationErr());

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
        $request->validate($this->validationData(),$this->validationErr());
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
        return redirect()->route('comics.index')->with('deleted', "Il comic $comic->title è stato eliminato");
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

    private function validationData(){
        return [
            'title'=> "required|max:50|min:2",
            'description' => "max:1000",
            'thumb'=> "max:200",                
            'price' => "required|numeric|min:1|max:100",
            'series'=> "required|min:2|max:50",
            'sale_date'=> "required|date|after:1934-01-01|before:today",
            'type' => "max:50",
        ];
    }
    private function validationErr(){
        return [
            'title.required'=> 'You have to insert a title',
            'title.max'=> 'The title is too long',
            'title.min'=> 'The title is too short',

            'description.max'=> 'The description is too long',

            'thumb.max'=> 'The link is too long',

            'price.required'=> 'Whe are a company. Put in a damn price!',
            'price.numeric'=> 'Whe are a company. Put in a damn price!',
            'price.min'=> 'Whe don t do charity. The price is too low ',
            'price.max'=> 'Calm down ! The price is too hight, but the CEO is proud ',

            'series.required'=> 'You have to insert the serie of the comic',
            'series.min'=> 'Serie field too short',
            'series.max'=> 'Serie field too long',

            'sale_date.required' => "You have to insert a release date",
            'sale_date.date' => "Not a date",
            'sale_date.after' => "The date is too old",
            'sale_date.before' => "The date is too futuristic",

            'type.max'=> 'Type field too long'
        ];
    }
}
