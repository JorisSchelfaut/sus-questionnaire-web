/**
 * Creates a boxplot and appends it to the specified DOM element.
 * @param   questionnaire_id
 * @param   element
 * @param   type
 * @returns {boxplot}
 */
boxplot = function (questionnaire_id, element, type) {
    var margin = {top: 10, right: 50, bottom: 20, left: 50};
    var width = 120 - margin.left - margin.right;
    var height = 200 - margin.top - margin.bottom;
    var min = Infinity;
    var max = - Infinity;
    var chart = d3.box()
            .whiskers(iqr(1.5))
            .width(width)
            .height(height);
    d3.csv("data.php?id=" + questionnaire_id + "&data=" + type, function(error, csv) {
        var data = [];
        csv.forEach(function(x) {
            var e = Math.floor(x.Expt - 1),
                    r = Math.floor(x.Run - 1),
                    s = Math.floor(x.Score),
                    d = data[e];
            if (!d)
                d = data[e] = [s];
            else
                d.push(s);
            if (s > max)
                max = s;
            if (s < min)
                min = s;
        });
        chart.domain([min, max]);
        var svg = d3.select(element).selectAll("svg")
                .data(data)
                .enter().append("svg")
                .attr("class", "box")
                .attr("width", width + margin.left + margin.right)
                .attr("height", height + margin.bottom + margin.top)
                .append("g")
                .attr("transform", "translate(" + margin.left + "," + margin.top + ")")
                .call(chart);
    });
};

/**
 * Returns a function to compute the interquartile range.
 * @param {integer} k
 * @returns Array
 */
iqr = function(k) {
    return function(d, i) {
        var q1 = d.quartiles[0];
        var q3 = d.quartiles[2];
        var iqr = (q3 - q1) * k;
        var i = -1;
        var j = d.length;
        while (d[++i] < q1 - iqr);
        while (d[--j] > q3 + iqr);
        return [i, j];
    };
};