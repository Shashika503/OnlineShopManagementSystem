@extends('layouts.master')

@section('title', 'Purchases')
@section('page-title', 'Purchases')
@section('card-title', 'View Purchases')

@section('content')

<div class="container">
           
  <table class="table table-dark table-hover">
    <thead>
      <tr>
        <th>Transaction Refrence No</th>
        <th>Transaction Date</th>
        <th>Supplier Id</th>
        <th>Discounted price</th>
        <th>Total Amount</th>
        <th>Payment Due</th>
        <th>Purchase Satus</th>
        <th>Payment Status</th>
      </tr>
    </thead>
    
  </table>
 
</div>
<button type="button" class="btn btn-primary">ADD</button>
  <button type="button" class="btn btn-secondary">EDIT</button>
  <button type="button" class="btn btn-success">DELETE</button>

@endsection