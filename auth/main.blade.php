<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="/css/app.css" rel="stylesheet">
    <title>Document</title> 
    <style>
    
    .hover:hover {
        border-bottom: solid #888; 
        transition: border-bottom .1s linear;
      }

    svg {
        margin-right: 3em;
      }

    .active {
        color: rgba(0,0,255,0.6);
        background: rgba(0,0,0,0.1);
      }
    </style>
</head>
<body> 
      
<header> 
   
  @auth('seller')
   <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">  
     <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Company name</a>
      <input class="form-control form-control-dark w-50" type="text" placeholder="Search" aria-label="Search">
      <ul class="navbar-nav px-3">

       <li class="nav-item inline-flex text-nowrap">
            <form action="{{ route('logoutSeller') }}" method='post'>
              @csrf
              <button type='submit'>Sign out</button>
            </form>
          </li>
      @endauth  
      </ul>
    </nav>
   </header>
 
  <div class='container'>
     <div class='row'>
        
        @auth('seller')
           <x-nav />    
        @endauth
    
        @guest
             @yield('content1')
        @endguest
    
      </div>
 </div>
       
       <footer>
           
     </footer>
  
  </body>
</html>