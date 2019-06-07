$('#sort-suit').click(function(){

	$('.player-cards img').sort(sortCardsBySuit).appendTo('.player-cards')

})


function sortCardsBySuit(a, b){
    return ($(b).data('suit')) < ($(a).data('suit')) ? 1 : -1;    
}