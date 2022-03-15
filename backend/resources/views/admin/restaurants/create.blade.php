@extends('layouts.app')

@section('content')
    <div class="container">

        <h1 class="text-center mb-3">Add new restaurant</h1>

        <form action="{{route('restaurants.store')}}" method="Post" class="mb-5" enctype="multipart/form-data">
            @csrf

            {{-- restaurant name --}}
            <div class="form-group">
                <label for="name">name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Add name"  maxlength="110" required value="{{old('name')}}">
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            {{-- restaurant description --}}
            <div class="form-group">
                <label for="description">description</label>
                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" placeholder="Add restaurant description" rows="10">{{old('description')}}</textarea>
                @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            {{-- restaurant email --}}

            <div class="form-group">
                <label for="email">email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Add email"  maxlength="100" required value="{{old('email')}}">
                @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            {{-- restaurant address --}}
           <div class="form-group">
                <label for="address">address</label>
                <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" placeholder="Add address"  maxlength="255" required value="{{old('address')}}">
                @error('address')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            {{-- restaurant city --}}
            <div class="form-group d-none">
                <label for="city">city</label>
                <input type="text" class="form-control @error('city') is-invalid @enderror" id="city" name="city" placeholder="Add city"  maxlength="100" required value="Roma">
                @error('city')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

             {{-- restaurant country --}}
            <div class="form-group d-none">
                <label for="country">country</label>
                <input type="text" class="form-control @error('country') is-invalid @enderror" id="country" name="country" placeholder="Add country"  maxlength="255" required value="Italia">
                @error('country')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

             {{-- restaurant post_code --}}
            <div class="form-group d-none">
                <label for="post_code">post_code</label>
                <input type="text" class="form-control @error('post_code') is-invalid @enderror" id="post_code" name="post_code" placeholder="Add post_code"  maxlength="255" required value="00100" pattern="[0-9]{5}">
                @error('post_code')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

             {{-- restaurant phone --}}
            <div class="form-group">
                <label for="phone">phone</label>
                <input type="tel" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" placeholder="Add phone"  pattern="[0-9]{10,15}" required value="{{old('phone')}}">
                @error('phone')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            {{-- categories checkbox --}}
            <div class="form-group">
                <h2 class="d-block">Categories</h2>
                <ul class="edit-container">
                @foreach ($categories as $category)
                    <li @error('categories') is-invalid @enderror">
                        <input class="form-check-input" type="checkbox" id="{{$category->name}}" value="{{$category->id}}" name="categories[]" {{in_array($category->id, old("categories", [])) ? 'checked' : ''}}>
                        <label class="form-check-label" for="{{$category->name}}">{{$category->name}}</label>
                    </li>
                @endforeach
                </ul>
                @error('categories')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            {{-- add image upolad --}}
            <div class="form-group">
                <label for="image">aggiungi immagine</label>
                <input type="file" class="form-control-file" id="image" name="image_cover">
                @error('image_cover')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            {{-- submit button --}}
            <button type="submit" class="btn btn-primary">Add restaurant</button>

        </form>

        <a href="{{route('restaurants.index')}}"><button type="button" class="btn btn-dark">Restaurants dashboard</button></a>
    </div>
@endsection
