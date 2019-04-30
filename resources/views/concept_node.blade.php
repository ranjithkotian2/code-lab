@extends('layouts.app')

@section('content')

<style type="text/css" media="screen">
    #editor {
    	width: 615px;
    	height: 500px;
    }
    #concept{
        margin-right: 7%;
        margin-left: 5%;
    }
    .crimson{
        color: crimson;
        text-align: -webkit-center;
    }
    .des{
        margin-top: 5%;
        letter-spacing: 2px;
        font-weight: 100;
    }
    .wrapper{
        margin-left: 25%;
        margin-top: 5%;
        margin-bottom: 5%;
    }
    .ml{
        margin-left: 28%;
    }
    .custom{
        margin-top: 5%;
        margin-left: 5%;
    }
    ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
        overflow: hidden;
        background-color: #333;
    }

    li {
        float: left;
    }

    li a {
        display: block;
        color: white;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
    }

    li a:hover:not(.active) {
        background-color: #111;
    }

    .active {
        background-color: #4CAF50;
    }
    #right{
        float: right;
    }
    button {
        background: #3d4852;
    }

    input[type=text] {
        font-size: 20px;
        padding: 12px 20px;
        margin: 8px 0;
        box-sizing: border-box;
    }
    #test_button, #submit_button {
        box-shadow: 0 1.5px 4px rgba(0,0,0,0.24), 0 1.5px 6px rgba(0,0,0,0.12);
        border: 0;
        border-radius: 5px;
        text-align: center;
        width: 110px;
        color: #fff;
        background-color: #5bc0de;
        display: inline-block;
        margin-bottom: 0;
        font-weight: normal;
        vertical-align: middle;
        touch-action: manipulation;
        background-image: none;
        padding: 6px 12px;
        font-size: 14px;
        line-height: 1.42857143;
        box-sizing: border-box;
        align-items: flex-start;
    }

    #test_button:hover{
        background-color: #1d68a7;
    }

    #submit_button:hover{
        background-color: #1d68a7;
    }

    .des {
        border-style: outset;
        border-color: gray;
    }
    body{
        color: black;
        background-color: rgba(29,39,54,.16);
    }

    #completed_img {
        width: 100px;
    }

    /*.des h2{*/
    /*    text-align: center;*/
    /*}*/
    /*#nodes{*/
    /*    align-content: center;*/
    /*}*/
</style>
<body onload="getS()">
<div id="concept">
	<div>
        <h1 class="crimson">
            {{$data['name']}}
            @php
                if ($conceptNodeSubmission['completed'] == true)
                {
                    echo "<img src='http://127.0.0.1:8000/images/right_mark.png' id = 'completed_img'>";
                }
            @endphp
        </h1>
        {{--<h2>Type: {{$data['type']}}</h2>--}}
        <h3 class="des">
            {{$data['description']}}
        </h3>
        <div class="wrapper">
        <iframe width="560" height="315" src="{{$data['video_url']}}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>

        <h2>
               PROBLEM STATEMENT : {{$data['problem_statement']}}
        </h2>
        </div>
    </div>
</div>

<div class="des">
<h2>TASKS FOR {{$data['name']}}:</h2>

    <div id="nodes">
        @php
            foreach ($tasks as $task)
            {
                echo "<div class='links'><a class='link_a' href='http://127.0.0.1:8000/tasks/{$task['id']}/get_view'><h1 class='link_name' id = {$task['id']}>
                        {$task['problem_statement']}
                        </h1></a></div>";
            }
        @endphp
    </div>
</div>
<script>
    function getS() {
        @php
            foreach ($tasks as $task)
            {
                echo "getStatus({$task['id']});";
            }
        @endphp
    }

    function getStatus(id) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var res = JSON.parse(this.responseText);

                setTask(id, res);
            }
        };
        xhttp.open("GET", "http://127.0.0.1:8000/tasks/submissions/" + id, true);
        // xhttp.setRequestHeader("Content-type", "application/json");
        xhttp.send();
    }

    function setTask(id, task) {
        const taskDiv = document.getElementById(id);

        if(task.completed == 1)
        {
            taskDiv.style.background = 'green';
        }
        else
        {
            taskDiv.style.background = 'red';
        }
    }
</script>
</body>
@endsection
