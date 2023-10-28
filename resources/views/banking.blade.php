
<!DOCTYPE html>

<html>
<head>
    <title>Card Holder Registration</title>
    <!-- Include Laravel's default stylesheet (Bootstrap) -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <meta charset="utf-8">
		<title>Contact-1 - Sasco - SaaS Landing Pages HTML Template</title>
		<meta name="description" content="">
		<!-- responsive tag -->
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- favicon -->
		<link rel="apple-touch-icon" href="apple-touch-icon.png">
		<link rel="shortcut icon" type="image/x-icon" href="assets/images/fav.png">
		<!-- Bootstrap v4.4.1 css -->
		<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
		<!-- font-awesome css -->
		<link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
		<!-- Remixicon css -->
		<link rel="stylesheet" type="text/css" href="assets/css/remixicon.css">
		<!-- flaticon css -->
		<link rel="stylesheet" type="text/css" href="assets/fonts/flaticon.css">
		<!-- animate css -->
		<link rel="stylesheet" type="text/css" href="assets/css/animate.css">
		<!-- slick css -->
		<link rel="stylesheet" type="text/css" href="assets/css/slick.css">
		<!-- off canvas css -->
		<link rel="stylesheet" type="text/css" href="assets/css/off-canvas.css">
		<!-- magnific popup css -->
		<link rel="stylesheet" type="text/css" href="assets/css/magnific-popup.css">
		<!-- Main Menu css -->
		<link rel="stylesheet" href="assets/css/rsmenu-main.css">
		<!-- spacing css -->
		<link rel="stylesheet" type="text/css" href="assets/css/rs-spacing.css">
		<!-- style css -->
		<link rel="stylesheet" type="text/css" href="style.css"> <!-- This stylesheet dynamically changed from style.less -->
		<!-- responsive css -->
		<link rel="stylesheet" type="text/css" href="assets/css/responsive.css">
		
    <style>
        /* Hide the form when cardHolderData is set */
        .hidden {
            display: none;
        }
    </style>
</head>
<body>
<div class="container-fluid">
   <div class="row py-5 my-5 px-2">
   <div class="col-sm-12 col-md-8 col-lg-8 sm:px-1 md:px-4 lg:px-5   xl:px-5">
    @if (!isset($cardHolderData))
    <!-- Display the form if cardHolderData is not set -->
    <!-- Form Information -->
    <form method="POST" action="{{ route('cardholder.create') }}" enctype="multi-part/form-data" class="row">
    <h4  class="col-12">Card Holder Registration</h4>
        @csrf

        <!-- Billing Address -->
    <div class="col-sm-12 col-md-6 my-1 px-1">
        <label for="city">City</label>
        <input type="text" id="city" name="city" class="form-control" required>
    </div>
    <div class="col-sm-12 col-md-6 my-1 px-1">
        <label for="country">Country</label>
        <input type="text" id="country" name="country" class="form-control" required>
    </div>
        
    <div class="col-sm-12 col-md-6 my-1 px-1">
        <label for="line1">Address Line 1</label>
        <input type="text" id="line1" name="line1" class="form-control" required>
    </div>
    <div class="col-sm-12 col-md-6 my-1">
        <label for="line2">Address Line 2</label>
        <input type="text" id="line2" name="line2" class="form-control">
    </div>
    <div class="col-sm-12 col-md-6 my-1 px-1">
        <label for="postalCode">Postal Code</label>
        <input type="text" id="postalCode" name="postalCode" class="form-control" required>
    </div>
    <div class="col-sm-12 col-md-6 my-1 px-1">
        <label for="state">State</label>
        <input type="text" id="state" name="state" class="form-control col-12" required>
    </div>

        <!-- Personal Information -->
    <div class="col-sm-12 col-md-6 my-1 px-1">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" class="form-control" required>
    </div>
    <div class="col-sm-12 col-md-6 my-1 px-1">
        <label for="phoneNumber">Phone Number</label>
        <input type="text" id="phoneNumber" name="phoneNumber" class="form-control" required>
    </div>
    <div class="col-sm-12 col-md-6 my-1 px-1">
        <label for="firstName">First Name</label>
        <input type="text" id="firstName" name="firstName" class="form-control" required>
    </div>
    <div class="col-sm-12 col-md-6 my-1 px-1">
        <label for="lastName">Last Name</label>
        <input type="text" id="lastName" name="lastName" class="form-control" required>
    </div>
    <div class="col-sm-12 col-md-6 my-1 px-1">
        <label for="dateOfBirth">Date of Birth</label>
        <input type="date" id="dateOfBirth" name="dateOfBirth" class="form-control" required>
    </div>
        <!-- Verification Information -->
    <div class="col-sm-12 col-md-6 my-1 px-1">
        <label for="idType">ID Type</label>
        <select id="idType" name="idType" class="form-control" required>
            <option value="passport">Passport</option>
            <option value="driverLicense">Driver's License</option>
            <option value="nationalId">National ID</option>

            <!-- Add more options if needed -->
        </select>
    </div>
    <div class="col-sm-12 col-md-6 my-1 px-1">
        <label for="documentId">ID Document</label>
        <input type="file" accept=".pdf" id="documentId" name="documentId" class="form-control" required>
    </div>
        <!-- Status -->
        <div class="col-sm-12 col-md-6 my-1 px-1">
        <label for="status">Status</label>
        <select id="status" name="status" class="form-control" required>
            <option value="active">Active</option>
            <option value="inactive">Inactive</option>
            <!-- Add more options if needed -->
        </select>
    </div>

    <div class="col-sm-12 col-12 my-1 px-1">
        <button type="submit" class="form-control btn btn-primary">Submit</button>
    </div>
    </form>
    @else
    <!-- Display card holder data when cardHolderData is set -->
    <p>Card Holder ID: {{ $cardHolderData['id'] }}</p>
    <p>Status: {{ $cardHolderData['status'] }}</p>
    <!-- Display other card holder data here -->

    <!-- Create card button -->
    <form method="POST" action="{{ route('card.create', ['id' => $cardHolderData['id']]) }}">
        @csrf
        <div class="col-sm-12 col-4  my-1 px-1">
        <button type="submit" class="form-control btn btn-primary">Request Card</button>
    </div>
    </form>
    @endif
    </div>

            <!-- More info card -->
   
        <div class="col-sm-12 col-md-4 col-lg-4 sm:px-1 md:px-4 lg:px-5   xl:px-5">
                                <div class="contact-info">
                                    <div class="sec-title mb-35 md-mb-15">
                                        <h3 class="title title5 white-color">Contact Info</h3>
                                    </div>
                                    <div class="contact-item mb-30">
                                        <h4 class="title">Address</h4>
                                        <p class="desc">
                                            1012 Pebda Parkway, Mirpur Stadium 11 Dhaka, Bangladesh
                                        </p>
                                    </div>
                                    <div class="contact-item mb-30">
                                        <h4 class="title">Call Us</h4>
                                        <a href="tel:+00123456789">+00 123 456 789</a>
                                    </div>
                                    <div class="contact-item">
                                        <p class="desc">
                                            For technical issues and general inquiries, Please visit our<a href="#"> help center.</a>
                                        </p>
                                    </div>
                                </div>
         </div>

        </div>
    </div>

    </div>
    </div>
    </div>
</body>
</html>



