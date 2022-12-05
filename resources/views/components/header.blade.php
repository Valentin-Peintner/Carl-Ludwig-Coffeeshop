{{-- Header Website --}}

  {{-- Logo --}}
  <div>
    <x-logo />
  </div>

  {{-- Navigationbar --}}
  <div class="navbar">
    <nav class="navigation fill">

      <ul class="navigation">
        {{-- Home --}}
        <li>
          <a href="/" class="myLinks">Home</a>
        </li>
        {{-- Über uns --}}
        <li>
          <a href="/about-us" class="myLinks">Über Uns</a>
        </li>
        {{-- Kontakt --}}
        <li>
          <a href="/contact" class="myLinks">Kontakt</a>
        </li>
        {{-- Online Shop --}}
        <li>
          <a href="/index-shop" target="_blank" class="myLinks">Shop</a>
        </li>   
      </ul>  
    </nav>
  </div>
  
  {{-- Burger Menu für kleine Devices --}}
  <button id="menubutton">
    <img id="drop" src="/assets/img/icons/dropdown.png" width="20" height="20" alt="Dropdown menu" >
    <img class="hide" id="close" src="/assets/img/icons/x.png" width="20" height="20" alt="x">
  </button>
  

