function updateSuggestion(query) {
    if (query.length == 0)
        document.getElementById('suggestList').innerHTML = "";
    else {
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                response = JSON.parse(this.responseText);
                document.getElementById('suggestList').innerHTML = "";
                console.log(response.suggestions);
                for (var i in response.suggestions) {
                    document.getElementById('suggestList').innerHTML += "<option value=\"" + response.suggestions[i] + "\"></option>";
                }
            }
        }
        xhr.open("GET", "searchSuggest.php?q=" + query, true);
        xhr.send();
    }
}
