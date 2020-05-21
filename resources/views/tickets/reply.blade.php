@if ($ticket->status === 'Отворен')
<div class="panel panel-default">
    <div class="panel-heading">Додај поруку</div>
        <div class="panel-body">
            <div class="comment-form">
                <form action="{{ url('comment') }}" method="POST" class="form">
                    {!! csrf_field() !!}
 
                    <input type="hidden" name="ticket_id" value="{{ $ticket->id }}">
 
                    <div class="form-group{{ $errors->has('comment') ? ' has-error' : '' }}">
                        <textarea rows="10" id="comment" class="form-control" name="comment"></textarea>
 
                        @if ($errors->has('comment'))
                            <span class="help-block">
                               <strong>{{ $errors->first('comment') }}</strong>
                            </span>
                        @endif
                    </div>
 
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Пошаљи</button>
                    </div>

                </form>
                
                @if(Auth::user()->is_admin)
                    @if($ticket->status === 'Отворен')
                        @foreach($ticket->comments as $comment)
                            @if($comment)
                                <form action="{{ url('admin/close_ticket/' . $ticket->ticket_id) }}" method="POST">
                                    {!! csrf_field() !!}
                                    <button type="submit" class="btn btn-danger">Затвори</button>
                                </form>
                                @break
                            @endif
                        @endforeach
                    @endif
                @endif

            </div>
        </div>
</div>
@endif