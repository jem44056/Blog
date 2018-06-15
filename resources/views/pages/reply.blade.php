@extends('layouts.masters.main')

    @section('page-content')
    <div class="container">

      @include('layouts.partials.nav')

       <div class="well">
         <div class="media">
           <div class="media-body">
             <h4 class="media-heading">{{ $post['title']}}</h4>
             <p class="text-right">By: {{ $post->user['name']}}</p> 
             <p>{{$post['body']}}</p>
             <ul class="list-inline list-unstyled">
                <li><span><i class="glyphicon-calendar"></i> {{$post->created_at->diffForHumans()}}</span></li>         
              </ul>
           </div>
         </div> 
       </div>

    @forelse($post->replies as $reply)

     <div class="well">
         <div class="media">
           <div class="media-body">
             <p class="text-right">By: {{$reply->user['name']}}</p> 
             <p>{{$reply->body}}</p>
             <ul class="list-inline list-unstyled">
                <li><span><i class="glyphicon-calendar"></i> {{$reply->created_at->diffForHumans()}}</span></li>        
                </ul>
           </div>
         </div>

         @if( $currentUser && $currentUser->id == $reply->user_id )

           {!! Form::open(['route' => 'delete_reply', 'id' => 'delete-reply-form', 'method' => 'DELETE', 'class' => 'text-right']) !!}

            {!! Form::hidden('reply_id', $reply->id) !!}
            
            {!! Form::button('Delete', ['class' => 'btn btn-danger', 'type' => 'submit']) !!}

           {!! Form::close() !!} 

           @endif
       </div>

       @empty
       <p>Be first to reply</p>
       @endforelse

       @if($currentUser )

         {!! Form::open(['route' => 'save_reply', 'id' => 'reply-question-form']) !!}

          
          {!! Form::hidden('slug', $post->slug) !!}
          {!! Form::textarea('body', null, ['id' => 'body', 'class' => 'form-control', 'placeholder' => 'Type your reply here', 'required']) !!}
          <br>
          {!! Form::button('Reply', ['class' => 'btn btn-lg btn-primary btn-block', 'type' => 'submit']) !!}

         {!! Form::close() !!}

         @endif

    </div> <!-- /container -->
    @stop
