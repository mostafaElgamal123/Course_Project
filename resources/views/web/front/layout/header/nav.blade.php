<?php 
use App\Models\ChangeConstant;
 $changeconstant=ChangeConstant::first(); 
 ?>
<nav  class="navbar navbar-expand-lg bg-light sticky-top ">
    <div class="container">
        @include('web.front.layout.header.logo')
        <a href="#formview"  class="btn ms-auto main-btn hidden_mobile" type="submit">
           @if(isset($changeconstant->enrollnow)) {{$changeconstant->enrollnow}} @endif
        </a>
    </div>
</nav>