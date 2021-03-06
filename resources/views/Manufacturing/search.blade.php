@extends('layouts.master')
@section('title', 'Recipes')
@section('page-title', 'Recipes')
@section('content')

<h1>Manufacturing Recipes</h1>

<form type="get" action="/searchRecipe">
<div class="input-group">
    <div class="form-outline">
        <input id="search-input" type="search" placeholder="Search" id="form1" name="query" class="form-control" />
    </div>
    <input id="search-button" type="submit" class="btn btn-warning"style = "position: relative; bottom:10px" >
    </input>
</div>
</form>
<a href="/Manufacturing"  class="btn btn-success" >Back</a>
<table class="table table-dark">
    {{-- <th>ID</th> --}}
    <th>Product Name</th>
    <th>Recipe</th>
    <th>Steps</th>
    <th>Production Cost</th>
    <th>Material Cost</th>
    <th>Total Cost</th>
   

    <!--view data in table -->
    @foreach($searchRecipe as $recipe1)
    <tr>    
        {{-- <td>{{$recipe1->id}}</td> <!--accessing columns in db from $recipe1 variable --> --}}
        <td>{{$recipe1->manufacturingProductName}}</td>
        <td>{{$recipe1->recipe}}</td>
        <td>{{$recipe1->steps}}</td>
        <td>{{$recipe1->production_cost}}</td>
        <td>{{$recipe1->manufacturing_cost}}</td>
        <td>{{$recipe1->total_cost}}</td>
        <td>
            <a href="/updateRecipe/{{$recipe1->id}}" class="btn btn-secondary">Edit</a>
        </td>
        <td>
            <a href="/deleteRecipe/{{$recipe1->id}}" class="btn btn-danger">Delete</a>
        </td>
    </tr>
    @endforeach
</table>

@endsection