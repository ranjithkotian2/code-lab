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
        background: rgba(25,118,210,0.2);
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
        color: rgba(0,0,0,0.7);
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
        padding: 40px;
    }
</style>
<body>
<h1>All dependencies are not covered</h1>
<h2>Please cover:</h2>

@php
@endphp

<div id="nodes"></div>


<script>
    @php
        foreach ($dep as $d)
        {
            echo "getConceptNode(" . $d . ");";
        }
    @endphp
    function getConceptNode(id) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var res = JSON.parse(this.responseText);
                //alert(res.name);
                addConceptNode(res);
            }
        };
        xhttp.open("GET", "http://54.158.36.225:8000/concept_nodes/" + id, true);
        // xhttp.setRequestHeader("Content-type", "application/json");
        xhttp.send();
    }

    function addConceptNode(conceptNode) {
        var parent = document.getElementById("nodes");
        var newNode = document.createElement('div');
        newNode.classList.add("links");
        newNode.innerHTML = "<a href='http://54.158.36.225:8000/concept_nodes/view/"+ conceptNode['id'] +"' class='link_a'><h1 class='link_name' id = "+ conceptNode['id'] +">"+
            conceptNode['name']
            +"</h1></a>";
        parent.appendChild(newNode);
    }
</script>
</body>
