<?php include "utils/header.php"; ?>      
<style>

.table tbody tr:not(.header) {
  display: none;
  background:  #f5f5f5;
}

.table .header td:after {
  /*content: "\002b";*/
  position: relative;
  top: 1px;
  display: inline-block;
  font-family: 'Glyphicons Halflings';
  font-style: normal;
  font-weight: 400;
  line-height: 1;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  float: right;
  
  text-align: center;
  padding: 3px;
  transition: transform .25s linear;
  -webkit-transition: -webkit-transform .25s linear;
}

.table .header.active td{
  /*content: "\2212";*/
  background:  #6c6c93;
  color: #fff;
}
</style>
<div id="pop-up-out" class="pop-up"></div>
<div id="pop-up-in" class="pop-up pop-up-party">
  
  <form url="utils/edit_bill_data.php" if="myForm">
                                        <div class="row">
                                            <input type="hidden" id="party_id" name="id">
                                            <div class="col-md-8">
                                                <div class="form-group label">
                                                    <label class="control-label">PARTY NAME</label>
                                                    <input id="party_name"  class="form-control"  name="party_name" required>

                                                      
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group label">
                                                    <label class="control-label">Date</label>
                                                    <input type="date" value="" name="date" class="form-control" id="date"  required>
                                                </div>
                                            </div>
                                         </div>    
                                         

                                        <div class="row">
                                            <center>
                                                <div class="col-md-6 x">
                                                    <div class="radio" >
                                                      <label style="width: 100px;"><input type="radio" name="pay_receive" value="0" id="vendor" required>Vendor</label>
                                                    </div>

                                                </div>
                                                <div class="col-md-6 x">
                                                    <div class="radio" >
                                                      <label style="width: 100px;"><input type="radio" name="pay_receive" value="1" id="customer"  required>Customer</label>
                                                    </div>
                                                </div>
                                                
                                            </center>
                                         </div>    



                                         <div class="row">
                                            
                                            <div class="col-md-6">
                                                <div class="form-group label">
                                                    <label class="control-label">BILL NO</label>
                                                    <input type="text" value="" class="form-control" name="bill_no" id="bill_no"  required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group label">
                                                    <label class="control-label">BOOK NO</label>
                                                    <input type="text" value="" class="form-control" name="book_no" id="book_no" required>
                                                </div>
                                            </div>
                                         </div>


                                        <div class="row">
                                            
                                            <div class="col-md-6">
                                                <div class="form-group label">
                                                    <label class="control-label">MOBILE NO</label>
                                                    <input type="text" onkeyup="value=value.replace(/[^\d]/g,'')" class="form-control" name="mobile_no" id="mobile_no"  required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group label">
                                                    <label class="control-label">AMOUNT</label>
                                                    <input type="text" onkeyup="value=value.replace(/[^\d]/g,'')" class="form-control" name="amount" id="amount" required>
                                                </div>
                                            </div>
                                         </div>

                                        <div class="row">
                                            
                                            <div class="col-md-12">
                                                <div class="form-group label">
                                                    <textarea type="date" value="" placeholder="ENTER ANY FURTHER COMMENT HERE" class="form-control" id="comment" name="comment" ></textarea>
                                                </div>
                                            </div>
                                         </div>


                                        <button type="submit"  class="btn btn-primary pull-right" id="sell">SUBMIT</button>
                                        <div class="clearfix"></div>
                                    </form>
</div>


