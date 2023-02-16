<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NewCal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.3.slim.js" integrity="sha256-DKU1CmJ8kBuEwumaLuh9Tl/6ZB6jzGOBV/5YpNE2BWc=" crossorigin="anonymous"></script> 
  
    <style>
        #NewTableHead{
            background-color: #2BCA8F;
        }
         #Tbody{
            font-size: 15px;
        
      }

      table tbody tr td input{
        font-size: 14px;
      }
      table tbody tr td button{
        font-size: 10px;
      }

      table thead tr th {
        font-size: 13px;
      }

      

    </style>

</head>
<body>
    <div class="container">
        <div class="row m-5 d-flex justify-content-center TableSize">

                <table class="table table-hover">
                    <thead>
                        <tr id="NewTableHead" class="text-center">
                            <th scope="col">Sl</th>
                            <th scope="col">Products Name</th>                   
                            <th scope="col">Quantity</th>
                            <th scope="col">Stock</th>
                            <th scope="col">Unit</th>
                            <th scope="col">Price</th>
                            <th scope="col">Discount</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody id="Tbody">
                        <tr id="Trow" class="Trow" >
                            <td scope="row" id="Slid">#</td>
                            <td><input type="text" name="" value = ""></td>
                            <td><input type="text" name="QTY" class="text-end QTY" value = "" onkeyup="Cal(this);" onchange="Cal(this);"></td>
                            <td></td>
                            <td></td>
                            <td><input type="number" name="Price" class="text-end Price" value = "" onkeyup="Cal(this);" onchange="Cal(this);"></td>
                            <td><input type="number" name="Discount" value = "" class="Discount text-end" onkeyup="Cal(this);" onchange="Cal(this);"></td>
                            <td><input type="text" name="Tamount" class="text-end Tamount" value = ""  onkeyup="Cal_price(this);" onchange="Cal_price(this);"></td>
                            <td class="d-flex justify-content-center align-items-middle">
                                <button type="submit" value="Submit" class="bg-danger m-1 text-light" onclick="DelRow(this);">Delete</button>   
                                <button type="submit" value="Submit" class="bg-success m-1 text-light p-1" onclick="AddNew()">Add+</button>                           
                            </td>
                        </tr> 
                        <tr id="">
                            <td></td>
                            <td>Total Quantity</td>
                            <td class="text-end"><span class="me-1" id="total_qty"></span></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td class="text-center">Total</td>
                            <td class="text-end"><span id="total_amnt"></span></td>
                        </tr>
                        <tr id="">
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td class="text-center">Comission</td>
                            <td class="text-end"><input type="text" id="Commission" class="text-end"
                                onchange="Cal_grand_total_amount()"
                                onkeyup="Cal_grand_total_amount()"></td>
                        </tr>
                        <tr id="">
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td class="text-center">Grand Total</td>
                            <td class="text-end"><span class="me-1" id="Gnd_Total"></span></td>
                        </tr>
                        <tr>

                        </tr>
                    </tbody>
                        
                </table>
                
            </div>
        </div>
    </div>

    <script>

       function Cal_price(s){
        var index = $(s).parent().parent().index();
            var Amount = document.getElementsByName('Tamount')[index].value;
            // var Price = document.getElementsByName('Price')[index].value;
            var Quantity = document.getElementsByName('QTY')[index].value;
            var NeAmount = Amount/Quantity ;
            document.getElementsByName('Price')[index].value = NeAmount;
       } 


       function Cal_total_amount(){
            const inputs = document.querySelectorAll(".Tamount");
            const amountyArray = Array.from(inputs, input => parseInt(input.value));
            const total_amnt = amountyArray.reduce((accumulator, currentValue) => accumulator + currentValue, 0);
            $('#total_amnt').html(total_amnt);
            Cal_grand_total_amount();

        }


        function Cal_grand_total_amount(s){
            var ComissionAmnt = document.getElementById('Commission').value;
            var total = document.getElementById('total_amnt').innerHTML;

            var GrandTotal =total-ComissionAmnt ;
            $('#Gnd_Total').html(GrandTotal);
           
        }


        function Cal_total_qty(){
            const inputs = document.querySelectorAll(".QTY");
            const quantityArray = Array.from(inputs, input => parseInt(input.value));
            const total = quantityArray.reduce((accumulator, currentValue) => accumulator + currentValue, 0);
            $('#total_qty').html(total);
        }


        function Cal(q){
            var index = $(q).parent().parent().index();
            var price = document.getElementsByName('Price')[index].value;
            var Quantity = document.getElementsByName('QTY')[index].value;
            var Discount = document.getElementsByName('Discount')[index].value;
            var Total = price*Quantity;
            var DiscountPrice = Total*Discount/100;
            var GrandTotal = Total-DiscountPrice;
            document.getElementsByName('Tamount')[index].value=GrandTotal;
            // document.getElementsByName('tqnty')[index].value=Quantity;
            // document.getElementsByName('ddiscount')[index].value=DiscountPrice;
            Cal_total_qty();
            Cal_total_amount();

        }

        

        function DelRow(s){
            $(s).parent().parent().remove();

        }

        function AddNew(){
        //    var v = $("#Trow").clone().appendTo("#Tbody");
        //    alert($("#Trow").html());
           $(".Trow:last").after('<tr  class="Trow">'+$("#Trow").html()+'</tr>');
        //    var v = $("#Trow").after("#Tbody");
        //    $(v).find('input').val('');

        }


    </script>

</body>
</html>