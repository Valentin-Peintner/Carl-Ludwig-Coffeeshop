{{-- Header Online shop --}}

<div id="container-navbar-all">  
    {{-- Logo --}}
    <div class="header-s">
      <x-logo-shop />
    </div>
        <div>
            {{-- Navigationbar links --}}
            <nav class="navbar-s">
                <ul>
                  {{-- Home --}}
                  <li>
                    <a href="/index-shop" class="links">Home</a>
                  </li> 
                  {{-- Kaffee View --}}
                  <li>
                    <a href="/coffee" class="links">Kaffee</a>
                  </li> 
                  {{-- Equipment View --}}
                  <li>
                    <a href="/equipment" class="links">Zubehör</a>
                  </li> 
                </ul>
            </nav>
        </div>
 
        {{-- Navigationbar recht für User & Warenkorb --}}
        <div id="container-usernav">

          <nav class="navigation-user">
              <ul>
                {{-- User --}}
                <li>
                  <a href="/login">
                    <img src="/assets/img/icons/user.png" width="auto" height="30" alt="login">
                  </a>
                </li>
                {{-- Warenkorb --}}
                <li>
                  <a href="/warenkorb">
                    <img src="/assets/img/icons/warenkorb.gif" width="auto" height="30" alt="warenkorb">
                  </a>
                </li>
              </ul>
          </nav>
        </div>
  </div>
  
  {{-- Burger Menu für kleine Devices --}}
  <button id="menubutton-shop">
    <img id="drop-s" src="/assets/img/icons/dropdown.png" width="16" height="16" alt="Dropdown menu" >
    <img class="hide" id="close-s" src="/assets/img/icons/x.png" width="20" height="20" alt="x">
  </button>


