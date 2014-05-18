var myRootRef = new Firebase('https://ilecture.firebaseio.com/');

function changeState( roomId, sInfo ){
	console.log(roomId);
	console.log(sInfo);
	var a = sInfo.sId, b = $.timestamp.get().num;
	myRootRef.child('rooms').child(roomId).child('online_s').child(a).set(b);
	setInterval( function(){
		changeState( roomId, sInfo );
	}, 1*60*1000 );
}
