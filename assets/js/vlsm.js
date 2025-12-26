document.addEventListener('DOMContentLoaded', (event) => {
   
    // Get DOM elements
    let baseNetworkAddressInput = document.getElementById('baseNetworkAddress');
    console.log(baseNetworkAddressInput);
    
    let addSubnetBtn = document.getElementById('add_subnet');
    let submitBtn = document.getElementById('submit-btn');
    let resultsBody = document.getElementById('results_body');
    
    // Track subnet count for dynamic additions
    let subnetCount = 1;


    // Add subnet input functionality

addSubnetBtn.addEventListener('click', () => {
    // vairiablila pt numarare de subnete
    subnetCount++;

    //cream un nou element div pentru input cu atribuire clasa si adaugare HTML
    const subnetInput = document.createElement('div');
    subnetInput.className = 'subnet_quantity_input';
    subnetInput.innerHTML = `
        <label>Nr.${subnetCount}</label>
        <input type="number" class="form-control subnet_hosts_input"
               style="margin-left: 10px;" placeholder="Număr de hosturi" min="2">
    `;

    // create buton de stergere
    const removeBtn = document.createElement('button');
    removeBtn.type = 'button';
    removeBtn.className = 'remove-subnet slim-btn';
    removeBtn.textContent = 'Șterge';
    removeBtn.style.marginLeft = '8px';
    removeBtn.style.backgroundColor = 'red';
    removeBtn.style.color = 'white';
    removeBtn.style.fontWeight = 'bold';
    removeBtn.style.border = 'none';
    removeBtn.style.padding = '6px 10px'; // reasonable size

    subnetInput.appendChild(removeBtn);

    const container = document.querySelector('.subnet_input');
    if (container) {
      // keep "Add subnet" button at the end
      container.append(subnetInput, addSubnetBtn);
    }

    removeBtn.addEventListener('click', () => {
        // prevent removing last row if you want at least one input
        const rows = document.querySelectorAll('.subnet_quantity_input');
        if (rows.length <= 1) return;
        subnetInput.remove();
        renumberSubnetLabels();
    });
});








// helper: renumber labels and keep subnetCount in sync
function renumberSubnetLabels() {
    const nodes = Array.from(document.querySelectorAll('.subnet_quantity_input'));
    nodes.forEach((node, idx) => {
        const lbl = node.querySelector('label');
        if (lbl) lbl.textContent = `Nr.${idx + 1}`;
    });
    subnetCount = Math.max(1, nodes.length);
}








    // general function to validate input
    function validateInput(baseInput, hostList) {
        if (!baseInput || typeof baseInput !== 'string') 
            throw new Error('Adresa de rețea este necesară');
        
        const ipParts = baseInput.split('/');
        if (ipParts.length !== 2) 
            throw new Error('Format invalid. Folosiți formatul IP/prefix (ex: 192.168.1.0/24)');
        
        const prefix = parseInt(ipParts[1], 10);
        if (isNaN(prefix) || prefix < 0 || prefix > 32)
            throw new Error('Prefixul trebuie să fie între 0 și 32');

        if (!Array.isArray(hostList) || hostList.length === 0)
            throw new Error('Este necesară cel puțin o cerință de host');

        for (let i = 0; i < hostList.length; i++) {
            const v = Number(hostList[i]);
            if (!Number.isFinite(v) || !Number.isInteger(v) || v < 2)
                throw new Error(`Cerința ${i + 1}: Numărul de hosturi trebuie să fie un număr întreg >= 2`);
        }
        
        return true;
    }













    // Handle form submission
    submitBtn && submitBtn.addEventListener('click', (e) => {
        e.preventDefault();
        try {
            const baseInput = (baseNetworkAddressInput && baseNetworkAddressInput.value || '').trim();
            const hostInputs = Array.from(document.querySelectorAll('.subnet_hosts_input'));
            const hostRequirements = hostInputs.map(i => i.value ? parseInt(i.value, 10) : NaN)
                                              .filter(v => !isNaN(v));
            // usage of defined function validateInput
            validateInput(baseInput, hostRequirements);

            const allocations = allocateVLSM(baseInput, hostRequirements);
            renderResults(allocations);
        } catch (err) {
            alert(err.message || String(err));
            console.error(err);
        }
    });











    function ipv4ToInt(ip) {
        if (typeof ip !== 'string') return null;
        const parts = ip.trim().split('.');
        if (parts.length !== 4) return null;
        let res = 0;
        for (let i = 0; i < 4; i++) {
            const n = parseInt(parts[i], 10);
            if (isNaN(n) || n < 0 || n > 255) return null;
            res = (res << 8) | n;
        }
        return res >>> 0;
    }














    function intToIpv4(int) {
        int = int >>> 0;
        return [
            (int >>> 24) & 0xFF,
            (int >>> 16) & 0xFF,
            (int >>> 8) & 0xFF,
            int & 0xFF
        ].join('.');
    }








    function prefixToMask(prefix) {
        if (!Number.isFinite(prefix) || prefix < 0 || prefix > 32) return null;
        const maskInt = prefix === 0 ? 0 : ((0xFFFFFFFF << (32 - prefix)) >>> 0);
        return intToIpv4(maskInt);
    }









    function hostsToPrefix(hosts) {
        const needed = Number(hosts) + 2;
        if (!Number.isFinite(needed) || needed <= 0) return null;
        let bits = 0;
        while ((1 << bits) < needed) bits++;
        return 32 - bits;
    }








    function networkSize(prefix) {
        return 1 << (32 - prefix);
    }









    function parseBaseNetwork(input) {
        const parts = input.trim().split('/');
        if (parts.length !== 2) return null;
        const ip = parts[0];
        const prefix = parseInt(parts[1], 10);
        const ipInt = ipv4ToInt(ip);
        if (ipInt === null || isNaN(prefix) || prefix < 0 || prefix > 32) return null;
        const maskInt = prefix === 0 ? 0 : ((0xFFFFFFFF << (32 - prefix)) >>> 0);
        const networkInt = ipInt & maskInt;
        return { ip, ipInt, prefix, maskInt, networkInt };
    }









    function allocateVLSM(baseInput, hostRequirements) {
        const base = parseBaseNetwork(baseInput);
        if (!base) throw new Error('Adresă de rețea invalidă (ex: 192.168.1.0/24)');

        // Sort requirements descending and keep original index if needed later
        const reqs = hostRequirements
            .map((h, i) => ({ hosts: Number(h), idx: i }))
            .filter(r => Number.isFinite(r.hosts) && r.hosts >= 2)
            .sort((a, b) => b.hosts - a.hosts);

        if (reqs.length === 0) throw new Error('Nu există cerințe valide pentru subrețele.');

        let cursor = base.networkInt; // start at base network (masked)
        const allocations = [];
        let lastBroadcast = null;

        for (let i = 0; i < reqs.length; i++) {
            const hosts = reqs[i].hosts;
            const prefix = hostsToPrefix(hosts);
            if (prefix === null) throw new Error('Cerință invalidă: ${hosts}');
            const size = networkSize(prefix);
            const sizeMask = (~(size - 1)) >>> 0; // alignment mask

            // Align cursor up to boundary for this prefix
            cursor = ((cursor + (size - 1)) & sizeMask) >>> 0;

            // Ensure no overlap with previous allocation
            if (lastBroadcast !== null && (cursor <= lastBroadcast)) {
                cursor = (lastBroadcast + 1) >>> 0;
                cursor = ((cursor + (size - 1)) & sizeMask) >>> 0;
            }

            // Check for IPv4 space exhaustion
            const broadcast = (cursor + (size - 1)) >>> 0;
            if (broadcast >>> 0 < cursor >>> 0 || broadcast > 0xFFFFFFFF) {
                throw new Error('Spațiul de adrese IPv4 s-a epuizat în timpul alocării.');
            }

            // Push allocation
            const firstHost = size > 2 ? (cursor + 1) >>> 0 : null;
            const lastHost = size > 2 ? (broadcast - 1) >>> 0 : null;

            allocations.push({
                requestedHosts: hosts,
                prefix,
                network: intToIpv4(cursor),
                netInt: cursor >>> 0,
                mask: prefixToMask(prefix),
                firstHost: firstHost !== null ? intToIpv4(firstHost) : '-',
                lastHost: lastHost !== null ? intToIpv4(lastHost) : '-',
                broadcast: intToIpv4(broadcast),
                broadcastInt: broadcast >>> 0,
                usableHosts: Math.max(0, size - 2),
                totalAddresses: size
            });

            // Advance cursor after this subnet
            lastBroadcast = broadcast >>> 0;
            cursor = (broadcast + 1) >>> 0;
        }
        return allocations;
    }






    function renderResults(allocations) {
        if (!resultsBody) {
            console.table(allocations);
            return;
        }

        // Clear previous results
        resultsBody.innerHTML = '';

        allocations.forEach((a, idx) => {
            const tr = document.createElement('tr');
            tr.innerHTML = `
                <td>${idx + 1}</td>
                <td>${a.network}</td>
                <td>${a.firstHost}</td>
                <td>${a.lastHost}</td>
                <td>${a.broadcast}</td>
                <td>${a.mask}</td>
                <td>/${a.prefix}</td>
                <td>${a.usableHosts}</td>
                <td>${a.requestedHosts}</td>
            `;
            resultsBody.appendChild(tr);
        });
    }


});