//
// @author  PASCUA, FATIMA MAE C. | 2143735 | Saint Louis University
// @date    AUGUST 2018
//

function deleteUsers() {
        users = [];
        $('.userID:checked').each(function(){
            users.push($(this).val());
        });

        if(users.length !== 0){
         $.ajax({
          method: "POST",
          url: "php/deleteUsers.php",
          data: { users: users},
          success: function(data){
            alert('Selected user(s) has been deleted. ');
            location.href = "users.php";
          }
      })
     }else{
        alert('Please select one or more users. ');
     }        
     
 }