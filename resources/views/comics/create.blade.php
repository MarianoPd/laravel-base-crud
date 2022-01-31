@extends('layouts.app')


@section('content')

@if ($errors->any())
    <div >
        <ul>
            @foreach ($errors->all() as $error)
                <li class="message error">{{$error}}</li>
            @endforeach
        </ul>
    </div>
    
@endif


<section class="archive">
    <div class="container center">
        
        <form action="{{route('comics.store')}}" method="POST" class="pb-1">
            @csrf

            <div class="pb-1">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" id="title" placeholder="..." 
                value="{{old('title')}}"
                class="form-text @error('title') form-invalid  @enderror" >

                @error('title')
                    <p class="form-err">
                        {{$message}}
                    </p>
                @enderror
            </div>
            
            <div class="pb-1">
                <label for="description" class="form-label">Description</label>
                <textarea type="text" name="description"
                 id="description" placeholder="..." value="{{old('description')}}"
                 class="form-text @error('description') form-invalid  @enderror" >
                </textarea>

                @error('description')
                    <p class="form-err">
                        {{$message}}
                    </p>
                @enderror
            </div>
            <div class="pb-1">
                <label for="thumb" class="form-label">Image</label>
                <input type="text" name="thumb" id="thumb"
                placeholder="Image Url" value="{{old('thumb')}}"
                class="form-text @error('thumb') form-invalid  @enderror" >

                  @error('thumb')
                    <p class="form-err">
                        {{$message}}
                    </p>
                @enderror
            </div>
            <div class="pb-1">
                <label for="price" class="form-label">Price</label>
                <input type="number" name="price" id="price" 
                placeholder="1.0" step="0.01"  value="{{old('price')}}"
                class="form-text @error('price') form-invalid  @enderror" >

                @error('price')
                    <p class="form-err">
                        {{$message}}
                    </p>
                @enderror
            </div>
            <div class="pb-1">
                <label for="series" class="form-label">Series</label>
                <input type="text" name="series" id="series" placeholder="..." 
                value="{{old('series')}}"
                class="form-text @error('series') form-invalid  @enderror" >

                @error('series')
                    <p class="form-err">
                        {{$message}}
                    </p>
                @enderror
            </div>
            <div class="pb-1">
                <label for="sale_date" class="form-label">Date</label>
                <input type="date" name="sale_date" id="sale_date" 
                placeholder="Date" value="{{old('sale_date')}}"
                class="form-text @error('sale_date') form-invalid  @enderror" >

                @error('sale_date')
                    <p class="form-err">
                        {{$message}}
                    </p>
                @enderror
            </div>
            <div class="pb-1">
                <label for="type" class="form-label">Type</label>
                <input type="text" name="type" id="type"
                placeholder="..." value="{{old('type')}}"
                class="form-text @error('type') form-invalid  @enderror" >

                @error('type')
                    <p class="form-err">
                        {{$message}}
                    </p>
                @enderror
            </div>
            <button type="submit" class="btn blue" >Invia</button>
            <button type="reset" class="btn blue" >Reset</button>
        </form>
    </div>
</section>
@endsection