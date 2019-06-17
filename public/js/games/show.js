$('.user-is-player .player-card').click(function(){
	
	var numSelected = $('.user-is-player .player-card.selected').length
	
	if(numSelected > 1){ // Can't selected more than 2 cards. If equal to two, will only toggle if unselecting
		if(!$(this).hasClass('selected')) return
	}

	$(this).toggleClass('selected')

	var numSelected = $('.user-is-player .player-card.selected').length
	if(numSelected === 2) $('#play-hand').removeClass('neutral').addClass('start')
		else $('#play-hand').removeClass('start').addClass('neutral')
})

$('#sort-rank').click(function(){
	$('.player-cards img').sort(sortCardsByRank).appendTo('.player-cards')
})

$('#sort-suit').click(function(){
	$('.player-cards img').sort(sortCardsByRank).appendTo('.player-cards')
	$('.player-cards img').sort(sortCardsBySuit).appendTo('.player-cards')
})


function sortCardsByRank(a, b){
    return ($(a).data('rank')) < ($(b).data('rank')) ? 1 : -1;    
}

function sortCardsBySuit(a, b){
    return ($(b).data('suit')) < ($(a).data('suit')) ? 1 : -1;    
}