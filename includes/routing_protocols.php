<!-- Main Bootstrap Container -->
    <div class="container article-container my-5 p-4 p-md-5 shadow-lg rounded-3 bg-white">
        
        <!-- Titlul Principal -->
        <h1 class="h1 fw-bolder text-center mb-2 text-dark">Protocoalele de Rutare: Harta și Navigația Internetului</h1>
        <p class="lead text-secondary mb-5 text-center">O analiză detaliată a protocoalelor care stau la baza comunicării globale în rețea.</p>

        <p class="mb-4 text-dark">
            Protocoalele de rutare sunt seturi de reguli logice pe care "routerele" le folosesc pentru a schimba informații despre topologia rețelei, a construi "Tabele de Rutare" și a determina cea mai bună cale (sau calea optimă) pentru transmiterea pachetelor de date de la sursă la destinație.
        </p>
        <p class="mb-5 text-dark">
            Fără aceste protocoale, Internetul ar fi o colecție haotică de rețele care nu ar putea comunica între ele.
        </p>

        <!-- I. Clasificarea Protocoalelor de Rutare -->
        <h2 id="clasificarea" class="h2 fw-bold mt-5 mb-4 text-dark">I. Clasificarea Protocoalelor de Rutare</h2>
        <p class="mb-4 text-dark">
            Protocoalele de rutare sunt clasificate pe baza a două criterii principale:
        </p>

        <!-- A. Domeniul de Aplicare -->
        <h3 id="domeniul" class="h3 fw-semibold text-primary mt-4 mb-3">A. Domeniul de Aplicare: Interior (IGP) vs. Exterior (EGP)</h3>
        <p class="mb-4 text-dark">
            Clasificarea este făcută în funcție de locul unde rulează protocolul, în raport cu un "Sistem Autonom (AS - Autonomous System)". Un AS este o colecție de rețele și routere aflate sub un control administrativ unic (de exemplu, rețeaua unei universități, a unui furnizor de servicii Internet sau a unei companii mari).
        </p>

        <div class="mb-4 ps-4">
            <h6 class="h5 fw-semibold mt-4 mb-2 text-dark">1. Protocoale Interior Gateway (IGP)</h6>
            <ul class="list-unstyled space-y-2 text-dark">
                <li class="mb-1"><strong class="text-primary">Funcție:</strong> Rulă în interiorul unui singur Sistem Autonom. Scopul lor este de a calcula căi optime "interne".</li>
                <li class="mb-1"><strong class="text-primary">Exemple:</strong> RIP, OSPF, EIGRP, IS-IS.</li>
                <li class="mb-1"><strong class="text-primary">Metrica:</strong> Utilizează metrici simple (cost, bandă, hop-count) pentru a găsi calea <em class="fw-semibold">cea mai scurtă</em>.</li>
            </ul>

            <h6 class="h5 fw-semibold mt-4 mb-2 text-dark">2. Protocoale Exterior Gateway (EGP)</h6>
            <ul class="list-unstyled space-y-2 text-dark">
                <li class="mb-1"><strong class="text-primary">Funcție:</strong> Rulă între diferite Sisteme Autonome. Scopul lor este de a schimba informații despre accesibilitatea rețelelor între AS-uri.</li>
                <li class="mb-1"><strong class="text-primary">Exemplu:</strong> "BGP" (Border Gateway Protocol).</li>
                <li class="mb-1"><strong class="text-primary">Metrica:</strong> Utilizează "politici" și "atribute" de cale, nu doar distanța, deoarece deciziile de rutare sunt bazate pe acorduri comerciale și reguli administrative.</li>
            </ul>
        </div>
        
        <!-- B. Metoda de Lucru -->
        <h3 id="metoda" class="h3 fw-semibold text-primary mt-4 mb-3">B. Metoda de Lucru: Vector Distanță vs. Stare Legătură</h3>
        <p class="mb-4 text-dark">
            Această clasificare se referă la algoritmul fundamental pe care protocolul îl folosește pentru a calcula cea mai bună cale.
        </p>
        
        <div class="table-responsive mb-5">
            <table class="table table-striped table-bordered align-middle">
                <thead class="table-light">
                    <tr>
                        <th scope="col" class="text-uppercase small">Metodă</th>
                        <th scope="col" class="text-uppercase small">Mod de Operare</th>
                        <th scope="col" class="text-uppercase small">Metrica</th>
                        <th scope="col" class="text-uppercase small">Avantaje</th>
                        <th scope="col" class="text-uppercase small">Dezavantaje</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="fw-semibold text-primary">Vector Distanță (Distance Vector)</td>
                        <td>Routerul trimite întreaga sa tabelă de rutare către vecinii direcți la intervale regulate.</td>
                        <td>Hop Count, Întârziere</td>
                        <td>Simplitate, resurse reduse.</td>
                        <td class="text-danger">Convergență lentă, risc de bucle de rutare (<code class="text-danger">count-to-infinity</code>).</td>
                    </tr>
                    <tr>
                        <td class="fw-semibold text-primary">Stare Legătură (Link State)</td>
                        <td>Routerul construiește o hartă topologică (o "arbore SPF") a întregii rețele din AS.</td>
                        <td>Costul Legăturii (Bandă de transmisie)</td>
                        <td>Convergență rapidă, fără bucle.</td>
                        <td>Nevoie de memorie și putere de procesare mai mare.</td>
                    </tr>
                </tbody>
            </table>
        </div>


        <!-- II. Analiza Protocoalelor Interioare (IGP) -->
        <h2 id="analiza_igp" class="h2 fw-bold mt-5 mb-4 text-dark">II. Analiza Protocoalelor Interioare (IGP)</h2>

        <!-- 1. RIP -->
        <h3 id="rip" class="h3 fw-semibold text-primary mt-4 mb-3">1. RIP (Routing Information Protocol)</h3>
        <p class="mb-4 text-dark">
            RIP este cel mai vechi și mai simplu protocol IGP, bazat pe algoritmul "Bellman-Ford (modificat)".
        </p>
        <ul class="list-group list-group-flush ps-3 mb-4">
            <li class="list-group-item ps-0 border-0"><strong class="text-dark">Metrica:</strong> "Hop Count" (Numărul de Salturi). O cale cu mai puține salturi este considerată mai bună.</li>
            <li class="list-group-item ps-0 border-0"><strong class="text-dark">Limita:</strong> Maxim "15" hop-uri. O distanță de <code class="text-danger">16</code> sau mai mare este considerată infinită (inaccesibilă), limitând drastic scalabilitatea.</li>
            <li class="list-group-item ps-0 border-0"><strong class="text-dark">Vector Distanță:</strong> Routerele trimit întreaga tabelă de rutare (update-uri) vecinilor la fiecare "30 de secunde".</li>
        </ul>
        
        <div class="alert alert-warning border-start border-4 border-warning rounded-3 shadow-sm mb-5" role="alert">
            <h5 class="alert-heading fw-bold">Problema Principală (Count-to-Infinity):</h5>
            <p class="mb-0">Datorită naturii sale lente de a răspândi schimbările în rețea, RIP poate avea dificultăți în detectarea rapidă a căilor întrerupte, ducând la bucle de rutare temporare în care ruta către o destinație eșuată crește continuu (până la 16). Mecanisme de prevenire (Split Horizon, Route Poisoning) sunt folosite pentru a atenua acest risc.</p>
        </div>

        <!-- 2. OSPF -->
        <h3 id="ospf" class="h3 fw-semibold text-primary mt-4 mb-3">2. OSPF (Open Shortest Path First)</h3>
        <p class="mb-4 text-dark">
            OSPF este protocolul Link State standard și cel mai utilizat în rețelele de întreprinderi de mari dimensiuni. Se bazează pe algoritmul "Dijkstra" (numit și Algoritmul SPF - Shortest Path First).
        </p>
        <ul class="list-group list-group-flush ps-3 mb-4">
            <li class="list-group-item ps-0 border-0"><strong class="text-dark">Metrica:</strong> "Costul" legăturii. Costul este invers proporțional cu lățimea de bandă (de obicei: Cost $= 100.000 .000 / Bandă$ în <code class="text-muted">bps</code>). O lățime de bandă mai mare înseamnă un Cost mai mic și o cale mai bună.</li>
            <li class="list-group-item ps-0 border-0"><strong class="text-dark">Convergența:</strong> Este rapidă deoarece routerele inundă rețeaua cu pachete <code class="text-muted">LSA</code> (Link State Advertisement) numai atunci când există o schimbare în topologie.</li>
            <li class="list-group-item ps-0 border-0"><strong class="text-dark">Ierarhia:</strong> OSPF este un protocol ierarhic bazat pe "arii (Areas)". Routerele dintr-o arie (Area 1, Area 2 etc.) au cunoaștere completă a topologiei din aria lor, în timp ce aria de bază ("Area 0 - Backbone") asigură conectivitatea între toate celelalte arii. Această structură îmbunătățește scalabilitatea.</li>
        </ul>

        <!-- 3. EIGRP -->
        <h3 id="eigrp" class="h3 fw-semibold text-primary mt-4 mb-3">3. EIGRP (Enhanced Interior Gateway Routing Protocol)</h3>
        <p class="mb-4 text-dark">
            EIGRP este un protocol "hibrid" (sau Vector Distanță Avansat), creat inițial de Cisco. Acesta combină cele mai bune caracteristici ale metodelor Vector Distanță și Stare Legătură.
        </p>
        <ul class="list-group list-group-flush ps-3 mb-4">
            <li class="list-group-item ps-0 border-0"><strong class="text-dark">Algoritm:</strong> "DUAL (Diffusing Update Algorithm)". Acest algoritm permite o convergență extrem de rapidă și asigură rute fără bucle de rutare.</li>
            <li class="list-group-item ps-0 border-0"><strong class="text-dark">Metrica:</strong> O metrică compusă ce ia în considerare "Lățimea de Bandă (Bandwidth)", "Întârzierea (Delay)", fiabilitatea (Reliability) și încărcarea (Load). De obicei, doar Lățimea de Bandă și Întârzierea sunt folosite implicit.</li>
            <li class="list-group-item ps-0 border-0"><strong class="text-dark">Vecini:</strong> EIGRP folosește <code class="text-muted">Hello Messages</code> și stabilește "relații de vecinătate" cu alte routere EIGRP. Își menține cunoștințele de rutare în trei tabele: Tabelul de Vecini, Tabelul de Topologie și Tabelul de Rutare.</li>
        </ul>

        <!-- III. Protocolul Exterior (EGP): BGP -->
        <h2 id="analiza_egp" class="h2 fw-bold mt-5 mb-4 text-dark">III. Protocolul Exterior (EGP): BGP</h2>

        <!-- BGP -->
        <h3 id="bgp" class="h3 fw-semibold text-primary mt-4 mb-3">BGP (Border Gateway Protocol)</h3>
        <p class="mb-4 text-dark">
            BGP este singurul protocol EGP utilizat astăzi și este "motorul de rutare al Internetului global".
        </p>
        <ul class="list-group list-group-flush ps-3 mb-4">
            <li class="list-group-item ps-0 border-0"><strong class="text-dark">Tip:</strong> "Vector Cale (Path Vector)". În loc să trimită rutele cu o simplă metrică de distanță (ca RIP) sau cu o hartă topologică (ca OSPF), BGP trimite rutele împreună cu "calea AS" (o listă de Sisteme Autonome prin care pachetul trebuie să treacă).</li>
            <li class="list-group-item ps-0 border-0"><strong class="text-dark">Funcție:</strong> Conectează diferite AS-uri (de exemplu, conectarea rețelei Vodafone la rețeaua Orange sau la rețeaua Google).</li>
            <li class="list-group-item ps-0 border-0"><strong class="text-dark">Decizia de Rutare:</strong> Nu se bazează pe calea cea mai scurtă din punct de vedere tehnic, ci pe "politici de rutare" și "atribute" (<code class="text-muted">Path Attributes</code>). Aceste atribute (precum AS-Path, Local Preference, MED) permit administratorilor să implementeze acorduri comerciale.</li>
        </ul>
        
        <div class="alert alert-primary border-start border-4 border-primary rounded-3 shadow-sm mb-5" role="alert">
            <h5 class="alert-heading fw-bold">Exemplu:</h5>
            <p class="mb-0">Un router BGP poate prefera o rută mai lungă (mai multe AS-uri) dacă aceasta duce la o rețea a unui partener comercial prioritar (rutare bazată pe Politici) sau dacă aceasta are o Lățime de Bandă garantată (rutare bazată pe Atribute).</p>
        </div>


        <!-- Rezumat și Context -->
        <h2 id="rezumat" class="h2 fw-bold mt-5 mb-4 text-dark">💡 Rezumat și Context</h2>
        <p class="mb-4 text-dark">
            În cele din urmă, funcționarea Internetului depinde de coexistența acestor protocoale:
        </p>
        <ol class="list-group list-group-numbered ps-4 mb-4">
            <li class="list-group-item border-0 ps-0">Routerele din interiorul unei companii folosesc "OSPF" sau "EIGRP" pentru a găsi cea mai bună cale internă.</li>
            <li class="list-group-item border-0 ps-0">Routerele de frontieră (<code class="text-muted">Edge Routers</code>) folosesc "BGP" pentru a schimba informații despre rețelele externe (Internet) și pentru a lua decizii bazate pe politici (e.g., cine plătește pentru trafic).</li>
        </ol>
        <p class="mt-4 lead fw-semibold text-success">
            Înțelegerea acestor protocoale este esențială pentru oricine lucrează cu administrarea rețelelor la orice scară.
        </p>
    </div>