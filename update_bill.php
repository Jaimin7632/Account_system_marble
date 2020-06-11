<?php include('utils/header.php'); ?>   

<div id="pop-up-out" class="pop-up"></div>
<div id="pop-up-in" class="pop-up">
    <form action="utils/add_bill_amount.php" method="post" style="position: relative;">
        <input type="hidden" id="id" value="" name="id">
        <div class="container"> 
            

            <div class="row">
                    <div class="col-md-6">
                        <div class="form-group label">
                            <div class="radio" >
                              <label style="width: 100px;"><input type="radio" name="pay_receive" value="0" id="pay" required>ADD</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group label">
                            <div class="radio" >
                              <label style="width: 100px;"><input type="radio" name="pay_receive" value="1" id="pay" required>LESS</label>
                            </div>
                        </div>
                    </div>
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
                            <label class="control-label">Amount</label>
                            <input type="text" value="" name="amount" class="form-control" id="amount" required>
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

        <button type="submit"  class="btn btn-success pull-right" >SUBMIT</button>

        </div>
    </form>
</div>


            <div class="content" style="position: relative;">
                    
                    <div class="container-fluid" >
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header" data-background-color="purple">
                                    <div class="row">
                                        <center>
                                            <div class="col-md-12">
                                            <input type="text" class="form-control" id="search_bill" placeholder="Search"  ng-change="get_bills()" ng-model="s_bill">
                                        </div>
                                        
                                        </center>
                                    </div>
                                </div>
                                <div class="card-content table-responsive">
                                    <table class="table">
                                        <thead class="text-primary">
                                            <th>No</th>
                                            <th>Party Name</th>
                                            <th>Bill_No</th>
                                            <th>Book No</th>
                                            <th>Amount</th>
                                            <th>Pay / Receive</th>
                                            <th>#</th>
                                        </thead>
                                        <tbody>
                                            <tr  ng-repeat="x in bills_data | filter : s_bill">
                                                <td>{{$index + 1}}</td>
                                                <td >{{x.party_name}}</td>
                                                <td >{{x.bill_no}}</td>
                                                <td >{{x.book_no}}</td>
                                                <td >{{x.amount}}</td>
                                                <td >{{x.pay_receive | pay_receive_filter}}</td>
                                                <td><button class="btn btn-success" id="open_pompt" value="{{x.id}}" ng-click="open_pompt($event)">UPDATE</button></td>
                                            </tr>
                                           
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        
                    </div>   
                    </div>
            </div>
           



<?php include("utils/footer.php"); ?>
<script>

$('#update_bills').addClass('active');

    $(document).ready(function(){
        scope_holder.get_bills();
        scope_holder.open_pompt = function($event){
            $('.pop-up').addClass('appear');
            $('#id').val($event.target.value);
            
        };
    });



</script>