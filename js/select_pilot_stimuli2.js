// Script for selecting stimuli for Part 2 of Sentence Version Pilot

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
	shuffleArray(speaker_order1);
	// speaker_order1 = speaker_order1.slice(0,3); // Choose three speakers

	// For each item, randomly select for Version A which guise you hear and whether you hear the natural or spliced version
	// Then assign the opposite to Version B
	block1 = [];
	block2 = [];
	for (i=0; i < 6; i++) {
		firstGuise = randomSample(['trap', 'bath'], 1);
		secondGuise = 'bath';
		if (firstGuise=='bath') {secondGuise = 'trap'};
		firstSpliced = randomSample(['_spliced', ''], 1);
		secondSpliced = '_spliced';
		if (firstSpliced=='_spliced') {secondSpliced = ''};
		block1.push(speaker_order1[i] + '_' + items1[i] + '_' + firstGuise + firstSpliced);
		block2.push(speaker_order1[i] + '_' + items1[i] + '_' + secondGuise + secondSpliced);
		}

	// Add attention check stimulus 'Please type "I'm paying attention" in the response box to indicate that you're paying attention'
	block1.push('attention_check');
	block2.push('attention_check');

	console.log(block1);
	console.log(block2);
	

}

getBlock()

// Rename to be more logical
stimuliA = block1;
stimuliB = block2;



