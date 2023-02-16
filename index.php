<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>sales order</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
        <link rel="stylesheet" type="text/css" href="style.css" />
        <script src="https://code.jquery.com/jquery-3.6.3.slim.js" integrity="sha256-DKU1CmJ8kBuEwumaLuh9Tl/6ZB6jzGOBV/5YpNE2BWc=" crossorigin="anonymous"></script>
    </head>
    <body>
        <a href="voucher1.php" class="m-5">Let's go Voucher 1 Page</a>
        <a href="voucher2.php" class="m-5">Let's go to Voucher 2 Page</a>
        <a href="backupvoucher.php" class="m-5">Let's go to Bach Up Page</a>
        <section class="sales_order">
            <div class="container-fluid">
                <div class="sales-order-title">
                    <h5>sales order</h5>
                </div>
                <div class="tbl">
                    <table class="main_table">
                        <thead>
                            <tr>
                                <th>Sl No</th>
                                <th class="c-1">Product Name</th>
                                <th class="c-2">
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected>Select Godown</option>
                                        <option value="1">Godown 1</option>
                                        <option value="2">Godown 2</option>
                                        <option value="3">godown 3</option>
                                    </select>
                                </th>
                                <th class="c-3">Quantity</th>
                                <th class="c-3">Price</th>
                                <th class="c-3">Discount</th>
                                <th class="c-3">Unit</th>
                                <th class="c-3">Amount</th>
                                <th class="c-3">Action</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
                <form onsubmit="addProduct(event)" style="margin: 20px; text-align: center;">
                    <input name="productName" type="text" value="" placeholder="Product Name" />
                    <input name="godown" type="text" value="" placeholder="Godown" />
                    <input name="quantity" type="number" value="" id="QTY" placeholder="Quantity" onchange="Cal(this);" />
                    <input name="price" type="number" value="" id="PR" placeholder="Price" onchange="Cal(this);" />
                    <input name="discount" type="number" value="" id="DPR" placeholder="Discount" onchange="Cal(this);" />
                    <input name="unit" type="number" value="" placeholder="Unit" />
                    <input name="amount" type="number" value="" placeholder="Amount" onchange="Cal(this);" />
                    <button class="pr_add" value="Add products" onclick="getResult()">Add Products</button>
                </form>
            </div>
        </section>

        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

        <script>
            function addProduct(event) {
                event.preventDefault();
                const data = event.target;
                const table = document.querySelector(".main_table tbody");

                const html = `
                <tr>
                    <td>${table.children.length + 1}</td>
                    <td>${data.productName.value}</td>
                    <td>${data.godown.value}</td>
                    <td>${data.quantity.value}</td>
                    <td>${data.price.value}</td>
                    <td>${data.discount.value}</td>
                    <td>${data.unit.value}</td>
                    <td>${data.amount.value}</td>
                    <td style="display: flex;">
                        <button class="delete_btn" onclick = "return checkdelete()">Delete</button>
                        <button class="edit_btn">Edit</button>
                    </td>
                </tr>
            `;

                table.innerHTML += html;
            }

            function Cal(s) {
                var index = $(v).parent().parent().index();
                alert(index);

                var qnty = document.getElementById("QTY").value;
                var price = document.getElementById("PR").value;
                var discount = document.getElementById("DPR").value;
                console.log(qnty);
               
            }
        </script>
        <script>
            function checkdelete() {
                return confirm("Are your sure that you want to delete this box");
            }
        </script>
    </body>
</html>
