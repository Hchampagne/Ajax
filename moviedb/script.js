$(document).ready(function(){
     var loop = 20;
    // boutons pages et affichage page 1
    $("#btn1").click(function () {       
        var name = $("#name").val();
        var loop = 20;
        $.get({

            url: "http://api.themoviedb.org/3/search/movie?api_key=f33cd318f5135dba306176c13104506a&query=" + name+"&page=1",

            success: function (result) {
                    var nbPages = result.total_pages;                   
                    //var nbResults = result.total_results;
                    var i=0;
                    var k=0;
                    $("#select").text("");               
                    for (i=1;i<nbPages+1;i++){
                    $("#select").append("<option value="+ i + ">" + "page "+ i +"</option>"); 
                    $("#div1").text("");
                    for(k=0;k<loop;k++){
                     $("#div1").append("<img src=https://image.tmdb.org/t/p/w500" + result.results[k].poster_path + " height=\"50\" width=\"auto\">"+"<p>" +"-" + k + "-" + result.results[k].title + " - " + result.results[k].release_date + "</p><br>");
                    }
                    
                    }              
            }
        });
   
    });

   $("#select").change(function(){      
        var page = $("#sel1").val();
        var name = $("#name").val();
        var loop = 20;
        $.get({              
            url: "http://api.themoviedb.org/3/search/movie?api_key=f33cd318f5135dba306176c13104506a&query="+name+"&page="+page, 
            
            success: function(resultat){   
              
                var nbPages = resultat.total_pages;
                var nbResults = resultat.total_results;               
                if(page == nbPages){loop = nbResults%20}
                var j = 0; 
                $("#div1").text("");                            
                for(j=0;j <loop;j++){                   
                $("#div1").append("<p>" + "<img src=https://image.tmdb.org/t/p/w500" + resultat.results[j].poster_path + " height=\"50\" width=\"auto\">"+"<p>"+"-" + j + "-" + resultat.results[j].title + " - " + resultat.results[j].release_date + "</p><br>");
              
               }                           
            }                 
        });       
    });
   return false;
});