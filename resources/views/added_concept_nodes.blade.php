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
    #edit_bt, #update_bt, #add_task_bt{
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
    #edit_bt:hover, #update_bt:hover, #add_task_bt:hover{
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
</head>
<body style="background-image: url('http://127.0.0.1:8000/images/home_bg9.jpg')">
{{-- <body style="background:rgba(29,39,54,.16)"> --}}
    <div id="content">

    </div>

    <script>
        fetchResults();
        function fetchResults() {
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
            xhttp.open("GET", "http://127.0.0.1:8000/concept_nodes/search/user", true);
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
                + "</h1></a><button id = 'edit_bt' value='"+ conceptNode['id'] +"' onclick='loadEditPage(" + conceptNode['id'] + ")'>Edit</button>"
                + "<button id = 'update_bt' value='"+ conceptNode['id'] +"' onclick='loadAddDependencyPage(" + conceptNode['id'] + ")'>Add Dependency</button>"
                + "<button id = 'add_task_bt' value='"+ conceptNode['id'] +"' onclick='loadAddTaskPage(" + conceptNode['id'] + ")'>Add Task</button>";
            parent.appendChild(newNode);
        }

        function loadEditPage(id)
        {
            document.location.href = "http://127.0.0.1:8000/concept_nodes/edit_concept_node_view/" + id;
        }

        function loadAddDependencyPage(id)
        {
            document.location.href = "http://127.0.0.1:8000/dependencies/get_add_dependency_view/" + id;
        }

        function loadAddTaskPage(id)
        {
            document.location.href = "http://127.0.0.1:8000/tasks/get_add_task_view/" + id;
        }
    </script>
</body>

</html>
