@extends('auth.main')

@section('content1')

        <div class='modal fade' id='modalmain' tabindex='-1' role='dialog' aria-labelledby='modaltitle' aria-hidden='true'>
          <button type='button' class='close' data-dismiss='modal'>X</button>
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
                <footer>
                    <button type="button" class='btn btn-secondary' data-dismiss='modal'>Close</button> 
                    <button type="button" class='btn btn-primary'>Save changes</button> 
                </footer>
            </table>
        </div>   
@endsection