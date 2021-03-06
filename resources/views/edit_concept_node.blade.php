@include('layouts.session_auth')

<html>
<head>
    <style>
        @import url(https://fonts.googleapis.com/css?family=Roboto:400,300,600,400italic);
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            -webkit-font-smoothing: antialiased;
            -moz-font-smoothing: antialiased;
            -o-font-smoothing: antialiased;
            font-smoothing: antialiased;
            text-rendering: optimizeLegibility;
        }

        body {
            font-family: "Roboto", Helvetica, Arial, sans-serif;
            font-weight: 100;
            font-size: 12px;
            line-height: 30px;
            /*color: #777;*/
            /*background: #4CAF50;*/
            background-repeat: no-repeat;
            background-size: cover;
            opacity: 0.9;
        }

        .container {
            max-width: 400px;
            width: 100%;
            margin: 0 auto;
            position: relative;
        }

        #contact input[type="text"],
        #contact input[type="email"],
        #contact input[type="tel"],
        #contact input[type="url"],
        #contact textarea,
        #contact button[type="submit"] {
            font: 400 12px/16px "Roboto", Helvetica, Arial, sans-serif;
        }

        #contact {
            background: #F9F9F9;
            padding: 25px;
            margin: 150px 0;
            box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
        }

        #contact h3 {
            display: block;
            font-size: 30px;
            font-weight: 300;
            margin-bottom: 10px;
        }

        #contact h4 {
            margin: 5px 0 15px;
            display: block;
            font-size: 13px;
            font-weight: 400;
        }

        fieldset {
            border: medium none !important;
            margin: 0 0 10px;
            min-width: 100%;
            padding: 0;
            width: 100%;
        }

        #contact input[type="text"],
        #contact input[type="email"],
        #contact input[type="tel"],
        #contact input[type="url"],
        #contact textarea {
            width: 100%;
            border: 1px solid #ccc;
            background: #FFF;
            margin: 0 0 5px;
            padding: 10px;
        }

        #contact input[type="text"]:hover,
        #contact input[type="email"]:hover,
        #contact input[type="tel"]:hover,
        #contact input[type="url"]:hover,
        #contact textarea:hover {
            -webkit-transition: border-color 0.3s ease-in-out;
            -moz-transition: border-color 0.3s ease-in-out;
            transition: border-color 0.3s ease-in-out;
            border: 1px solid #aaa;
        }

        #contact textarea {
            height: 100px;
            max-width: 100%;
            resize: none;
        }

        #contact button[type="submit"] {
            cursor: pointer;
            width: 100%;
            border: none;
            /*background: #4CAF50;*/
            background: #1f6fb2;
            color: #FFF;
            margin: 0 0 5px;
            padding: 10px;
            font-size: 15px;
        }

        #contact button[type="submit"]:hover {
            background: #43A047;
            -webkit-transition: background 0.3s ease-in-out;
            -moz-transition: background 0.3s ease-in-out;
            transition: background-color 0.3s ease-in-out;
        }

        #contact button[type="submit"]:active {
            box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.5);
        }

        .copyright {
            text-align: center;
        }

        #contact input:focus,
        #contact textarea:focus {
            outline: 0;
            border: 1px solid #aaa;
        }

        ::-webkit-input-placeholder {
            color: #888;
        }

        :-moz-placeholder {
            color: #888;
        }

        ::-moz-placeholder {
            color: #888;
        }

        :-ms-input-placeholder {
            color: #888;
        }
    </style>
</head>
<body style="background-image: url('http://127.0.0.1:8000/images/home_bg4.jpg')">
    <div class="container">
        <form id="contact" method = post action="http://127.0.0.1:8000/concept_nodes/edit_from_view/{{$data['id']}}" method="post">
            <h3>Edit Concept Node</h3>
            <fieldset>
                <input placeholder="Concept Node Name" name="name" type="text" tabindex="1" required autofocus
                value="{{$data['name']}}">
            </fieldset>
            <fieldset>
                <textarea placeholder="Description" name="description" tabindex="2" >{{$data['description']}}</textarea>
            </fieldset>
            <fieldset>
                <textarea placeholder="Problem Statement" name="problem_statement" type="text" tabindex="3" >{{$data['problem_statement']}}</textarea>
            </fieldset>
            <fieldset>
                <input placeholder="youtube embed url" name="video_url" type="url" tabindex="4" value="{{$data['video_url']}}">
            </fieldset>
{{--            <fieldset>--}}
{{--                <textarea placeholder="Test Cases" name="test_cases" tabindex="5">{{$data['test_cases']}}</textarea>--}}
{{--            </fieldset>--}}
{{--            <fieldset>--}}
{{--                Concept Node <input type="radio" name="type" value="concept_node" tabindex="6" checked = {{$data['type'] == 'concept_node'}}> <br>--}}
{{--                Problem Node <input type="radio" name="type" value="problem_node" tabindex="7" checked = {{$data['type'] == 'problem_node'}}>--}}
{{--            </fieldset>--}}
{{--            <fieldset>--}}
{{--                <textarea placeholder="provided code" name="provided_code" tabindex="8">{{$data['provided_code']}}</textarea>--}}
{{--            </fieldset>--}}
{{--            <fieldset>--}}
{{--                <textarea name="expected_output" placeholder="expected output">{{$data['expected_output']}}</textarea>--}}
{{--            </fieldset>--}}
{{--            <fieldset>--}}
{{--                <textarea name="default_code" placeholder="default code">{{$data['default_code']}}</textarea>--}}
{{--            </fieldset>--}}
            <fieldset>
                <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Submit</button>
            </fieldset>
        </form>
    </div>
</body>
</html>
