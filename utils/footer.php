<footer class="footer">
    <div class="container-fluid">
     
        <p class="copyright pull-right">
            &copy;
            <script>
                document.write(new Date().getFullYear())
            </script>
            <a href="http://www.blackqr.com">BlackQR</a>, the digital product agency
        </p>
    </div>
</footer>

</div>
    </div>
</body>
<!--   Core JS Files   -->
<script src="assets/js/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/js/material.min.js" type="text/javascript"></script>
<!--  Charts Plugin -->
<script src="assets/js/chartist.min.js"></script>
<!--  Dynamic Elements plugin -->
<script src="assets/js/arrive.min.js"></script>
<!--  PerfectScrollbar Library -->
<script src="assets/js/perfect-scrollbar.jquery.min.js"></script>
<!--  Notifications Plugin    -->
<script src="assets/js/bootstrap-notify.js"></script>
<!--  Google Maps Plugin    -->
<!-- Material Dashboard javascript methods -->
<script src="assets/js/material-dashboard.js?v=1.2.0"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="assets/js/demo.js"></script>
<script>
function showNoti(a,b){
     $.notify({
        icon: "",
        message: b

    }, {
        type: a,
        timer: 1000,
        placement: {
            from: "top",
            align: "center"
        }
    });
    }
$('form').submit(function(e){
    e.preventDefault();

    $.ajax({
        url:$(this).attr("url"),
        type:'post',
        data:$(this).serialize(),
        success:function(response){
            showNoti("success",response)
           
        }
    });
     $(this).trigger("reset");
    
});
       

var app = angular.module('myApp', []);
app.controller('customersCtrl', function($scope, $http) {
   
     $scope.get_product_type = function() {
        alert("asdda");
        //  name =$('#partyname').val();
        // //getparty();
        // if(name!=""){
        //         $.post("php/getpartyamount.php",
        //          {
        //              pname: name
        //          },
        //         function(data, status){
        //            // alert("dasdas");
                  
        //           $('#pamount').text(data);
        //         });

        //             var post = $http({
        //                     method: "POST",
        //                     url: "php/getpartyaccount.php?name="+name,                
        //                     headers: { "Content-Type": "application/json" }
        //                 }).then(function(response) {
        //               $scope.names = response.data.records;
        //               //alert(response.data);
        //             });
        // }else{ $('#pamount').text("Amount");}
    
    
 
          
    };
});

</script>
<script type="text/javascript">
 
</script>

</html>