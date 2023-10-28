<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
         <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet" />
        <!-- Scripts -->
        <style>
          /* Global container styling */
/* .checkout-container {
  padding: 20px;
  background-color: #f2f2f2;
}

#checkout {
  display: none;
} */
/* Collapsible styling */
/* .collapsible {
  border: 1px solid #ccc;
  background-color: #fff;
}

.collapsible-header {
  background-color: #0074e4;
  color: #fff;
  padding: 10px;
  font-weight: bold;
}

.collapsible-header.active {
  background-color: #004b87;
}

.collapsible-body {
  padding: 20px;
} */

/* Card panel styling */
/* .card-panel {
  background-color: #0074e4;
  color: #fff;
  padding: 10px;
  margin: 10px 0;
} */

/* Input field styling */
.input-field {
  margin: 10px 0;
}

/* Button styling */
/* .btn {
  background-color: #0074e4;
  color: #fff;
  padding: 10px 20px;
  text-transform: uppercase;
} */

/* Accepted cards image styling */
/* #accepted-cards {
  max-width: 100%;
} */

/* Credit card iframe container */
/* #credit_card_iframe {
  border: none;
  width: 100%;
  height: 200px;
} */

/* Card content styling */
/* .card-content {
  padding: 10px;
} */

/* Link within card content */
/* .card-content a {
  color: #0074e4;
  text-decoration: underline;
} */

/* Custom styles for the credit card form */
/* Add your custom styles here */

/* One-liner credit card form styles */
/* Add your one-liner styles here */

/* Error message styling */
/* .errors.invalid {
  color: #CD5C5C;
} */

/* Valid message styling */
/* .valid {
  color: #4db6ac;
  border-color: #4db6ac;
}

#shipping-address {
  display: none;
} */

/* Labels styling */
/* .labels.base {
  color: gray;
  font-family: Arial;
  font-size: 13px;
  font-weight: 1;
  text-transform: lowercase;
  padding: 0px;
  padding-left: 0px;
} */

        </style>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 mx-5">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="https://cdn.wepay.com/wepay.min.js"></script>
      <script>
    //insert your app ID
    let appId = "{{ env('APP_ID') }}";

var options = {
  custom_style:custom_style,
  show_labels:true,
  show_placeholders:true,
  show_error_messages:true,
  show_error_messages_when_unfocused:true,
  use_one_liner: false
};

document.addEventListener('DOMContentLoaded', function() {
  // initialize materialize collapsible
  var collapsibleElement = document.querySelector('.collapsible');
  var collapsibleInstance = M.Collapsible.init(collapsibleElement);

  // initialize materialize material box
  var materialBox = document.querySelectorAll('.materialboxed');
  var instances = M.Materialbox.init(materialBox);

  // load with address open
  collapsibleInstance.open(1);
});
// show shipping address if different
function showMe() {
  var box = document.getElementById('same');
  var vis = (box.checked) ? "block" : "none";
  document.getElementById('shipping-address').style.display = vis;
}
// close address section on "next" click
function closeAddress() {
  var elems = document.querySelector('.collapsible');
  var instances = M.Collapsible.init(elems);
  instances.close(1);
}
// open submit section on "next" click
function openSubmit() {
  var elems = document.querySelector('.collapsible');
  var instances = M.Collapsible.init(elems);
  instances.open(2);
}
// credit card iframe styling
var custom_style = {
  'styles': {
     'base': {
        'color': 'grey',
        'border': '1px solid grey',
        'border-top': 'none',
        'border-right': 'none',
        'border-left': 'none',
        'font-weight': '200',
        'font-family': 'Arial',
        'padding': '0px',
        'margin-bottom': '5px',
        ':focus': {
            'border': '2px solid #4db6ac',
            'border-top': 'none',
            'border-right': 'none',
            'border-left': 'none'
        },
        '::placeholder': {
             'text-transform': 'lowercase',
             'color': '#D3D3D3',
              'font-size': '17px'
        }
     },
     'invalid': {
        'color': '#CD5C5C',
        'border-color': '#CD5C5C'
     },
     'valid': {
        'color': '#4db6ac',
        'border-color': '#4db6ac'
     },
     'labels': {
        'base': {
          'color': 'gray',
          'font-family': 'Arial',
          'font-size': '13px',
					'font-weight': '1',
          'text-transform': 'lowercase',
          'padding': '0px',
					'padding-left': '0px'
        }
     },
     'errors': {
        'invalid': {
          'color': '#CD5C5C'
        }
     }
   }
};

if (options.use_one_liner) {
  custom_style = {
      "styles": {
         "cc-logo":{
            "base":{
               "margin":"12px 12px 7px 12px"
            }
         },
         "cc-mask":{
            "base":{
               "margin":"12px 12px 7px 12px"
            }
         },
         "cvv-icon":{
            "base":{
               "display":"none"
            }
         }
      }
    }
}

//credit card iframe configs
var myAppId = appId;
var apiVersion = "3.0";
var error = WePay.configure("stage", myAppId, apiVersion);
if (error) {
  console.log(error);
}

var iframe_container_id = "credit_card_iframe";
var creditCard = WePay.createCreditCardIframe(iframe_container_id, options);

document.getElementById('submit-credit-card-button').addEventListener('click', function (event) {
    creditCard.tokenize()
      .then(function (response) {
        //get the promise response from the console
        console.log('response', JSON.stringify(response));
        var node = document.createElement('div');
        node.innerHTML = JSON.stringify(response);
        document.getElementById('token').appendChild(node);
      })
      .catch(function (error) {
        // console.log('error', error);
        // Move the focus to the first error        
        if (Array.isArray(error)) {
          let key = error[0].target[0];
          creditCard.setFocus(key);
        }
        // display the response on the page for testing purposes; do not launch with this section
        var node = document.createElement('div');
        node.innerHTML = JSON.stringify(error);
        document.getElementById('token').appendChild(node);
    });
 });

        </script>
    </body>
</html>
