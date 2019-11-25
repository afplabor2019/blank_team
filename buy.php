<?php include_once "pages/head.php"; ?>
<?php 
$errors = [];
    $sql = new SQL();
    if(loggedIn()){
        $user_shipping_data = $sql->execute("SELECT * FROM `shippings` WHERE `id` = ?",$_SESSION['user_shippingID']);
    }
    $orders = $_SESSION['order'];
   
    if(is_post()){

    $recipient = $_POST['recipient']; 
    $country = $_POST['country']; 
    $city = $_POST['city']; 
    $adress = $_POST['adress'];
    $tel = $_POST['tel']; 
    $email = $_POST['cemail'];
    if(!empty($_POST['takeover'])) $takeover_method =$_POST['takeover'] ;
    if(!empty($_POST['payment']))  $payment_method = $_POST['payment'];
  

        //recipient
        if(isset($recipient)){
            if($recipient == null) $errors['recipient'][] = "Name of recipient is required!";
        }
    
        //country
        if(isset($country)){
            if($country == null) $errors['country'][] = "Please choose a country!";
        }
    
         //city
         if(isset($city)){
            if($city == null) $errors['city'][] = "Please choose a country!";
        }
    
         //adress
         if(isset($adress)){
            if($adress == null) $errors['adress'][] = "Please choose a country!";
        }

        if(!isset($takeover_method))  $errors['takeover'][] = "Please choose a takeover method!";
        if(!isset($payment_method))  $errors['payment'][] = "Please choose a payment method!";

        //email
        if ($email == null) $errors['cemail'][] = 'Email is required!';
        else if(!(preg_match("/^[a-zA-Z0-9-_.]+@[a-zA-Z0-9-]+\.[a-zA-Z.]{2,5}$/",$email))) $errors['cemail'][] = 'Invalid email!';
        //Set changes
        if(count($errors) == 0){
            foreach ($orders as $key => $value) {
                $stored = $sql->execute("SELECT `stored` FROM `products` WHERE `id` = ?",$value['item_id']);
                $quan = $stored[0]['stored']-$value['quantity'];
                $sql->execute("UPDATE `products` SET `stored` = ? WHERE `id` = ?",$quan,$value['item_id']);
                $sql->execute("DELETE FROM `orders` WHERE `id` = ?",$value['order_id']);
                $sql->execute("DELETE FROM `order_item` WHERE `order_id` = ?",$value['order_id']);
                header("Location: ".url('home'));
            }
            
        }
    }
