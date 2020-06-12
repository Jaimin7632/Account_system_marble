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
    element = $(this);
    $.ajax({
        url:element.attr("url"),
        type:'post',
        data:element.serialize(),
        success:function(response){

            showNoti("success",response)
           
        }
    });

     element.trigger("reset");
     $('.pop-up').removeClass('appear');
});

       
var scope_holder;
app = angular.module('myApp', []);
app.controller('customersCtrl', function($scope, $http) {
     scope_holder = $scope;
     $scope.get_product_type = function() {
        alert("sda");
        name = $scope.product_name;
        var post = $http({
                            method: "GET",
                            url: "utils/get_product_type.php?name="+name,                
                            headers: { "Content-Type": "application/json" }
                        }).then(function(response) {
                        
                      $scope.product_type_data = response.data;
                      //alert(response.data);
                    });
          
    };
    $scope.get_bills = function(){
        name = $scope.product_name;
                var post = $http({

                            method: "GET",
                            url: "utils/get_bills.php",                
                            headers: { "Content-Type": "application/json" }
                        }).then(function(response) {
                        // alert(JSON.stringify(response.data));
                      $scope.bills_data = response.data;
                      //alert(response.data);
                    });
    };

    $scope.get_party_bills = function(){
        name = $scope.pname;
            var post = $http({

                            method: "GET",
                            url: "utils/get_bills.php?party_name="+name,                
                            headers: { "Content-Type": "application/json" }
                        }).then(function(response) {
                        // alert(JSON.stringify(response.data));
                      $scope.bills_data = response.data;
                      //alert(response.data);
                    });
    };

    $scope.get_bills_report = function(){
        bill_no = $('#bill_no').val();
        if (typeof bill_no == 'undefined')
        {
            bill_no="";
        }
        // alert(bill_no);
           $http({
        method: "post",
        url: "utils/get_bill_report.php",
        data: {
            pname:  $('#pname').val(),
            bill_no:  bill_no,
            bill_type:  $('#bill_type').val(),
            date1:  $('#date1').val(),
            date2:  $('#date2').val()
            
        },
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
    }).then(function(response) {
         $scope.bills_report = response.data.bills;
         obj = JSON.parse(JSON.stringify(response.data.bills));
         // alert(obj[0].id);
         $scope.effective_amount_total= 0;
         $scope.total_amount= 0;

         for(x in obj){
            $scope.effective_amount_total += parseInt(obj[x].effective_amount);
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