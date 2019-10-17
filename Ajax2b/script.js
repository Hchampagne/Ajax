$(document).ready(function() 
{
   $("#btn1").click(function() 
   {
        $.post({
            url: "listeoption1.php",         
            success: function(resultat) 
            {
                var resultat = JSON.parse(resultat);  
                var i=0;
                while (i<resultat.length)
                {
                $("#select1").append("<option value="+resultat[i].reg_id+">"+resultat[i].reg_v_nom+"</option>");            
                i++;
                }
            }
        });

        return false;               
   });
   $("#select1").change(function() {
       var id = $("#select1").val();
       $.post({
           url: "listeoption2.php",
           data: {
               reg_id:id
           },
           success: function (resultat2) {
               var resultat2 = JSON.parse(resultat2);
               var i = 0;
               $("#select2").text("");
               while (i < resultat2.length) {
                   $('#select2').append("<option>" + resultat2[i].dep_nom + "</option>");
                   i++;
               }

           }

       });

   });
}); 