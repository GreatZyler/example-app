<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/sendMessage.js'])
</head>
<body>


<main class="">
<nav id="nav-online" class="w-100 d-flex"> <h3 class="white pl-1">Chat With {{$user['0']['name']}}</h3> <p>welcme {{auth()->user()->name}}</p></nav>

        
<section id="section-chat" class=" card  mx-auto">





<div class="chat-container">
@foreach($messages as $message)
        <div class="message {{ $message->owner== Auth::id() ? 'self' : 'other' }}">
            <div class="message-content">
                <p>{{ $message->message }}</p>
            </div>
        </div>
    @endforeach

</div>

<span class="typing"></span>
<form id="form" class="w-100 d-flex flex-col">

<input type="hidden" name="" class="id_r" value="{{$chat_id[0]['chat_id']}}">

<input type="hidden" class="reciever_id" value="{{$user['0']['id']}}">

<input type="hidden" class="owner_id" value="{{auth()->user()->id}}">

    <span class="pl-1" id="span-typing"></span>
{{--            <label for="input-message">Message:</label>--}}
    <input
            id="input-message"
            class="py-2 pl-1"
            placeholder="Type a message"
           type="text">
</form>

</section>

</main>


</body>
</html>