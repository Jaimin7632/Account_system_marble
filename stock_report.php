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
                                         <select class="form-control" id="product" ng-model="pname" ng-change="get_stock_report()">
                                                        <option value="">Select Product</option>
                                                        <?php
                                                             $res= $conn->query("SELECT DISTINCT product from stock");
                                                            while($r=mysqli_fetch_assoc($res)){
                                                            echo '<option value="'.$r['product'].'">'.$r['product'].'</option>';
                                                                }
                                                        ?>
                                                       
                                         </select>
                                    </div>
                                   

                                </div>
                                
                                
                                <hr>
                                <div class="row" >
                                    <div class="col-md-6" >
                                         <div class="form-group label">
                                                    <label class="control-label">From:</label>
                                                    <input type="date" class="form-control" value="" id="date1" ng-model="date1" ng-change="get_stock_report()" >
                                         </div>
                                    </div>
                                    <div class="col-md-6">
                                         <div class="form-group label">
                                                    <label class="control-label">To:</label>
                                                    <input type="date" class="form-control" value="" id="date2" ng-model="date2" ng-change="get_stock_report()">
                                         </div>
                                    </div>
                                   
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        <form action="generate_pdf/generate_pdf.php" method="post">
                                        <input type="hidden" name='data' value="{{bills_report}}" name="">
                                        <input type="hidden" name='footer_data' value="Pending: {{effective_amount_total}} /  Total: {{total_amount}}" name="">
                                        <input type="submit" value="PDF" style="background: #f44336 !important;" class="btn btn-danger" name="">
                                        </form>
                                    </div>
                                    <div class="col-md-6">
                                       <h4 >Total: <span class="text-primary">{{total_amount}}</span></h4>
                                        
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
                                            <th>Product</th>
                                            <th>Product Type</th>
                                            <th>Quantity</th>
                                            
                                        </thead>
                                        <tbody ng-repeat="x in stock_report">
                                           <!--  <tr class="header" ng-repeat="x in bills_report">
                                                <td>{{x.id}}</td>
                                            </tr> -->
                                            <tr class="header" ng-click="expand_row($event)" >
                                                <td>{{$index + 1}}</td>
                                                <td >{{x.product}}</td>
                                                <td >{{x.product_type}}</td>
                                                <td >{{x.amount}}</td>
                                                
                                            </tr>
                                            <tr ng-repeat="entry in x.details">
                                                <td>{{$index + 1}}</td>
                                                <td >{{entry.date}}</td>
                                                <td >{{entry.add_minus | add_less}}</td>
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
    $('#stock_report').addClass('active');
    $(document).ready(function(){
        
        scope_holder.get_stock_report();
        
    });

</script>