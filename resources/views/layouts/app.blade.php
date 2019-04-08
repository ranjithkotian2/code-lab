@php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    if(!isset($_SESSION['auth']) || $_SESSION['auth'] !== true)
    {
        header('Location: http://127.0.0.1:8000/login');
        exit();
    }
@endphp
<!DOCTYPE html>
<html>
<head>
    <title>codelab</title>
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

        input {
            float: left;
        }

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
            height: 40px;
            padding-top: 25px;
        }

        li a, li button:hover:not(.active) {
            background-color: #333;
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
            padding: 20px 20px;
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
            flex-direction: row;
            /*justify-content: center;
            align-items: center; */
            flex-basis: 50%;
            width: 50%;
            margin: 0 auto;


        }
        .link_name{
            font-weight: bold;
            font-family: 'Lucida Sans';
            text-align: center;
        }

        .links{
            border-radius: 50%;
            padding: 60px 60px;
            width: 200px;
            height: 80px;
            text-align:center;
            margin: 50px;
            /*padding-top: 10%;*/
            background:rgba(238, 192, 238, 0.959);
        }

        .link_a{
            text-decoration:thistle;
        }

        .link_name {
            font-weight:bold;
            font-size:20px;
            margin:0;
            color: rgba(0, 0, 0, 0.938);
        }
        .bt {
            padding-top: 10px;
            text-align: center;
        }

        #bt{
            border-radius: 7px;

            width: 89px;
            height: 41px;
        }
        #content{
            padding: 40px;
        }
        h1{
            text-align:center;
            text-decoration-color:ghostwhite;
        }

    </style>
</head>
{{-- <body style="background: #F8F8F8"> --}}
<body style="background-image: url('images/home_bg.jpg')">
<div>
    <ul>
        <li><a href="http://127.0.0.1:8000/">Home</a></li>
        <li><input type="text" id="search_bar" onsubmit="fetchConceptNodes()"></li>
        <li class="bt"><button onclick="fetchConceptNodes()" id="bt">Search</button></li>
        <li id="right"><a href="http://127.0.0.1:8000/profile">Profile</a></li>
    </ul>
</div>
<div id="content">
     @yield('content')
</div>

<script>
    var input = document.getElementById("search_bar");

    // Execute a function when the user releases a key on the keyboard
    input.addEventListener("keyup", function(event) {
        // Number 13 is the "Enter" key on the keyboard
        if (event.keyCode === 13) {
            // Cancel the default action, if needed
            event.preventDefault();
            // Trigger the button element with a click
            document.getElementById("bt").click();
        }
    });

    function fetchConceptNodes()
    {
        const keyword = document.getElementById("search_bar").value;
        //alert(keyword);
        getSearchResults(keyword);
    }

    function getSearchResults(keyword) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                clearPage();
                var res = JSON.parse(this.responseText);
                for(var i = 0; i < res.length; i++)
                {
                    addConceptNode(res[i]);
                }
            }
        };
        xhttp.open("GET", "http://127.0.0.1:8000/concept_nodes/search/" + keyword, true);
        // xhttp.setRequestHeader("Content-type", "application/json");
        xhttp.send();
    }

    function clearPage() {
        document.getElementById("content").innerHTML = "";
        var superParent = document.getElementById("content");
        var parent = document.createElement('nodes');
        parent.id = "nodes";
        superParent.appendChild(parent);
    }

    function addConceptNode(conceptNode) {
        var parent = document.getElementById("nodes");
        var newNode = document.createElement('div');
        newNode.classList.add("links");
        newNode.innerHTML = "<a href='http://127.0.0.1:8000/concept_nodes/view/"+ conceptNode['id'] +"' class='link_a'><h1 class='link_name' id = "+ conceptNode['id'] +">"+
            conceptNode['name']
            +"</h1></a>";
        parent.appendChild(newNode);
    }
</script>
</body>
</html>
