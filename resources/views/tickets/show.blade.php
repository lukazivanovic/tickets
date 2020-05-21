@extends('layouts.app')
 
@section('title', $ticket->title)
 
@section('content')
 
<div class="container">

    @if(Auth::user()->is_admin) 
        <a href="{{ url('admin/tickets') }}" class="btn btn-primary mx-auto">назад</a>
    @else
        <a href="{{ url('my_tickets') }}" class="btn btn-primary mx-auto">назад</a>
    @endif

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                <br>
                    #{{ $ticket->ticket_id }} - <h1 class="text-white">{{ $ticket->title }}</h1>
                </div>
 
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <div class="ticket-info" style="background-color:moccasin;">
                        <p class="mb-5">{{ $ticket->message }}</p>
                        <hr>
                        <p>Категорија: {{ $ticket->category->name }}</p>
                        <p>
                            @if ($ticket->status === 'Отворен')
                                Стање: <span class="bg-success">{{ $ticket->status }}</span>
                            @else
                                Стање: <span class="bg-danger">{{ $ticket->status }}</span>
                            @endif
                        </p>
                        <p>Време: {{ $ticket->created_at->diffForHumans() }}</p>
                    </div>
 
                </div>
            </div>
 
            <hr>
 
            @include('tickets.comments')
 
            <hr>
 
            @include('tickets.reply')
 
        </div>
    </div>
</div>
 
@endsection