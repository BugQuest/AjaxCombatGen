<input type="number" id="txtTours" placeholder="Nombres de tours" />
<input type="Text" id="txtPlayer1" placeholder="Nom du joueur 1" />
<input type="Text" id="txtPlayer2" placeholder="Nom du joueur 2" />
<button id="btnStart">Combat</button>
<div id="contener"></div>
<script>
$(window).load(function() {
	$('#btnStart').click(function(){
		var nbrTours = parseInt($("#txtTours").val());
		var namePlayer1 = $("#txtPlayer1").val();
		var namePlayer2 = $("#txtPlayer2").val();
		if(nbrTours > 0 && namePlayer1 != null && namePlayer2 != null){
			$( "#contener" ).fadeOut("slow", function(){
				$( "#contener" ).load( "index.php?ajaxAction=startFight&nbrTours="+nbrTours+"&player1="+namePlayer1+"&player2="+namePlayer2, function(){
					$( "#contener" ).fadeIn("slow");
				});
			});
		}
	});
});
</script>