<!DOCTYPE html>
<html>
<head>
    <title>Certificates — Barangay Kingking</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">

    <style>
        :root {
            --blue-deep:   #1a3a6b;
            --blue-mid:    #2255a4;
            --blue-light:  #4a80d4;
            --blue-pale:   #e8f0fb;
            --blue-frost:  #f3f7ff;
            --blue-line:   #d0dff5;
            --text:        #111827;
            --muted:       #6b7a99;
            --white:       #ffffff;
            --green:       #2ea86b;
            --green-dark:  #186940;
            --sw:          220px;
        }

        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: 'DM Sans', sans-serif; background: var(--blue-frost); color: var(--text); display: flex; font-size: 14px; }

        .sidebar {
            width: var(--sw);
            min-height: 100vh;
            background: var(--blue-deep);
            display: flex;
            flex-direction: column;
            flex-shrink: 0;
            position: fixed;
            top: 0; left: 0;
        }

        .sidebar-brand {
            padding: 28px 24px 22px;
            border-bottom: 1px solid rgba(255,255,255,0.08);
        }

        .brand-name {
            font-size: 16px;
            font-weight: 600;
            color: var(--white);
            line-height: 1.3;
        }

        .brand-sub {
            font-size: 10px;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            color: rgba(255,255,255,0.3);
            margin-top: 3px;
        }

        .sidebar-nav {
            flex: 1;
            padding: 20px 0;
            overflow-y: auto;
        }

        .nav-label {
            font-size: 9px;
            font-weight: 600;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: rgba(255,255,255,0.22);
            padding: 0 24px;
            margin-bottom: 4px;
        }

        .nav-item {
            display: block;
            padding: 10px 24px;
            font-size: 13px;
            font-weight: 400;
            color: rgba(255,255,255,0.5);
            text-decoration: none;
            border: none;
            background: transparent;
            width: 100%;
            text-align: left;
            cursor: pointer;
            font-family: 'DM Sans', sans-serif;
            transition: color 0.12s, background 0.12s;
        }

        .nav-item:hover { color: rgba(255,255,255,0.85); background: rgba(255,255,255,0.04); }

        .nav-item.active {
            color: var(--white);
            background: rgba(255,255,255,0.07);
            font-weight: 500;
            border-left: 2px solid var(--blue-light);
        }

        .sidebar-foot {
            padding: 16px 24px;
            border-top: 1px solid rgba(255,255,255,0.06);
        }

        .nav-logout {
            display: block;
            padding: 8px 0;
            font-size: 12.5px;
            color: rgba(255,255,255,0.28);
            background: transparent;
            border: none;
            font-family: 'DM Sans', sans-serif;
            cursor: pointer;
            text-align: left;
            width: 100%;
            transition: color 0.12s;
        }
        .nav-logout:hover { color: rgba(255,120,120,0.75); }

        .main-wrap {
            margin-left: var(--sw);
            flex: 1;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .topbar {
            background: var(--white);
            border-bottom: 1px solid var(--blue-line);
            padding: 0 40px;
            height: 52px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-shrink: 0;
        }

        .breadcrumb { font-size: 12px; color: var(--muted); }
        .breadcrumb b { color: var(--blue-deep); font-weight: 500; }
        .topbar-date { font-size: 11.5px; color: var(--muted); }

        .content { padding: 40px; flex: 1; }

        .page-title {
            font-size: 22px;
            font-weight: 600;
            color: var(--blue-deep);
            margin-bottom: 28px;
        }

        .step-indicator {
            display: flex;
            align-items: center;
            gap: 0;
            margin-bottom: 28px;
        }

        .step-pill {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 8px 20px 8px 16px;
            border-radius: 6px;
            font-size: 12px;
            font-weight: 500;
            letter-spacing: 0.5px;
            color: var(--muted);
            background: var(--white);
            border: 1.5px solid var(--blue-line);
            transition: all 0.2s;
            position: relative;
        }

        .step-pill + .step-pill { margin-left: 8px; }

        .step-num {
            width: 22px;
            height: 22px;
            border-radius: 50%;
            background: var(--blue-line);
            color: var(--muted);
            font-size: 11px;
            font-weight: 600;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            transition: all 0.2s;
        }

        .step-pill.active {
            border-color: var(--blue-mid);
            color: var(--blue-deep);
            background: var(--blue-pale);
        }

        .step-pill.active .step-num {
            background: var(--blue-mid);
            color: var(--white);
        }

        .step-pill.done {
            border-color: var(--green);
            color: var(--green-dark);
            background: #f0faf6;
        }

        .step-pill.done .step-num {
            background: var(--green);
            color: var(--white);
        }

        .section-box {
            background: var(--white);
            border: 1px solid var(--blue-line);
            border-radius: 8px;
            padding: 28px 32px;
            margin-bottom: 24px;
        }

        .section-box-title {
            font-size: 15px;
            font-weight: 600;
            color: var(--blue-deep);
            margin-bottom: 20px;
        }

        .section-sub {
            font-size: 12px;
            color: var(--muted);
            margin-top: 2px;
            margin-bottom: 20px;
        }

        .step-box { display: none; }
        .step-box.active { display: block; }

        .filter-input {
            border: 1.5px solid var(--blue-line);
            border-radius: 6px;
            padding: 9px 14px;
            font-size: 13px;
            color: var(--text);
            font-family: 'DM Sans', sans-serif;
            outline: none;
            transition: border-color 0.2s;
            background: var(--white);
            width: 100%;
            max-width: 360px;
        }

        .filter-input:focus {
            border-color: var(--blue-light);
            box-shadow: 0 0 0 3px rgba(74,128,212,0.1);
        }

        .btn-primary-custom {
            background: var(--blue-deep);
            color: var(--white);
            border: none;
            border-radius: 6px;
            padding: 9px 22px;
            font-size: 12px;
            font-weight: 500;
            letter-spacing: 0.8px;
            text-transform: uppercase;
            cursor: pointer;
            font-family: 'DM Sans', sans-serif;
            transition: background 0.2s;
        }

        .btn-primary-custom:hover { background: var(--blue-mid); }

        .btn-secondary-custom {
            background: transparent;
            color: var(--muted);
            border: 1.5px solid var(--blue-line);
            border-radius: 6px;
            padding: 8px 18px;
            font-size: 12px;
            font-family: 'DM Sans', sans-serif;
            cursor: pointer;
            transition: background 0.15s;
        }

        .btn-secondary-custom:hover { background: var(--blue-frost); }

        .btn-success-custom {
            background: var(--green);
            color: var(--white);
            border: none;
            border-radius: 6px;
            padding: 9px 22px;
            font-size: 12px;
            font-weight: 500;
            letter-spacing: 0.8px;
            text-transform: uppercase;
            cursor: pointer;
            font-family: 'DM Sans', sans-serif;
            transition: background 0.2s;
        }

        .btn-success-custom:hover { background: var(--green-dark); }

        .btn-warning-custom {
            background: transparent;
            color: #92400e;
            border: 1.5px solid #fbbf24;
            border-radius: 6px;
            padding: 6px 14px;
            font-size: 11px;
            font-weight: 500;
            font-family: 'DM Sans', sans-serif;
            cursor: pointer;
            transition: background 0.15s;
        }

        .btn-warning-custom:hover { background: #fffbeb; }

        .btn-row {
            display: flex;
            gap: 10px;
            align-items: center;
            margin-top: 20px;
        }

        .staff-table {
            width: 100%;
            border-collapse: collapse;
            background: var(--white);
            border: 1px solid var(--blue-line);
            border-radius: 8px;
            overflow: hidden;
            margin-top: 20px;
        }

        .staff-table thead { background: var(--blue-pale); }

        .staff-table thead th {
            padding: 12px 20px;
            font-size: 10.5px;
            font-weight: 600;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            color: var(--blue-mid);
            text-align: left;
            border-bottom: 1px solid var(--blue-line);
        }

        .staff-table tbody tr {
            border-bottom: 1px solid var(--blue-line);
            transition: background 0.1s;
        }

        .staff-table tbody tr:last-child { border-bottom: none; }
        .staff-table tbody tr:hover { background: var(--blue-frost); }

        .staff-table tbody td {
            padding: 12px 20px;
            font-size: 13.5px;
            color: var(--text);
            vertical-align: middle;
        }

        .td-muted { color: var(--muted); font-size: 12.5px; }

        .select-btn {
            background: var(--blue-pale);
            color: var(--blue-mid);
            border: 1.5px solid var(--blue-line);
            border-radius: 5px;
            padding: 5px 14px;
            font-size: 11.5px;
            font-weight: 500;
            font-family: 'DM Sans', sans-serif;
            cursor: pointer;
            transition: background 0.15s, border-color 0.15s;
        }

        .select-btn:hover {
            background: var(--blue-mid);
            color: var(--white);
            border-color: var(--blue-mid);
        }

        .section-divider {
            border: none;
            border-top: 1px solid var(--blue-line);
            margin: 28px 0 24px;
        }

        .preview-box {
            border: 1.5px solid var(--blue-line);
            border-radius: 8px;
            padding: 48px 56px;
            background: var(--white);
            font-family: "Times New Roman", serif;
            text-align: justify;
            margin-top: 4px;
        }

        .cert-title {
            text-align: center;
            font-weight: bold;
            font-size: 20px;
            letter-spacing: 2px;
            text-transform: uppercase;
            margin: 16px 0;
        }

        .indent { text-indent: 40px; }

        .pagination-wrap {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 18px;
        }

        .pagination-info {
            font-size: 12px;
            color: var(--muted);
        }

        .pagination-controls {
            display: flex;
            gap: 4px;
            align-items: center;
        }

        .page-btn {
            min-width: 32px;
            height: 32px;
            border: 1.5px solid var(--blue-line);
            background: var(--white);
            border-radius: 5px;
            font-size: 12px;
            font-weight: 500;
            color: var(--blue-mid);
            cursor: pointer;
            font-family: 'DM Sans', sans-serif;
            transition: background 0.15s, border-color 0.15s;
            padding: 0 10px;
        }

        .page-btn:hover {
            background: var(--blue-pale);
            border-color: var(--blue-light);
        }

        .page-btn:disabled {
            opacity: 0.4;
            cursor: not-allowed;
        }

        @media print {
            body * { visibility: hidden; }
            .preview-box, .preview-box * { visibility: visible; }
            .preview-box {
                position: absolute;
                left: 0; top: 0;
                width: 100%;
                border: none;
                border-radius: 0;
                padding: 60px;
            }
        }
    </style>
</head>

<body>

    <div class="sidebar">
        <div class="sidebar-brand">
            <div class="brand-name">Barangay Kingking</div>
            <div class="brand-sub">Management System</div>
        </div>
        <nav class="sidebar-nav">
            <div class="nav-label">Navigation</div>
            <a href="/staff/dashboard" class="nav-item">Dashboard</a>
            <a href="/staff/residents" class="nav-item">Residents</a>
            <a href="/staff/certificates" class="nav-item active">Certificates</a>
            <a href="/staff/reports" class="nav-item">Reports</a>
            <a href="/staff/archive" class="nav-item">Archive</a>
        </nav>
        <div class="sidebar-foot">
            <button class="nav-logout" data-bs-toggle="modal" data-bs-target="#logoutModal">Logout</button>
        </div>
    </div>

    <div class="main-wrap">

        <div class="topbar">
            <div class="breadcrumb">Barangay System &nbsp;/&nbsp; <b>Certificates</b></div>
            <div class="topbar-date" id="topDate"></div>
        </div>

        <div class="content">

            <div class="page-title">Certificates</div>

            <div class="step-indicator">
                <div class="step-pill active" id="pill1">
                    <div class="step-num">1</div>
                    Select Type
                </div>
                <div class="step-pill" id="pill2">
                    <div class="step-num">2</div>
                    Select Resident
                </div>
                <div class="step-pill" id="pill3">
                    <div class="step-num">3</div>
                    Preview &amp; Print
                </div>
            </div>

            <div id="step1" class="step-box active">
                <div class="section-box">
                    <div class="section-box-title">Select Certificate Type</div>

                    <select id="certType" class="filter-input">
                        <option disabled selected>Choose a certificate type…</option>
                        <option value="Barangay Clearance">Barangay Clearance</option>
                        <option value="Certificate of Indigency">Certificate of Indigency</option>
                        <option value="Certificate of Residency">Certificate of Residency</option>
                    </select>

                    <div style="margin-top: 14px;">
                        <label style="font-size:12px; font-weight:500; color:var(--muted); display:block; margin-bottom:6px;">Purpose</label>
                        <input type="text" id="certPurpose" class="filter-input" placeholder="e.g. Employment, Scholarship, Loan Application…">
                    </div>

                    <div class="btn-row">
                        <button class="btn-primary-custom" onclick="goStep2()">Next →</button>
                    </div>
                </div>

                <div class="section-box">
                    <div class="section-box-title">Certificate Records</div>
                    <div class="section-sub">All issued certificates</div>

                    <table class="staff-table" id="certTable">
                        <thead>
                            <tr>
                                <th>Resident</th>
                                <th>Type</th>
                                <th>Purpose</th>
                                <th>Date Issued</th>
                                <th>Issued By</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($certificates as $c)
                            <tr class="cert-row">
                                <td>
                                    {{ optional($c->resident)->first_name }}
                                    {{ optional($c->resident)->last_name }}
                                </td>
                                <td class="td-muted">{{ $c->type }}</td>
                                <td class="td-muted">{{ $c->purpose ?? '—' }}</td>
                                <td class="td-muted">{{ \Carbon\Carbon::parse($c->issued_at)->format('F d, Y') }}</td>
                                <td>
                                    {{ optional($c->issuer)->first_name }}
                                    {{ optional($c->issuer)->middle_name }}
                                    {{ optional($c->issuer)->last_name }}
                                </td>
                                <td>
                                    <form method="POST" action="/staff/certificates/{{ $c->id }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-warning-custom">Archive</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="pagination-wrap">
                        <div class="pagination-info" id="certPageInfo"></div>
                        <div class="pagination-controls" id="certPageControls"></div>
                    </div>
                </div>
            </div>

            <div id="step2" class="step-box">
                <div class="section-box">
                    <div class="section-box-title">Select Resident</div>
                    <div class="section-sub">Choose the resident to issue the certificate to</div>

                    <button class="btn-secondary-custom" onclick="goStep1()">← Back</button>

                    <table class="staff-table" id="resTable">
                        <thead>
                            <tr>
                                <th>Resident Name</th>
                                <th style="width:120px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($residents as $r)
                            <tr class="res-row">
                                <td>
                                    {{ $r->first_name }}
                                    {{ $r->middle_name }}
                                    {{ $r->last_name }}
                                </td>
                                <td>
                                    <button class="select-btn" onclick='selectResident(@json($r))'>
                                        Select
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="pagination-wrap">
                        <div class="pagination-info" id="resPageInfo"></div>
                        <div class="pagination-controls" id="resPageControls"></div>
                    </div>
                </div>
            </div>

            <div id="step3" class="step-box">
                <div class="section-box">
                    <div class="section-box-title">Preview Certificate</div>

                    <div class="btn-row" style="margin-top:0; margin-bottom: 20px;">
                        <button class="btn-secondary-custom" onclick="goStep1()">← Change Type</button>
                        <button class="btn-secondary-custom" onclick="goStep2()">Change Resident</button>
                    </div>

                    <div class="preview-box" id="certificateBody"></div>

                    <form method="POST" action="/staff/certificates" id="certForm">
                        @csrf
                        <input type="hidden" name="resident_id" id="resident_id">
                        <input type="hidden" name="type" id="type_input">
                        <input type="hidden" name="purpose" id="purpose_input">

                        <div class="btn-row">
                            <button type="button" class="btn-success-custom" onclick="printAndSave()">
                                🖨️ &nbsp;Print &amp; Save Certificate
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

    @include('Logout')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('topDate').textContent = new Date().toLocaleDateString('en-PH', {
            weekday: 'long', year: 'numeric', month: 'long', day: 'numeric'
        });

        let selectedType     = "";
        let selectedResident = {};
        let selectedPurpose  = "";

        function setStep(step) {
            document.querySelectorAll('.step-box').forEach(e => e.classList.remove('active'));
            document.getElementById('step' + step).classList.add('active');

            const pills = [
                document.getElementById('pill1'),
                document.getElementById('pill2'),
                document.getElementById('pill3'),
            ];

            pills.forEach((pill, i) => {
                pill.classList.remove('active', 'done');
                if (i + 1 < step)  pill.classList.add('done');
                if (i + 1 === step) pill.classList.add('active');
            });
        }

        function goStep1() { setStep(1); }

        function goStep2() {
            selectedType = document.getElementById('certType').value;
            if (!selectedType || selectedType === 'Choose a certificate type…') {
                return alert("Please select a certificate type first.");
            }
            selectedPurpose = document.getElementById('certPurpose').value.trim();
            if (!selectedPurpose) {
                return alert("Please enter the purpose of the certificate.");
            }
            setStep(2);
        }

        function selectResident(res) {
            selectedResident = {
                id:res.id,
                first_name:res.first_name,
                middle_name:res.middle_name,
                last_name:res.last_name,
                suffix:res.suffix,
                purok:res.purok,
                birth:res.birthdate,
                gender:res.gender,
                civil:res.civil_status,
                age:res.age,
                citizenship:res.citizenship,
                resYears:res.years_of_residency,
                income:res.monthly_income
            };

            document.getElementById('resident_id').value  = res.id;
            document.getElementById('type_input').value   = selectedType;
            document.getElementById('purpose_input').value = selectedPurpose;

            setStep(3);
            generateCertificate();
        }

        function generateCertificate() {

            let today = new Date();
            let valid = new Date();
            valid.setMonth(valid.getMonth() + 6);

            const issued = today.toLocaleDateString('en-US', { year: 'numeric', month: 'long', day: 'numeric' });
            const until  = valid.toLocaleDateString('en-US', { year: 'numeric', month: 'long', day: 'numeric' });

            let income = parseFloat(selectedResident.income || 0);

            let fullName = `
                <b>${(selectedResident.first_name || '').toUpperCase()} 
                ${selectedResident.middle_name ? selectedResident.middle_name.toUpperCase() + ' ' : ''}
                ${(selectedResident.last_name || '').toUpperCase()}
                ${selectedResident.suffix ? selectedResident.suffix.toUpperCase() : ''}</b>
            `;

            let age         = `<b>${selectedResident.age || ''}</b>`;
            let civil       = `<b>${(selectedResident.civil || '').toUpperCase()}</b>`;
            let citizenship = `<b>FILIPINO</b>`;

            let purok = (selectedResident.purok || '').toUpperCase().replace(/^PUROK\s*/i, '');
            let address = `<b>PUROK ${purok}, BARANGAY KINGKING, PANTUKAN, DAVAO DE ORO</b>`;
            let resYears  = `<b>${selectedResident.resYears || 0}</b>`;

            let purpose = `<b>${selectedPurpose.toUpperCase()}</b>`;

            const header = `
                <div style="text-align:center; line-height:1.4; margin-bottom:10px;">
                    <div><b>REPUBLIC OF THE PHILIPPINES</b></div>
                    <div><b>PROVINCE OF DAVAO DE ORO</b></div>
                    <div><b>MUNICIPALITY OF PANTUKAN</b></div>
                    <div><b>BARANGAY KINGKING</b></div>
                    <div><b>OFFICE OF THE PUNONG BARANGAY</b></div>
                </div>
                <hr style="border-top: 1.5px solid #000; margin: 10px 0;">
            `;

            const baseBody = (title, content) => `
                ${header}
                <p class="cert-title">${title}</p>
                <p><b>TO WHOM IT MAY CONCERN:</b></p>
                ${content}
                <br><br>
                <div style="display:flex; justify-content:space-between; align-items:flex-start;">
                    <div style="text-align:center;">
                        <u><b>HON. JAN CARL AIZEL L. CAGALITAN</b></u><br>
                        <span>Punong Barangay</span>
                    </div>
                    <div style="text-align:right; font-size:13px; margin-top:120px;">
                        <b>DATE ISSUED:</b> <b>${issued}</b><br>
                        <b>VALID UNTIL:</b> <b>${until}</b><br>
                        <b>NOT VALID WITHOUT SEAL</b>
                    </div>
                </div>
            `;

            let content = "";

            if (selectedType === "Certificate of Indigency") {
                let status =
                    income <= 12082 ? "POOR" :
                    income <= 15000 ? "INDIGENT" :
                    income <= 21914 ? "LOW-INCOME" :
                    "NON-INDIGENT";

                content = `
                    <p class="indent" style="text-align:justify; margin-top:14px;">
                        This is to certify that ${fullName}, ${age} years of age, ${civil},
                        ${citizenship}, and a RESIDENT of ${address}.
                    </p>
                    <p class="indent" style="text-align:justify; margin-top:10px;">
                        The above-named belongs to a <b>${status}</b> household with a monthly income of <b>₱${income.toLocaleString()}</b>.
                    </p>
                    <p class="indent" style="text-align:justify; margin-top:10px;">
                        This certification is issued this <b>${issued}</b> for ${purpose} purposes.
                    </p>
                `;
                document.getElementById('certificateBody').innerHTML = baseBody("CERTIFICATE OF INDIGENCY", content);
            }

            else if (selectedType === "Certificate of Residency") {
                content = `
                    <p class="indent" style="text-align:justify; margin-top:14px;">
                        This is to certify that ${fullName}, ${age} years of age, ${civil},
                        ${citizenship}, and a RESIDENT of ${address}.
                    </p>
                    <p class="indent" style="text-align:justify; margin-top:10px;">
                        The above-named has been residing in this barangay for ${resYears} years and is of
                        <b>GOOD MORAL CHARACTER</b> with <b>NO PENDING CASE OR DEROGATORY RECORD</b>.
                    </p>
                    <p class="indent" style="text-align:justify; margin-top:10px;">
                        This certification is issued this <b>${issued}</b> for ${purpose} purposes.
                    </p>
                `;
                document.getElementById('certificateBody').innerHTML = baseBody("CERTIFICATE OF RESIDENCY", content);
            }

            else if (selectedType === "Barangay Clearance") {
                content = `
                    <p class="indent" style="text-align:justify; margin-top:14px;">
                        This is to certify that ${fullName}, ${age} years of age, ${civil},
                        ${citizenship}, and a RESIDENT of ${address}.
                    </p>
                    <p class="indent" style="text-align:justify; margin-top:10px;">
                        This further certifies that the above-named person is of
                        <b>GOOD MORAL CHARACTER</b> and has
                        <b>NO PENDING CASE OR DEROGATORY RECORD</b> in this barangay.
                    </p>
                    <p class="indent" style="text-align:justify; margin-top:10px;">
                        This clearance is issued this <b>${issued}</b> for ${purpose} purposes.
                    </p>
                `;
                document.getElementById('certificateBody').innerHTML = baseBody("BARANGAY CLEARANCE", content);
            }
        }

        function printAndSave() {
            window.print();
            setTimeout(() => {
                document.getElementById('certForm').submit();
                goStep1();
            }, 800);
        }

        function makePaginator(rowSelector, infoId, controlsId, rowsPerPage) {
            let currentPage = 1;
            const rows = Array.from(document.querySelectorAll(rowSelector));

            function totalPages() {
                return Math.max(1, Math.ceil(rows.length / rowsPerPage));
            }

            function render() {
                const start = (currentPage - 1) * rowsPerPage;
                const end   = start + rowsPerPage;
                rows.forEach(function(row, i) {
                    row.style.display = (i >= start && i < end) ? '' : 'none';
                });

                const showing = Math.min(end, rows.length);
                const from    = rows.length === 0 ? 0 : start + 1;

                const wrap = document.getElementById(controlsId);
                wrap.innerHTML = '';

                const prev = document.createElement('button');
                prev.className   = 'page-btn';
                prev.textContent = '←';
                prev.disabled    = currentPage === 1;
                prev.addEventListener('click', function() {
                    if (currentPage > 1) { currentPage--; render(); }
                });
                wrap.appendChild(prev);

                const label = document.createElement('span');
                label.style.cssText = 'font-size:12px; color:var(--muted); font-family:"DM Sans",sans-serif; padding:0 12px; line-height:32px; display:inline-block;';
                label.textContent = 'Page ' + currentPage + ' of ' + totalPages();
                wrap.appendChild(label);

                const next = document.createElement('button');
                next.className   = 'page-btn';
                next.textContent = '→';
                next.disabled    = currentPage === totalPages();
                next.addEventListener('click', function() {
                    if (currentPage < totalPages()) { currentPage++; render(); }
                });
                wrap.appendChild(next);
            }

            render();
        }

        makePaginator('.cert-row', 'certPageInfo', 'certPageControls', 4);
        makePaginator('.res-row', 'resPageInfo', 'resPageControls', 4);
    </script>
</body>
</html>