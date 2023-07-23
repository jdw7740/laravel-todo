@extends('layouts.app')


@section('title', 'List of Tasks')

@section('content')
<nav class='mb-4'>
<a href="{{ route('tasks.create')}}" class='link'>Create Task</a>
</nav>
<ul>
@forelse ($tasks as $task)
    <li><a href="{{ route('tasks.show', ['task' => $task->id])}}"
        @class(['line-through' => $task->completed])
        >{{$task->title}}</a></li>
@empty
    <li>No Items in list</li>
@endforelse
</ul>

@if($tasks->count())
   <nav class='mt-4'>
{{$tasks->links() }}
   </nav>
@endif
@endsection