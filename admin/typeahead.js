$(document).ready(function() {
  // prefetch
  // --------
  var year = new Bloodhound({
    datumTokenizer: Bloodhound.tokenizers.whitespace,
    queryTokenizer: Bloodhound.tokenizers.whitespace,
    // url points to a json file that contains an array of country names, see
    // https://github.com/twitter/typeahead.js/blob/gh-pages/data/countries.json
    prefetch: 'year.json'
  });

  // passing in `null` for the `options` arguments will result in the default
  // options being used
  $('.typeahead1').typeahead({highlight: true}, {
    name: 'year',
    limit: 10,
    source: year
  });
  // --------
  var month = new Bloodhound({
    datumTokenizer: Bloodhound.tokenizers.whitespace,
    queryTokenizer: Bloodhound.tokenizers.whitespace,
    // url points to a json file that contains an array of country names, see
    // https://github.com/twitter/typeahead.js/blob/gh-pages/data/countries.json
    prefetch: 'month.json'
  });

  // passing in `null` for the `options` arguments will result in the default
  // options being used
  $('.typeahead2').typeahead({highlight: true}, {
    name: 'month',
    limit: 10,
    source: month
  });
  // --------
  var day = new Bloodhound({
    datumTokenizer: Bloodhound.tokenizers.whitespace,
    queryTokenizer: Bloodhound.tokenizers.whitespace,
    // url points to a json file that contains an array of country names, see
    // https://github.com/twitter/typeahead.js/blob/gh-pages/data/countries.json
    prefetch: 'day.json'
  });

  // passing in `null` for the `options` arguments will result in the default
  // options being used
  $('.typeahead3').typeahead({highlight: true}, {
    name: 'day',
    limit: 10,
    source: day
  });
  // --------
  var hour = new Bloodhound({
    datumTokenizer: Bloodhound.tokenizers.whitespace,
    queryTokenizer: Bloodhound.tokenizers.whitespace,
    // url points to a json file that contains an array of country names, see
    // https://github.com/twitter/typeahead.js/blob/gh-pages/data/countries.json
    prefetch: 'hour.json'
  });

  // passing in `null` for the `options` arguments will result in the default
  // options being used
  $('.typeahead4').typeahead({highlight: true}, {
    name: 'hour',
    limit: 10,
    source: hour
  });
  // --------
  var min = new Bloodhound({
    datumTokenizer: Bloodhound.tokenizers.whitespace,
    queryTokenizer: Bloodhound.tokenizers.whitespace,
    // url points to a json file that contains an array of country names, see
    // https://github.com/twitter/typeahead.js/blob/gh-pages/data/countries.json
    prefetch: 'min.json'
  });

  // passing in `null` for the `options` arguments will result in the default
  // options being used
  $('.typeahead5').typeahead({highlight: true}, {
    name: 'min',
    limit: 10,
    source: min
  });

});
