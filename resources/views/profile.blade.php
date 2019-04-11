@extends('layouts.app')

@section('content')

    <style>
        #new_concept{
            width: 197px;
            height: 60px;
            background: deepskyblue;
            border-radius: 26px;
            display: inline-block;
            padding: 18px 28px;
            font-size: 18px;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            outline: none;
            color: #fff;
            /*background-color: #4CAF50;*/
            border: none;
            /*border-radius: 15px;*/
            box-shadow: 0 9px #999;
            margin:30px;
        }
        #logout{
            background: red;
            width: 109px;
            height: 50px;
            border-radius: 23px;
            display: inline-block;
            padding: 18px 28px;
            font-size: 18px;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            outline: none;
            color: #fff;
            /*background-color: #4CAF50;*/
            border: none;
            /*border-radius: 15px;*/
            box-shadow: 0 9px #999;
            margin:30px;
        }
        #logout:hover{
            background: darkred;
        }
        #new_concept:hover{
            background: cornflowerblue;
           /* background-color: #3e8e41*/
        }
        #new_concept:active {
            background-color: deepskyblue;
            box-shadow: 0 5px #666;
            transform: translateY(4px);
        }
        #added_concept_nodes, #add_super_user, #add_admin{
            background: deepskyblue;
            width: 197px;
            height: 60px;
            border-radius: 26px;
            display: inline-block;
            padding: 18px 28px;
            font-size: 18px;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            outline: none;
            color: #fff;
            /*background-color: #4CAF50;*/
            border: none;
            /*border-radius: 15px;*/
            box-shadow: 0 9px #999;
            margin:30px;

        }
        #added_concept_nodes:hover, #add_super_user:hover, #add_admin:hover{
            background: cornflowerblue;
        }
        #added_concept_nodes:active, #add_super_user:active, #add_admin:active {
            background-color: deepskyblue;
            box-shadow: 0 5px #666;
            transform: translateY(4px);
        }
        h1 {
            text-align:center;
            color: black;

        }
        .role{
            color:whitesmoke;
        }
    </style>
    <body style="background-image: url('images/bg-01.jpg')">
    <div class="role">
        <h1>Welcome {{$userRole}}!</h1>
    </div>
    <button id="logout" onclick="logout()">Logout</button>
    @if($userRole !== 'user')
        <button id="new_concept" onclick="loadCreateNewNode()">Create New Concept Node</button>
        <button id="added_concept_nodes" onclick="loadAddedConceptNode()">Concept Nodes Added By You</button>
    @endif

    @if($userRole === 'admin')
        <button id="add_super_user" onclick="getAddSuperUserPage()">Add Super User</button>
        <button id="add_admin" onclick="getAddAdminPage()">Add Admin</button>
    @endif

    <script>
        function logout() {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    // var result = JSON.parse(this.responseText);
                    routeToHome();
                }
            };
            xhttp.open("POST", "http://127.0.0.1:8000/user/logout", true);

            xhttp.send();
        }

        function loadCreateNewNode() {
            document.location.href = "http://127.0.0.1:8000/concept_nodes/create_view";
        }

        function routeToHome() {
            document.location.href = "http://127.0.0.1:8000/";
        }

        function loadAddedConceptNode() {
            document.location.href = "http://127.0.0.1:8000/concept_nodes/user/added_view";
        }

        function getAddSuperUserPage() {
            document.location.href = "http://127.0.0.1:8000/add_super_user";
        }

        function getAddAdminPage() {
            document.location.href = "http://127.0.0.1:8000/add_admin";
        }
    </script>
    </body>
@endsection
