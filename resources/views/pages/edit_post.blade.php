@extends('layouts.masters.main')

@section('page-content')
    <div class="container">

      @include('layouts.partials.nav')
      
      @include('layouts.partials.form_errors')

      {!! Form::model($post, ['route' => 'edit_post', 'id' => 'edit-post-form']) !!}
    
        {!! Form::hidden('post_id', $post->id) !!}
        {!! Form::label('title', 'Title') !!}
        {!! Form::text('title', null, ['id' => 'title', 'class' => 'form-control', 'placeholder' => 'title', 'required']) !!}
        <br>
        {!! Form::label('category', 'Category') !!}
        <select name="category" class="form-control">

          @foreach($categories as $category)
            @if($category -> id == $post -> category_id)
                <option value="{{ $category->id }}" selected>{{ $category->name }}</option>

            @else
                <option value="{{ $category->id }}">{{ $category->name }}</option>

            @endif
          @endforeach
        </select>  
        <br>
        {!! Form::label('body', 'Body') !!}
        {!! Form::textarea('body', null, ['id' => 'body', 'class' => 'form-control', 'placeholder' => 'Tell us about your question', 'required']) !!}
        <br>
        {!! Form::button('Post', ['class' => 'btn btn-lg btn-primary btn-block', 'type' => 'submit']) !!}

      {!! Form::close() !!}

    </div>
    @stop