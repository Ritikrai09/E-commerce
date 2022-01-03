@extends('auth.app')

@section('content1')
<div class='flex justify-center'> 
     <div class="w-2/6 bg-white p-4 rounded-lg mt-3">
     <div class='py-2'> <h2 class='text-lighter text-2xl text-center'>Seller Registration</h2></div>
        <form action="{{ route('sellerRegister') }}" class='form control' method='post'> 
        @csrf
            @if(session()->has('success'))
               <div class='alert alert-success'>
                   <ul>
                       <li>{{ session()->get('success')}}</li>
                   </ul>
               </div>
            @endif
        <div class='flex flex-row'>
            <div class='m-2'>
                <label for="name" class='sr-only'>Company Name</label>
                <input type="text" name='CompanyName' id='CompanyName' placeholder='Company name' 
                class='bg-gray-100 border-2 w-full p-4 h-5 rounded-lg mb-2' value='{{ old('CompanyName') }}'>

                @error('CompanyName')
                <div class='text-red-500 mt-2 text-sm'>
                {{ $message }}
                </div>
                @enderror
            </div>

            <div class='m-2'>  
                <label for="username" class='sr-only'>SellerName</label>
                <input type="text" name='SellerName' id='SellerName' placeholder='Seller name' 
                class='bg-gray-100 border-2 w-full p-4 h-5 rounded-lg mb-3' value='{{ old('SellerName') }}'>
                @error('SellerName')
                    <div class='text-red-500 mt-2 text-sm'>
                    {{ $message }}
                     </div>
                @enderror
            </div>
         </div>
         <div class='flex flex-row'>
            <div class='m-2'>
            <label for="email" class='sr-only'>Email</label>
                <input type="text" name='email' id='email' placeholder='your email' 
                class='bg-gray-100 border-2 w-full p-4 h-5 rounded-lg mb-3' value='{{ old('email') }}'>
                @error('email')
                <div class='text-red-500 mt-2 text-sm'>
                {{ $message }}
                </div>
                @enderror
            </div>
     
            <div class='m-2'>
                <label for="password" class='sr-only'>Password</label>
                <input type="password" name='password' id='password' placeholder='your password' 
                class='bg-gray-100 border-2 w-full p-4 h-5 rounded-lg mb-3' value=''>
                @error('password')
                <div class='text-red-500 mt-2 text-sm'>
                {{ $message }}
                </div>
                @enderror
            </div>
        </div>  
        <div class='flex flex-row'>  
            <div class='m-2'>
                <label for="passwordconfirm" class='sr-only'>Confirm Password</label>
                <input type="password" name='password_confirmation' id='password_confirmation' placeholder='Repeat password' 
                class='bg-gray-100 border-2 w-full p-4  h-5 rounded-lg mb-3' value=''>
                @error('password_confirmation')
                <div class='text-red-500 mt-2 text-sm'>
                {{ $message }}
                </div>
                @enderror
            </div>

             <div class='m-2'>  
                <label for="contact" class='sr-only'>contact</label>
                <input type="number" name='contact' id='contact' placeholder='contact' 
                class='bg-gray-100 border-2 w-full p-4 h-5 rounded-lg mb-3' value='{{ old('contact') }}'>
                @error('contact')
                    <div class='text-red-500 mt-2 text-sm'>
                    {{ $message }}
                     </div>
                @enderror
            </div>
        </div>  
       
        <div class='flex flex-row'>  
           <div class='m-2'>         
              <label for="officeAddress" class='sr-only'>officeAddress</label>
                <textarea type="text" name='officeAddress' id='officeAddress' cols="55" rows="3"
                 placeholder='office Address' class='bg-gray-100 border-2 w-full p-2 rounded-lg' value='{{ old('officeAddress') }}'></textarea>
                 @error('officeAddress')
                    <div class='text-red-500 mt-2 text-sm'>
                    {{ $message }}
                     </div>
                @enderror
            </div>
       </div>    
       <div class='flex'> 
            <div class='m-2'>  
                <label for="city" class='sr-only'>city</label>
                <input type="text" name='city' id='city' placeholder='city' 
                class='bg-gray-100 border-2 w-full p-4 h-5 rounded-lg mb-3' value='{{ old('city') }}'>
                @error('city')
                    <div class='text-red-500 mt-2 text-sm'>
                    {{ $message }}
                     </div>
                @enderror
            </div>
             
            <div class='m-2'>  
                <label for="state" class='sr-only'>state</label>
                <input type="text" name='state' id='state' placeholder='state' 
                class='bg-gray-100 border-2 w-full p-4 h-5 rounded-lg mb-3' value='{{ old('state') }}'>
                @error('state')
                    <div class='text-red-500 mt-2 text-sm'>
                    {{ $message }}
                     </div>
                @enderror
            </div>
        </div>  
                <div class='m-2'>
                     <button type="submit" class='w-full bg-blue-500 text-white text-center font-medium px-4 py-3 rounded-lg'>Register</button>
                </div>
            </div>   
        </form>  
    </div>
</div>
@endsection