@extends('auth.main')

@section('content1')

<div class='w-75 justify-end'>  
  <form action="{{ route('products') }}" class='w-100 bg-white p-6 rounded-lg mt-1' method='post' enctype='multipart/form-data'>
     @csrf     
     @if(session()->has('success'))
         <div class='alert alert-success'>
            <ul>
               <li>{{ session()->get('success')}}</li>
             </ul>
           </div>
       @endif
      @if(session()->has('failed'))
         <div class='alert alert-danger'>
            <ul>
               <li>{{ session()->get('failed')}}</li>
             </ul>
           </div>
       @endif

      <fieldset class='w-100 inline-flex bg-grey scheduler-border'>
      <legend class='text-secondary font-bold border-bottom w-50 text-left ml-4 px-10 py-1'>Add Product </legend>   
        <div class='flex w-100'>    
          <div class='control-group flex flex-col ml-3 mb-4 w-25 p-3'>
              <label for="image" class='sr-only'>image</label>
              <input type="file" name='image' id='image'
              class='form-control bg-gray-100 border-2 w-75 h-25 p-2 rounded-lg mb-4  @error('image') ? border-3 border-danger bg-red-100 : '' @enderror'>  

              <label for="productName" class='sr-only'>Product Name</label>
              <input type="text" name='productName' id='productName' placeholder= 'product Name' 
              class='bg-gray-100 border-2 w-75 p-2 h-10 rounded-lg mt-3 @error('productName') ? border-3 border-danger bg-red-100 : '' @enderror' value='{{ old('productName') }}'>    
    

              <label for="category" class='sr-only'>Category</label> 
                 <select type="dropdown" name='category' id='category'
                  class='bg-gray-100 text-secondary border-2 w-75 h-10 rounded-lg mt-5 @error('category') ? border-3 border-danger bg-red-100 : '' @enderror'>
                  <option selected disabled>select category</option>
                     @foreach($category as $data) 
                        <option value="{{ $data->id }}">{{ $data->category }}</option>
                     @endforeach
                 </select>
              
                 <div class='form-check w-100 ml-0 mt-4 m-2 p-2'> 
                   <i>Status:</i> 
                    <input class='form-check-input mt-2 ml-3' type="checkbox" name='flexCheckChecked'
                     id='flexCheckChecked' class='bg-gray-100 border-2 w-25 p-2 rounded-lg mb-4' checked>
                    <label class='form-check-label ml-8' for="flexCheckChecked">active</label>
                </div>
          </div>
             
            <div class='control-group mb-4 p-3 w-50'>
               <label for="productDescription" class='sr-only'>productDescription</label>
                   <textarea name='productDescription' id='productDescription' placeholder='Add product description' 
                   class='bg-gray-100 border-2 w-75 h-25 p-2 rounded-lg mb-2 @error('productDescription') ? border-3 border-danger bg-red-100  : '' @enderror' cols="40" rows="10">{{ old('productDescription') }}</textarea>
                   
               <div class='flex mt-4'>
                  <label for="costprice" class='sr-only'>costprice</label>
                  <input type="number" name='costprice' min=1 id='costprice' placeholder='cost price' 
                   class='bg-gray-100 border-2 text-sm w-25 p-2 rounded-lg mb-4 @error('costprice') ?border-3 border-danger bg-red-100  : '' @enderror' value='{{ old('costprice') }}'>
                   <small class='text-secondary p-2 font-italic'>(Rs.)</small>
                 

                   <label for="weight" class='sr-only'>weight</label>
                  <input type="number" name='weight' min=1 id='weight' placeholder= 'Weight' 
                   class='bg-gray-100 border-2 w-25 text-sm p-2 rounded-lg mb-4 ml-4 @error('weight') ? border border-danger bg-red-100 : '' @enderror' value='{{ old('weight') }}'>
                   <small class='text-secondary p-2 font-italic'>(g)</small>
                 
                </div>

                <div class='flex mt-4'>
                  <label for="quantity" class='sr-only'>Quantity</label>
                  <input type="number" name='quantity' min=1 id='quantity' placeholder= 'Quantity' 
                   class='bg-gray-100 border-2  text-sm w-25 p-2 rounded-lg mb-4 @error('quantity') ? border-3 border-danger bg-red-100  : '' @enderror' value='{{ old('quantity') }}'>
                   <small class='text-secondary p-2 font-italic'>(per box)</small>

                   <label for="boxes" class='sr-only'>Boxes</label>
                  <input type="number" name='boxes' min=1 id='boxes' placeholder= 'Boxes' 
                   class='bg-gray-100 border-2 w-25 p-2 rounded-lg mb-4 @error('boxes') ? border-3 border-danger bg-red-100  : '' @enderror' value='{{ old('boxes') }}'>
                   <small class='text-secondary p-2 text-sm font-italic'>(cartoon)</small>
            
               </div>

                <div class='mb-4 flex justify-start'>
                   <input type="number" name='MRP' min=1 id='MRP' placeholder= 'MRP' 
                   class='bg-gray-100 border-2 w-25 text-sm p-2 rounded-lg mt-3 @error('MRP') ? border-3 border-danger bg-red-100  : '' @enderror' value='{{ old('MRP') }}'>
                   <small class='text-secondary p-2 font-italic mr-4'>(Rs.)</small>
         
                   <button type="submit" class='w-25 h-10 bg-blue-500 text-white text-center font-medium py-1 mt-3 rounded-lg'><b>+</b> Add Product</button>
                </div> 
              </div>
            </div> 
          </fieldset>
        </form>  
      <hr class='bg-grey-500'>
  </div>

@endsection