
function testAjax(postType, neki) {
    x = neki;

        jQuery.ajax({
         type : "get",
         dataType : "json",
         url : myAjax.ajaxurl,
         data : {action: "my_user_test",
                 value: x,post_type: postType},//, post_id : post_id, nonce: nonce},
         success: function(response) {
             console.log("response", response);
             //console.log("just html", response.data.btnvalue);
             
             if (!response){
                 //server error, return
                 console.log("Napaka streznika");
                 return;
             }
            
            if (response.error === true)
            { 
                alert(response.errorMessage);
                return; 
            }
                
            if (!response.data)
            { 
                alert("ni podatkov"); 
                return;
            }
            

            if(response.error === false) {
               jQuery("#list").html(response.data.html)
            }
            else {
               alert("Your vote could not be added")
            }
         }
      })
    
    return;

}