@extends('auth.main')

@section('content1')

<div class='w-75 justify-end'>  
  <form action="{{ route('category') }}" class='w-100 bg-white p-6 rounded-lg mt-1' method='post' enctype='multipart/form-data'>
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
       <legend class='text-secondary font-bold border-bottom w-50 text-left ml-4 px-10 py-1 @error('categoryName') ? border-3 border-danger bg-red-100  : '' @enderror'>Add Category </legend>   

           <div class='control-group inline-flex ml-3 mb-4 w-75 p-3'>
           <label class='sr-only' for="categoryName">category Name</label>
           <input type="text" name='categoryName'
           id='categoryName' class='bg-gray-100 border-2 w-50 p-2 h-10 rounded-lg m-2 @error('categoryName') ? border-3 border-danger bg-red-100  : '' @enderror' placeholder='Category Name'>
        
           <label class='sr-only' for="Descritption">Description</label>
           <input type="text" name='Description'
           id='Description' class='bg-gray-100 border-2 w-75 p-2 h-10 rounded-lg m-2' placeholder='Description'>
           <button type="submit" class='w-50 h-10 bg-blue-500 text-white text-center font-medium py-1 m-2 rounded-lg @error('Descritpion') ? border-3 border-danger bg-red-100  : '' @enderror'><b>+</b>Add Category</button>
      </div>
    </fieldset> 
   </form>   
 
   <div class='container px-5'>
    <table class='table'>
       <thead>
            <tr>
              <th scope='col'>Id</th>
              <th scope='col'>Category Name</th>
              <th scope='col'>Description</th>
           </tr>
        </thead>
        <tbody>
            @foreach($category as $categories) 
            <tr>
                 <th scope='row'>{{ $categories->id }}</th>
                 <td>{{ $categories->categoryName }}</td>
                 <td>{{ $categories->description }}</td>
            </tr>
           @endforeach    
        </tbody>
     </table>
    </div>
</div>

@endsection
