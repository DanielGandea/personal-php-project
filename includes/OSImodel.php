    <style>
        body {
            background-color: #f8fafc; /* light gray background */
            line-height: 1.7;
        }
        /* Custom styling for the main article container */
        .article-container {
            max-width: 1100px;
        }
        .article-container h2 {
            padding-bottom: 0.5rem;
            border-bottom: 2px solid #e5e7eb;
        }
        .osi-layer-card {
            transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
            border-radius: 0.75rem;
        }
        .osi-layer-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }
        /* Color mapping for layers (using Bootstrap colors where possible) */
        .layer-color-7 { background-color: #ffba5bff; } /* Warning */
        .layer-color-6 { background-color: #237023ff; } /* Success */
        .layer-color-5 { background-color: #7ae0ffff; } /* Info */
        .layer-color-4 { background-color: #00388bff; } /* Primary */
        .layer-color-3 { background-color: #35e4afff; } /* Custom Green */
        .layer-color-2 { background-color: #eb5766ff; } /* Danger */
        .layer-color-1 { background-color: #6c757d; } /* Secondary */
    </style>

<!-- Main Bootstrap Container -->
    <div class="container  my-5 p-4 p-md-5 shadow-lg rounded-3 bg-white">
        
        <!-- Titlul Principal -->
        <h1 class="h1 fw-bolder text-center mb-2 text-dark">Modelul OSI: Șapte Straturi, O Conexiune Perfectă</h1>
        <p class="lead text-secondary mb-5 text-center">Analiza arhitecturii de referință care definește modul în care comunică sistemele de calcul.</p>

        <p class="mb-4 text-dark">
            "Modelul de Interconectare a Sistemelor Deschise (OSI)" este un cadru conceptual creat de ISO (Organizația Internațională pentru Standardizare) care descrie modul în care datele circulă de la o aplicație software la alta, pe un mediu de transmisie. Deși astăzi modelul "TCP/IP" este cel folosit în practică, modelul OSI rămâne crucial pentru a înțelege logic și modular modul în care funcționează rețelele.
        </p>
        <p class="mb-5 text-dark">
            Modelul este structurat pe "șapte straturi (Layers)", fiecare având funcții specifice.
        </p>
        <img src="./assets/images/OSI.webp" width="800" height="450" class="img-fluid rounded-3 mb-5 shadow-sm" alt="OSI Model Diagram">

        <!-- I. Cele Șapte Straturi OSI -->
        <h2 id="straturi" class="h2 fw-bold mt-5 mb-4 text-dark">I. Cele Șapte Straturi OSI</h2>
        <p class="mb-4 text-dark">
            Straturile sunt numerotate de la 1 la 7, începând cu stratul fizic (cel mai aproape de mediul de transmisie) și terminând cu stratul aplicație (cel mai aproape de utilizator).
        </p>

        <!-- Straturi de la 7 la 1 -->
        <div class="row g-4 mt-4">
            
            <!-- Stratul 7: Aplicație (Application) -->
            <div class="col-12">
                <div class="osi-layer-card p-4 layer-color-7 text-dark shadow-sm">
                    <h5 class="fw-bold mb-1">7. Stratul Aplicație ("Application Layer")</h5>
                    <p class="mb-0 small text-dark opacity-75">"Interacțiunea cu utilizatorul și datele"</p>
                    <ul class="list-unstyled mb-0 mt-2 small">
                        <li>"Funcție:" Oferă interfața pentru utilizator și aplicațiile acestuia. Aici se generează sau se primește mesajul final.</li>
                        <li>"Unitatea de Date (PDU):" "Date" (Data).</li>
                        <li>"Protocoale comune:" HTTP, HTTPS, FTP, SMTP, POP3, DNS.</li>
                    </ul>
                </div>
            </div>

            <!-- Stratul 6: Prezentare (Presentation) -->
            <div class="col-12">
                <div class="osi-layer-card p-4 layer-color-6 text-white shadow-sm">
                    <h5 class="fw-bold mb-1">6. Stratul Prezentare ("Presentation Layer")</h5>
                    <p class="mb-0 small text-white opacity-75">"Sintaxa și Securitatea"</p>
                    <ul class="list-unstyled mb-0 mt-2 small">
                        <li>"Funcție:" Se ocupă de formatarea, compresia și criptarea/decriptarea datelor, asigurând că datele sunt înțelese de sistemul receptor.</li>
                        <li>"Unitatea de Date (PDU):" "Date" (Data).</li>
                        <li>"Protocoale comune:" JPEG, GIF, TLS/SSL (în interacțiune cu Stratul Sesiune).</li>
                    </ul>
                </div>
            </div>

            <!-- Stratul 5: Sesiune (Session) -->
            <div class="col-12">
                <div class="osi-layer-card p-4 layer-color-5 text-dark shadow-sm">
                    <h5 class="fw-bold mb-1">5. Stratul Sesiune ("Session Layer")</h5>
                    <p class="mb-0 small text-dark opacity-75">"Conexiunile de Dialog"</p>
                    <ul class="list-unstyled mb-0 mt-2 small">
                        <li>"Funcție:" Stabilește, gestionează și termină sesiunile (dialogurile) dintre aplicațiile finale. Asigură sincronizarea și controlul dialogului.</li>
                        <li>"Unitatea de Date (PDU):" "Date" (Data).</li>
                        <li>"Protocoale comune:" NetBIOS, RPC (Remote Procedure Call).</li>
                    </ul>
                </div>
            </div>

            <!-- Stratul 4: Transport (Transport) -->
            <div class="col-12">
                <div class="osi-layer-card p-4 layer-color-4 text-white shadow-sm">
                    <h5 class="fw-bold mb-1">4. Stratul Transport ("Transport Layer")</h5>
                    <p class="mb-0 small text-white opacity-75">"Comunicarea End-to-End"</p>
                    <ul class="list-unstyled mb-0 mt-2 small">
                        <li>"Funcție:" Oferă livrarea fiabilă sau ne-fiabilă, segmentarea, reasamblarea și controlul fluxului de date între aplicații (porturi) de pe host-uri diferite.</li>
                        <li>"Unitatea de Date (PDU):" "Segmente" (Segments - TCP) sau "Datagrame" (Datagrams - UDP).</li>
                        <li>"Protocoale comune:" TCP, UDP.</li>
                    </ul>
                </div>
            </div>

            <!-- Stratul 3: Rețea (Network) -->
            <div class="col-12">
                <div class="osi-layer-card p-4 bg-success text-white shadow-sm">
                    <h5 class="fw-bold mb-1">3. Stratul Rețea ("Network Layer")</h5>
                    <p class="mb-0 small text-white opacity-75">"Rutarea Logica"</p>
                    <ul class="list-unstyled mb-0 mt-2 small">
                        <li>"Funcție:" Responsabil pentru adresarea logică (adrese IP) și rutarea pachetelor de date pe cea mai bună cale de la sursă la destinație, chiar dacă se află în rețele diferite.</li>
                        <li>"Unitatea de Date (PDU):" "Pachete" (Packets).</li>
                        <li>"Dispozitive cheie:" Router, Router Layer 3.</li>
                        <li>"Protocoale comune:" IP, ICMP, Protocoale de Rutare (OSPF, BGP).</li>
                    </ul>
                </div>
            </div>

            <!-- Stratul 2: Legătură de Date (Data Link) -->
            <div class="col-12">
                <div class="osi-layer-card p-4 layer-color-2 text-white shadow-sm">
                    <h5 class="fw-bold mb-1">2. Stratul Legătură de Date ("Data Link Layer")</h5>
                    <p class="mb-0 small text-white opacity-75">"Adresarea Fizică (MAC)"</p>
                    <ul class="list-unstyled mb-0 mt-2 small">
                        <li>"Funcție:" Asigură transferul de date între nodurile adiacente (direct conectate). Se ocupă de adresarea fizică (adrese MAC) și detectarea erorilor.</li>
                        <li>"Unitatea de Date (PDU):" "Frame-uri" (Frames).</li>
                        <li>"Substraturi:" LLC (Logical Link Control) și MAC (Media Access Control).</li>
                        <li>"Dispozitive cheie:" Switch, Bridge, NIC (Network Interface Card).</li>
                        <li>"Protocoale comune:" Ethernet, PPP, Frame Relay.</li>
                    </ul>
                </div>
            </div>

            <!-- Stratul 1: Fizic (Physical) -->
            <div class="col-12">
                <div class="osi-layer-card p-4 layer-color-1 text-white shadow-sm">
                    <h5 class="fw-bold mb-1">1. Stratul Fizic ("Physical Layer")</h5>
                    <p class="mb-0 small text-white opacity-75">"Transmisia Binară"</p>
                    <ul class="list-unstyled mb-0 mt-2 small">
                        <li>"Funcție:" Transmite biții de date (0 și 1) pe mediul de transmisie. Definește specificațiile electrice, mecanice și funcționale.</li>
                        <li>"Unitatea de Date (PDU):" "Biți" (Bits).</li>
                        <li>"Dispozitive cheie:" Cabluri (Cupru, Fibră), Hub, Repeater.</li>
                        <li>"Protocoale comune:" IEEE 802.3 (Ethernet - parte fizică), USB.</li>
                    </ul>
                </div>
            </div>
            
        </div> <!-- End of Straturi Row -->

        <!-- II. Context și Încapsulare -->
        <h2 id="context" class="h2 fw-bold mt-5 mb-4 text-dark">II. Context și Procese Cheie</h2>
        
        <h3 class="h4 fw-semibold text-dark mt-4 mb-3">A. Încapsularea Datelor ("Encapsulation")</h3>
        <p class="mb-4 text-dark">
            Procesul prin care datele de la un strat superior sunt împachetate cu informații de control (Header-e și Trailer-e) de către stratul inferior. Acest proces se repetă de la Stratul 7 în jos până la Stratul 1.
        </p>
        <div class="alert alert-info border-start border-4 border-info rounded-3 shadow-sm mb-5" role="alert">
            <h5 class="alert-heading fw-bold">Exemplu de flux:</h5>
            <p class="mb-0">Datele (Stratul 7) devin "Segmente" (Stratul 4, adăugând header TCP) &rarr; "Pachete" (Stratul 3, adăugând header IP) &rarr; "Frame-uri" (Stratul 2, adăugând header MAC și trailer) &rarr; "Biți" (Stratul 1, transmiși fizic).</p>
        </div>

        <h3 class="h4 fw-semibold text-dark mt-4 mb-3">B. Rolul Modelului OSI</h3>
        <p class="mb-4 text-dark">
            Deși protocolul "TCP/IP" este cel care guvernează Internetul, Modelul OSI servește ca un instrument de diagnostic și un limbaj comun. Atunci când apare o problemă în rețea, tehnicienii folosesc cele șapte straturi pentru a izola sursa erorii.
        </p>
        
        <div class="table-responsive mb-5">
            <table class="table table-striped table-bordered align-middle">
                <thead class="table-light">
                    <tr>
                        <th scope="col" class="text-uppercase small">Strat</th>
                        <th scope="col" class="text-uppercase small">Funcție</th>
                        <th scope="col" class="text-uppercase small">Echivalent TCP/IP</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="fw-semibold text-primary">7, 6, 5</td>
                        <td>Aplicație, Prezentare, Sesiune</td>
                        <td>Stratul Aplicație</td>
                    </tr>
                    <tr>
                        <td class="fw-semibold text-primary">4</td>
                        <td>Transport</td>
                        <td>Stratul Transport</td>
                    </tr>
                    <tr>
                        <td class="fw-semibold text-primary">3</td>
                        <td>Rețea</td>
                        <td>Stratul Internet</td>
                    </tr>
                    <tr>
                        <td class="fw-semibold text-primary">2, 1</td>
                        <td>Legătură de Date, Fizic</td>
                        <td>Stratul de Acces la Rețea</td>
                    </tr>
                </tbody>
            </table>
        </div>
        

        <!-- Concluzie -->
        <p class="mt-4 lead fw-semibold text-success">
            Modelul OSI este coloana vertebrală teoretică a rețelisticii, oferind un mod structurat de a înțelege complexitatea comunicării digitale.
        </p>
    </div>
    