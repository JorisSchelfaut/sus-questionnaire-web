jQuery(document).ready(function() {
    var id = $.url().param('id');
    boxplot(id, "#results-overall", "score");
    boxplot(id, "#results-q1", "q1");
    boxplot(id, "#results-q2", "q2");
    boxplot(id, "#results-q3", "q3");
    boxplot(id, "#results-q4", "q4");
    boxplot(id, "#results-q5", "q5");
    boxplot(id, "#results-q6", "q6");
    boxplot(id, "#results-q7", "q7");
    boxplot(id, "#results-q8", "q8");
    boxplot(id, "#results-q9", "q9");
    boxplot(id, "#results-q10", "q10");
});