$('#searchBox').keyup(function(){
    var amaUrl = $('#urlBox').val();
    var startPos = amaUrl.indexOf("Keywords=") + 9;
    var endPos = amaUrl.indexOf("&", startPos);
    var urlPart1 = amaUrl.substr(0, startPos);
    var urlPart2 = amaUrl.substr(endPos, amaUrl.length);
    var newSearch = $('#searchBox').val();
    var newAmaUrl = urlPart1 + newSearch + urlPart2;
    alert(newAmaUrl);
});