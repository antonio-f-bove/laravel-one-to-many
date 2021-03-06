@extends('layouts.app')

@section('content')

<div class="container">
  @if ($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif

  <form action="{{ route('admin.posts.store') }}" method="POST"
  class="input-form"
  >
    @csrf
  
    <div class="form-group">
      <label for="title">Title</label>
      <input type="text" id="title" name="title"
      class="form-control @error('title') is-invalid @enderror"
      placeholder="input title"
      value="{{ old('title') }}"
      >
      @error('title')
        <small class="invalid-feedback">{{ $message }}</small>    
      @enderror
    </div>

    <div class="form-group">
      <label for="category_id">Category</label>
      <select name="category_id" id="category_id"
      class="form-control @error('category_id') is-invalid @enderror"
      >
        <option value="">-- none --</option>
        @foreach ($categories as $category)
        <option value="{{ $category->id }}"
        {{ old('category_id') == $category->id ? 'selected' : '' }}
        >
          {{ $category->name }}
        </option>
        @endforeach
      </select>
      @error('category_id')
        <small class="invalid-feedback">{{ $message }}</small>    
      @enderror
    </div>

    <div class="form-group">
      <label for="content">Content</label>
      <textarea id="content" name="content"
      class="form-control @error('content') is-invalid @enderror"
      placeholder="input content" rows="20"
      >
        {{ old('content') }}
      </textarea>
      @error('content')
        <small class="invalid-feedback">{{ $message }}</small>    
      @enderror
    </div>

    <button class="btn btn-primary" type="submit">
      Create Post
    </button>
    <button class="btn btn-primary" type="reset">
      Reset
    </button>
  </form>
</div>

@endsection