{!! Form::open(array('route' => 'comment.store' ,'method' => 'POST')) !!}
    <div class="form-group">
        {!! Form::label('comment','Make comment:') !!}
        {!! Form::textarea('comment',null,['class' => 'form-control']) !!}
        {!! Form::hidden('article_id',$article) !!}
    </div>
    {!! Form::submit('Submit',['class' => 'btn btn-success btn-block']) !!}
{!! Form::close() !!}
