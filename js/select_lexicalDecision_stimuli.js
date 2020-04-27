function shuffleArray(array) {
    	for (var i = array.length - 1; i > 0; i--) {
        	var j = Math.floor(Math.random() * (i + 1));
        	var temp = array[i];
        	array[i] = array[j];
        	array[j] = temp;
    	}
	}

function randomSample(items, n) {
	shuffleArray(items);
	return(items.slice(0,n))
	}

realWords = [ "laugh","classy", "basket", "crafty", "rascals", "classes","nasty","gasping","lasting","blasted", "ask", "bath", "path", "fast", "task", "staff","grass","shaft","vast","draft","grasp","castle", "brass",'raft', "gas","baffled","raffle", "hassle", "massive","passage","athlete","classic","traffic","acid", "gasket","scaffold", "cattle", "rattle", "tackle", "paddle", "sadly","acted","exact","tracking", "tactic", "tablet", "rapids", "flattens", "dad","tag", "rap","glad", "trap", "snap", "crab","slack","strap","brag","stab", "tacky"];

realFillers = ["swiftly","sushi","buffet", "yoga", "robot", "shining","safety","silent", "crutches","werewolf", "lemons", "hope", "hop","mouse","point", "raised", "twin", "lungs","clouds", "cult","fleet","drown","faith","humble", "post","forest", "kittens","raincoat", "union","yelling", "replies","escape", "trumpet","hit","chip","duck", "sleep","bridge", "dust", "pulse", "plate","tense","neutral","snakes", "solved","size", "unsafe", "rainy","sewing", "onion",  "announce" ,"nicely", "locate", "subway", "ancient" , "unit", "rephrase", "sailboat" ,"swim","grill"];
nonWords = ['zoke', 'loofrey', 'zamel', 'booskit', 'crufty', 'boses', 'clusses', 'meesty', 'feyshing', 'swaping', 'plifted', 'moich', 'koog', 'thwep', 'bowft', 'shoines', 'kliz', 'sploon', 'flast', 'maffled', 'roffle', 'shipple', 'mussive', 'zoofudge', 'eefleet', 'cleesik', 'voldic', 'soozle', 'ketchel', 'tuckle', 'sudly', 'peighted', 'exokes', 'gweeching', 'vakkik', 'peeglet', 'geeshids', 'sparbens', 'joig', 'beeg', 'chesk', 'chaysp', 'leesk', 'frix', 'blaipes', 'proink', 'yolb', 'swunge', 'pape', 'guk', 'sloys', 'skick', 'splesh', 'stell', 'snaize', 'shayby', 'vedden', 'smasket', 'chake', 'geps', 'kaythe', 'yoth', 'scropes', 'skwooped', 'trilts', 'spleenk', 'spunt', 'shrench', 'frecks', 'gup', 'glice', 'glunge', 'delch', 'quarsk', 'creymp', 'splois', 'grarmph', 'swoosp', 'gweets', 'fresp'];

function getBlock() {
	// Select 4 items from each set
	var items1 = [];
	var items2 = [];
	items1 = items1.concat(realWords);
	items2 = items2.concat(realFillers);
	items2 = items2.concat(nonWords);

	block1 = [];
	for (i=0; i < items1.length; i++) {
		block1.push('south-f-1_' + items1[i] + '_bath')
		}
	for (i=0; i < items2.length; i++) {
		block1.push('south-f-1_' + items2[i])
		}

	shuffleArray(block1);

	console.log(block1);
	

}

getBlock()


stimuli = block1;

console.log(stimuli.length);



