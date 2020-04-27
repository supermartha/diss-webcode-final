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

var set1 = ['bath', 'laugh', 'task', 'crafty', 'passes', 'baskets', 'classes', 'vast']; // BATH words
var set2 = ['gas', 'raffle', 'baffled', 'massive', 'passage', 'athlete', 'traffic', 'classic']; // GAS words
var set3 = ['rattle', 'paddle', 'tablet', 'cattle', 'crab', 'snap', 'trap', 'brag']; // TRAP words


function getBlock() {
	// Select 2 items from each set
	var items1 = [];
	items1 = items1.concat(randomSample(set1, 2));
	items1 = items1.concat(randomSample(set2, 2));
	items1 = items1.concat(randomSample(set3, 2));
	shuffleArray(items1);

	// Randomize speaker order within blocks, choose which guise you hear first for each speaker
	speaker_order1 = ['south-m-2', 'north-m-2', 'south-m-1', 'south-f-1', 'north-f-1', 'south-f-2'];
	// speaker_order2 = ['s1', 's2', 's3', 's4', 's5', 's6'];

	block1 = [];
	block2 = [];
	for (i=0; i < 6; i++) {
		firstGuise = randomSample(['trap', 'bath'], 1);
		secondGuise = 'bath';
		if (firstGuise=='bath') {secondGuise = 'trap'};
		block1.push(speaker_order1[i] + '_' + items1[i] + '_' + firstGuise + randomSample(['_spliced', ''], 1));
		block2.push(speaker_order1[i] + '_' + items1[i+6] + '_' + secondGuise + randomSample(['_spliced', ''], 1));
		}

	shuffleArray(block1);
	shuffleArray(block2);

	console.log(block1);
	
	// Make sure you don't hear the same speaker twice in a row
	while (block1[5].split("_")[0]==block2[0].split("_")[0])
		{shuffleArray(block1);
			console.log('shuffled')};

}

getBlock()


stimuli = block1;
// stimuli = block1.concat(block2);



