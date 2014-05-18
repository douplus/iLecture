var myRootRef = new Firebase('https://ilecture.firebaseio.com/');

// $.cookie.get({ 'name': getUrlVars()['r'] })
function bindOnline_s( roomId, hInfo ){
	console.log(roomId);
	console.log(hInfo);
	roomRef = myRootRef.child('rooms').child(roomId);
	roomRef.child('online_s').on('child_changed', function(snapshot, prevChildName) {
		var userName = snapshot.name(), userData = snapshot.val();
		console.log( 'child_changed -> ' + userName +'  '+ userData );
		updateOnline_s();
	});
	roomRef.child('online_s').on('child_added', function(snapshot, prevChildName) {
		var userName = snapshot.name(), userData = snapshot.val();
		console.log( 'child_added -> ' + userName +'  '+ userData );
		updateOnline_s();
	});
	updateOnline_s();
}

function updateOnline_s(){
	var num = 0;
	roomRef.child('online_s').once('value', function(data) {
		console.log( '****************** updateOnline_s() ******************' );
		var now = $.timestamp.get().num;
		for( var key in data.val() ) {
			console.log( Math.abs( now - parseInt(data.val()[key]) ) );
			if( Math.abs( now - parseInt(data.val()[key]) ) > 1.5*60*1000 ){
				console.log( 'remove->'+key+'   '+data.val()[key] );
				roomRef.child('online_s').child(key).remove();
			}else{
				num++;
			}
		}
	});
	$('#onlineNum > span').text(num);
}

$(function(){});

$(document).on('click', '#linkRoom-box #leave', function(){
	$(this).parents('#linkRoom-box').hide();
});
$(document).on('click', '#show-linkRoom-box', function(){
	$('#linkRoom-box').show();
});