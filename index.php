<?php include('utils/header.php'); ?>
            <div class="content">
                 <div class="container-fluid">
                        <div class="row" >
                            <div class="card">
                                <div class="card-header" data-background-color="purple">
                                    <h4 class="title">Sell / invoice</h4>
                                    <p class="category"></p>
                                </div>
                                <div class="card-content">
                                    <form url="utils/add_bill_data.php" if="myForm">
                                        <div class="row">
                                            
                                            <div class="col-md-8">
                                                <div class="form-group label">
                                                    <label class="control-label">PARTY NAME</label>
                                                    <input list="party_names"  class="form-control"  name="party_name" required>

                                                        <datalist id="party_names">
                                                          <?php
                                                            $result = $conn->query("select DISTINCT party_name from bill_account");
                                                            while($row = $result->fetch_assoc()) {
                                                                echo "<option value='".$row['party_name']."'>";
                                                              }
                                                          ?>
                                                        </datalist>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group label">
                                                    <label class="control-label">Date</label>
                                                    <input type="date" value="" name="date" class="form-control" id="date" required>
                                                </div>
                                            </div>
                                         </div>    
                                         

                                        <div class="row">
                                            <center>
                                                <div class="col-md-6 x">
                                                    <div class="radio" >
                                                      <label style="width: 100px;"><input type="radio" name="pay_receive" value="0" id="pay" required>To Pay</label>
                                                    </div>

                                                </div>
                                                <div class="col-md-6 x">
                                                    <div class="radio" >
                                                      <label style="width: 100px;"><input type="radio" name="pay_receive" value="1" id="receive" required>To Receive</label>
                                                    </div>
                                                </div>
                                                
                                            </center>
                                         </div>    



                                         <div class="row">
                                            
                                            <div class="col-md-6">
                                                <div class="form-group label">
                                                    <label class="control-label">BILL NO</label>
                                                    <input type="text" value="" class="form-control" name="bill_no"  required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group label">
                                                    <label class="control-label">BOOK NO</label>
                                                    <input type="text" value="" class="form-control" name="book_no" required>
                                                </div>
                                            </div>
                                         </div>


                                        <div class="row">
                                            
                                            <div class="col-md-6">
                                                <div class="form-group label">
                                                    <label class="control-label">MOBILE NO</label>
                                                    <input type="text" onkeyup="value=value.replace(/[^\d]/g,'')" class="form-control" name="mobile_no"  required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group label">
                                                    <label class="control-label">AMOUNT</label>
                                                    <input type="text" onkeyup="value=value.replace(/[^\d]/g,'')" class="form-control" name="amount" required>
                                                </div>
                                            </div>
                                         </div>

                                        <div class="row">
                                            
                                            <div class="col-md-12">
                                                <div class="form-group label">
                                                    <textarea type="date" value="" placeholder="ENTER ANY FURTHER COMMENT HERE" class="form-control" name="comment" ></textarea>
                                                </div>
                                            </div>
                                         </div>


                                        <button type="submit"  class="btn btn-primary pull-right" id="sell">SUBMIT</button>
                                        <div class="clearfix"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>   
            </div>
            
        
<?php include("utils/footer.php"); ?>
<script>
$('#payment').addClass('active');
</script>