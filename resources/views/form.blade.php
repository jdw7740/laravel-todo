@extends('layouts.app')

@section('title', isset($task) ? 'Edit Task' : 'Add Task')

@section('styles')
<style>
    .error-message {
        color: red;
        font-size: 0.8rem;
    }
</style>

@endsection

@section('content')


<form method='post' action='{{ isset($task) ? route('tasks.update', ['task' => $task->id]) : route('tasks.store') }}'>

    @csrf
    @isset($task)
        @method('PUT')
    @endisset
    <div class='mb-4'>
        <label for="title">Title:</label>
        <input type="text" name='title' id='title' 
        @class(['border-red-500' => $errors->has('title')])
        value="{{ $task->title ??  old('title')}}">
        @error('title')
        <p class='error'>{{ $message }}</p>
        @enderror
    </div>

    <div class='mb-4'>
        <label for="description">Description: </label>
        <textarea name="description" id="description" rows="5"  @class(['border-red-500' => $errors->has('description')])>{{ $task->description ?? old('description')}}</textarea>
        @error('description')
        <p class='error'>{{ $message }}</p>
        @enderror
    </div>

    <div class='mb-4'>
        <label for="long_description">Long Description: </label>
        <textarea name="long_description" id="long_description" rows="10"  @class(['border-red-500' => $errors->has('long_description')])>{{ $task->long_description ?? old('long_description')}}</textarea>
        @error('long_description')
        <p class='error'>{{ $message }}</p>
        @enderror
    </div>

    <div class="flex gap-2 items-center"></div>
    <button class='btn' type='submit'>@isset($task) Update Task @else Add task @endisset</button>
    <a class='link' href="{{ route('tasks.index')}}">Return Home</a>

</form>

@endsection