@extends('layouts.app')


@section('content')

<section class="archive">
    <div class="container">
        
        <form action="{{route('comics.store')}}" method="POST" class="pb-1">
            @csrf
            <div class="pb-1">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" id="title" placeholder="..." class="form-text" 
                required  minlength="2" maxlength="50">
            </div>
            
            <div class="pb-1">
                <label for="description" class="form-label">Description</label>
                <textarea type="text" name="description" id="description" placeholder="..." class="form-text" maxlength="1000"></textarea>
            </div>
            <div class="pb-1">
                <label for="thumb" class="form-label">Image</label>
                <input type="text" name="thumb" id="thumb" placeholder="Image Url" class="form-text"
                  minlength="2" maxlength="200">
            </div>
            <div class="pb-1">
                <label for="price" class="form-label">Price</label>
                <input type="number" name="price" id="price" placeholder="1.0" step="0.01" min="0" max="99.99" class="form-text" required>
            </div>
            <div class="pb-1">
                <label for="series" class="form-label">Series</label>
                <input type="text" name="series" id="series" placeholder="..." class="form-text"
                required  minlength="2" maxlength="50">
            </div>
            <div class="pb-1">
                <label for="sale_date" class="form-label">Date</label>
                <input type="date" name="sale_date" id="sale_date" placeholder="Date" class="form-text" required>
            </div>
            <div class="pb-1">
                <label for="type" class="form-label">Type</label>
                <input type="text" name="type" id="type" placeholder="..." class="form-text" maxlength="50">
            </div>
            <button type="submit" class="btn blue" >Invia</button>
            <button type="reset" class="btn blue" >Reset</button>
        </form>
    </div>
</section>
@endsection