window.onload = function()
{
     $(":text").attr('autocomplete', 'off');  // Here frmAccount indicates id of the form.
}

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

$('form').trigger('reset');
$('form').submit(function(e){
    element = $(this);
    $.ajax({
        url:element.attr("url"),
        type:'post',
        data:element.serialize(),
        success:function(response){
            // alert(response);
            showNoti("success",response);
           
        }
    });

     element.trigger("reset");
     $('.pop-up').removeClass('appear');
});

 $('#pop-up-out').click(function(){
        $('.pop-up').removeClass('appear');
    });

       
var scope_holder;
app = angular.module('myApp', []);
app.controller('customersCtrl', function($scope, $http) {
     scope_holder = $scope;
     $scope.get_product_type = function() {
        name = $('#product_name').val();
        var post = $http({
                            method: "GET",
                            url: "utils/get_product_type.php?name="+name,                
                            headers: { "Content-Type": "application/json" }
                        }).then(function(response) {
                        // alert(JSON.stringify(response.data));
                      $scope.product_type_data = response.data;
                      //alert(response.data);
                    });
          
    };
    $scope.get_bills = function(id="",is_bill=""){

        $http({
                            method: "GET",
                            url: "utils/get_bills.php?id="+id+"&is_bill="+is_bill,                
                           headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
                        }).then(function(response) {
                       // alert(JSON.stringify(response.data))
                 $scope.bills_data =  response.data;
                    });
          
                
    };

    

    $scope.get_bills_report = function(){
        bill_type = $('#bill_type').val();
        date1 = $('#date1').val();
        date2 = $('#date2').val();

        bill_type = (typeof bill_type === 'undefined') ? "" : bill_type;
        date1 = (typeof date1 === 'undefined') ? "" : date1;
        date2 = (typeof date2 === 'undefined') ? "" : date2; 
        // alert(bill_no);
           $http({
        method: "post",
        url: "utils/get_bill_report.php",
        data: {
            bill_type:  bill_type,
            date1:  date1,
            date2:  date2
            
        },
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
    }).then(function(response) {
         $scope.bills_report = response.data.bills;
         // alert(JSON.stringify(response.data));
         obj = JSON.parse(JSON.stringify(response.data.bills));
         $scope.effective_amount_total= 0;
         $scope.total_amount= 0;

         for(x in obj){
            $scope.effective_amount_total += parseInt(obj[x].effective_amount);
            $scope.total_amount += parseInt(obj[x].amount);
         }

     });

     
    };


    $scope.get_stock_report = function(){

        product = $('#product').val();
        date1 = $('#date1').val();
        date2 = $('#date2').val();

        product = (typeof product === 'undefined') ? "" : product;
        date1 = (typeof date1 === 'undefined') ? "" : date1;
        date2 = (typeof date2 === 'undefined') ? "" : date2; 

         $http({
        method: "post",
        url: "utils/get_stock_report.php",
        data: {
            product:  product,
            date1:  date1,
            date2:  date2
            
        },
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
    }).then(function(response) {
         $scope.stock_report = response.data.stock;
         
         obj = JSON.parse(JSON.stringify(response.data.stock));
         // alert(obj[0].id);
         $scope.total_amount= 0;

         for(x in obj){
            $scope.total_amount += parseInt(obj[x].amount);
         }

     });


    };

    $scope.expand_row = function($event){
        element  = $event.target.parentElement
        // alert($(element).attr(''));
        if(!$(element).hasClass('active')){
            $(element).toggleClass("active", "").nextUntil('.header').css('display', 'table-row');
        }else{
            $(element).toggleClass("active", "").nextUntil('.header').css('display', 'none');
            
        }
    };

 

});
app.filter( 'pay_receive_filter', function() {
    return function( input ) {
        if(input==1){return "Customer";}else{ return "Vendor";}
        }
});

app.filter( 'add_less', function() {
    return function( input ) {
        if(input==1){return "LESS";}else if(input==0){ return "ADD";}
        if(input==11){return "Customer";}else if(input==10){ return "Vendor";}

        }
});