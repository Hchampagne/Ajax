        $(document).ready(function() {	
            $("#select1").load("listeoption1.php");	
            $("#select1").change(function() {	
                var id = $("#select1").val();
                $("#select2").load("listeoption2.php?id_region="+id);	
            });	
        });