?>
    <form action="<?php echo url('buy')?>" method="POST">
        <label for="takeover">Takeover method</label> <br>
            <input type="radio" name="takeover" value="gls"> GLS delivery <br>
            <input type="radio" name="takeover" value="store"> At store <br>
            <input type="radio" name="takeover" value="post"> Post Point <br>
            <input type="radio" name="takeover" value="pickpack"> Pick Pack Point <br>
            <?php if(isset($errors['takeover'])) foreach ($errors['takeover'] as $value) echo "<p class ='input-error'> $value </p>"; ?> <br>

        <label for="payment">Payment method</label> <br>
            <input type="radio" name="payment" value="cash"> Cash <br>
            <input type="radio" name="payment" value="card"> Credit card <br>
            <input type="radio" name="payment" value="parts"> Loan
            <?php if(isset($errors['payment'])) foreach ($errors['payment'] as $value) echo "<p class ='input-error'> $value </p>"; ?> <br>
            
        <h1>Shipping informations</h1>
        <label for="recipient">Name of recipient</label><br>
            <input type="text" name = "recipient" value="<?php echo isset($user_shipping_data) ? $user_shipping_data[0]['client_name'] : "" ?>"><br>
            <?php if(isset($errors['recipient'])) foreach ($errors['recipient'] as $value) echo "<p class ='input-error'> $value </p>"; ?> 
            <label for="country">Country</label> <br>
              <!--#region county  -->
                    <select class="country" name="country">
                        <option 
                            value="<?php echo isset($user_shipping_data) ? $user_shipping_data[0]['country'] : "" ?>" 
                            <?php echo isset($user_shipping_data) ? "SELECTED" :"" ?>>
                            <?php echo isset($user_shipping_data[0]['country']) ? $user_shipping_data[0]['country'] : "" ?>
                        </option>
                        <optgroup label="North America">
                            <option value="US">United States</option>
                            <option value="UM">United States Minor Outlying Islands</option>
                            <option value="CA">Canada</option>
                            <option value="MX">Mexico</option>
                            <option value="AI">Anguilla</option>
                            <option value="AG">Antigua and Barbuda</option>
                            <option value="AW">Aruba</option>
                            <option value="BS">Bahamas</option>
                            <option value="BB">Barbados</option>
                            <option value="BZ">Belize</option>
                            <option value="BM">Bermuda</option>
                            <option value="VG">British Virgin Islands</option>
                            <option value="KY">Cayman Islands</option>
                            <option value="CR">Costa Rica</option>
                            <option value="CU">Cuba</option>
                            <option value="DM">Dominica</option>
                            <option value="DO">Dominican Republic</option>
                            <option value="SV">El Salvador</option>
                            <option value="GD">Grenada</option>
                            <option value="GP">Guadeloupe</option>
                            <option value="GT">Guatemala</option>
                            <option value="HT">Haiti</option>
                            <option value="HN">Honduras</option>
                            <option value="JM">Jamaica</option>
                            <option value="MQ">Martinique</option>
                            <option value="MS">Montserrat</option>
                            <option value="AN">Netherlands Antilles</option>
                            <option value="NI">Nicaragua</option>
                            <option value="PA">Panama</option>
                            <option value="PR">Puerto Rico</option>
                            <option value="KN">Saint Kitts and Nevis</option>
                            <option value="LC">Saint Lucia</option>
                            <option value="VC">Saint Vincent and the Grenadines</option>
                            <option value="TT">Trinidad and Tobago</option>
                            <option value="TC">Turks and Caicos Islands</option>
                            <option value="VI">US Virgin Islands</option>
                        </optgroup>
                        <optgroup label="South America">
                            <option value="AR">Argentina</option>
                            <option value="BO">Bolivia</option>
                            <option value="BR">Brazil</option>
                            <option value="CL">Chile</option>
                            <option value="CO">Colombia</option>
                            <option value="EC">Ecuador</option>
                            <option value="FK">Falkland Islands (Malvinas)</option>
                            <option value="GF">French Guiana</option>
                            <option value="GY">Guyana</option>
                            <option value="PY">Paraguay</option>
                            <option value="PE">Peru</option>
                            <option value="SR">Suriname</option>
                            <option value="UY">Uruguay</option>
                            <option value="VE">Venezuela</option>
                        </optgroup>
                        <optgroup label="Europe">
                            <option value="GB">United Kingdom</option>
                            <option value="AL">Albania</option>
                            <option value="AD">Andorra</option>
                            <option value="AT">Austria</option>
                            <option value="BY">Belarus</option>
                            <option value="BE">Belgium</option>
                            <option value="BA">Bosnia and Herzegovina</option>
                            <option value="BG">Bulgaria</option>
                            <option value="HR">Croatia (Hrvatska)</option>
                            <option value="CY">Cyprus</option>
                            <option value="CZ">Czech Republic</option>
                            <option value="FR">France</option>
                            <option value="GI">Gibraltar</option>
                            <option value="DE">Germany</option>
                            <option value="GR">Greece</option>
                            <option value="VA">Holy See (Vatican City State)</option>
                            <option value="HU">Hungary</option>
                            <option value="IT">Italy</option>
                            <option value="LI">Liechtenstein</option>
                            <option value="LU">Luxembourg</option>
                            <option value="MK">Macedonia</option>
                            <option value="MT">Malta</option>
                            <option value="MD">Moldova</option>
                            <option value="MC">Monaco</option>
                            <option value="ME">Montenegro</option>
                            <option value="NL">Netherlands</option>
                            <option value="PL">Poland</option>
                            <option value="PT">Portugal</option>
                            <option value="RO">Romania</option>
                            <option value="SM">San Marino</option>
                            <option value="RS">Serbia</option>
                            <option value="SK">Slovakia</option>
                            <option value="SI">Slovenia</option>
                            <option value="ES">Spain</option>
                            <option value="UA">Ukraine</option>
                            <option value="DK">Denmark</option>
                            <option value="EE">Estonia</option>
                            <option value="FO">Faroe Islands</option>
                            <option value="FI">Finland</option>
                            <option value="GL">Greenland</option>
                            <option value="IS">Iceland</option>
                            <option value="IE">Ireland</option>
                            <option value="LV">Latvia</option>
                            <option value="LT">Lithuania</option>
                            <option value="NO">Norway</option>
                            <option value="SJ">Svalbard and Jan Mayen Islands</option>
                            <option value="SE">Sweden</option>
                            <option value="CH">Switzerland</option>
                            <option value="TR">Turkey</option>
                        </optgroup>
                        <optgroup label="Asia">
                            <option value="AF">Afghanistan</option>
                            <option value="AM">Armenia</option>
                            <option value="AZ">Azerbaijan</option>
                            <option value="BH">Bahrain</option>
                            <option value="BD">Bangladesh</option>
                            <option value="BT">Bhutan</option>
                            <option value="IO">British Indian Ocean Territory</option>
                            <option value="BN">Brunei Darussalam</option>
                            <option value="KH">Cambodia</option>
                            <option value="CN">China</option>
                            <option value="CX">Christmas Island</option>
                            <option value="CC">Cocos (Keeling) Islands</option>
                            <option value="GE">Georgia</option>
                            <option value="HK">Hong Kong</option>
                            <option value="IN">India</option>
                            <option value="ID">Indonesia</option>
                            <option value="IR">Iran</option>
                            <option value="IQ">Iraq</option>
                            <option value="IL">Israel</option>
                            <option value="JP">Japan</option>
                            <option value="JO">Jordan</option>
                            <option value="KZ">Kazakhstan</option>
                            <option value="KP">Korea, Democratic People's Republic of</option>
                            <option value="KR">Korea, Republic of</option>
                            <option value="KW">Kuwait</option>
                            <option value="KG">Kyrgyzstan</option>
                            <option value="LA">Lao</option>
                            <option value="LB">Lebanon</option>
                            <option value="MY">Malaysia</option>
                            <option value="MV">Maldives</option>
                            <option value="MN">Mongolia</option>
                            <option value="MM">Myanmar (Burma)</option>
                            <option value="NP">Nepal</option>
                            <option value="OM">Oman</option>
                            <option value="PK">Pakistan</option>
                            <option value="PH">Philippines</option>
                            <option value="QA">Qatar</option>
                            <option value="RU">Russian Federation</option>
                            <option value="SA">Saudi Arabia</option>
                            <option value="SG">Singapore</option>
                            <option value="LK">Sri Lanka</option>
                            <option value="SY">Syria</option>
                            <option value="TW">Taiwan</option>
                            <option value="TJ">Tajikistan</option>
                            <option value="TH">Thailand</option>
                            <option value="TP">East Timor</option>
                            <option value="TM">Turkmenistan</option>
                            <option value="AE">United Arab Emirates</option>
                            <option value="UZ">Uzbekistan</option>
                            <option value="VN">Vietnam</option>
                            <option value="YE">Yemen</option>
                        </optgroup>
                        <optgroup label="Australia / Oceania">
                            <option value="AS">American Samoa</option>
                            <option value="AU">Australia</option>
                            <option value="CK">Cook Islands</option>
                            <option value="FJ">Fiji</option>
                            <option value="PF">French Polynesia (Tahiti)</option>
                            <option value="GU">Guam</option>
                            <option value="KB">Kiribati</option>
                            <option value="MH">Marshall Islands</option>
                            <option value="FM">Micronesia, Federated States of</option>
                            <option value="NR">Nauru</option>
                            <option value="NC">New Caledonia</option>
                            <option value="NZ">New Zealand</option>
                            <option value="NU">Niue</option>
                            <option value="MP">Northern Mariana Islands</option>
                            <option value="PW">Palau</option>
                            <option value="PG">Papua New Guinea</option>
                            <option value="PN">Pitcairn</option>
                            <option value="WS">Samoa</option>
                            <option value="SB">Solomon Islands</option>
                            <option value="TK">Tokelau</option>
                            <option value="TO">Tonga</option>
                            <option value="TV">Tuvalu</option>
                            <option value="VU">Vanuatu</option>
                            <option valud="WF">Wallis and Futuna Islands</option>
                        </optgroup>
                        <optgroup label="Africa">
                            <option value="DZ">Algeria</option>
                            <option value="AO">Angola</option>
                            <option value="BJ">Benin</option>
                            <option value="BW">Botswana</option>
                            <option value="BF">Burkina Faso</option>
                            <option value="BI">Burundi</option>
                            <option value="CM">Cameroon</option>
                            <option value="CV">Cape Verde</option>
                            <option value="CF">Central African Republic</option>
                            <option value="TD">Chad</option>
                            <option value="KM">Comoros</option>
                            <option value="CG">Congo</option>
                            <option value="CD">Congo, the Democratic Republic of the</option>
                            <option value="DJ">Dijibouti</option>
                            <option value="EG">Egypt</option>
                            <option value="GQ">Equatorial Guinea</option>
                            <option value="ER">Eritrea</option>
                            <option value="ET">Ethiopia</option>
                            <option value="GA">Gabon</option>
                            <option value="GM">Gambia</option>
                            <option value="GH">Ghana</option>
                            <option value="GN">Guinea</option>
                            <option value="GW">Guinea-Bissau</option>
                            <option value="CI">Cote d'Ivoire (Ivory Coast)</option>
                            <option value="KE">Kenya</option>
                            <option value="LS">Lesotho</option>
                            <option value="LR">Liberia</option>
                            <option value="LY">Libya</option>
                            <option value="MG">Madagascar</option>
                            <option value="MW">Malawi</option>
                            <option value="ML">Mali</option>
                            <option value="MR">Mauritania</option>
                            <option value="MU">Mauritius</option>
                            <option value="YT">Mayotte</option>
                            <option value="MA">Morocco</option>
                            <option value="MZ">Mozambique</option>
                            <option value="NA">Namibia</option>
                            <option value="NE">Niger</option>
                            <option value="NG">Nigeria</option>
                            <option value="RE">Reunion</option>
                            <option value="RW">Rwanda</option>
                            <option value="ST">Sao Tome and Principe</option>
                            <option value="SH">Saint Helena</option>
                            <option value="SN">Senegal</option>
                            <option value="SC">Seychelles</option>
                            <option value="SL">Sierra Leone</option>
                            <option value="SO">Somalia</option>
                            <option value="ZA">South Africa</option>
                            <option value="SS">South Sudan</option>
                            <option value="SD">Sudan</option>
                            <option value="SZ">Swaziland</option>
                            <option value="TZ">Tanzania</option>
                            <option value="TG">Togo</option>
                            <option value="TN">Tunisia</option>
                            <option value="UG">Uganda</option>
                            <option value="EH">Western Sahara</option>
                            <option value="ZM">Zambia</option>
                            <option value="ZW">Zimbabwe</option>
                        </optgroup>
                        <option value="AQ">Antarctica</option>
                    </select>
                <!-- #endregion  -->
            <?php if(isset($errors['country'])) foreach ($errors['country'] as $value) echo "<p class ='input-error'> $value </p>"; ?> <br>
        
            <label for="city">City</label><br>
            <input type="text" name = "city" value="<?php echo isset($user_shipping_data) ? $user_shipping_data[0]['city'] : "" ?>"><br>
            <?php if(isset($errors['city'])) foreach ($errors['city'] as $value) echo "<p class ='input-error'> $value </p>"; ?> 

            <label for="adress">Adress</label><br>
            <input type="text" name = "adress" value="<?php echo isset($user_shipping_data) ? $user_shipping_data[0]['address'] : "" ?>"><br>
            <?php if(isset($errors['adress'])) foreach ($errors['adress'] as $value) echo "<p class ='input-error'> $value </p>"; ?> 

            <label for="tel">Telephone number</label><br>
            <input type="number" name = "tel" value="<?php echo isset($user_shipping_data) ? $user_shipping_data[0]['tel'] : "" ?>"><br>
            <?php if(isset($errors['tel'])) foreach ($errors['tel'] as $value) echo "<p class ='input-error'> $value </p>"; ?> 

            <label for="cemail">Contact email</label><br>
            <input type="text" name = "cemail" value="<?php echo isset($user_shipping_data) ? $user_shipping_data[0]['email'] : "" ?>"><br>
            <?php if(isset($errors['cemail'])) foreach ($errors['cemail'] as $value) echo "<p class ='input-error'> $value </p>"; ?> 

            
            <label for="comment">Comment</label>
            <textarea name="comment"></textarea> <br>
            <label for="checkout"> <?php echo $_SESSION['total'] ?> €</label> <br>
            <input type="submit" name="checkout" value="Checkout">
            </form>

<?php include_once "pages/footer.php"; ?>