<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL);
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Library Management</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
          rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fa fa-university" aria-hidden="true"></i>
            </div>
            <div class="sidebar-brand-text mx-3">Library Management</div>
        </a>
        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Modules
        </div>

        <!-- Nav Item - List Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
               aria-expanded="true" aria-controls="collapseTwo">
                <i class="fa fa-list" aria-hidden="true"></i>
                <span>List</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Total List:</h6>
                    <a class="fa fa-address-card collapse-item" href="contact_list.php">&emsp;Contact List</a>
                    <a class="fa fa-book collapse-item" href="asset_list.php">&nbsp;&emsp;Asset List</a>
                    <a class="fa fa-barcode collapse-item" href="transaction_list.php">&nbsp;&nbsp;&nbsp;Transaction List</a>
                    <a class="fa fa-comment collapse-item" href="comment_list.php">&nbsp;&nbsp;&nbsp;Comment List</a>
                </div>
            </div>
        </li>

        <!-- Nav Item - Features Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fas fa-fw fa-wrench"></i>
                <span>Features</span>
            </a>
            <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Total Features:</h6>
                    <a class="fa fa-address-card collapse-item" href="edit_contact.php">&emsp;Create Contact</a>
                    <a class="fa fa-book collapse-item" href="edit_asset.php">&nbsp;&emsp;Create Asset</a>
                    <a class="fa fa-barcode collapse-item" href="edit_transaction.php">&nbsp;&nbsp;&nbsp;Create Transaction</a>
                </div>
            </div>
        </li>

        <!-- Divider -->

        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Contact Management</h1>
                </div>
            </div>
            <div class="container-fluid">
                <?php
                //            ini_set('display_errors', 'On');
                //            error_reporting(E_ALL);
                if(isset($_SESSION['contact'])){
                    $msg = $_SESSION['contact'];
                    echo $msg;
                    session_destroy();
                }
                ?>
            </div>
            <hr>
            <br><br>
            <div class="container-fluid">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="general-tab" data-toggle="tab" href="#general" role="tab"
                           aria-controls="general" aria-selected="true">Create Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="lending_history-tab" data-toggle="tab" href="#lending_history"
                           role="tab" aria-controls="lending_history" aria-selected="false">All Contacts Lending History</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="current_lending-tab" data-toggle="tab" href="#current_lending"
                           role="tab" aria-controls="current_lending" aria-selected="false">Current Lending</a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane active" id="general" role="tabpanel"
                         aria-labelledby="general-tab">
                        <form action="edit/create_contact.php" method="post">
                            <section>
                                <div class="container"><br>
                                    <div class="form-row">
                                        <div class="col">
                                            <label for="firstname">First name</label>
                                            <input maxlength="45" id="firstname" name="firstname" type="text"
                                                   class="form-control" id="validationDefault01"
                                                   placeholder="First name"
                                                   value="<?php if (isset($_POST['firstname'])) {
                                                       echo $_POST['firstname'];
                                                   } ?>" required>
                                        </div>
                                        <div class="col">
                                            <label for="lastname">Last name</label>
                                            <input maxlength="45" id="lastname" name="lastname" type="text"
                                                   class="form-control" id="validationDefault03"
                                                   placeholder="Last name" value="<?php if (isset($_POST['lastname'])) {
                                                echo $_POST['lastname'];
                                            } ?>" required>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-row">
                                        <div class="col">
                                            <label for="dob">Date of Birth</label><br>
                                            <input type="date" value="<?php if (isset($_POST["dob"])) {
                                                echo $_POST["dob"];
                                            } ?>" name="dob" id="dob" class="form-control" placeholder="Date Of Birth"
                                                   required>
                                        </div>
                                        <div class="col">
                                            <label for="gender">Gender</label><br>
                                            <select name="gender" class="form-control" id="gender" required>
                                                <optgroup label="Gender">
                                                    <option value="Male" selected>Male</option>
                                                    <option value="Female">Female</option>
                                                    <option value="Other">Other</option>
                                                </optgroup>
                                            </select>
                                        </div>
                                        <div class="col">
                                            <label for="status">Marital Status</label><br>
                                            <select class="form-control" name="status" id="status" required>
                                                <optgroup label="Marital Status">
                                                    <option value="Single" selected>Single</option>
                                                    <option value="Married">Married</option>
                                                    <option value="Divorced">Divorced</option>
                                                    <option value="Complicated">Complicated</option>
                                                </optgroup>
                                            </select>
                                        </div>
                                        <div class="col">
                                            <label for="sp">Spouse Name (Optional)</label><br>
                                            <input class="form-control" maxlength="45" type="text"
                                                   value="<?php if (isset($_POST["sp"])) {
                                                       echo $_POST["sp"];
                                                   } ?>"
                                                   name="sp" id="sp" placeholder="Spouse Name">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-row">
                                        <div class="col">
                                            <label for="citizen">Citizen</label>
                                            <small>(ISO-3166-1: Alpha-2 Codes)</small><br>
                                            <select class="form-control" id="citizen" name="citizen" required>
                                                <option value="AF" selected>Afghanistan</option>
                                                <option value="AX">Åland Islands</option>
                                                <option value="AL">Albania</option>
                                                <option value="DZ">Algeria</option>
                                                <option value="AS">American Samoa</option>
                                                <option value="AD">Andorra</option>
                                                <option value="AO">Angola</option>
                                                <option value="AI">Anguilla</option>
                                                <option value="AQ">Antarctica</option>
                                                <option value="AG">Antigua and Barbuda</option>
                                                <option value="AR">Argentina</option>
                                                <option value="AM">Armenia</option>
                                                <option value="AW">Aruba</option>
                                                <option value="AU">Australia</option>
                                                <option value="AT">Austria</option>
                                                <option value="AZ">Azerbaijan</option>
                                                <option value="BS">Bahamas</option>
                                                <option value="BH">Bahrain</option>
                                                <option value="BD">Bangladesh</option>
                                                <option value="BB">Barbados</option>
                                                <option value="BY">Belarus</option>
                                                <option value="BE">Belgium</option>
                                                <option value="BZ">Belize</option>
                                                <option value="BJ">Benin</option>
                                                <option value="BM">Bermuda</option>
                                                <option value="BT">Bhutan</option>
                                                <option value="BO">Bolivia, Plurinational State of</option>
                                                <option value="BQ">Bonaire, Sint Eustatius and Saba</option>
                                                <option value="BA">Bosnia and Herzegovina</option>
                                                <option value="BW">Botswana</option>
                                                <option value="BV">Bouvet Island</option>
                                                <option value="BR">Brazil</option>
                                                <option value="IO">British Indian Ocean Territory</option>
                                                <option value="BN">Brunei Darussalam</option>
                                                <option value="BG">Bulgaria</option>
                                                <option value="BF">Burkina Faso</option>
                                                <option value="BI">Burundi</option>
                                                <option value="KH">Cambodia</option>
                                                <option value="CM">Cameroon</option>
                                                <option value="CA">Canada</option>
                                                <option value="CV">Cape Verde</option>
                                                <option value="KY">Cayman Islands</option>
                                                <option value="CF">Central African Republic</option>
                                                <option value="TD">Chad</option>
                                                <option value="CL">Chile</option>
                                                <option value="CN">China</option>
                                                <option value="CX">Christmas Island</option>
                                                <option value="CC">Cocos (Keeling) Islands</option>
                                                <option value="CO">Colombia</option>
                                                <option value="KM">Comoros</option>
                                                <option value="CG">Congo</option>
                                                <option value="CD">Congo, the Democratic Republic of the</option>
                                                <option value="CK">Cook Islands</option>
                                                <option value="CR">Costa Rica</option>
                                                <option value="CI">Côte d'Ivoire</option>
                                                <option value="HR">Croatia</option>
                                                <option value="CU">Cuba</option>
                                                <option value="CW">Curaçao</option>
                                                <option value="CY">Cyprus</option>
                                                <option value="CZ">Czech Republic</option>
                                                <option value="DK">Denmark</option>
                                                <option value="DJ">Djibouti</option>
                                                <option value="DM">Dominica</option>
                                                <option value="DO">Dominican Republic</option>
                                                <option value="EC">Ecuador</option>
                                                <option value="EG">Egypt</option>
                                                <option value="SV">El Salvador</option>
                                                <option value="GQ">Equatorial Guinea</option>
                                                <option value="ER">Eritrea</option>
                                                <option value="EE">Estonia</option>
                                                <option value="ET">Ethiopia</option>
                                                <option value="FK">Falkland Islands (Malvinas)</option>
                                                <option value="FO">Faroe Islands</option>
                                                <option value="FJ">Fiji</option>
                                                <option value="FI">Finland</option>
                                                <option value="FR">France</option>
                                                <option value="GF">French Guiana</option>
                                                <option value="PF">French Polynesia</option>
                                                <option value="TF">French Southern Territories</option>
                                                <option value="GA">Gabon</option>
                                                <option value="GM">Gambia</option>
                                                <option value="GE">Georgia</option>
                                                <option value="DE">Germany</option>
                                                <option value="GH">Ghana</option>
                                                <option value="GI">Gibraltar</option>
                                                <option value="GR">Greece</option>
                                                <option value="GL">Greenland</option>
                                                <option value="GD">Grenada</option>
                                                <option value="GP">Guadeloupe</option>
                                                <option value="GU">Guam</option>
                                                <option value="GT">Guatemala</option>
                                                <option value="GG">Guernsey</option>
                                                <option value="GN">Guinea</option>
                                                <option value="GW">Guinea-Bissau</option>
                                                <option value="GY">Guyana</option>
                                                <option value="HT">Haiti</option>
                                                <option value="HM">Heard Island and McDonald Islands</option>
                                                <option value="VA">Holy See (Vatican City State)</option>
                                                <option value="HN">Honduras</option>
                                                <option value="HK">Hong Kong</option>
                                                <option value="HU">Hungary</option>
                                                <option value="IS">Iceland</option>
                                                <option value="IN">India</option>
                                                <option value="ID">Indonesia</option>
                                                <option value="IR">Iran, Islamic Republic of</option>
                                                <option value="IQ">Iraq</option>
                                                <option value="IE">Ireland</option>
                                                <option value="IM">Isle of Man</option>
                                                <option value="IL">Israel</option>
                                                <option value="IT">Italy</option>
                                                <option value="JM">Jamaica</option>
                                                <option value="JP">Japan</option>
                                                <option value="JE">Jersey</option>
                                                <option value="JO">Jordan</option>
                                                <option value="KZ">Kazakhstan</option>
                                                <option value="KE">Kenya</option>
                                                <option value="KI">Kiribati</option>
                                                <option value="KP">Korea, Democratic People's Republic of</option>
                                                <option value="KR">Korea, Republic of</option>
                                                <option value="KW">Kuwait</option>
                                                <option value="KG">Kyrgyzstan</option>
                                                <option value="LA">Lao People's Democratic Republic</option>
                                                <option value="LV">Latvia</option>
                                                <option value="LB">Lebanon</option>
                                                <option value="LS">Lesotho</option>
                                                <option value="LR">Liberia</option>
                                                <option value="LY">Libya</option>
                                                <option value="LI">Liechtenstein</option>
                                                <option value="LT">Lithuania</option>
                                                <option value="LU">Luxembourg</option>
                                                <option value="MO">Macao</option>
                                                <option value="MK">Macedonia, the former Yugoslav Republic of</option>
                                                <option value="MG">Madagascar</option>
                                                <option value="MW">Malawi</option>
                                                <option value="MY">Malaysia</option>
                                                <option value="MV">Maldives</option>
                                                <option value="ML">Mali</option>
                                                <option value="MT">Malta</option>
                                                <option value="MH">Marshall Islands</option>
                                                <option value="MQ">Martinique</option>
                                                <option value="MR">Mauritania</option>
                                                <option value="MU">Mauritius</option>
                                                <option value="YT">Mayotte</option>
                                                <option value="MX">Mexico</option>
                                                <option value="FM">Micronesia, Federated States of</option>
                                                <option value="MD">Moldova, Republic of</option>
                                                <option value="MC">Monaco</option>
                                                <option value="MN">Mongolia</option>
                                                <option value="ME">Montenegro</option>
                                                <option value="MS">Montserrat</option>
                                                <option value="MA">Morocco</option>
                                                <option value="MZ">Mozambique</option>
                                                <option value="MM">Myanmar</option>
                                                <option value="NA">Namibia</option>
                                                <option value="NR">Nauru</option>
                                                <option value="NP">Nepal</option>
                                                <option value="NL">Netherlands</option>
                                                <option value="NC">New Caledonia</option>
                                                <option value="NZ">New Zealand</option>
                                                <option value="NI">Nicaragua</option>
                                                <option value="NE">Niger</option>
                                                <option value="NG">Nigeria</option>
                                                <option value="NU">Niue</option>
                                                <option value="NF">Norfolk Island</option>
                                                <option value="MP">Northern Mariana Islands</option>
                                                <option value="NO">Norway</option>
                                                <option value="OM">Oman</option>
                                                <option value="PK">Pakistan</option>
                                                <option value="PW">Palau</option>
                                                <option value="PS">Palestinian Territory, Occupied</option>
                                                <option value="PA">Panama</option>
                                                <option value="PG">Papua New Guinea</option>
                                                <option value="PY">Paraguay</option>
                                                <option value="PE">Peru</option>
                                                <option value="PH">Philippines</option>
                                                <option value="PN">Pitcairn</option>
                                                <option value="PL">Poland</option>
                                                <option value="PT">Portugal</option>
                                                <option value="PR">Puerto Rico</option>
                                                <option value="QA">Qatar</option>
                                                <option value="RE">Réunion</option>
                                                <option value="RO">Romania</option>
                                                <option value="RU">Russian Federation</option>
                                                <option value="RW">Rwanda</option>
                                                <option value="BL">Saint Barthélemy</option>
                                                <option value="SH">Saint Helena, Ascension and Tristan da Cunha</option>
                                                <option value="KN">Saint Kitts and Nevis</option>
                                                <option value="LC">Saint Lucia</option>
                                                <option value="MF">Saint Martin (French part)</option>
                                                <option value="PM">Saint Pierre and Miquelon</option>
                                                <option value="VC">Saint Vincent and the Grenadines</option>
                                                <option value="WS">Samoa</option>
                                                <option value="SM">San Marino</option>
                                                <option value="ST">Sao Tome and Principe</option>
                                                <option value="SA">Saudi Arabia</option>
                                                <option value="SN">Senegal</option>
                                                <option value="RS">Serbia</option>
                                                <option value="SC">Seychelles</option>
                                                <option value="SL">Sierra Leone</option>
                                                <option value="SG">Singapore</option>
                                                <option value="SX">Sint Maarten (Dutch part)</option>
                                                <option value="SK">Slovakia</option>
                                                <option value="SI">Slovenia</option>
                                                <option value="SB">Solomon Islands</option>
                                                <option value="SO">Somalia</option>
                                                <option value="ZA">South Africa</option>
                                                <option value="GS">South Georgia and the South Sandwich Islands</option>
                                                <option value="SS">South Sudan</option>
                                                <option value="ES">Spain</option>
                                                <option value="LK">Sri Lanka</option>
                                                <option value="SD">Sudan</option>
                                                <option value="SR">Suriname</option>
                                                <option value="SJ">Svalbard and Jan Mayen</option>
                                                <option value="SZ">Swaziland</option>
                                                <option value="SE">Sweden</option>
                                                <option value="CH">Switzerland</option>
                                                <option value="SY">Syrian Arab Republic</option>
                                                <option value="TW">Taiwan, Province of China</option>
                                                <option value="TJ">Tajikistan</option>
                                                <option value="TZ">Tanzania, United Republic of</option>
                                                <option value="TH">Thailand</option>
                                                <option value="TL">Timor-Leste</option>
                                                <option value="TG">Togo</option>
                                                <option value="TK">Tokelau</option>
                                                <option value="TO">Tonga</option>
                                                <option value="TT">Trinidad and Tobago</option>
                                                <option value="TN">Tunisia</option>
                                                <option value="TR">Turkey</option>
                                                <option value="TM">Turkmenistan</option>
                                                <option value="TC">Turks and Caicos Islands</option>
                                                <option value="TV">Tuvalu</option>
                                                <option value="UG">Uganda</option>
                                                <option value="UA">Ukraine</option>
                                                <option value="AE">United Arab Emirates</option>
                                                <option value="GB">United Kingdom</option>
                                                <option value="US">United States</option>
                                                <option value="UM">United States Minor Outlying Islands</option>
                                                <option value="UY">Uruguay</option>
                                                <option value="UZ">Uzbekistan</option>
                                                <option value="VU">Vanuatu</option>
                                                <option value="VE">Venezuela, Bolivarian Republic of</option>
                                                <option value="VN">Viet Nam</option>
                                                <option value="VG">Virgin Islands, British</option>
                                                <option value="VI">Virgin Islands, U.S.</option>
                                                <option value="WF">Wallis and Futuna</option>
                                                <option value="EH">Western Sahara</option>
                                                <option value="YE">Yemen</option>
                                                <option value="ZM">Zambia</option>
                                                <option value="ZW">Zimbabwe</option>
                                            </select>
                                        </div>
                                        <div class="col">
                                            <label class="pl-3" for="email">Email</label>
                                            <input type="email" maxlength="45" class="form-control"
                                                   value="<?php if (isset($_POST["email"])) {
                                                       echo $_POST["email"];
                                                   } ?>" name="email" id="email" placeholder="Email" required><br>
                                            <small id="emailHelp" class="form-text text-muted">We'll never share your
                                                email with anyone else.</small>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-row">
                                        <div class="col">
                                            <label for="mobilephone">Mobile Phone</label>
                                            <small>Format (111-111-1111)</small><br>
                                            <input maxlength="12" type="tel" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}"
                                                   class="form-control"
                                                   value="<?php if (isset($_POST["mobilephone"])) {
                                                       echo $_POST["mobliephone"];
                                                   } ?>" name="mobilephone" id="mobilephone"
                                                   placeholder="Mobile Phone" requried>
                                        </div>
                                        <div class="col">
                                            <label for="telephone">Home Phone</label>
                                            <small>Format (111-111-1111)</small><br>
                                            <input maxlength="12" type="tel" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}"
                                                   class="form-control"
                                                   value="<?php if (isset($_POST["telephone"])) {
                                                       echo $_POST["telephone"];
                                                   } ?>" name="telephone" id="telephone"
                                                   placeholder="Home Phone (Optional)">
                                        </div>
                                        <div class="col">
                                            <label for="id">ID Number (eg. 201900001)</label><br>
                                            <input maxlength="9" class="form-control" type="text"
                                                   value="<?php if (isset($_POST["id"])) {
                                                       echo $_POST["id"];
                                                   } ?>" name="id" id="id" required>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col">
                                                <label for="addr">Postal Address (Current Adrress)</label>
                                                <textarea maxlength="200" rows="4" cols="12" class="form-control"
                                                          id="addr" name="addr" style="resize: vertical"
                                                          required placeholder="Address"><?php if (isset($_POST["addr"])) {
                                                          echo htmlspecialchars($_POST["addr"]);
                                                    } ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="submit" class="btn btn-info" name="contact_submit" value="Create">
                                    <hr>
                                </div>
                            </section>
                        </form>
                    </div>
                    <div class="tab-pane" id="lending_history" role="tabpanel"
                         aria-labelledby="lending_history-tab">
                        <div class="container-fluid">

                            <!-- DataTales Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="fa fa-address-card m-0 font-weight-bold text-info"> Lending History</h6>
                                </div>
                                <div class="container-fluid">
                                    <?php
                                    if (isset($_SESSION['contactHistory'])){
                                        echo $_SESSION['contactHistory'];
                                    }
                                    ?>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <?php
                                        include_once 'edit/db_connect.php';
                                        $query1  = "SELECT Contacts.ContactsID, Contacts.FirstName, Contacts.LastName, Assets.BookName ";
                                        $query1 .= "FROM Contacts ";
                                        $query1 .= "JOIN Transactions ON Contacts.ContactsID = Transactions.ContactsID ";
                                        $query1 .= "JOIN Assets ON Transactions.AssetsID = Assets.AssetsID";
                                        $result1 = mysqli_query($conn,$query1);
                                        if (!$result1) {
                                            $string = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                                                        Query Failed!
                                                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                                        <span aria-hidden='true'>&times;</span>
                                                        </button>
                                                        </div>";
                                            $_SESSION['contactHistory'] = $string;
                                            header("Location: edit_contact.php");
                                        } else {
                                            echo "<table class='table table-bordered' id='dataTable' width='100%' cellspacing='0'>";
                                            echo "<thead>";
                                            echo "<tr>";
                                            echo "<th>ID Number</th>";
                                            echo "<th>First Name</th>";
                                            echo "<th>Last Name</th>";
                                            echo "<th>Book Name</th>";
                                            echo "</tr>";
                                            echo"</thead>";
                                            echo "<tbody>";
                                            while ($row = mysqli_fetch_array($result1)) {
                                                echo "<tr>";
                                                echo "<td>".$row['ContactsID']."</td>";
                                                echo "<td>".$row['FirstName']."</td>";
                                                echo "<td>".$row['LastName']."</td>";
                                                echo "<td>".$row['BookName']."</td>";
                                                echo "</tr>";
                                            }
                                            echo "</tbody>";
                                            echo "</table>";
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="current_lending" role="tabpanel"
                         aria-labelledby="current_lending-tab">
                        <div class="container-fluid">

                            <!-- DataTales Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="fa fa-address-card m-0 font-weight-bold text-info"> Current Lending</h6>
                                </div>
                                <div class="container-fluid">
                                    <?php if(isset($_SESSION['currentLending'])){
                                        echo $_SESSION['currentLending'];
                                    }
                                    ?>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <?php
                                        $query2 = "SELECT Contacts.ContactsID, Contacts.FirstName, Contacts.LastName, Assets.BookName ";
                                        $query2 .= "FROM Contacts ";
                                        $query2 .= "JOIN Transactions ON Contacts.ContactsID = Transactions.ContactsID ";
                                        $query2 .= "JOIN Assets ON Transactions.AssetsID = Assets.AssetsID ";
                                        $query2 .= "WHERE Transactions.CheckedOutDate IS NOT NULL AND Transactions.CheckedInDate IS NULL";
                                        $result2 = mysqli_query($conn,$query2);
                                        if (!$result2) {
                                            $string = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                                                        Query Failed!
                                                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                                        <span aria-hidden='true'>&times;</span>
                                                        </button>
                                                        </div>";
                                            $_SESSION['currentLending'] = $string;
                                            header("Location: edit_contact.php");
                                        } else {
                                            echo "<table class='table table-bordered' id='dataTable' width='100%' cellspacing='0'>";
                                            echo "<thead>";
                                            echo "<tr>";
                                            echo "<th>ID Number</th>";
                                            echo "<th>First Name</th>";
                                            echo "<th>Last Name</th>";
                                            echo "<th>Book Name</th>";
                                            echo "</tr>";
                                            echo"</thead>";
                                            echo "<tbody>";
                                            while ($row = mysqli_fetch_array($result2)) {
                                                echo "<tr>";
                                                echo "<td>".$row['ContactsID']."</td>";
                                                echo "<td>".$row['FirstName']."</td>";
                                                echo "<td>".$row['LastName']."</td>";
                                                echo "<td>".$row['BookName']."</td>";
                                                echo "</tr>";
                                            }
                                            echo "</tbody>";
                                            echo "</table>";
                                            mysqli_close($conn);
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; Library Management Copy & Paste Website 2019</span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>
</div>
</div>
<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="js/demo/chart-area-demo.js"></script>
<script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>
