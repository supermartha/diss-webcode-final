function shuffleArray(array) {
    	for (var i = array.length - 1; i > 0; i--) {
        	var j = Math.floor(Math.random() * (i + 1));
        	var temp = array[i];
        	array[i] = array[j];
        	array[j] = temp;
    	}
	};

function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i <ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
    };

function fadeArrow(newState) {
      setTimeout(function(){
          if(newState == -1){document.getElementById('r').style.color = '#333333';
            document.getElementById('u').style.color = '#333333'}
            document.getElementById('leftImage').style.border ="solid 1px #000";
            document.getElementById('rightImage').style.border ="solid 1px #000";
      }, 200);
  }

function sendResults_generic(nextPage){
  document.getElementById('main').innerHTML = "<p>...saving responses...</p> <p class='smaller'><a href='" + nextPage + "'>Click here</a> to continue if not automatically redirected"
    $.ajax({url: 'save_data.php',
    data: {results : results},
    type: 'POST',
    success: function(){location.href=nextPage}} // Redirect to part 2 when finished
    );
  }