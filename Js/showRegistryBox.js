$("#openPokeballButton").click(function(){
	$("#whitePokeballPart").animate(
		{
			marginTop:"60%", 
			transition: "1s ease-in-out"
		},{ duration:800, complete: function(){
			$("#mainContainer").show(1000, function(){
				// Animation Complete
			});
		}

	});
})
