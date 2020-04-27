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

var set1 = ['hens','member','emily','mental'];
var set2 = ['sense','ken','zen','gelpen'];
var set3 = ['hint','grin','minutes','twin'];
var set4 = ['mint','windy','reaganpin','gym'];
var set5 = ['pen','jen'];
var fillers = ['a','b','c','d','e','f','g','h','i','j','k','l']

function getBlock() {
	// Select 2 from each set
	var items1 = [];
	var items2 = [];
	items1 = items1.concat(randomSample(set1, 2));
	items1 = items1.concat(randomSample(set2, 2));
	items2 = items2.concat(randomSample(set3, 2));
	items2 = items2.concat(randomSample(set4, 2));

	// Assign one to each speaker
	speaker_order1 = ['antonio','evan','jordan','willy'];
	speaker_order2 = ['antonio','evan','jordan','willy'];
	shuffleArray(speaker_order1);
	shuffleArray(speaker_order2);
	speaker_order = speaker_order1.concat(speaker_order2);
	block1_items = items1.concat(items2);

	block1 = []
	for (i=0; i < 8; i++) {
		// Missing stimulus for willy + gym, so redo if this comes up
		if (speaker_order[i] == 'willy' && block1_items[i] == 'gym')
			{getBlock();}
		else {block1.push(speaker_order[i] + '_' + block1_items[i]);}
		}
}

getBlock()

// Choose one ambiguous stimulus & add to block
shuffleArray(set5);
shuffleArray(speaker_order1);
block1.push(speaker_order1[0] + '_' + set5[0]);

block2 = [];

// Assign e or i, original or spliced
var vowels = ['e', 'i'];
var spliced = ['', '_spliced'];
for (i=0; i < 9; i++) {
	shuffleArray(vowels);
	shuffleArray(spliced);
	block2[i] = block1[i] + '_' + vowels[1] + spliced[1] + '.wav';
	block1[i] = block1[i] + '_' + vowels[0] + spliced[0] + '.wav';
	}

// Add fillers
shuffleArray(fillers);
for (i=0; i < 6; i++) {
	block1[i+9] = 'filler_' + fillers[i] + '.wav'
	block2[i+9] = 'filler_' + fillers[i+6] + '.wav'
	}

// filler_speakers = ['antonio','evan','jordan','willy','keeta','martha'];
// filler_speakers2 = ['antonio','evan','jordan','willy','keeta','martha'];
// shuffleArray(filler_speakers);
// shuffleArray(filler_speakers2);
// block1_fillers = randomSample(fillers, 6);
// block2_fillers = randomSample(fillers, 6);

// for (i=0; i < 6; i++) {
// 	block1[i+8] = filler_speakers[i] + '_filler_' + block1_fillers[i] + '.wav'
// 	block2[i+8] = filler_speakers2[i] + '_filler_' + block2_fillers[i] + '.wav'
// 	}

shuffleArray(block1)
shuffleArray(block2)

stimuli = block1.concat(block2);

//document.write(stimuli)

