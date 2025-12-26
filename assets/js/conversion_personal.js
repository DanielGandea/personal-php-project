document.addEventListener('DOMContentLoaded', () => {

    let baseNetworkAddressInput = document.getElementById('baseNetworkAddress');
    
    let labelForIpBinary = document.getElementById('binaryNetwork');
    let labelForMaskBinary = document.getElementById('binarySubnetMask');

    let submitBtn = document.getElementById('submit-btn');
    let errorElement = document.getElementById('error_message');

    // dupa click-ul butonului principal: 
    submitBtn.addEventListener('click', () => {
        // 1. atribuim adresa IP CIDR introdusa  pentru prelucrare
        let cidrInput = baseNetworkAddressInput.value;
        
        // 2. desfacem in doua bucati: adresa IP si prefixul
        const parts = cidrInput.trim().split('/');

        // 3. daca nu avem 2 parti, rezulta ce aeste o problema
        if (parts.length !== 2) return null;

        // 4. Acum extragem cele doua parti:
        // partea de IP
        const ipPart = parts[0].trim();
        // partea masca subnet
        const prefix = parts[1].trim();

        // 5. Desfacem adresa IP in octeti -> despartire dupa punct -> facem array de numere zecimale
        const octets = ipPart.split('.').map(octet => parseInt(octet, 10));
        //console.log(octets);

        // 6. Verificam validitatea octetilor si a mastii

        if(!Array.isArray(octets) || octets.length !== 4) {
            errorElement.textContent = 'Adresa IP invalida (trebuie exact patru octeti IPv4)';
            console.log(octets, octets.length);
            return; // STOP
        }

        for (let i = 0; i < octets.length; i++) {
            if (!Number.isInteger(octets[i]) || octets[i] < 0 || octets[i] > 255) {
                errorElement.textContent = 'Adresa IP invalida';
                return; // STOP
            }
        }

        errorElement.textContent = ''; // reset error if IP is valid
        
        // verificam daca prefixul este valid
        const prefixInt = parseInt(prefix, 10);
        if (isNaN(prefixInt) || prefixInt < 1 || prefixInt > 32) {
            errorElement.textContent = 'Prefixul este invalid';
            return; // STOP 
        }
        
        // 7. Convertim octetii in binar

        labelForIpBinary.textContent = ''; // initial reset
        labelForMaskBinary.textContent = ''; // initial reset

        const binaryOctets = octets.map(octet => octet.toString(2));

        // afisam adresa IP in format binar
        for (let i = 0; i < binaryOctets.length - 1; i++) {
            labelForIpBinary.textContent += binaryOctets[i].padStart(8, '0') + '.';

        }
        labelForIpBinary.textContent += binaryOctets[3].padStart(8, '0');

        // 8. Convertim prefixul in masca binara

        // cream un array de 32 de biti cu '1' pentru prefix si '0' pentru rest
        const maskBits = '1'.repeat(prefixInt).padEnd(32, '0');

        // despartim in octeti de 8 biti
        const maskOctets = [
            maskBits.slice(0, 8),
            maskBits.slice(8, 16),
            maskBits.slice(16, 24),
            maskBits.slice(24, 32)
        ];

        // o unim intr-o singura linie cu puncte intre ele
        const maskFinalState = maskOctets.join('.');

        // afisam masca in format binar
        if (labelForMaskBinary) {
            labelForMaskBinary.textContent = maskFinalState;
        }
    }); 
});