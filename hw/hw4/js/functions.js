

var counter = 0,
    score = 0;



var content = [{"name":"Like a Prayer","answer":"madonna"},{"name":"Born This Way","answer":"gaga"},{"name":"So Happy I Could Die","answer":"gaga"},{"name":"Revolver","answer":"madonna"},{"name":"Dancing in Circles","answer":"gaga"},{"name":"Holiday","answer":"madonna"},{"name":"Poker Face","answer":"gaga"},{"name":"Love Game","answer":"gaga"},{"name":"Vogue","answer":"madonna"},{"name":"Edge of Glory","answer":"gaga"}];



var $name = $('.name'),
    $generate = $('.generate'),
    $result = $('.results'),
    $score = $('.score'),
    $thanks = $('.thanks'),
    $options = $('.options');

var trekApp = {};

// the initial state of the quiz:
// starts off by showing the "name" value in the first item in the data object
// hides the 'next' button, results, score and 'thanks for playing' html as a default

trekApp.init = function() {
  var selection = content[counter];
  type = selection["answer"];
  $name.html(selection["name"]);
  $generate.hide();
  $result.hide();
  $score.hide();
  $thanks.hide();
}

// the function for moving through the quiz

trekApp.generate = function() {

  // if there are still questions remaining, this will show the next one
  
  if (counter < content.length) {
    var selection = content[counter];
    $name.html(selection["name"]);
    type = selection["answer"];  

    $result.hide();
    $score.hide();
    $name.show();
    $options.show();

  // if there are no more questions, this will thank the user for playing and give the option to tweet the score
  
  } else {
    $thanks.show().append(" <a href='http://twitter.com/home?status=Take the Star Trek Episode vs. Nail Polish Colour quiz! I scored " + score + " out of " + counter + " http://kerrywall.com/trek-polish' target='_blank'>Tweet your score</a>.");
  }

  $generate.hide();
}

// the event handler that determines whether the user's selection was right

$('.choice').click(function(e) {
  var chosenAnswer = e.target.id;  
  $result.show();
  $score.show();
  $name.hide();
  $options.hide();

  // Thuis will be setting up "full sentence" values for each type
  if (type == "gaga") {
    fullAnswer = "Lady Gaga Song!";
  } else {
    fullAnswer = "Madonna Song!";
  }
   
  // This tells the user whether they're right or wrong, and wills add a point to the score if they're right

  if (chosenAnswer == type) {
    $result.html("<span class='right'>Slay, yo!</span> It's a " + fullAnswer + ".");
    score++;
  } else {
    $result.html("<span class='wrong'>Dammit, Jim!</span> It's a " + fullAnswer + ".");
  }
  counter++;
  $score.html("You're " + score + " for " + counter + ".");
  $generate.show();
  
});

$(document).ready(function() {
  trekApp.init();
});

$generate.on('click', function() {
  trekApp.generate();
});