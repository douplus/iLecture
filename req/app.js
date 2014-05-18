var myRootRef = new Firebase('https://ilecture.firebaseio.com/');

/*myRootRef.on("value", function(data) {
  console.log( data.val() );
  console.log( data.val().title );
});
var usersRef = myRootRef.child('users');
usersRef.on('child_added', function(snapshot, prevChildName) {
	var userName = snapshot.name(), userData = snapshot.val();
	console.log( prevChildName );
	console.log( userName );
	console.log( userData );
});*/
myRootRef.child('rooms').once('value', function(data) {
	console.log( data.val() );
	// 清除超過 7天 的 rooms
	var now = $.timestamp.get().num;
	for( var key in data.val() ) {
		if( Math.abs( now - parseInt(key.substr(5)) ) > 86400000*7 ){
			console.log( 'remove->'+key );
			myRootRef.child('rooms').child(key).remove();
		}
	}
});

$(document).on('click', '#create-room', function(){
	var name = $('#room-mame').val().trim() || null,
	passwd = $('#room-passwd').val().trim() || null;
	if( name === null | passwd === null )
		return alert('請輸入教室名稱與密碼。');
	var roomId = 'room_' + $.timestamp.get().num;
	myRootRef.child('rooms').child(roomId).set({'name': name, 'passwd': passwd});
	window.location.href = 'http://merry.ee.ncku.edu.tw/~thwang/ilecture/h/index.php?r='+roomId+'&n='+name;
});
