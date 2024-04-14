<?php
use Carbon\Carbon;
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Chat</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.js"></script>
		<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        @vite(['resources/css/app.css', 'resources/js/app.js','resources/css/etc.css', 'resources/js/sendMessage.js', 'resources/js/etc.js'])
	</head>

	
    @extends("layout.navbar")

@section('content')
	
	<body>
		<div class="container-fluid h-100">
			<div class="row justify-content-center h-100">
				<div class="col-md-4 col-xl-3 chat"><div class="card mb-sm-3 mb-md-0 contacts_card">
					<div class="card-header">
						<div class="input-group">
							<input type="text" placeholder="Search..." name="" class="form-control search">
							<div class="input-group-prepend">
								<span class="input-group-text search_btn"><i class="fas fa-search"></i></span>
							</div>
						</div>
					</div>
					<div class="card-body contacts_body">
						<ui class="contacts">
				
						
						
						@foreach($friends as $friend)
				
					
				
					
						<li class="hup divide">
                        <a href="{{route('room',$friend->id)}}" style="text-decoration:none;" class="d-flex bd-highlight">
							
								<div class="pp"><span>{{$friend->first_name[0] . $friend->second_name[0]}}</span></div>
									
								@if($friend->last_seen== 'now')
								<span class="online_icon"></span>
								@endif
							
								<div class="user_info">
								
									<span>{{$friend->first_name ." ".$friend->second_name}}</span>
									<p>{{$friend->message}}</p>

									<span class="user_id" id="{{$friend->id}}"></span>
								</div>
					
                            </a> 
							
						</li>

                        @endforeach
						</ui>
					</div>
					<div class="card-footer"></div>
				</div>
			</div>
			<p class="usert" ig="{{$user[0]}}"></p>
				<div class="col-md-8 col-xl-6 chat">
					<div class="card">
						<div class="card-header msg_head">
							<div class="d-flex bd-highlight">
								<div class="img_cont">
								<div class="pp"><span>{{$user[0]->first_name[0] . $user[0]->second_name[0]}}</span></div>
								</div>
								<div class="user_info">
									<span>Chat with <small>{{$user[0]['first_name']}}</small></span>
								<p>@if($user[0]->last_seen== 'now')
								<i class="online_icon" style="display:inline-block;margin-top:0%;"></i>online
								@else
							<i class="offline">Last Seen  {{Carbon::parse($user[0]->last_seen)->format('l,F,j Y g:i A')}}</i>	
								@endif</p>
								</div>
								<div class="video_cam">
									<span><i class="fas fa-video"></i></span>
									<span><i class="fas fa-phone"></i></span>
								</div>
							</div>
							<span id="action_menu_btn"><i class="fas fa-ellipsis-v"></i></span>
							<div class="action_menu">
								<ul>
									<li><i class="fas fa-user-circle"></i> View profile</li>
									<li><i class="fas fa-users"></i> Add to close friends</li>
									<li><i class="fas fa-plus"></i> Add to group</li>
									<li><i class="fas fa-ban"></i> Block</li>
								</ul>
							</div>
						</div>
						<p class="chat_id" id="{{$messages[0]['chat_id']}}"></p>
						<div class="card-body msg_card_body chat-container">
						
						@foreach($messages as $message)
						
				
				@if($message->user_id != Auth::id())
						<div class="d-flex justify-content-start mb-4 " id="{{$message['id']}}">

						
							
								<div class="msg_cotainer">
									<span class="otherChat" check="{{$message['check']}}" id="{{$message['id']}}">{{$message['message']}}</span>
									
								</div>
							</div>
							@else
							
							<div class="d-flex justify-content-end mb-4"  id="{{$message['id']}}">
								
								<div class="msg_cotainer">
							<span class="ownerChat" check="{{$message['check']}}"  id="{{$message['id']}}">{{$message['message']}}</span>
								</div>
								
							</div>
							@endif

@endforeach
						</div>
						<div class="card-footer">
						<span class="typing"></span>
							<form action="" id="form">
							<input type="hidden" name="" class="id_r" value="{{$chat_id[0]['chat_id']}}">

<input type="hidden" class="reciever_id" value="{{$user['0']['id']}}">

<input type="hidden" class="owner_id" value="{{auth()->user()->id}}">

							<div class="input-group">
								<div class="input-group-append">
									<span class="input-group-text attach_btn"><i class="fas fa-paperclip"></i></span>
								</div>
								<textarea name="" class="form-control type_msg " id="input-message" placeholder="Type your message..."></textarea>
								
								<div class="input-group-append">
									<span class="input-group-text send_btn"><button class="nym" ><i class="fas fa-location-arrow"></i></button></span>
								</div>
							</div>
		
							</form>
						</div>

					</div>
				</div>
			</div>
		</div>





		

	</body>
</html>

@endsection