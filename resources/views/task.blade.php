@extends('layouts.app')

@section('content')
<html>
<head>
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
    </style>
    <head>

    <div id="concept">
        <div>
            <div class="wrapper">
                <h2>
                    {{$task['problem_statement']}}
                </h2>

                <h3 class="des">
                    {{$task['description']}}
                </h3>
            </div>
        </div>
    </div>
    <div class="wrapper ml">
        <div id="editor">{{$conceptNodeSubmission['code']}}</div>
        <div class="custom">
            <textarea rows="4" cols="50" placeholder="Custom input" id="custom_input"></textarea>
            <button onclick="testCode()" id="test_button">Test</button>
            <button onclick="submitCode()" id="submit_button">Submit</button>
            <div  style="right: 0; left: 0; background: #b8c2cc"></div>
        </div>
        <div class="custom">
<textarea readonly id="test_result" rows="4" cols="50" placeholder="custom output" style="visibility: hidden">
</textarea>
        </div>
    </div>
    <script src="http://127.0.0.1:8000/vardot/ace-builds/src-noconflict/ace.js" type="text/javascript" charset="utf-8"></script>
    <script>
        var editor = ace.edit("editor");
        editor.setTheme("ace/theme/monokai");
        editor.session.setMode("ace/mode/c_cpp");

        function testCode() {
            var editor = ace.edit("editor");
            var customInput = document.getElementById("custom_input").value;
            getCodeOutput(editor.getValue(), customInput);
        }

        function getCodeOutput(code, customInput) {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    setTestResult(JSON.parse(this.responseText));
                }
            };
            xhttp.open("POST", "http://127.0.0.1:8000/code/test/{{$task['id']}}", true);
            xhttp.setRequestHeader("Content-type", "application/json");

            var input = {};
            input.code = code;
            input.customInput = customInput;
            xhttp.send(JSON.stringify(input));
        }

        function setTestResult(res) {
            var testResult = document.getElementById("test_result");
            testResult.style.visibility = 'visible';
            if(res.code != 0)
            {
                testResult.style.background = 'red';
            }
            else
            {
                testResult.style.background = 'white';
            }
            testResult.innerText = res.result;
        }

        function submitCode() {
            var editor = ace.edit("editor");
            var code = editor.getValue();

            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200)
                {
                    alert(this.responseText);
                    alert("success");
                    // setTestResult(JSON.parse(this.responseText));
                }
                else if(this.readyState == 4)
                {
                    alert('some test cases did not pass!!!')
                }
            };
            xhttp.open("POST", "http://127.0.0.1:8000/code/submit/{{$task['id']}}", true);
            xhttp.setRequestHeader("Content-type", "application/json");

            var input = {};
            input.code = code;
            xhttp.send(JSON.stringify(input));
        }
    </script>
    </head>
    </body>
    </html>

@endsection

