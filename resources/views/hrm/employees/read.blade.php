@extends('layouts.master')

@section('title', 'HRM')
@section('page-title', 'HRM')
@section('card-title', 'Employee Management')

@section('content')

<div id="app">
        <div id="navbar">
<<<<<<< HEAD
		<nav class="navbar navbar-expand-lg navbar-dark bg-primary"" style="background-color: #e3f2fd;">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">HRM</a>
=======
		<nav class="navbar navbar-expand-lg navbar-dark bg-info" style="background-color: #e3f2fd;">
  <div class="container-fluid">
    <h5><a class="navbar-brand" href="#">HRM</a></h5>
>>>>>>> e1872a383f65a428f506c0704f65e55287986f03
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
<<<<<<< HEAD
          <a class="nav-link active" aria-current="page" href="/HRM" >Employee</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/Attendance" >Attendance</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/Payroll" >Payroll</a>
=======
          <h4><a class="nav-link active" aria-current="page" href="/HRM" >Employee</a></h4>
        </li>
        <li class="nav-item">
          <h4><a class="nav-link" href="/Attendance" >Attendance</a></h4>
        </li>
        <li class="nav-item">
          <h4><a class="nav-link" href="/Payroll" >Payroll</a></h4>
>>>>>>> e1872a383f65a428f506c0704f65e55287986f03
        </li>
    
      </ul>
    </div>
  </div>
</nav>
</div>

<div class="container">
<div class="row">
<div class="col-sm-12">
    <br>
<<<<<<< HEAD
    <h1>All Employees</h1>    
=======
    <h1>All Employees</h1> 

  <table>
      <tr>
        <td>
            <form class="form-inline my-2 my-lg-0" type="get" action="{{url('/searchEmployee')}}">
            <input class="form-control mr-sm-2" size="50" name="queryEmp" type="search" placeholder="Type Employee First Name to Search " aria-label="Search">
            <button class="btn btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
          </form>
        </td>
       <td size="200"></td>
        <td>
        <a class="btn btn-primary" href="{{ URL::to('/reportPDFEmp') }}">Export to PDF</a>

        
        </td>
      </tr>

  
  
  </table>
    
>>>>>>> e1872a383f65a428f506c0704f65e55287986f03
    <div>
    <a style="margin: 19px;" href="{{ route('HRM.create')}}" class="btn btn-primary btn-lg">Add Employee</a>
    </div>  

    <div class="col-sm-12">

        @if(session()->get('success'))
          <div class="alert alert-success">
            {{ session()->get('success') }}  
          </div>
        @endif
    </div>  

<<<<<<< HEAD
  <table class="table table-striped">
    <thead >
=======
    <table class="table table-dark">
      <thead class="thead-light">
>>>>>>> e1872a383f65a428f506c0704f65e55287986f03
        <tr>
          <td >ID</td>
          <td >Name</td>
          <td >Address</td>
          <td >NIC</td>
          <td >Mobile</td>
          <td >Email</td>
          <td colspan = 2>Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($employees as $employee)
        <tr>
            <td>{{ $employee->id}}</td>
<<<<<<< HEAD
            <td>{{ $employee->fname}} &nbsp;&nbsp; {{$employee->lname}}</td>
=======
            <td>{{ $employee->name}}</td>
>>>>>>> e1872a383f65a428f506c0704f65e55287986f03
            <td>{{ $employee->address}}</td>
            <td>{{ $employee->nic}}</td>
            <td>{{ $employee->mobile}}</td>
            <td>{{ $employee->email}}</td>
            
            <td>
                <a href="{{ route('HRM.edit',$employee->id)}}" class="btn btn-success">Edit</a>
               
            </td>
            <td>
                <form action="{{ route('HRM.destroy', $employee->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-warning" type="submit">Delete</button>
                </form>
            </td>
		
			
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
</div>
</div>

<<<<<<< HEAD
=======
<script type="text/javascript">
  $(function () {
    
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('HRM.index') }}",
        columns: [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'address', name: 'address'},
            {data: 'nic', name: 'nic'},
            {data: 'mobile', name: 'mobile'},
            {data: 'email', name: 'email'},
            
        ]
    });
    
  });
</script>


>>>>>>> e1872a383f65a428f506c0704f65e55287986f03
@endsection