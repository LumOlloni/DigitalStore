<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Pagesa</title>
    
  </head>

  <body >
              <div class="container">
                   
                       
                      <address class="text-align:center;">
                          <strong>DigitalStore</strong>
                          <br>
                          Marije Shllaku nr 1 , Gjakove
                          <br>
                          lumolloni12@gmail.com
                          <br>
                          <abbr title="Phone">Nr Tel:</abbr> +38345324445
                      </address>
                      <h2 style="text-align:center;">Te dhenat e blersit</h2>
                    <p style="text-align:center;">
                      Emri i Blersit: {{$paymentUser->userData->name}} 
                            </p>
                            <p style="text-align:center;">
                               Username i Blersit: {{$paymentUser->userData->username}} 
                            </p>
                             <p style="text-align:center;">
                              Email i Blersit: {{$paymentUser->userData->email}} </
                            </p>  
                            <p style="text-align:center;">
                                Eshte regjistruar ne Website me daten: {{$paymentUser->userData->created_at}}  
                            </p>    
                
                  <div class="col-xs-6 col-sm-6 col-md-6 text-right">
                     
                      
                  </div>

              </div>
             
            
             
              <div class="row">
                  <div style="text-align:center;">
                      <h1>Pagesa</h1>
                      <br>

                  </div>
                  </span>
                  <table >
                      <thead>
                          <tr>
                              <th>Produkti</th>
                              <th>Sasia</th>
                              <th class="text-center">Qmimi</th>
                              <th class="text-center">Total</th>
                          </tr>
                      </thead>
                      <tbody >
                         
                             
                          @foreach ($data as $itemData)
                              
                         
                               
                        
                             
                          <tr style="float:right;">
                            <td  class="col-md-9"><em>{{$itemData['name']}}</em></h4></td>
                              <td class="col-md-1" style="text-align: center"> {{$itemData['quantity']}} </td>
                              <td class="col-md-1 text-center">{{($itemData['quantity']) * $itemData['price']}} €</td>
                              <td class="col-md-1 text-center"></td>
                              
                          </tr>
                          @endforeach
                       
                          <tr>
                              <td>   </td>
                              <td>   </td>
                              <td class="text-right">
                              <p>
                                  <strong>TVSh: </strong>
                              </p></td>
                              <td class="text-center">
                              
                              <p>
                                  <strong>18%</strong>
                              </p></td>
                          </tr>
                          <tr>
                              <td>   </td>
                              <td>   </td>
                              <td class="text-right"><h4><strong>Totali: </strong></h4></td>
                              @foreach ($query as $item)
                                
                              <td class="text-center text-danger"><h4><strong>{{$item->totalPayment}}</strong></h4></td>
                              @endforeach
                          </tr>
                      </tbody>
                  </table>
                  <div class="col-md-6">
                        <p>
                             Date e pageses: {{$dateTime}} 
                        </p>
                    <p>Falemiderit per blerjen e produkteve tona. Shpresojme qe te jeni te kenaqur</p>
                  </div>
                  <div class="col-md-6">
                    <strong style="margin-left:10px;">Nenshkrimi Juaj
                        <br><br>
                        <hr style="border:1px solid; text-align: right; width: 75px;margin-left:10px;">
                    </strong>
                   
                  </div>

         


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>