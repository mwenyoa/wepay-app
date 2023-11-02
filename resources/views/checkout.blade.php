
<x-app-layout>
<div class="container">
  <ul class="collapsible popout">
    <li>
      <div class="collapsible-header"><i class="material-icons">shopping_cart</i>Order</div>
      
      <div class="collapsible-body" id="order-body">
        <div class="container">
        <div class="row">
        <img class="responsive-img col m6 materialboxed" src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/t-1671/mop.png" alt="Primo Mop"/>
          <div class="col m5">
      <div class="card-panel blue-grey">
        <div class="card-content white-text">
        <span class="card-title">Primo Mop</span>
          <p>Quantity: 20<br>Price: $15.00 USD</p>
        </div>
        </div>
    </div>
        </div>
          <div class="row">
                <div class="card-panel blue-grey">
            <div class="card-content white-text center">
              <p>Subtotal: 300.00 USD<br>Shipping: $7.50 USD<br>Fees: $2.50 USD</p>
              <span class="card-title">Total: $310.00 USD</span>
            </div>
            </div>
          </div>
        </div>
      </div> 
    </li>
    <li class="active">
      <div class="collapsible-header"><i class="material-icons">place</i>Address</div>
      <div class="collapsible-body row" id="address-body">
        <div class="row">
          <div class="col s12">
           <div class="card blue-grey">
             <div class="card-content white-text">
              <span class="card-title">Billing Address</span>
              <p>Enter the address associated with your card.</p>
            </div>
          </div>
        </div>
       </div>
        <div class="container">
       <form class="col s12" id="billing-address">
         @csrf
          <div class="row">
            <div class="input-field col s6">
              <input placeholder="first name" id="first_name" value="{{auth()->user()->firstname}}" type="text" class="validate">
              <label for="first_name">first name</label>
            </div>
            <div class="input-field col s6">
              <input placeholder="last name" id="last_name" value="{{auth()->user()->lastname}}" type="text" class="validate">
              <label for="last_name">last name</label>
            </div>
           </div>
          <div class="row">
            <div class="input-field col s12">
              <input placeholder="email" id="email" value="{{auth()->user()->email}}" type="text" class="validate">
              <label for="email">email</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s6">
              <input placeholder="street address" id="street_address" type="text" class="validate">
              <label for="street_address">street address</label>
            </div>
            <div class="input-field col s6">
              <input placeholder="suite / apt." id="suite" type="text" class="validate">
              <label for="suite">suite / apt.</label>
            </div>
           </div>
          <div class="row">
            <div class="input-field col s4">
              <input placeholder="city" id="city" type="text" class="validate">
              <label for="city">city</label>
            </div>
            <div class="input-field col s4">
              <input placeholder="state" id="state" type="text" class="validate">
              <label for="state">state</label>
            </div>
            <div class="input-field col s4">
              <input placeholder="zip" id="zip" type="text" class="validate">
              <label for="zip">zip</label>
            </div>
           </div>
        </form>
        <form action="#">
        @csrf
          <p>
            <label>
              <input type="checkbox" id="same" onclick="showMe('shipping-input')" />
              <span>Different from shipping address?</span>
            </label>
          </p>
        </form>
         </div>
      <form class="col s12" id="shipping-address">
        @csrf 
        <div class="row">
          <div class="col s12">
           <div class="card blue-grey">
             <div class="card-content white-text">
              <span class="card-title">Shipping Address</span>
              <p>Enter the address where your order will be shipped.</p>
            </div>
          </div>
        </div>
       </div>
        <div class="container">
          <div class="row">
            <div class="input-field col s6">
              <input placeholder="first name" id="first_name" type="text" class="validate">
              <label for="first_name">first name</label>
            </div>
            <div class="input-field col s6">
              <input placeholder="last name" id="last_name" type="text" class="validate">
              <label for="last_name">last name</label>
            </div>
           </div>
          <div class="row">
            <div class="input-field col s12">
              <input placeholder="email" id="email" type="text" class="validate">
              <label for="email">email</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s6">
              <input placeholder="street address" id="street_address" type="text" class="validate">
              <label for="street_address">street address</label>
            </div>
            <div class="input-field col s6">
              <input placeholder="suite / apt." id="suite" type="text" class="validate">
              <label for="suite">suite / apt.</label>
            </div>
           </div>
          <div class="row">
            <div class="input-field col s4">
              <input placeholder="city" id="city" type="text" class="validate">
              <label for="city">city</label>
            </div>
            <div class="input-field col s4">
              <input placeholder="state" id="state" type="text" class="validate">
              <label for="state">state</label>
            </div>
            <div class="input-field col s4">
              <input placeholder="zip" id="zip" type="text" class="validate">
              <label for="zip">zip</label>
            </div>
           </div>
        </form>
        </div>
      </div>

    </li>
    <li id="checkout">
      <div class="collapsible-header"><i class="material-icons">credit_card</i>Submit</div>
      <div class="collapsible-body" id="submit">
        <span>
          <div class="container">
            <div class="row">
            <img class="responsive-img" id="accepted-cards" src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/t-1671/card-brands.png" border="0" alt="Accepted Cards"/>
            </div>
            <div class="row">
          <div id="credit_card_iframe">  </div>
            </div>
            <div class="row">
              <div class="card blue-grey lighten-2">
             <div class="card-content white-text">
              <p>By clicking submit, you agree to Mop Emporium's <a href="#">refund, cancellation, and return</a> policy.<br>Orders will be shipped in 2-3 business days, at which time tracking information will be provided in a confirmation email.</p>
            </div>
          </div>
            </div>
          <button class="btn waves-effect waves-light" type="submit" name="action" id="submit-credit-card-button">Submit
            <i class="material-icons right">send</i>
          </button>
            <div id="token"></div>
          </div>
        </span>
      </div>
    </li>
  </ul>
</div>
</x-app-layout>