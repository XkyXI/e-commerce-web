<?php require_once "dbconnect.php"; ?>
<?php
    function isEmpty($str) {
        return !isset($str) || $str == "" || strlen(str_replace(" ", "", $str)) == 0;
    }
    function validate() { // function for validating the form entries
        $fname = $_POST["firstname"];
        $lname = $_POST["lastname"];
        $pnum = $_POST["phone"];
        $quan = $_POST["quantity"];
        $addr = $_POST["address"];
        $shipping = $_POST["shipping"];
        $cardname = $_POST["cardname"];
        $cnum = $_POST["cardnumber"];
        $exprdate = $_POST["exprdate"];
        $ccode = $_POST["cvv"];
        $pcode = $_POST["zipcode"];
        if (isEmpty($fname) || isEmpty($lname) || isEmpty($pnum) || isEmpty($quan) || isEmpty($addr) ||
            isEmpty($shipping) || isEmpty($cardname) || isEmpty($cnum) || isEmpty($exprdate) ||
            isEmpty($ccode) || isEmpty($pcode)) {
            return "Must fill out all entries";
        }
        if (!preg_match("#^[0-9]{3}-[0-9]{3}-[0-9]{4}$#", $pnum))       return "Invalid phone number format";
        if (!preg_match("#^[0-9]+$#", $quan))                           return "Quantity must be a number greater than zero";
        if (!preg_match("#^[A-Za-z0-9\\.\\,\\'\\-\\s\\#]+$#", $addr))   return "Address contains invalid characters";
        if (!preg_match("#^[0-9]+$#", $cnum))                           return "Card number should only contain number";
        if (!preg_match("#^[0-9][0-9]\\/[0-9][0-9]$#", $exprdate))      return "Invalid expiration date format";
        if (!preg_match("#^[0-9]{3}$#", $ccode))                        return "Invalid credit card security code format";
        if (!preg_match("#^[0-9]{5}(-[0-9]{4})?$#", $pcode))            return "Invalid ZIP/postal code format";
        return "";
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Bookeater - Order Details</title>
        <link rel="stylesheet" href="/css/style.css">
    </head>
    <body>
        <?php require_once "header.php"; ?>
        <section>
            <div class="cells-title">
                <span>Order Details</span>
            </div>
            <?php
                echo "<section>";
                $sql = "INSERT INTO OrderInfo (ISBN, firstname, lastname, phone,
                quantity, address, ship_method, ccard_name, ccard_num, ccard_date,
                ccard_code, ccard_zip) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                $stmt = $pdo->prepare($sql);

                if (isset($_POST['submit'])) { // if click on the submit button
                    if (($msg = validate()) != "") { // if all entries are validated
                        exit("<table><tr><td>Failed to order item for the following reason: <br> $msg... <td><tr></table>");
                    }
                    $data = [$_POST['id'], $_POST['firstname'], $_POST['lastname'], $_POST['phone'],
                            $_POST['quantity'], $_POST['address'], $_POST['shipping'], $_POST['cardname'],
                            $_POST['cardnumber'], $_POST['exprdate'], $_POST['cvv'], $_POST['zipcode']];
                    if ($stmt->execute($data)) { // if successfully executed the query
                        $sql = "SELECT * FROM `OrderInfo` ORDER BY order_num DESC LIMIT 1";
                        $stmt = $pdo->prepare($sql);
                        if (!$stmt->execute()) exit("<table><tr><td>Error while fetching data...<td><tr></table>");
                        $row = $stmt->fetch();
                        printf("<table>
                            <tr><td><p>Successfully ordered: %s</p></td></tr>
                            <tr><td>Name:</td>              <td>%s %s</td></tr>
                            <tr><td>Phone:</td>             <td>%s</td></tr>
                            <tr><td>Quantity:</td>          <td>%d</td></tr>
                            <tr><td>Address:</td>           <td>%s</td></tr>
                            <tr><td>Shiping method:</td>    <td>%s</td></tr>
                            <tr><td>Card owner:</td>        <td>%s</td></tr>
                            <tr><td>Card number:</td>       <td>%s</td></tr>
                            <tr><td>Expiration date:</td>   <td>%s</td></tr>
                            <tr><td>Security code:</td>     <td>%s</td></tr>
                            <tr><td>Zip code:</td>          <td>%s</td></tr>
                            </table>",
                            $_POST['id'], $row['firstname'], $row['lastname'], $row['phone'],
                            $row['quantity'], $row['address'], $row['ship_method'],
                            $row['ccard_name'], $row['ccard_num'], $row['ccard_date'],
                            $row['ccard_code'], $row['ccard_zip']);
                    } else { // if fail to execute query
                        exit('<table><tr><td>Error while placing order...<td><tr><table>');
                    }
                }
                else { // if did not click on submit button
                    exit('<table><tr><td>Order detail error...<td><tr><table>');
                }
            ?>
        </section>
    </body>
</html>
