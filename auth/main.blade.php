<!DOCTYPE html>
<html lang="en" class='overflow-scroll'>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="/css/app.css" rel="stylesheet">
    <title>Document</title> 
    <style>
    
    .hover:hover {
        border-bottom: solid #888; 
        transition: border-bottom .1s linear;
      }

    table td,table th {
        border-right: 1px solid lightgrey; 
      }

.collapsible{
  cursor: pointer;
  padding: 5px 10px;
  width: 100%;
  border: none;
  text-align: left;
  outline: none;
  font-size: 15px;
}

.active {
  background-color: lightgrey;
}

 .content {
     padding: 0 18px;
     max-height:0;
     overflow: hidden;
     background-color: #f1f1f1;
     transition: max-height 0.2s ease-out;
  }

    svg {
        margin-right: 1em;
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
 
  <div class='container-fluid' id='container-fluid'>
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
 
 <script>

$(document).ready(function() {  

  $('[name="customerop"]').on('change', function() {  

  if($(this).val() === "OldCustomer") {
    $('#collapse1').collapse('hide');
    $('#collapse2').collapse('show');
    
    localStorage['OldCustomer'] = this.checked;
    localStorage['collapse2'] = 'true';  

  }  else
    $('#collapse2').collapse('hide');
    $('#collapse1').collapse('show');
  
  } 
});


$('#OldCustomer').prop('checked', localStorage['OldCustomer'] == 'true');
$('#collapse2').prop('arial-expanded', localStorage['collapse2'] == 'true');
});

//    document.getElementById('addIn').addEventListener('click', function() {  
//     let tableBody = document.querySelector('table #itemtab');
//    let items = document.querySelector('form #itemsInput');
//    let tab, i=1;

//           tab = `<tr class='shadow h-10'>
//                       <th class='border-0' scope='row'>${++i}</th>
//                       <td class='border-0'>${items.children[0].children[0].value}</td>
//                       <td class='border-0'>${items.children[1].children[0].value}</td>
//                       <td class='border-0'>${200}</td>
//                       <td class='border-0'>${parseInt(items.children[1].children[0].value) * 200}</td>
//                       <td class='border-0'>
//                         <button type='button' class='close' aria-label='close'>
//                              <span>x</span>
//                         </button>
//                       </td>
//                    </tr> `;

//   tableBody.innerHTML += tab;
// });



</script>
</html>