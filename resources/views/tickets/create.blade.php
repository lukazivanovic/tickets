@extends('layouts.app')
 
@section('title', 'Open Ticket')
 
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
                <div class="panel-heading">Отвори нови тикет</div>
 
                <div class="panel-body">
 
 
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
 
                    <form class="form-horizontal" role="form" method="POST">
                        {!! csrf_field() !!}
 
                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label for="title" class="col-md-4 control-label">Наслов</label>
 
                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}">
 
                                @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
 
                        <div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
                            <label for="category" class="col-md-4 control-label">Категорија</label>
 
                            <div class="col-md-6">
                                <select id="category" type="category" class="form-control" name="category">
                                    <option value="">---ИЗАБЕРИ КАТЕГОРИЈУ---</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
 
                                @if ($errors->has('category'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('category') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
 
                        <div class="form-group{{ $errors->has('message') ? ' has-error' : '' }}">
                            <label for="message" class="col-md-4 control-label">Порука</label>
 
                            <div class="col-md-6">
                                <textarea rows="10" id="message" class="form-control" name="message"></textarea>
 
                                @if ($errors->has('message'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('message') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
 
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-ticket"></i> Отвори тикет
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
 
@endsection