@extends('layouts.app')
 
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Почетна страна</div>

                <div class="panel-body">
 
                    <p>Пријављен си!</p>
 
                    @if(Auth::user()->is_admin)
 
                        <p>
                            Прегледај све <a href="{{ url('admin/tickets') }}">тикете</a>
                        </p>
                    @else
 
                        <p>
                            Прегледај све твоје <a href="{{ url('my_tickets') }}">тикете</a> или <a href="{{ url('new-ticket') }}">отвори нови тикет</a>
                        </p>
 
                    @endif
 
                </div>
                
            </div>

        </div>
    </div>
</div>



@endsection