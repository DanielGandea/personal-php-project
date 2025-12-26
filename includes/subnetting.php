<script src="./assets/js/subnet.js"></script>
<div class="vlsmpage subnettingpage">
  <div class="vlsm_calculator_container container subnetting_calculator_container  animate__animated animate__fadeIn">
    <h1 class="mb-3 mt-3">Subnet Calculator</h1>
    <p id="vlsm_heading" class="mb-5">Subnetarea cu masca de subnet de lungime variabilă permite crearea subnetelor de lungimi diferite dintr-o singură rețea, optimizând astfel utilizarea adreselor IP și reducând din pierderi.</p>
  
    <div class="network_container">
      <div class="first_section_network_container">
        <h4>Adresa de rețea</h4>
        <p>Adresa de rețea<span style="color:red; font-size: 20px;">*</span></p>
        <input type="text" id="network_address" class="form-control" placeholder="Ex: 192.168.1.0">
        
        <p class="mt-3 ">Prefixul rețelei (Masca după notația CIDR)</p>
        <input type="number" id="network_prefix" class="form-control" placeholder="Ex: 24" min="2" max="30">
        
      </div>

      <button type="submit" class="section-btn subnet_submit" style="font-weight: 600;">Calculează<img src="./assets/images/calculator.svg" width="20px;" style="filter:invert(1); margin-left: 4px;"></button>
      

    

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
        </tr>
      </thead>
      <tbody id="results_body">
        <!-- Rezultatele vor fi adăugate aici dinamic -->
      </tbody>
    </table>
  </div>
</div>