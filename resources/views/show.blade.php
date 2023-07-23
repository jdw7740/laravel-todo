@extends('layouts.app')

@section('title', $task->title)

@section('content')
<div class="mb-4">
    <a 
    class='link'
    href="{{route('tasks.index')}}">&#128281; Back to Home</a>
</div>

<p class='mb-4 text-slate-700'>{{$task->description}}</p>
@if(isset($task->long_description))
<p class='mb-4 text-slate-700'>{{$task->long_description}}</p>
@endif
<p class='mb-4 text-sm text-slate-500'>
    Created: {{$task->created_at->diffForHumans()}} |
    Updated: {{$task->updated_at->diffForHumans() }}
</p>
<p class='mb-4'>
    @if($task->completed)
    <span class='font-medium text-green-500'>Completed</span>
    @else
    <span class='font-medium text-red-500'>Not Completed</span>
    @endif
</p>



<div class='flex gap-4'>
    <a class='btn' href="{{ route('tasks.edit', ['task' => $task])}}">Edit</a>



    <form method="POST" action="{{route('tasks.toggle-complete', ['task' => $task])}}">
        @csrf
        @method('PUT')
        <button type='submit' class='btn'> {{ $task->completed ? 'Mark as not complete' : 'Mark as completed'}}</button>
    </form>

    <form action="{{ route('tasks.destroy', ['task' => $task])}}" method='POST'>
    @csrf
    @method('DELETE')
    <button type='submit' class='btn'>Delete</button>
    </form>
</div>
@endsection