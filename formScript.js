function isEmpty (str) {
    return str == null || str == "" || str.replace(/\s+/, '').length == 0;
}

function checkPattern (str, pat) {
    return RegExp(pat).test(str);
}

// validate the form input
function validateForm() {
    var f = document.forms["orderForm"];
    var fname = f["firstname"].value;
    var lname = f["lastname"].value;
    var pnum = f["phone"].value;
    var quan = f["quantity"].value;
    var addr = f["address"].value;
    var shipping = f["shipping"].value;
    var cardname = f["cardname"].value;
    var cnum = f["cardnumber"].value;
    var exprdate = f["exprdate"].value;
    var ccode = f["cvv"].value;
    var pcode = f["zipcode"].value;

    // check everything is filled in
    if (isEmpty(fname) || isEmpty(lname) || isEmpty(pnum) || isEmpty(quan) || isEmpty(addr) ||
        isEmpty(shipping) || isEmpty(cardname) || isEmpty(cnum) || isEmpty(exprdate) ||
        isEmpty(ccode) || isEmpty(pcode)) {
        alert("All entries must be filled out");
        return false;
    }

    // the following validate all the format
    if (!checkPattern(pnum, "^[0-9]{3}-[0-9]{3}-[0-9]{4}$")) {
        alert("Invalid phone number format");
        return false;
    }
    if (!checkPattern(quan, "^[0-9]+$")) {
        alert("Quantity must be a number greater than zero");
        return false;
    }
    // need to double escape because of escaping -
    if (!checkPattern(addr, "^[A-Za-z0-9\\.\\,\\'\\-\\s\\#]+$")) {
        alert("Address contains invalid characters");
        return false;
    }
    if (!checkPattern(cnum, "^[0-9]+$")) {
        alert("Card number should only contain number");
        return false;
    }
    if (!checkPattern(exprdate, "^[0-9][0-9]\\/[0-9][0-9]$")) {
        alert("Invalid expiration date format");
        return false;
    }
    if (!checkPattern(ccode, "^[0-9]{3}$")) {
        alert("Invalid credit card security code format");
        return false;
    }
    if (!checkPattern(pcode, "^[0-9]{5}(-[0-9]{4})?$")) {
        alert("Invalid ZIP/postal code format");
        return false;
    }

    return true;
}

function composeBody () {
    var f = document.forms["orderForm"];
    var result = "Product id: " + f["id"].value + "\n\nClient infomation:";
    result += "\nFirst Name: " + f["firstname"].value +
                "\nLast Name: " + f["lastname"].value +
                "\nPhone Number: " + f["phone"].value +
                "\nQuantity: " + f["quantity"].value +
                "\nAddress: " + f["address"].value +
                "\nShipping Method: " + f["shipping"].value +
                "\n\nShipping information:" +
                "\nCard owner: " + f["cardname"].value +
                "\nCard Number: " + f["cardnumber"].value +
                "\nExpiration Date: " + f["exprdate"].value +
                "\nSecurity Code: " + f["cvv"].value +
                "\nZip Code: " + f["zipcode"].value;
    return result;
}

// send an email with all user information
function formAction () {
    var email = "minghuc@uci.edu";
    var emailSubject = "Purchase from Bookeater";
    var emailBody = escape(composeBody()); // using escape to turn \n into a different format for mail client
    document.location = "mailto:" + email + "?subject=" + emailSubject + "&body=" + emailBody;
}
