function submitAnswers() {
  var total = 6;
  var score = 0;
  
  
  // Get User Input
  var q1 = document.forms["quizForm"] ["q1"].value;
  var q2 = document.forms["quizForm"] ["q2"].value;
  var q3 = document.forms["quizForm"] ["q3"].value;
  var q4 = document.forms["quizForm"] ["q4"].value;
  var q5 = document.forms["quizForm"] ["q5"].value;
  var q6 = document.forms["quizForm"] ["q6"].value;

  // Validation 
  for(i = 1; i <= total;i++) {
    if(eval('q'+1) == null || eval('q'+1) == '') {
      alert('You missed question '+ i);
      return false;
    }
  }
  
  // Set Correct Answers 
  var answers = ["c", "a", "a", "b", "a", "a"];
  
  // Check Answers
  for(i = 1; i <= total;i++) {
    if(eval('q'+1) == answers[i - 1]) {
      score++;
    }
    
  }
  
  //Display Results
  var results = document.getElementById('results');
  results.innerHTML = '<h3>You scored <span>'+score+'</span> out of <span>'+total+'</span></h3>';
  alert('You scored '+score+' out of ' +total);
  
  return false;
  

}