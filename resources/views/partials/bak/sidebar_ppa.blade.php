<nav id="sidebar">
    <div class="px-3">
        {{--  <a href="#" class="img logo rounded-circle mb-5" style="background-image: url(images/logo.jpg);"></a>  --}}
        <ul class="list-unstyled">
            <li>
            <a href="#TTCSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">I. Technology Transfer and <br>Commercialization</a>
            <ul class="collapse list-unstyled" id="TTCSubmenu">
                <li>
                <a href="#" >A. SETUP        </a>
                </li>
                <li>
                <a href="#" >B. LGIA</a>
                </li>
                <li>
                <a href="#" >C. CEST</a>
                </li>
            </ul>
        </ul>
        <ul class="list-unstyled">
            <li>
            <a href="#TaCSSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">II. Testing and Calibration <br>Services</a>
            <ul class="collapse list-unstyled" id="TaCSSubmenu">
                <li>
                <a href="#" onclick="$(this).displayPDF('{{ url($rstl) }}');">A. Chemical Laboratory </a>
                </li>
                <li>
                <a href="#" onclick="$(this).displayPDF('{{ url($rstl) }}');">B. Microbiological Laboratory </a>
                </li>
                <li>
                <a href="#" onclick="$(this).displayPDF('{{ url($rml) }}');">C. Regional Metrology Laboratory        </a>
                </li>
            </ul>
        </ul>
        <ul class="list-unstyled">
            <li>
            <a href="#TCSSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">III. Technical Consultancy <br>Services
            </a>
            <ul class="collapse list-unstyled" id="TCSSubmenu">
                <li>
                <a href="#" >A. Manufacturing Productivity Extension Program (MPEX)
                </a>
                </li>
                <li>
                <a href="#" >B. Consultancy for Agricultural Productivity Enhancement (CAPE)
                </a>
                </li>
                <li>
                <a href="#" >C. Food Safety and Quality Services
                </a>
                </li>
                <li>
                <a href="#" >D. Interagency Design and Engineering Assessment (IDEA)
                </a>
                </li>
            </ul>
        </ul>
        <ul class="list-unstyled">
            <li>
            <a href="#" >IV. Packaging and Labeling <br>Services
            </a>
        </ul>
        <ul class="list-unstyled">
            <li>
            <a href="#" >V. Technology Trainings
            </a>
        </ul>
        <ul class="list-unstyled">
            <li>
            <a href="#" >VI. Technology Clinics/Inverstors’ Fora
            </a>
        </ul>
        <ul class="list-unstyled">
            <li>
            <a href="#STSSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">VII. Science and Technology <br>Scholarship
            </a>
            <ul class="collapse list-unstyled" id="STSSubmenu">
                <li>
                <a href="#" onclick="$(this).displayPDF('{{ url($scholarship) }}');">A. Undergraduate Scholarship Program
                </a>
                </li>
                <li>
                <a href="#" onclick="$(this).displayPDF('{{ url($scholarship) }}');">B. Graduate Scholarships
                </a>
                </li>
            </ul>
        </ul>
        <ul class="list-unstyled">
            <li>
            <a href="#STPSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">VIII. S&T Promotion and Advocacy
            </a>
            <ul class="collapse list-unstyled" id="STPSubmenu">
                <li>
                <a href="#" >A. Press Releases and Events
                </a>
                </li>
                <li>
                <a href="#" onclick="$(this).displayPDF('{{ url($starbooks) }}');">B. STARBOOKS
                </a>
                </li>
            </ul>
        </ul>
        <ul class="list-unstyled">
            <li>
            <a href="#" >IX. Disaster Risk Reduction and Climate Change Adaptation and Mitigation
            </a>
        </ul>
        <ul class="list-unstyled">
            <li>
            <a href="#SpecialSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">X. S&T Promotion and Advocacy
            </a>
            <ul class="collapse list-unstyled" id="SpecialSubmenu">
                <li>
                <a href="#" onclick="$(this).displayPDF('{{ url($fic) }}');">A. Food Innovation<br>Center
                </a>
                </li>
                <li>
                <a href="#" >B. RXBOX
                </a>
                </li>
                <li>
                <a href="#" >C. HALAL
                </a>
                </li>
            </ul>
        </ul>
        <ul class="list-unstyled">
            <li>
            <a href="#RDSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">XI. R&D Networks and Linkages
            </a>
            <ul class="collapse list-unstyled" id="RDSubmenu">
                <li>
                <a href="#" >A. RRDIC
                </a>
                </li>
                <li>
                <a href="#" >B. CIEERDEC
                </a>
                </li>
                <li>
                <a href="#" >C. CRHRDC
                </a>
                </li>
                <li>
                <a href="#" >D. CorCAARD
                </a>
                </li>
            </ul>
        </ul>
    </div>
    <!--End pf Internal Services-->
</nav>
