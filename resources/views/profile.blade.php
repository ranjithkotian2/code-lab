@extends('layouts.app')

@section('content')
    <style>
        #new_concept{
            width: 187px;
            height: 50px;
            background: ghostwhite;
            border-radius: 26px;
        }
        #logout{
            background: red;
            width: 109px;
            height: 50px;
            border-radius: 23px;
        }
        #logout:hover{
            background: darkred;
        }
        #new_concept:hover{
            background: gray;
        }
        #added_concept_nodes{
            background: ghostwhite;
            width: 164px;
            border-radius: 28px;
            height: 52px;
        }
        #added_concept_nodes:hover{
            background: gray;
        }
    </style>
    <button id="logout" onclick="logout()">Logout</button>
    <button id="new_concept" onclick="loadCreateNewNode()">Create New Concept Node</button>
    <button id="added_concept_nodes" onclick="loadAddedConceptNode()">Concept Nodes Added By You</button>

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
    </script>
@endsection
