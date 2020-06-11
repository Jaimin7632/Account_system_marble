<?php include('utils/header.php'); ?>
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
<div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="card">
                            
                            <div class="card-content" >
                                <div class="container-fluid">
                                    <div class="row">
                                    <h3>Filters</h3>
                                </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                         <select class="form-control" id="pname" ng-model="pname" ng-change="get_party_bills()">
                                                        <option value="">Party Name</option>
                                                        <?php
                                                             $res= $conn->query("SELECT * from bill_account where is_bill=1");
                                                            while($r=mysqli_fetch_assoc($res)){
                                                            echo '<option value="'.$r['party_name'].'">'.$r['party_name'].'</option>';
                                                                }
                                                        ?>
                                                       
                                         </select>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group label">
                                                    <label class="control-label">Bill No</label>
                                                    <select class="form-control"id="bill_no" ng-change="get_bills_report()" ng-model="bill_no" ng-repeat="x in bills_data">
                                                        <option value="{{x.bill_no}}">{{x.bill_no}}</option>
                                         </select>
                                         </div>
                                         
                                    </div>

                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group label">
                                                    <label class="control-label">Bill Type</label>
                                                    <select class="form-control" id="bill_type" ng-model="bill_type" ng-change="get_bills_report()">
                                                        <option value="">Sellect</option>
                                                        <option value="1">Vendor</option>
                                                        <option value="0">Customer</option>
                                                     </select>
                                         </div>
                                    </div>
                                    
                                </div>
                                
                                <hr>
                                <div class="row" >
                                    <div class="col-md-6" >
                                         <div class="form-group label">
                                                    <label class="control-label">From:</label>
                                                    <input type="date" class="form-control" value="" class="" id="date1" ng-model="date1" ng-change="get_bills_report()" >
                                         </div>
                                    </div>
                                    <div class="col-md-6">
                                         <div class="form-group label">
                                                    <label class="control-label">From:</label>
                                                    <input type="date" class="form-control" value="" class="" id="date2" ng-model="date2" ng-change="get_bills_report()">
                                         </div>
                                    </div>
                                   
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="container-fluid" >

                    <div class="row"  >
                            <div class="card" >
                                <div class="card-header"  data-background-color="purple">
                                    <h4 class="title">Report</h4>
                                    <p class="category"></p>
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
                                            <th>comment</th>
                                            <th>Mobile No</th>
                                            <th>Amount</th>
                                            <th>Effective Amount</th>
                                            
                                        </thead>
                                        <tbody ng-repeat="x in bills_report">
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
                                                <td >{{x.comment}}</td>
                                                <td >{{x.mobile_no}}</td>
                                                <td >{{x.amount}}</td>
                                                <td >{{x.effective_amount}}</td>
                                            </tr>
                                            <tr ng-repeat="entry in x.details">
                                                <td>{{$index + 1}}</td>
                                                <td >{{entry.date}}</td>
                                                <td >{{entry.pay_receive | add_less}}</td>
                                                <td >{{entry.comment}}</td>
                                                <td >{{entry.amount}}</td>

                                            </tr>
                                          
                                            </tr>
                                           
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                      
                      
                    </div>
                    
            
            </div>
<?php include('utils/footer.php'); ?>
<script type="text/javascript">
    $('#payment_report').addClass('active');
    $(document).ready(function(){
        scope_holder.bill_no = "";
        scope_holder.get_bills_report();
        
    });


// $(document).ready(function() {
//   //Fixing jQuery Click Events for the iPad
//   var ua = navigator.userAgent,
//     event = (ua.match(/iPad/i)) ? "touchstart" : "click";
//   if ($('.table').length > 0) {
//     $('.table .header').on(event, function() {
      
//     });
//   }
// })

</script>