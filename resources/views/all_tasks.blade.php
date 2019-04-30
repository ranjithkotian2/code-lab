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
    /*.des h2{*/
    /*    text-align: center;*/
    /*}*/
    /*#nodes{*/
    /*    align-content: center;*/
    /*}*/
    li a, li button {
        display: block;
        color: white;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
    }

    li input {
        font-size: 25px;
        display: block;
        color: black;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
        height: 5px;
        background: mintcream;
        width: 1000px;
        padding-top: 25px;
    }

    li a, li button:hover:not(.active) {
        background-color: #111;
    }

    button{
        background: #1b4b72;
    }

    .active {
        background-color: #4CAF50;
    }
    #right{
        float: right;
    }
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
        border-radius: 12px;
    }
    #nodes{
        display: flex;
        flex-direction: column;
        /* justify-content: center; */
        /* align-items: center; */
        flex-basis: 50%;
        width: 50%;
        margin: 0 auto;
    }
    .link_name{
        font-weight: bold;
    }
    .links{
        background: rgba(25,118,210,0.4);
        margin-bottom: 10px;
        border-radius: 5px;
        padding: 10px 10px;
    }
    .link_a{
        text-decoration: none;
    }

    .link_name {
        font-weight: bold;
        margin: 0;
        color: rgba(0,0,0,0.9);
    }
    .bt {
        padding-top: 2px;
    }
    #bt{
        border-radius: 7px;
        width: 69px;
        height: 41px;
    }
    #content{
        padding: 60px;
    }
    #edit_bt{
        box-shadow: 0 1.5px 4px rgba(0,0,0,0.34), 0 1.5px 6px rgba(0,0,0,0.32);
        border: 0;
        border-radius: 15px;
        text-align: center;
        width: 150px;
        color: #fff;
        /* background-color: #5bc0de; */
        background-color: blueviolet;
        display: inline-block;
        margin:10px;
        font-weight: normal;
        vertical-align: middle;
        touch-action: cross-slide-x;
        background-image: none;
        padding: 6px 12px;
        font-size: 14px;
        line-height: 1.42857143;
        box-sizing: border-box;
        align-items: flex-start;

    }
    #edit_bt:hover{
        background-color: #1d68a7;
        /* background-color: darkslateblue; */

    }
    body{
        height: 100%;
        /*background-position: center;*/
        background-repeat: no-repeat;
        background-size: cover;
        opacity: 0.9;
    }
</style>


<div class="des">
    <h2>TASKS FOR {{$conceptNode['name']}}:</h2>
<div id="nodes">
    @php
        foreach ($tasks as $task)
        {
            echo "<div class='links'><a class='link_a' href='http://54.158.36.225:8000/tasks/{$task['id']}/get_view'><h1 class='link_name' id = {$task['id']}>
                    {$task['problem_statement']}
                    </h1></a><button id = 'edit_bt' value='{$task['id']}' onclick='loadEditPage({$task['id']})'>Edit</button>
                    </h1></a></div>";
        }
    @endphp
</div>

</div>

    <script>
        function loadEditPage(id) {
            document.location.href = "http://54.158.36.225:8000/tasks/edit_view/" + id;
        }
    </script>

@endsection
