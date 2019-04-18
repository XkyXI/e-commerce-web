function isEmpty (str) {
    return str == null || str == "" || str.replace(/\s+/, '').length == 0;
}

function checkPattern (str, pat) {
    return new RegExp(pat).test(str);
}

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

    if (isEmpty(fname) || isEmpty(lname) || isEmpty(pnum) || isEmpty(quan) || isEmpty(addr) ||
        isEmpty(shipping) || isEmpty(cardname) || isEmpty(cnum) || isEmpty(exprdate) ||
        isEmpty(ccode) || isEmpty(pcode)) {
        alert("All entries must be filled out");
        return false;
    }

    if (!checkPattern(pnum, "^[0-9]{3}-[0-9]{3}-[0-9]{4}$")) {
        alert("Invalid phone number format");
        return false;
    }
    if (!checkPattern(quan, "^[0-9]+$")) {
        alert("Quantity must be a number greater than zero");
        return false;
    }
    if (!checkPattern(addr, "^[A-Za-z0-9\'\.\-\s\,\#]+$")) {
        alert("Address contain invalid characters");
        return false;
    }
    if (!checkPattern(cnum, "^[0-9]+$")) {
        alert("Card number should only contain number");
        return false;
    }
    if (!checkPattern(exprdate, "^[0-9][0-9]\/[0-9][0-9]$")) {
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

    console.log("All valid");
    return true;
}

function formAction () {
    var email = "minghuc@uci.edu";
    var emailSubject = "Purchase from Bookeater";
    var emailBody = "information";
    document.location = "mailto:" + email + "?subject=" + emailSubject + "&body=" + emailBody;
}
