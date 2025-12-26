// Fixed Length Subnet Mask Calculator

document.addEventListener('DOMContentLoaded', function() {
    const submitBtn = document.querySelector('.subnet_submit');
    const networkAddressInput = document.getElementById('network_address');
    const networkPrefixInput = document.getElementById('network_prefix');
    const resultsBody = document.getElementById('results_body');
    const resultsTable = document.getElementById('results_table');

    if (submitBtn) {
        submitBtn.addEventListener('click', calculateSubnets);
    }

    // Allow Enter key to trigger calculation
    if (networkAddressInput) {
        networkAddressInput.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') calculateSubnets();
        });
    }
    if (networkPrefixInput) {
        networkPrefixInput.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') calculateSubnets();
        });
    }

    function calculateSubnets() {
        const networkAddress = networkAddressInput.value.trim();
        const prefix = parseInt(networkPrefixInput.value);

        // Validate inputs
        if (!networkAddress) {
            alert('Vă rugăm să introduceți o adresă de rețea validă!');
            return;
        }

        if (!prefix || prefix < 2 || prefix > 30) {
            alert('Vă rugăm să introduceți un prefix între 2 și 30!');
            return;
        }

        if (!isValidIP(networkAddress)) {
            alert('Adresa IP introdusă nu este validă!');
            return;
        }

        // Calculate and display results
        const subnets = generateSubnets(networkAddress, prefix);
        displayResults(subnets);
    }

    function isValidIP(ip) {
        const parts = ip.split('.');
        if (parts.length !== 4) return false;
        
        return parts.every(part => {
            const num = parseInt(part);
            return num >= 0 && num <= 255 && part === num.toString();
        });
    }

    function ipToInt(ip) {
        const parts = ip.split('.');
        return (parseInt(parts[0]) << 24) +
               (parseInt(parts[1]) << 16) +
               (parseInt(parts[2]) << 8) +
               parseInt(parts[3]);
    }

    function intToIp(int) {
        return [
            (int >>> 24) & 0xFF,
            (int >>> 16) & 0xFF,
            (int >>> 8) & 0xFF,
            int & 0xFF
        ].join('.');
    }

    function getSubnetMask(prefix) {
        const mask = -1 << (32 - prefix);
        return intToIp(mask >>> 0);
    }

    function getNetworkAddress(ip, prefix) {
        const ipInt = ipToInt(ip);
        const mask = (-1 << (32 - prefix)) >>> 0;
        return intToIp((ipInt & mask) >>> 0);
    }

    function generateSubnets(networkAddress, prefix) {
        // Get the actual network address (in case user provided a host address)
        const actualNetworkAddress = getNetworkAddress(networkAddress, prefix);
        const networkInt = ipToInt(actualNetworkAddress);
        const subnetMask = getSubnetMask(prefix);
        
        // For FLSM, we only show the single subnet that was entered
        const hostsPerSubnet = Math.pow(2, 32 - prefix) - 2;
        const totalAddresses = Math.pow(2, 32 - prefix);
        
        const firstHostInt = (networkInt + 1) >>> 0;
        const broadcastInt = (networkInt + totalAddresses - 1) >>> 0;
        const lastHostInt = (broadcastInt - 1) >>> 0;

        const subnets = [{
            subnetNumber: 1,
            networkAddress: actualNetworkAddress,
            firstHost: intToIp(firstHostInt),
            lastHost: intToIp(lastHostInt),
            broadcast: intToIp(broadcastInt),
            subnetMask: subnetMask,
            cidr: `/${prefix}`,
            numHosts: hostsPerSubnet
        }];

        return subnets;
    }

    function displayResults(subnets) {
        resultsBody.innerHTML = '';

        if (subnets.length === 0) {
            resultsBody.innerHTML = '<tr><td colspan="8" style="text-align: center;">Nu există subnete de afișat</td></tr>';
            return;
        }

        subnets.forEach(subnet => {
            const row = document.createElement('tr');
            row.innerHTML = `
                <td>Subnet ${subnet.subnetNumber}</td>
                <td>${subnet.networkAddress}</td>
                <td>${subnet.firstHost}</td>
                <td>${subnet.lastHost}</td>
                <td>${subnet.broadcast}</td>
                <td>${subnet.subnetMask}</td>
                <td>${subnet.cidr}</td>
                <td>${subnet.numHosts}</td>
            `;
            resultsBody.appendChild(row);
        });

        // Show results table
        resultsTable.style.display = 'table';
        
        // Scroll to results
        setTimeout(() => {
            resultsTable.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
        }, 100);
    }
});