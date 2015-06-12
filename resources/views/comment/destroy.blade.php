{!! Form::open(array('route' => array('comment.destroy',$comment),'class' => 'delete-comment-form')) !!}
    {!! Form::hidden('_method', 'DELETE') !!}
    <span class="glyphicon glyphicon-trash pull-right delete-comment"></span>
{!! Form::close() !!}