<div id="pop-up-in" class="pop-up pop-up-product">
  <form url="utils/edit_stock_data.php" if="myForm">
    <input type="hidden" id="product_id" name="id">
                                        <div class="row">
                                            
                                            <div class="col-md-6">

                                                <div class="form-group label">
                                                    <label class="control-label">Product</label>
                                                        <input  class="form-control" id="product" name="product" required="required">
                                                        
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group label">
                                                    <label class="control-label">Product_type</label>
                                                    
                                                        <input type="text" name="product_type" required="required" class="form-control" id="product_type">
                                                        
                                                       
                                                </div>
                                            </div>
                                         </div>    
                                         

                                        <div class="row">
                                            <center>
                                                <div class="col-md-6 x">
                                                    <div class="radio" >
                                                      <label style="width: 100px;"><input type="radio" name="add_minus" value="0" id="add" required>ADD</label>
                                                    </div>

                                                </div>
                                                <div class="col-md-6 x">
                                                    <div class="radio" >
                                                      <label style="width: 100px;"><input type="radio" name="add_minus" value="1" id="less" required>LESS</label>
                                                    </div>
                                                </div>
                                                
                                            </center>
                                         </div>    



                                         <div class="row">
                                            
                                            
                                            <div class="col-md-6">
                                                <div class="form-group label">
                                                    <label class="control-label">Date</label>
                                                    <input type="date" value="" name="date" class="form-control" id="product_date" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group label">
                                                    <label class="control-label">QUANTITY</label>
                                                    <input type="text" value="" class="form-control" name="amount" id="product_amount"  required>
                                                </div>
                                            </div>
                                         </div>



                                      


                                        <button type="submit"  class="btn btn-primary pull-right" >SUBMIT</button>
                                        <div class="clearfix"></div>
                                    </form>
</div>

<div class="content">
        <div class="container-fluid">
              <div class="row">
                  <ul class="nav nav-tabs innav">
                        <li class="active"><a data-toggle="tab" href="#editparty">Party</a></li>
                        <li><a data-toggle="tab" href="#editproduct">Product</a></li>
                        <li><a data-toggle="tab" href="#deletesell">Daily Expenditure</a></li>

                  </ul>

                            <div class="tab-content">
                              <div id="editparty" class="tab-pane fade in active">
                                <br><br><br>
                                            <div class="container-fluid" >
                                              
                                              <div class="row"  >
                                                      <div class="card" >
                                                          <div class="card-header"  data-background-color="purple">
                                                              <input type="text" class="form-control" ng-model="party_search" name="" placeholder="Search">
                                                          </div>
                                                          <div class="card-content table-responsive" >
                                                              <table class="table" >
                                                                  <thead class="text-primary">
                                                                      <th>No</th>
                                                                      <th>Party name</th>
                                                                      <th>Date</th>
                                                                      <th>Bill No</th>
                                                                      <th>Book No</th>
                                                                      <th>Bill Type</th>
                                                                      
                                                                      <th>Mobile No</th>
                                                                      <th>Amount</th>
                                                                      <th>Effective Amount</th>
                                                                      <th>Edit</th>
                                                                      
                                                                  </thead>
                                                                  <tbody ng-repeat="x in bills_report | filter :party_search">
                                                                     <!--  <tr class="header" ng-repeat="x in bills_report">
                                                                          <td>{{x.id}}</td>
                                                                      </tr> -->
                                                                      <tr class="header" ng-click="expand_row($event)" >
                                                                          <td>{{$index + 1}}</td>
                                                                          <td >{{x.party_name}}</td>
                                                                          <td >{{x.date}}</td>
                                                                          <td >{{x.bill_no}}</td>
                                                                          <td >{{x.book_no}}</td>
                                                                          <td >{{x.pay_receive | pay_receive_filter}}</td>
                                                                          
                                                                          <td >{{x.mobile_no}}</td>
                                                                          <td >{{x.amount}}</td>
                                                                          <td >{{x.effective_amount}}</td>
                                                                          <td><button class="btn btn-success" id="open_pompt" value="{{x.id}}" ng-click="open_pompt_party($event, x)">Edit</button></td>
                                                                      </tr>
                                                                      <tr ng-repeat="entry in x.details">
                                                                          <td>{{$index + 1}}</td>
                                                                          <td >{{entry.date}}</td>
                                                                          <td >{{entry.pay_receive | add_less}}</td>
                                                                          <td >{{entry.comment}}</td>
                                                                          <td >{{entry.amount}}</td>
                                                                          <td><button class="btn btn-success" id="open_pompt" value="{{x.id}}" ng-click="open_pompt_party($event,entry)">Edit</button></td>

                                                                      </tr>
                                                                    
                                                                      </tr>
                                                                     
                                                                  </tbody>
                                                              </table>
                                                          </div>
                                                      </div>
                                                  </div>
                                                
                                                
                                              </div>

                              </div>
                              <div id="editproduct" class="tab-pane fade">
                                <br><br><br>
                                                  <div class="container-fluid" >

                    <div class="row"  >
                            <div class="card" >
                                <div class="card-header"  data-background-color="purple">
                                     <input type="text" class="form-control" ng-model="product_search" name="" placeholder="Search">
                                </div>
                                <div class="card-content table-responsive" >
                                    <table class="table" >
                                        <thead class="text-primary">
                                            <th>No</th>
                                            <th>Product</th>
                                            <th>Product Type</th>
                                            <th>Quantity</th>
                                            <th>Edit</th>
                                            
                                        </thead>
                                        <tbody ng-repeat="x in stock_report | filter: product_search">
                                           <!--  <tr class="header" ng-repeat="x in bills_report">
                                                <td>{{x.id}}</td>
                                            </tr> -->
                                            <tr class="header" ng-click="expand_row($event)" >
                                                <td>{{$index + 1}}</td>
                                                <td >{{x.product}}</td>
                                                <td >{{x.product_type}}</td>
                                                <td >{{x.amount}}</td>
                                                <td><button class="btn btn-success" id="open_pompt" value="{{x.id}}" ng-click="open_pompt_product($event,x)">Edit</button></td>
                                                
                                            </tr>
                                            <tr ng-repeat="entry in x.details">
                                                <td>{{$index + 1}}</td>
                                                <td >{{entry.date}}</td>
                                                <td >{{entry.add_minus | add_less}}</td>
                                                <td >{{entry.amount}}</td>
                                                <td><button class="btn btn-success" id="open_pompt" value="{{entry.id}}" ng-click="open_pompt_product($event,entry)">Edit</button></td>

                                            </tr>
                                          
                                            </tr>
                                           
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                      
                      
                    </div>
                                
                              </div>
                              <div id="deletesell" class="tab-pane fade">
                                
                              </div>
                              
                            </div>
                        </div>
                    </div>    
            </div>


