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

var set1 = ['bath', 'laugh', 'task', 'crafty', 'passes', 'baskets']; // BATH words
var set2 = ['gas', 'baffled', 'massive', 'passage', 'athlete', 'classic']; // GAS words
var set3 = ['rattle', 'paddle', 'tablet', 'crab', 'trap', 'brag']; // TRAP words

// Adding empty string at position 0 so I don't get confused about what's #1 etc.
var thA = ['', 'north-m-2_south_TH', 'north-f-1_think_F', 'south-f-1_thick_F', 'south-m-2_with_F', 'south-m-1_birthday_TH', 'south-f-2_keith_TH'];
var thB = ['', 'north-m-2_south_F', 'north-f-1_think_TH', 'south-f-1_thick_TH', 'south-m-2_with_TH', 'south-m-1_birthday_F', 'south-f-2_keith_F'];

var ingA = ['', 'north-f-1_sweeping_IN', 'south-m-1_something_ING', 'south-f-2_walking_ING', 'south-f-1_disgusting_IN', 'north-m-2_listening_ING', 'south-m-2_running_IN'];
var ingB = ['', 'north-f-1_sweeping_ING', 'south-m-1_something_IN', 'south-f-2_walking_IN', 'south-f-1_disgusting_ING', 'north-m-2_listening_IN', 'south-m-2_running_ING'];


function getBlock(setName) {
	// Shuffle order
	console.log('sup');
	var items1 = setName;
	shuffleArray(items1);
	console.log(items1);
	block1 = [''];
	block2 = [''];
	// Randomize speaker order within blocks, choose which guise you hear first for each speaker
	speaker_order1 = ['south-m-2', 'north-m-2', 'south-m-1', 'south-f-1', 'north-f-1', 'south-f-2'];
	shuffleArray(speaker_order1);

	// For each item, randomly select for Version A which guise you hear and whether you hear the natural or spliced version
	// Then assign the opposite to Version B

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

	console.log(block1);
	console.log(block2);
	

}

// Get BATH words
getBlock(set1);
bathA = block1;
bathB = block2;

// Get GAS words
getBlock(set2);
gasA = block1;
gasB = block2;

// Get TRAP words
getBlock(set3);
trapA = block1;
trapB = block2;

// Now put it all together
stimuliA = [ingA[1], bathA[1], thA[2], thA[1], trapA[1], trapA[2], bathA[2], ingA[2],
bathA[3], gasA[1], thA[3], thA[4], gasA[2], trapA[3], bathA[4], ingA[3], gasA[3], 'attention_checkA', thA[5], trapA[4], gasA[4], gasA[5], ingA[4], trapA[5], thA[6], bathA[5], bathA[6], ingA[5], trapA[6], ingA[6], gasA[6]]; 

stimuliB = [ingB[1], bathB[1], thB[2], thB[1], trapB[1], trapB[2], bathB[2], ingB[2],
bathB[3], gasB[1], thB[3], thB[4], gasB[2], trapB[3], bathB[4], ingB[3], gasB[3], 'attention_checkB', thB[5], trapB[4], gasB[4], gasB[5], ingB[4], trapB[5], thB[6], bathB[5], bathB[6], ingB[5], trapB[6], ingB[6], gasB[6]];




