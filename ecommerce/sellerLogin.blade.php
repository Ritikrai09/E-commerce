@extends('auth.main')

@section('content1')
    <div class='w-100 row ml-6 mt-5 border-2 shadow-lg p-3 rounded' style='background:rgb(0 102 255 / 33%)'> 
      <div class="w-100 p-6 rounded-lg mt-6">
        <form class="w-100 flex justify-content-around" action="{{ route('sellerlogin') }}" method='post'>
        @csrf
          <div class="w-50 flex flex-col p-2" >
           @if(session('status'))
           <div class="mb-4 flex justify-center">  
              <div class='bg-red-400 p-2 text-white mb-6 text-center text-sm'>
                  <ul>
                     <li>
                        {{ session('status') }}
                     </li>
                  </ul>
               </div>
            </div>
            @endif
            
            <div class="mb-4 mt-4 flex justify-center">
                <label for="email" class='sr-only'>Email</label>
                  <input type="text" name='email' id='email' placeholder='your email' 
                   class='border-2 w-75 p-3 rounded-lg mb-2' value=''>
                @error('email')
                  <div class='text-red-500 mt-2 text-sm'>
                    {{ $message }}
                  </div>
                @enderror
            </div>
            <div class="mb-4 flex justify-center">
                <label for="password" class='sr-only'>Password</label>
                <input type="password" name='password' id='password' placeholder='your password' 
                class='border-2 w-75 p-3 rounded-lg mb-2' value=''>
                @error('password')
                <div class='text-red-500 mt-2 text-sm'>
                {{ $message }}
                </div>
                @enderror
            </div>
             
          <div class="mb-4 flex justify-center">
            <div class='flex items-center'>
                  <input type="checkbox" name='remember' id='remember'  class='mr-2'>
                   <label for="remember">Remember me</label>
                </div>
              </div>
              
              <div class="mb-4 flex justify-center">
                     <button type="submit" class='w-75 bg-blue-500 text-white text-center font-medium px-2 py-2 rounded-lg'>Login</button>
                </div>
            </div> 
            <div class="w-25 flex flex-col p-2">
               <ul>
                  <li> <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 22.62 25.87">
                    <defs>
                      <style>.cls-1,.cls-2,.cls-3,.cls-6{fill:#6d6e70;}.cls-1,.cls-2{stroke:#6d6e70;}.cls-1,.cls-2,.cls-5,.cls-6,.cls-7{stroke-miterlimit:10;}.cls-1,.cls-4,.cls-6{stroke-width:0.5px;}.cls-2{stroke-width:0.5px;}.cls-4{font-size:14.44px;stroke-linecap:round;stroke-linejoin:round;}.cls-4,.cls-5{fill:#58595b;}.cls-4,.cls-5,.cls-6,.cls-7{stroke:#58595b;}.cls-4,.cls-5,.cls-6{font-family:MyriadPro-Regular, Myriad Pro;}.cls-5{font-size:6.29px;stroke-width:0.75px;}.cls-6{font-size:5.25px;}.cls-7{fill:none;}</style>
                    </defs>
                    <title>Asset 23</title>
                    <g id="Layer_2" data-name="Layer 2">
                      <g id="Layer_1-2" data-name="Layer 1">
                        <rect class="cls-1" x="0.28" y="2.74" width="2.12" height="21.06"/>
                        <rect class="cls-2" x="0.25" y="23.8" width="22.12" height="1.81" transform="translate(22.62 49.42) rotate(180)"/>
                        <rect class="cls-3" x="3.99" y="17.36" width="4.04" height="5.18"/><rect class="cls-3" x="9.99" y="14.38" width="3.83" height="8.16"/>
                        <rect class="cls-3" x="15.97" y="10.97" width="4.25" height="11.65"/><text class="cls-4" transform="matrix(0.86, 0.45, -0.47, 0.88, 4.05, 15.86)">/</text>
                        <text class="cls-5" transform="matrix(0.88, -0.8, 0.59, 0.81, 11.61, 12)">&gt;</text>
                        <text class="cls-6" transform="translate(15.97 5.9) scale(1.08 1)">$</text><rect class="cls-7" x="13.3" y="0.5" width="7.87" height="7.87" rx="3.93" transform="translate(-0.31 1.48) rotate(-4.88)"/>
                      </g>
                    </g>
                  </svg> 
                </li>
               </ul>    
            </div>
        </form>  
        <nav class="w-50 h-10 p-4 text-gray-700 flex justify-content-center">
              <ul class='ml-8 mt-1 flex items-center'>
                  <li class="p-2 px-5"><a href="{{ route('sellerRegister') }}">Register</a></li>
                  <li class="p-2 px-5"><a href="{{ route('sellerlogin') }}" >Forgot Password</a></li>
             </ul>
    </div>
</div>
@endsection