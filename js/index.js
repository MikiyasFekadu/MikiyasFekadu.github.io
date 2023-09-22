var counter = 1;
setInterval(function() {
    document.getElementById("r1" + counter).checked = true;
    counter ++;
    if(counter > 7) {
        counter = 1;
    }
}, 5000);

import Swup from 'swup';
const swup = new Swup();

