<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Realtime Chat App</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        .list-group{
            overflow-y: scroll;
            height: 200px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row" id="app">

            <div class="offset-3 col-6">
                
                <li class="list-group-item active">
                    Realtime Chat Room
                    <span class="badge badge-pill badge-success">@{{ numberOfUsers }}</span>
                </li>

                <div class="badge badge-pill badge-success">@{{ typing }}</div>
                <ul class="list-group" v-chat-scroll="{always: true, smooth: true, scrollonremoved:true, smoothonremoved: true}">
                    <message 
                    v-for="value,index in chat.message" 
                    :key="value.index" 
                    :color="chat.color[index]"
                    :user="chat.user[index]"
                    :time="chat.time[index]"
                    >
                        @{{ value }}
                    </message>                    
                </ul>

                <input type="text" v-model="message" @keyup.enter="send" class="form-control" name="" id="" placeholder="Type Here...">
            </div>


        </div>
    </div>
    
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>