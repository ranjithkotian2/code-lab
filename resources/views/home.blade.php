@extends('layouts.app')

@section('content')
<html>
<body onload="getS()">
<div id="nodes">
	@php
        $conceptNodes = $data['concept_nodes'];
        foreach ($conceptNodes as $conceptNode)
        {
            echo "<div class='links' id = '{$conceptNode['id']}'><a class='link_a' href='concept_nodes/view/{$conceptNode['id']}' ><h1 class='link_name' id = {$conceptNode['id']}>
                    {$conceptNode['name']}
                    </h1></a></div>";
        }
	@endphp
</div>

<script>
    function getS() {
        @php
            foreach ($conceptNodes as $conceptNode)
            {
                echo "getStatus({$conceptNode['id']});";
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
        xhttp.open("GET", "http://54.158.36.225:8000/concept_nodes/concept_node_submissions/" + id, true);
        // xhttp.setRequestHeader("Content-type", "application/json");
        xhttp.send();
    }

    function setTask(id, task) {
        const taskDiv = document.getElementById(id);

        if(task.completed == true)
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
</html>

@endsection
