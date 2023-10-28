//insert your app ID
let appId = env('APP_ID');

let options = {
  custom_style:custom_style,
  show_labels:true,
  show_placeholders:true,
  show_error_messages:true,
  show_error_messages_when_unfocused:true,
  use_one_liner: false
};

document.addEventListener('DOMContentLoaded', function() {
  // initialize materialize collapsible
  let collapsibleElement = document.querySelector('.collapsible');
  let collapsibleInstance = Collapsible.init(collapsibleElement);

  // initialize materialize material box
  let materialBox = document.querySelectorAll('.materialboxed');
  let instances = materialbox.init(materialBox);

  // load with address open
  collapsibleInstance.open(1);
});
// show shipping address if different
function showMe() {
  let box = document.getElementById('same');
  let vis = (box.checked) ? "block" : "none";
  document.getElementById('shipping-address').style.display = vis;
}
// close address section on "next" click
function closeAddress() {
  let elems = document.querySelector('.collapsible');
  let instances = M.Collapsible.init(elems);
  instances.close(1);
}
// open submit section on "next" click
function openSubmit() {
  let elems = document.querySelector('.collapsible');
  let instances = M.Collapsible.init(elems);
  instances.open(2);
}
// credit card iframe styling
let custom_style = {
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
let myAppId = appId;
let apiVersion = "3.0";
let error = WePay.configure("stage", myAppId, apiVersion);
if (error) {
  console.log(error);
}

let iframe_container_id = "credit_card_iframe";
let creditCard = WePay.createCreditCardIframe(iframe_container_id, options);

document.getElementById('submit-credit-card-button').addEventListener('click', function (event) {
    creditCard.tokenize()
      .then(function (response) {
        //get the promise response from the console
        console.log('response', JSON.stringify(response));
        let node = document.createElement('div');
        node.innerHTML = JSON.stringify(response);
        document.getElementById('token').appendChild(node);
      })
      .catch(function (error) {
        console.log('error', error);
        // Move the focus to the first error        
        if (Array.isArray(error)) {
          let key = error[0].target[0];
          creditCard.setFocus(key);
        }
        // display the response on the page for testing purposes; do not launch with this section
        let node = document.createElement('div');
        node.innerHTML = JSON.stringify(error);
        document.getElementById('token').appendChild(node);
    });
 });