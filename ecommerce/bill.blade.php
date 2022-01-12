@extends('auth.main')

@section('content1')

<div class='container w-75 form-control h-100'>  
    <fieldset class='the-fieldset'>   
      
        <legend class='d-flex the-legend'>
            <h2 class='h4 w-75 px-4 py-2'> Billings Section</h3>
            <button type='button' class='btn btn-primary' data-toggle='modal' data-target='#modalmain'>Preview Bill</button>
            <button type="button" class='btn btn-info' data-toggle='collapse' data-target='.collapse3:not(.in)'>create Billings</button>
         </legend> 
        
         <div class="w-50 d-flex h6 justify-around collapse collapse3" id="collapse3">
                <label for="OldCustomer" class="flex w-25 py-4 bg-gray-100" data-toggle="collapse" arial-expanded="false" arial-controls="collapse2" data-target=".collapse2:not(.in)" checked="">
                  <input type="radio" class="p-2 w-25" name="customerop" id="OldCustomer" value="OldCustomer">
                  Existing Customer
                </label>
                
                <span class="h5 text-gray-500">-OR-</span>
               
                 <label for="NewCustomer" class="flex w-25 justify-center py-4 px-2 bg-gray-100" data-toggle="collapse" data-target=".collapse1">
                  <input type="radio" class="p-2 w-25" name="customerop" id="NewCustomer" value="newCustomer">
                   New Customer
                </label>    
            </div>
 
    <div class='flex w-100'>
      
      <div class='flex flex-col w-100'>

        <form class='w-50 h6 flex flex-col collapse collapse2 m-5' action="{{ route('billings') }}" method='get' id='collapse2'>    
        
         <label for="category" class='sr-only ml-5'>Category</label> 
           
            <select type="text" id='customerList' name='customerList' value='' class='w-75 h-50 border-2 border-gray-400 w-25 p-3 rounded-lg mb-2 @error('category') ? border-3 border-danger bg-red-100 : '' @enderror'>
          
              <option selected>Select Customer</option>
                 @foreach($customer as $customers) 
                     @if (old('customerList')==$customers->id)
                       <option value='{{$customers->id}}' selected>{{$customers->name}} {{$customers->contact}}</option>
                        @else
                       <option value='{{$customers->id}}'>{{$customers->name}} {{$customers->contact}}</option>
                     @endif
                 @endforeach
             </select>
          
             <div class='w-50 h-75 d-flex'>
                  <button type="submit" class='btn btn-info ml-3 py-3 h-75 w-50' value="Add">Add</button>
               </div>
               
       </form>


      <form action="{{ route('billings') }}" method='post' class='container h6 w-75 flex ml-3 mb-5 collapse1 collapse' id='collapse1'>
         @csrf 
         
         @if(session()->has('success'))
                 <div class='alert alert-success'>
                   <button type='button' class='text-white close' data-dismiss='alert'>X</button>
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

            <div class='flex'>
               <label for="name" class="flex flex-col w-75">Customer Name
                <input type="text" name='name' id='name' placeholder='enter customer name' 
                   class='border-2 w-75 p-3 rounded-lg mb-2' value='{{ old('name') }}'>
                   @error('name')
                   <div class='text-red-500 mt-2 text-sm'>
                       {{ $message }}
                   </div>
                  @enderror
                </label>
        
                <label for="contact" class="flex flex-col w-50">Contact No.
                    <input type="tel" name='contact' id='contact' placeholder='contact no.' 
                      class='border-2 w-75 p-3 rounded-lg mb-2' pattern='[0-9]{10}' value='{{ old('contact') }}'>
                       @error('contact')
                        <div class='text-red-500 mt-2 text-sm'>
                          {{ $message }}
                       </div>
                    @enderror
                </label>
            </div>

            <div class='flex'>

            <section class='w-75 flex flex-col'>
              <label for="" class="flex flex-col w-75">Address
                  <input type="number" name='flatNo' id='flatNo' placeholder='flat No.' 
                      class='border-2 w-50 p-3 rounded-lg mb-2' value='{{ old('flatNo') }}'>
                        @error('flatNo')
                          <div class='text-red-500 mt-2 text-sm'>
                             {{ $message }}
                           </div>
                        @enderror
                    </label>  
                    
                    <textarea cols='10' rows='5' name='Address' id='Address' placeholder='Address name' 
                      class='border-2 w-75 p-3 rounded-lg mb-2' value='{{ old('Address') }}'></textarea>
                       @error('Address')
                        <div class='text-red-500 mt-2 text-sm'>
                          {{ $message }}
                       </div>
                    @enderror
               </section>

        <div class='flex flex-col w-50'>
            <label for="city" class="flex flex-col w-75">City
                <input type="text" name='city' id='city' placeholder='enter your city' 
                   class='border-2 w-100 p-3 rounded-lg mb-2' value='{{ old('city') }}'>
                   @error('city')
                   <div class='text-red-500 mt-2 text-sm'>
                       {{ $message }}
                   </div>
                  @enderror
              </label>
              <label for="state" class="flex flex-col w-75">State
                    <input type="text" name='state' id='state' placeholder='your state' 
                      class='border-2 w-100 p-3 rounded-lg mb-2' value='{{ old('state') }}'>
                       @error('state')
                        <div class='text-red-500 mt-2 text-sm'>
                          {{ $message }}
                       </div>
                    @enderror
                </label>

                <label for="cbutton" class='flex'>
                  <button type="submit" name='cbutton' class='py-3 w-75 bg-green-500 text-white text-center font-medium mt-1 rounded-lg'><b>+</b> Add Customer</button>
               </label>
              
              </div>
            </div>  
          </div> 
      </form>

      <div class='w-50' >    
          <div class='w-50 border bg-gray-200 text-gray-600'>
                  @if(isset($_GET['customerList']))
                     <ul>
                         <li>Name :{{$exist->name}}</li>
                         <li>Contact no. :{{$exist->contact}}</li>
                         <li>Address. :{{$exist->flatNo}}, {{$exist->Address}}</li>
                         <li>City :{{$exist->city}}</li>
                         <li>State :{{$exist->city}}</li>
                     </ul>
                @endif
            </div>    
         </div>
      
      </div> 
       
       <hr class='border-gray-300'>

      </fieldset>

    <fieldset class='the-fieldset container-fluid flex p-2 h6'>    
       <legend class='border-2 p-3 text-bold text-blue-600'>Invoice</legend>

        <div class='flex flex-col w-50 px-4' id='item'>

          <form action="" class='d-flex w-100 p-2 m-2'>

                <label for="pincode" class="flex flex-col mx-3 w-25">Quantity.
                  <input type="number" name='quantity' id='quantity' placeholder='' 
                      class='border-2 w-100 p-3 rounded-lg mb-2' value=''>
                       @error('quantity')
                        <div class='text-red-500 mt-2 text-sm'>
                          {{ $message }}
                       </div>
                    @enderror 
                   <select name="listQ" id="listQ" class='w-75 border-2'>
                       <option value="">pcs</option>
                       <option value="">g</option>
                       <option value="">ml</option>
                       <option value="">kg</option>
                       <option value="">l</option>
                    </select>
                </label>

                <label for="productName" class="flex flex-col mx-3 w-75">Product Name. 
              
                  <input type="text" list='productlist' name='productlist' placeholder='Enter product' 
                      class='border-2 w-100 p-3 rounded-lg mb-2' value=''>
                       @error('pincode')
                        <div class='text-red-500 mt-2 text-sm'>
                          {{ $message }}
                       </div>
                    @enderror

                <datalist id='productlist' height='100px' class='bg-gray-100 text-secondary border-2 w-25 rounded-lg mt-5 @error('category') ? border-3 border-danger bg-red-100 : '' @enderror'>
                     @foreach($product[0]->products as $products) 
                          <option class='flex justify-around' value='{{$products->productName}} {{$products->weight}}g'>
                            <span>qty. {{$products->quantity}}</span></option>
                          <option class='flex justify-around' value='{{$products->productName}} {{$products->weight}}g'>
                            <span>qty. {{$products->quantity}}</span></option>
                            <option class='flex justify-around' value='{{$products->productName}} {{$products->weight}}g'>
                            <span>qty. {{$products->quantity}}</span></option>
                       @endforeach
                  </datalist>
            
              </label>

                <div class="flex flex-col mt-4 w-25">
                    <button type="submit" id='addIn' class="btn btn-success w-100 p-2">Add</button>
                 </div> 
             
          </form>

          <div class='w-100 p-4 flex justify-center m-4'>
            <table class='w-100 border-2'>
              <thead> 
                 <tr class='flex p-4 bg-gray-100'>    
                    <th class='border-0 border-right  px-4' scope='col'>No.</th>
                    <th class='border-0 border-right  px-4' scope='col'>Qty.</th>
                    <th class='border-0 border-right  px-4' scope='col'>Product</th>
                    <th class='border-0 border-right  px-4' scope='col'>price</th>
                    <th class='border-0  px-4' scope='col'>Amount</th> 
                 </tr> 
               </thead>   
                  <tbody class='container-fluid p-4 mt-4 border-0 text-center'>
                     <tr class='p-4 mt-3'>
                       <td class='border-0'> <div class='h6 p-4'>No item Added</div></td>
                     </tr>
                 </tbody> 
            </table>
          </div>
      </div>
        
         <hr class='py-2 mt-3 border-2 text-gray-400'> 

        <form class='flex flex-col w-50 p-2 m-3'>    
           <section class='d-flex'>     
              <label for="tax" class="flex flex-col w-25">Tax (%)
                 <input type="number" name='tax' id='tax' placeholder='' 
                  class='border-2 w-75 p-3 rounded-lg mb-2' value=''>
                 </label>
  
              <fieldset class='w-75 h-100 d-flex border rounded-lg p-1'>
                <legend class='w-auto h5'>Status</legend>
                <label for="status1" class='d-flex w-75'>
                    <input type="radio" name='status' id="status1" class='w-50 border-2'>
                    paid</label>
                <label for="status2" class='d-flex w-75'>
                    <input type="radio" name='status'  id="status2" class='w-50 border-2'>
                    partial</label>
                <label for="status2" class='d-flex w-75'>
                    <input type="radio" name='status'  id="status3" class='w-50 border-2'>
                    <label for="status3">pending</label>
             </fieldset>
          </section>
          
                <label for="discount" class="flex flex-col w-25">Discount (%)
                    <input type="number"  name='discount' id='discount' placeholder='' 
                      class='border-2 w-75 p-3 rounded-lg mb-2' value=''>
                </label>
          </form>
    </fieldset>

    <!--------------------------Invoice BILL---------------------->

  <div class='modal fade' id='modalmain' tabindex='-1' role='dialog' aria-labelledby='modaltitle' aria-hidden='true'>
    <div class='modal-dialog flex flex-col' role='document'>
      <div class='modal-content'>
         <div class='modal-header'>
           <h5 class='modal-title' id='modaltitle'>Invoice</h5>
          <button type='button' class='close' data-dismiss='modal'>X</button>
            <div class='modal-body'>  
              <table class='table w-50 border-2 shadow mt-4 p-2 px-3'>
                <thead>
                  <tr>
                    <th scope='col'>No.</th>
                    <th scope='col'>Qty.</th>
                    <th scope='col'>Product</th>
                    <th scope='col'>price</th>
                    <th scope='col'>Amount</th>
                  </tr>
              </thead>
              <tbody>
                   <tr>
                      <th scope='row'>1.</th>
                      <td>Loreal</td>
                      <td>Loreal</td>
                      <td>200</td>
                      <td></td>
                   </tr>
              </tbody>
                 <tfoot>
                      <th class='text-right' colspan='4' scope='row'>Sub total :</th>
                      <td class='text-right px-3' colspan='2' >200</td>
                 </tfoot>
                </table>
              </div>
               <div class='modal-footer'>
                    <button type="button" class='btn btn-secondary' data-dismiss='modal'>Close</button> 
                    <button type="button" class='btn btn-primary'>Save changes</button> 
                </div>
            </div>  
         </div>  
  </div>  
@endsection