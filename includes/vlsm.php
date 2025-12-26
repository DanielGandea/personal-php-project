<script src="./assets/js/vlsm.js"></script>
<div class="vlsmpage">
  <div class="vlsm_calculator_container container animate__animated animate__fadeIn">
    <h1 class="mb-3 mt-5">VLSM Calculator</h1>
    <p id="vlsm_heading" class="mb-5">Subnetarea cu masca de subnet de lungime variabilă permite crearea subnetelor de lungimi diferite dintr-o singură rețea, optimizând astfel utilizarea adreselor IP și reducând din pierderi.</p>
  
    <div class="network_container">
      <div class="first_section_network_container">
        <h4>Adresa de rețea</h4>
        <p class="mb-2">Adresa de rețea (IP/CIDR)<span style="color:red; font-size: 20px;">*</span></p>
        <input type="text" id="baseNetworkAddress" class="form-control" placeholder="Ex:192.168.1.0/24">
        <p class="mt-2">Introduceți adresa IP care doriți să o divizați în subrețele.</p>
      </div>

      <div class="first_section_network_container">
        <h4>Cerințele de subrețelei</h4>
        <p>Adăugați cerințele pentru subrețele.<span style="color:red; font-size: 20px;">*</span></p>
        <div class="subnet_input">

        
          <div class="subnet_quantity_input">
            <label for="exampleNumberInput">Nr.1  <!-- pe viitor dinamic JS--></label>
            <input type="number" class="form-control subnet_hosts_input" style="margin-left: 10px;" placeholder="Număr de hosturi" min="2">


          </div>
          
                  <input type="button" id="add_subnet" class="slim-btn" value="Adaugă subnet +">
      </div>
      
      </div>
      <button id="submit-btn" class="section-btn subnet_submit" style="font-weight: 600;">Calculează<img src="./assets/images/calculator.svg" width="20px;" style="filter:invert(1); margin-left: 4px;"></button>
      

    

    </div>
  </div>

  <div class="results_container container">
    <table id="results_table">
      <thead>
        <tr>
          <th>Subnet</th>
          <th>Network Address</th>
          <th>Primul host</th>
          <th>Ultimul host</th>
          <th>Broadcast</th>
          <th>Subnet Mask</th>
          <th>CIDR</th>
          <th>Nr. hosturi</th>
          <th>Nr. hosturi cerute</th> 
        </tr>
      </thead>
      <tbody id="results_body">
        <!-- Rezultatele vor fi adăugate aici dinamic -->
      </tbody>
    </table>
  </div>
</div>