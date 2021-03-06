    <?php require_once "header.php"; ?>

        <section> <!-- content contains an image and some descriptions -->
            <?php
                if (!isset($_GET['pid'])) exit('<p>Product identifer error...</p>');
                $pid = $_GET['pid'];
                $pid_res = $pdo->query("SELECT * FROM Books WHERE ISBN='$pid'");
                $detail = $pid_res->fetch(PDO::FETCH_ASSOC);
                if (!isset($detail)) exit("<p>Data error...</p>");

                echo ('<div class="cells-title"><span>Details</span></div>');
                echo ('<div class="content"><img id="pic" src="');
                echo ($detail['img'] .'" alt="image of '. $detail['title'] .'">');
                echo ('<div id="description">');
                printf('<p><b>Title:</b> %s </p>
                        <p><b>Author:</b> %s </p>
                        <p><b>Edition:</b> %s </p>
                        <p><b>Price:</b> $%.2f </p>
                        <p><b>Year:</b> %d </p>
                        <p><b>ISBN:</b> %s </p>
                        <p><b>Publisher:</b> %s </p>',
                        $detail['title'], $detail['author'], $detail['edition'],
                        $detail['price'], $detail['year'], $detail['ISBN'], $detail['publisher']);
                echo('</div></div>');
            ?>

            <!-- The form for users to fill to order the item -->
            <div class="cells-title">
                <span>Order here</span>
            </div>
            <form class="order-form" method="post" name="orderForm" action="/order.php" onsubmit="return true">
                <p>Shipping Information</p>
                <table>
                    <tr>
                        <td align="right">Product Identifier</td>
                        <td><input type="text" name="id" value=
                            <?php if (isset($detail['ISBN'])) echo $detail['ISBN']; ?>
                            readonly style="cursor:default;"></td>
                    </tr>
                    <tr>
                        <td align="right">First Name</td>
                        <td align="left"><input type="text" name="firstname" value="" placeholder="e.g. Peter"></td>
                    </tr>
                    <tr>
                        <td align="right">Last Name</td>
                        <td align="left"><input type="text" name="lastname" value="" placeholder="e.g. Anteater"></td>
                    </tr>
                    <tr>
                        <td align="right">Phone Number</td>
                        <td align="left"><input type="text" name="phone" value="" placeholder="###-###-####"></td>
                    </tr>
                    <tr>
                        <td align="right">Quantity</td>
                        <td align="left"><input type="text" name="quantity" value="" placeholder="e.g. 1, 2, ..."></td>
                    </tr>
                    <tr>
                        <td align="right">Shipping Address</td>
                        <td align="left"><input type="text" name="address" value=""></td>
                    </tr>
                    <tr>
                        <td align="right">Zip Code</td>
                        <td align="left"><input type="text" name="zipcode" value="" onkeyup="updateCityState(this.value)"></td>
                    </tr>
                    <tr>
                        <td align="right">City</td>
                        <td align="left"><input type="text" id="city" name="city" value=""></td>
                    </tr>
                    <tr>
                        <td align="right">State</td>
                        <td align="left"><input type="text" id="state" name="state" value=""></td>
                    </tr>
                    <tr>
                        <td align="right">Shipping Method</td>
                        <td align="left">
                            <select class="ship" name="shipping">
                                <option value="Overnight">Overnight</option>
                                <option value="2-days expedited">2-days expedited</option>
                                <option value="6-days ground">6-days ground</option>
                            </select>
                        </td>
                    </tr>
                </table>
                <p>Credit Card Information</p>
                <table>
                    <tr>
                        <td align="right">Name on card</td>
                        <td align="left"><input type="text" name="cardname" value="" placeholder="e.g. Peter Anteater"></td>
                    </tr>
                    <tr>
                        <td align="right">Card Number</td>
                        <td align="left"><input type="text" name="cardnumber" value=""></td>
                    </tr>
                    <tr>
                        <td align="right">Expiration date</td>
                        <td align="left"><input type="text" name="exprdate" value="" placeholder="MM/YY"></td>
                    </tr>
                    <tr>
                        <td align="right">Security code</td>
                        <td align="left"><input type="text" name="cvv" value="" placeholder="e.g. 123"></td>
                    </tr>
                </table>
                <input type="submit" name="submit" value="Submit">
            </form>
        </section>
    </body>
</html>
