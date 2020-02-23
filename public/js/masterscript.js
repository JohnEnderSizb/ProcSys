 $( window ).load(function() {
     $("#other-toggle").click(function(){
         $("#hard-coded").toggle("fast");
         $("#other").toggle();
     });
    });

 function ajaxTest() {
     //alert("Got here");
     $.ajax({
         type:'POST',
         url:'/ajaxTest',
         data:'food = "Let\'s eat!"',
         success:function(data) {
             console.log(data.msg);
         }
     });
 }


 function approve(specificationID) {
     $.ajax({
         type:'POST',
         url:'/specification/approve',
         data:{
             specificationID: specificationID,
         },
         success:function(data) {
             //success
             console.log(data.msg);

         }, error:function () {
             //error
             alert("An Error Occured");
         }
     });
 }

 function decline(specificationID) {
     $.ajax({
         type:'POST',
         url:'/specification/decline',
         data:{
             specificationID: specificationID,
         },
         success:function(data) {
            //success
             console.log(data.msg);

         }, error:function () {
             //error
            alert("An Error Occured");
         }
     });
 }
