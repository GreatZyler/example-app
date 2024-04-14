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
        @vite(['resources/css/app.css','resources/css/etc.css', 'resources/js/copied.js'])

 

	</head>

    @extends("layout.navbar")

@section('content')

<p class="auth" id="{{auth()->user()->id}}"></p>

<div class="spl">
			<div class="col-md-4 col-xl-3 chat"><div class="card mb-sm-3 mb-md-0 contacts_card  etc-card">
								<div class="card-header">
									<p class="fl">Friends List</p>
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
									<li class=" hup">
									<a href="{{route('room',$friend['id'])}}" style="text-decoration:none;">
										<div class="d-flex bd-highlight">
											<div class="img_cont2">
											<div class="pp"><span>{{$friend->first_name[0] . $friend->second_name[0]}}</span></div>
												@if($friend->last_seen== 'now')
								<i class="online_icon2" style="display:block;"></i>
								
								@endif
											</div>
											<div class="user_info">
												<span>{{$friend['first_name']." ". $friend['second_name']}}</span>
												
											</div>
										</div>
										</a> 
									</li>
									@endforeach
							
									
									</ui>
								</div>
								<div class="card-footer"></div>
							</div>

							<div class="searched">
								<p class="close">X</p>
							<div class="loader" id="loader-2">
					<span></span>
					<span></span>
					<span></span>
					</div>
					<div class="kj">
									<div class="dot-elastic"></div>
							</div>

			</div>

			<div class="half">
				<p class="fr">Friend Request ({{count($request)}})</p>
			
				@foreach($request as $result)
			
					
					
					<div class="hup pt-4 pl-2">
					
										<div class="d-flex bd-highlight">
											<div class="img_cont">
												<img src="https://static.turbosquid.com/Preview/001292/481/WV/_D.jpg" class="rounded-circle user_img">
												<span class="online_icon"></span>
											</div>
											<div class="us_fo">
												<span>{{$result['first_name']." ". $result['second_name']}}</span>
												
												<p class="af acp-request" un="{{auth()->user()->id}}" id="{{$result['id']}}">Accept Request <div class="lader" id="loader-1"></div></p>
											</div>
										</div>
									

							</div>
							@endforeach

			</div>



</div>
</body>
</html>

@endsection
