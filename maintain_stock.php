<?php include('utils/header.php'); ?>



            <div class="content">
                 <div class="container-fluid">
                        <div class="row" >
                            <div class="card">
                                <div class="card-header" data-background-color="purple">
                                    <h4 class="title">Stock maintain</h4>
                                    <p class="category"></p>
                                </div>
                                <div class="card-content">
                                    <form url="utils/add_stock_data.php" if="myForm">
                                        <div class="row">
                                            
                                            <div class="col-md-6">

                                                <div class="form-group label">
                                                    <label class="control-label">Product</label>
                                                        <select class="form-control" id="product_name"
                                                          onchange="toggleField(this,this.nextSibling)">
                                                            <option></option>
                                                            <option value="customOption">[ NEW PRODUCT ]</option>
                                                            <?php
                                                            $result = $conn->query("select DISTINCT product from stock");
                                                            while($row = $result->fetch_assoc()) {
                                                                echo "<option value='".$row['product']."'>";
                                                                echo $row['product'];
                                                                echo "</option>";
                                                              }
                                                          ?>
                                                        </select><input  class="form-control" style="display:none;" disabled="disabled" 
                                                            onblur="if(this.value==''){toggleField(this,this.previousSibling);}">
                                                        
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group label">
                                                    <label class="control-label">Product_type</label>
                                                    
                                                        <!-- <select class="form-control" name="product_type" ng-model="product_type" id="select_product_type" ng-repeat="x in product_type_data">

                                                            <option value="{{x.product_type}}">{{x.product_type}}</option>                                      
                                                        </select>
                                                         -->
                                                         <input type="text" name="product_type" required="required" autocomplete="off" class="form-control" id="text_product_type" list="p_type">
                                                        
                                                       
                                                </div>
                                            </div>
                                         </div>    
                                         

                                        <div class="row">
                                            <center>
                                                <div class="col-md-6 x">
                                                    <div class="radio" >
                                                      <label style="width: 100px;"><input type="radio" name="add_minus" value="0" id="pay" required>ADD</label>
                                                    </div>

                                                </div>
                                                <div class="col-md-6 x">
                                                    <div class="radio" >
                                                      <label style="width: 100px;"><input type="radio" name="add_minus" value="1" id="receive" required>LESS</label>
                                                    </div>
                                                </div>
                                                
                                            </center>
                                         </div>    



                                         <div class="row">
                                            
                                            
                                            <div class="col-md-6">
                                                <div class="form-group label">
                                                    <label class="control-label">Date</label>
                                                    <input type="date" value="" name="date" class="form-control" id="date" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group label">
                                                    <label class="control-label">QUANTITY</label>
                                                    <input type="text" value="" class="form-control" name="amount"  required>
                                                </div>
                                            </div>
                                         </div>



                                      


                                        <button type="submit"  class="btn btn-primary pull-right" >SUBMIT</button>
                                        <div class="clearfix"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>   
            </div>
            
        
<?php include("utils/footer.php"); ?>
<script>
$('#maintain_stock').addClass('active');
function toggleField(hideObj,showObj){
   
    if(hideObj.value == "customOption"){
        hideObj.disabled=true;        
        hideObj.style.display='none';
        showObj.disabled=false;   
        showObj.style.display='block';
        showObj.name = "product";
        showObj.focus();
        // $('#select_product_type').css("display","none");
        // $('#select_product_type').attr("disabled","true");
        
        // $('#text_product_type').css("display","block");
        // $('#text_product_type').removeAttr("disabled");
        // $('#text_product_type').attr('name','product_type');

        $('#is_new').val("1");
    }else{
        hideObj.name = 'product';
        scope_holder.get_product_type();
    }
   
}

</script>