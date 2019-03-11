@extends('layouts.app')

@section('content')

<div id="nodes">
	@php
        $conceptNodes = $data['concept_nodes'];
        foreach ($conceptNodes as $conceptNode)
        {
            echo "<div class='links'><a class='link_a' href='concept_nodes/view/{$conceptNode['id']}'><h1 class='link_name' id = {$conceptNode['id']}>
                    {$conceptNode['name']}
                    </h1></a></div>";
        }
	@endphp
</div>

@endsection
