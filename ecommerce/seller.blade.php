@extends('auth.main')

@section('content1')
 
 <div class='flex w-6/10 justify-end'> 
    <div class="w-6/10 bg-white p-6 rounded-lg mt-3">
       <h3 class='text-xl bold text-left pb-3'>Seller's Name</h3>  
        <div class='flex item-center'>
            @foreach($seller as $sellers) 
              {{ $sellers->SellerName }}<br> 
           @endforeach 
       </div>
     </div>

    <div class="w-6/10 bg-white p-6 rounded-lg mt-3">
       <h3 class='text-xl bold text-left pb-3'>No. of Customers</h3>  
         <div class='flex item-center'>
             @foreach($seller as $sellers) 
                 {{ $sellers->customers->count() }}<br> 
               @endforeach 
         </div>      
     </div>
     
     <div class="w-6/10 bg-white p-6 rounded-lg mt-3">
       <h3 class='text-xl bold text-left pb-3'>Customers </h3>  
         <div class='flex item-center wrap'>
            @foreach($seller as $sellers) 
             @foreach($sellers->customers as $customers) 
                 {{ $customers->name }},
               @endforeach
               <br>  
            @endforeach 
         </div>      
     </div>

     <div class="w-6/10 bg-white p-6 rounded-lg mt-3">
       <h3 class='text-xl bold text-left pb-3'>City </h3>  
         <div class='flex item-center'>
            @foreach($seller as $sellers) 
             @foreach($sellers->customers as $customers) 
                 {{ $customers->city }}<br> 
               @endforeach 
            @endforeach 
         </div>      
     </div>
</div>

@endsection