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