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
         success:function(response) {
             console.log(response.status);
             if (response.status == "done") {
                 $("#"+specificationID).hide('slow');
                 $.notify("Approved", "success");
             }

         }, error:function () {
             //error
             $.notify("An Error Occured", "error");
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
         success:function(response) {
            //success
             console.log(response.status);
             if (response.status == "done") {
                 $("#"+specificationID).hide('slow');
                 $.notify("Done", "success");
             }

         }, error:function () {
             //error
             $.notify("An Error Occured", "error");
         }
     });
 }
