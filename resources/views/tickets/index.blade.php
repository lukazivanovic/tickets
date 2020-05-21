@extends('layouts.app')
 
@section('title', 'All Tickets')
 
@section('content')
<div class="container">

    @if(!(Auth::user()->is_admin))
    <a href="{{ url('new-ticket') }}" class="btn btn-primary mx-auto">отвори нови тикет</a>
    @endif
 
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-ticket"> Отворени тикети</i>
                    <span class="badge badge-dark">{{DB::table('tickets')->where('status', 'Отворен')->count()}}</span>
                </div>

                <div class="panel-body">
                    @if ($tickets->isEmpty())
                        <p>Нема тикета.</p>
                    @else
                        <table class="table table-sm">
                            <thead>
                            <tr>
                                <th>Категорија</th>
                                <th>Наслов</th>
                                <th>Стање</th>
                                <th>Време</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($tickets->reverse() as $ticket)
                            @if ($ticket->status === 'Отворен')
                                <tr class="bg-danger">
                                    <td>
                                        {{ $ticket->category->name }}
                                    </td>
                                    <td>
                                        <a href="{{ url('tickets/'. $ticket->ticket_id) }}" class="text-light">
                                            #{{ $ticket->ticket_id }} - {{ $ticket->title }}
                                        </a>
                                    </td>
                                    <td>
                                        @if ($ticket->status === 'Отворен')
                                            <span class="label label-success">{{ $ticket->status }}</span>
                                        @else
                                            <span class="label label-danger">{{ $ticket->status }}</span>
                                        @endif
                                    </td>
                                    <td>{{ $ticket->updated_at }}</td>
                                </tr>
                            @endif
                            @endforeach
                            </tbody>
                        </table>
 
                        {{ $tickets->render() }}
                    @endif

                    <div class="panel-heading">
                        <i class="fa fa-ticket"> Затворени тикети</i>
                        <span class="badge badge-dark">{{DB::table('tickets')->where('status', 'Затворен')->count()}}</span>
                     </div>
                    @if ($tickets->isEmpty())
                        <p>Нема тикета.</p>
                    @else
                        <table class="table table-sm">
                            <thead>
                            <tr>
                                <th>Категорија</th>
                                <th>Наслов</th>
                                <th>Стање</th>
                                <th>Време</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($tickets->reverse() as $ticket)
                            @if ($ticket->status === 'Затворен')
                                <tr class="bg-info">
                                    <td>
                                        {{ $ticket->category->name }}
                                    </td>
                                    <td>
                                        <a href="{{ url('tickets/'. $ticket->ticket_id) }}" class="text-light">
                                            #{{ $ticket->ticket_id }} - {{ $ticket->title }}
                                        </a>
                                    </td>
                                    <td>
                                        @if ($ticket->status === 'Отворен')
                                            <span class="label label-success">{{ $ticket->status }}</span>
                                        @else
                                            <span class="label label-danger">{{ $ticket->status }}</span>
                                        @endif
                                    </td>
                                    <td>{{ $ticket->updated_at }}</td>
                                </tr>
                            @endif
                            @endforeach
                            </tbody>
                        </table>
 
                        {{ $tickets->render() }}
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection