@extends('auth.main')

@section('content1')
<div class='w-75 px-5'> 
   
   @if($product->count())
   
    <table class='table border-2 mt-4'>
       <thead class='bg-gray-100'>
            <tr class='w-100'>
              <th class='w-50' scope='col'>Id</th>
              <th class='w-50' scope='col'>Product Name</th>
              <th class='w-50' scope='col'>Description</th>
              <th class='w-50' scope='col'>Unit price (RS.)</th>
              <th class='w-50' scope='col'>Unit weight (g) </th>
              <th class='w-50' scope='col'>MRP (RS.)</th>
              <th class='w-50' scope='col'>Active</th>
              <th class='w-50' scope='col'>Image</th>
           </tr>
        </thead>
        <tbody>
         @foreach($product as $productive) 
            @foreach($productive->products as $products) 
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
           @endforeach     
        </tbody>
     </table>
     
     @else

     <div class='alert alert-warning'>
         <ul>
            <li>No Products available</li>
         </ul>
      </div>
      
       @endif
    
 </div>



@endsection