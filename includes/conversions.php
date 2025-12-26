
<script src="./assets/js/conversion_personal.js"></script>
<div class="conversions_container container mb-5">

    <p id="error_message" style="color:red;"></p>

    <div class="conversion_card  animate__animated animate__fadeIn">
        <h1 style="font-weight:900;" class="mb-5 mt-5">Conversii binare</h1>
        <div class="first_conversion_container">

            <h4>Adresa de rețea</h4>
            <p class="mb-2">Adresa de rețea IPv4 (IP/CIDR)<span style="color:red; font-size: 20px;">*</span></p>
            <input type="text" id="baseNetworkAddress" class="form-control" placeholder="Ex:192.168.1.0/24">
            <p class="mt-2">Introduceți adresa IP care doriți să o convertiți.</p>
            <button id="submit-btn" class="section-btn subnet_submit mt-4" style="font-weight: 600;">Calculează<img src="./assets/images/calculator.svg" width="20px;" style="filter:invert(1); margin-left: 4px;"></button>
        </div>
        <div class="first_conversion_container mb-5">
            <h6>Adresa Rețea</h6>
            <label for="NetworkAddress" class="conversion_label" id="binaryNetwork"></label>
            <h6>Masca de subnet</h6>
            <label for="SubnetMask" class="conversion_label" id="binarySubnetMask"></label>
            
        </div>

    </div>




</div>