<?php include "utils/footer.php"; ?>      
<script type="text/javascript">
    $('#edit_details').addClass('active');
    $(document).ready(function(){
        scope_holder.get_bills_report();
        scope_holder.get_stock_report();
        scope_holder.open_pompt_party = function($event, obj){

            
            $('.pop-up-party').addClass('appear');
            $('#pop-up-out').addClass('appear');


            $('#party_id').val(obj.id);
            
            $('#party_name').val(obj.party_name);
                  $('#date').val(obj.date);
                  $('#mobile_no').val(obj.mobile_no);
                  $('#amount').val(obj.amount);
                  $('#comment').val(obj.comment);
                  $('#bill_no').val(obj.bill_no);
                  $('#book_no').val(obj.book_no);
                  if(obj.pay_receive == 0){
                    $('#vendor').attr("checked","checked"); 
                  }else{
                    $('#customer').attr("checked","checked"); 
                  }
                  if(obj.is_bill=='0'){
                    $('#vendor').closest('label').html($('#vendor').closest('label').html().replace("Vendor", "ADD"));
                    $('#customer').closest('label').html($('#customer').closest('label').html().replace("Customer", "LESS"));
                  }
                    
                
           
           
        };

        scope_holder.open_pompt_product = function($event,obj){
          $('.pop-up-product').addClass('appear');
            $('#pop-up-out').addClass('appear');

            id = obj.id;
            
            $('#product_id').val(id);
            $('#product').val(obj.product);
                  $('#product_date').val(obj.date);
                  $('#product_type').val(obj.product_type);
                  $('#product_amount').val(obj.amount);
                  
                  if(obj.add_minus == 0){
                    $('#add').attr("checked","checked"); 
                  }else{
                    $('#less').attr("checked","checked"); 
                  }
             

        }

        
    });



</script>