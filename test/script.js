$(document).ready(function() 
{
   $("#btn1").click(function() 
   {
        $.post({
            url: "post.php",
            data: {pro_id: 7},         
            success: function(resultat) 
            {
                var resultat = JSON.parse(resultat);
                $("#div1").html(resultat.pro_libelle);
            }
        });

        return false;               
   });
});