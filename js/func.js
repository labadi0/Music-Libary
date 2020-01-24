$(document).ready(function(){
// keyup : si l'utilisateur a toucher le clavier
    $('#search').keyup(function(){
// this ca veut dire le champs #search et val pour recuperer la valeur
      var search = $(this).val();
// trim pour omettre l'espace au debut
      search = $.trim(search);
    //  $('#result').text(search); affiche ce qui est ecrit dans le champs

      if(search !==""){
        $.post('post.php',{search:search},function(data){

          $('#result ul').html(data);

          // si on click
          $('a').click(function(){
            var lien =$(this).text();

              $.post('show.php',{lien:lien},function(data){

                $('#infos').html(data);
              });
          });
        });
      }
    });

});
