@extends('auth.main')

@section('content1')
<div class='w-75 px-5'>
    <table class='table'>
       <thead>
            <tr class='w-100'>
              <th class='w-50' scope='col'>Id</th>
              <th class='w-50' scope='col'>Category Name</th>
              <th class='w-50' scope='col'>Description</th>
              <th class='w-50' scope='col'>Unit price (RS.)</th>
              <th class='w-50' scope='col'>Unit weight (g) </th>
              <th class='w-50' scope='col'>MRP (RS.)</th>
              <th class='w-50' scope='col'>Active</th>
              <th class='w-50' scope='col'>Image</th>
           </tr>
        </thead>
        <tbody>
            @foreach($product as $products) 
            <tr>
                 <th scope='row'>{{ $products->id }}</th>
                 <td>{{ $products->productName }}</td>
                 <td>{{ $products->productDescription }}</td>
                 <th scope='row'>{{ $products->costprice }}</th>
                 <td>{{ $products->weight }}</td>
                 <td>{{ $products->MRP }}</td>
                 <td>{{ $products->active }}</td>
                 <td>{{ $products->image }}</td>
            </tr>
           @endforeach    
        </tbody>
     </table>
    </div>



@endsection