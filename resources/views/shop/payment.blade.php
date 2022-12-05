@section('pageTitle', 'Shop | Bezahlung')

<x-layout-payment>
    <x-slot name="body">
           
    <div class="payment-container">
            <div class="user-info-payment">

            <div class="user-payment-form"> 


                <p class="form-header">{{__('Das ist die von dir angegebene Lieferadresse!')}}</p>
                <span>{{__('Falls du doch eine andere Lieferadresse hast, kannst du sie hier ändern')}}</span>

                <form action=" {{route('stripe.index')}} " method="get" novalidate>
                    @csrf
            
                    @foreach($adresses as $adress)
                    <div class="adress-details">
                        <!-- street -->
                        <div class="input-box">
                            <x-label class="details" for="street" :value="__('Straße')" />
                            <x-input id="street" type="text" name="street"  :value="($adress->street)" autofocus />
                        </div>

                        <!-- number -->
                        <div class="input-box">
                            <x-label class="details" for="number" :value="__('Nummer')" />
                            <x-input id="number" type="numeric" name="number" :value="($adress->number)"  
                            autofocus />
                        </div>

                        <!-- City-->
                        <div class="input-box">
                            <x-label class="details" for="city" :value="__('Ort')" />
                            <x-input id="city" type="text" name="city" :value="($adress->city)"
                                autofocus />
                        </div>

                        <!-- zip -->
                        <div class="input-box">
                            <x-label class="details" for="zip" :value="__('Postleitzahl')" />
                            <x-input id="zip" type="numeric" name="zip" :value="($adress->zip)" autofocus />
                        </div>

                        <!-- country-->
                        <div class="input-box">
                            <x-label class="details select" for="country" :value="__('Land')" />
                                <select name="country" id="country"  autofocus>
                                    @if ($adress->Country->country == 'Österreich')
                                    <option value="1"> {{$adress->Country->country}}</option>
                                    <option value="2"> Deutschland</option>
                                    <option value="3"> Schweiz</option>

                                @elseif ($adress->Country->country == 'Deutschland')
                                    <option value="2"> {{$adress->Country->country}}</option>
                                    <option value="1"> Österreich</option>
                                    <option value="3"> Schweiz</option>
                                @else
                                    <option value="3"> {{$adress->Country->country}}</option>
                                    <option value="1"> Österreich</option>
                                    <option value="2"> Deutschland</option>
                                @endif
                                </select>   
                                @endforeach     
                        </div>         
                        
                   
                        <div  id="btn-payment">
                                <x-button>Weiter</x-button>
                           
                        </div> 
              
                    </form>
                </div>
            </div>          
            
           

        </x-slot>
</x-layout-payment> 


