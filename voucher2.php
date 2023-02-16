<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Calculate with javascript</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
        <script src="https://code.jquery.com/jquery-3.6.3.slim.js" integrity="sha256-DKU1CmJ8kBuEwumaLuh9Tl/6ZB6jzGOBV/5YpNE2BWc=" crossorigin="anonymous"></script> 

      </head>
    <body>
        <div class="contaner">
            <div class="row m-5">
                    <table class="table">
                        <thead>
                            <tr class="bg-success">
                                <th scope="col">Particular</th>
                                <th scope="col">Qty</th>
                                <th scope="col">Rate</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Action</th>
                                  <button type="button" class="btn btn-warning d-flex justify-content-center mb-1" onclick="Btnadd()">+</button>                 
                            </tr>
                        </thead>
                        <tbody id="Tbody">
                            <tr id="Trow" class="d-none">
                                
                                <td><input type="text" class="form-control"></td>
                                <td><input type="number" class="form-control" name="qty" onchange="Cal(this);"></td>
                                <td><input type="number" class="form-control" name="rate" onchange="Cal(this);"></td>
                                <td><input type="number" class="form-control" name="amt" onchange="Cal(this);"></td>
          
                                <td class="btn btn-danger bg-danger text-dark" onclick="BtnDelete(this)">Delete</td>
                            </tr>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <script>
          function Btnadd(){
             var v = $("#Trow").clone().appendTo("#Tbody");
             $(v).find("input").val('');
             $(v).removeClass("d-none")
          }
          
          function BtnDelete(v){
            $(v).parent().remove();
          }

          function Cal(v){
             var index = $(v).parent().parent().index();

             var qty = document.getElementsByName("qty")[index].value;
             var rate = document.getElementsByName('rate')[index].value;
             var amt = qty*rate;
             
             document.getElementsByName('amt')[index].value = amt;
             document.getElementsByName('totalamount')[index].value = amt;
          }

        </script>
    </body>
</html>
