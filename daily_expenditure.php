<?php include('utils/header.php'); ?>
            <div class="content">
                 <div class="container-fluid">
                        <div class="row" >
                            <div class="card">
                                <div class="card-header" data-background-color="purple">
                                    <h4 class="title">Daily Expenditure</h4>
                                    <p class="category"></p>
                                </div>
                                <div class="card-content">
                                    <form url="utils/add_daily_exp_data.php" if="myForm">
                                        
                                         

                                        <div class="row">
                                            <center>
                                                <div class="col-md-6 x">
                                                    <div class="radio" >
                                                      <label style="width: 100px;"><input type="radio" name="add_minus" value="0" id="pay" required>ADD</label>
                                                    </div>

                                                </div>
                                                <div class="col-md-6 x">
                                                    <div class="radio" >
                                                      <label style="width: 100px;"><input type="radio" name="add_minus" value="1" id="receive" checked="True" required>LESS</label>
                                                    </div>
                                                </div>
                                                
                                            </center>
                                         </div>    



                                        


                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group label">
                                                    <label class="control-label">Date</label>
                                                    <input type="date" value="" name="date" class="form-control" id="date"  required>
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



                    <!-- Report -->
                    <div class="container-fluid" >

                    <div class="row"  >
                            <div class="card" >
                                <div class="card-header" style="background:#fff !important; color: #000 !important;">
                                    <h4 class="title" style="color: #000;">Report</h4>
                                    <p class="category"></p>
                                    <!--  <div class="row">
                                            <div class="col-md-12">
                                                <input type="text" value="" placeholder="Search" class="form-control" ng-model="search" name="">
                                            </div>
                                     </div> -->
                                     <div class="row" >
                                        <div class="col-md-6" >
                                             <div class="form-group label">
                                                        <label class="control-label">From:</label>
                                                        <input type="date" class="form-control" value=""  id="date1" ng-model="date1" ng-change="get_daily_exp()" >
                                             </div>
                                        </div>
                                        <div class="col-md-6">
                                             <div class="form-group label">
                                                        <label class="control-label">To:</label>
                                                        <input type="date" class="form-control" value="" id="date2" ng-model="date2" ng-change="get_daily_exp()">
                                             </div>
                                        </div>
                                       
                                     </div>
                                </div>
                                <div class="card-content table-responsive" >
                                    <table class="table" >
                                        <thead class="text-primary">
                                            <th>No</th>
                                            <th>Date</th>
                                            <th>Add-Less</th>
                                            <th>comment</th>
                                            <th>Amount</th>
                                            <th>Delete</th>
                                            
                                            
                                        </thead>
                                        <tbody ng-repeat="x in daily_exp_report | filter :search">
                                           <!--  <tr class="header" ng-repeat="x in bills_report">
                                                <td>{{x.id}}</td>
                                            </tr> -->
                                            <tr class="header" ng-click="expand_row($event)" >
                                                <td>{{$index + 1}}</td>
                                                <td >{{x.date}}</td>
                                                <td >{{x.add_minus | add_less}}</td>
                                                <td >{{x.comment}}</td>
                                                <td >{{x.amount}}</td>
                                               <td><button class="btn btn-danger" ng-click="delete_daily_exp($event, x)">DELETE</button></td>
                                            </tr>
                                           
                                           
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                      
                      
                    </div>


            </div>
            
        
<?php include("utils/footer.php"); ?>
<script>
$('#daily_expenditure').addClass('active');
$(document).ready(function(){
        scope_holder.get_daily_exp();
        
    });
</script>