<!DOCTYPE html>
<html>
<head>
    <title>Residents — Barangay Kingking</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

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

        .section-box {
            background: var(--white);
            border: 1px solid var(--blue-line);
            border-radius: 8px;
            padding: 28px 32px;
            margin-bottom: 24px;
        }

        .section-head {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .section-title {
            font-size: 15px;
            font-weight: 600;
            color: var(--blue-deep);
        }

        .section-sub {
            font-size: 12px;
            color: var(--muted);
            margin-top: 2px;
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
            text-decoration: none;
            display: inline-block;
        }

        .btn-primary-custom:hover { background: var(--blue-mid); color: var(--white); }

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

        .act-btn {
            border-radius: 5px;
            padding: 5px 12px;
            font-size: 11.5px;
            font-weight: 500;
            font-family: 'DM Sans', sans-serif;
            cursor: pointer;
            border: 1.5px solid;
            transition: background 0.15s, color 0.15s;
        }

        .act-view { background: var(--blue-pale); color: var(--blue-mid); border-color: var(--blue-line); }
        .act-view:hover { background: var(--blue-mid); color: var(--white); border-color: var(--blue-mid); }

        .act-edit { background: #fffbeb; color: #92400e; border-color: #fbbf24; }
        .act-edit:hover { background: #fef3c7; }

        .act-archive { background: #fff1f2; color: #9f1239; border-color: #fda4af; }
        .act-archive:hover { background: #ffe4e6; }

        .staff-table {
            width: 100%;
            border-collapse: collapse;
            background: var(--white);
            border: 1px solid var(--blue-line);
            border-radius: 8px;
            overflow: hidden;
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

        .empty-row td {
            color: var(--muted);
            font-size: 13px;
            font-style: italic;
        }

        .status-badge {
            display: inline-block;
            padding: 3px 10px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 500;
        }

        .status-active   { background: #d1fae5; color: #065f46; }
        .status-moved    { background: #fef3c7; color: #92400e; }
        .status-deceased { background: #fee2e2; color: #991b1b; }

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

        .modal-content {
            border-radius: 10px;
            border: 1px solid var(--blue-line);
            font-family: 'DM Sans', sans-serif;
        }

        .modal-header {
            background: var(--blue-pale);
            border-bottom: 1px solid var(--blue-line);
            padding: 16px 24px;
        }

        .modal-header .modal-title {
            font-size: 15px;
            font-weight: 600;
            color: var(--blue-deep);
        }

        .modal-body {
            padding: 24px;
            background: var(--blue-frost);
        }

        .modal-footer {
            padding: 14px 24px;
            border-top: 1px solid var(--blue-line);
            background: var(--white);
        }

        .modal-section-box {
            background: var(--white);
            border: 1px solid var(--blue-line);
            border-radius: 8px;
            padding: 20px 24px;
            margin-bottom: 16px;
        }

        .modal-section-title {
            font-size: 10px;
            font-weight: 600;
            letter-spacing: 1.8px;
            text-transform: uppercase;
            color: var(--muted);
            margin-bottom: 14px;
        }

        .form-label-custom {
            font-size: 10.5px;
            font-weight: 600;
            letter-spacing: 0.8px;
            text-transform: uppercase;
            color: var(--muted);
            margin-bottom: 5px;
            display: block;
        }

        .form-input-custom {
            border: 1.5px solid var(--blue-line);
            border-radius: 6px;
            padding: 8px 12px;
            font-size: 13px;
            color: var(--text);
            font-family: 'DM Sans', sans-serif;
            outline: none;
            transition: border-color 0.2s;
            background: var(--white);
            width: 100%;
        }

        .form-input-custom:focus {
            border-color: var(--blue-light);
            box-shadow: 0 0 0 3px rgba(74,128,212,0.1);
        }

        .form-input-custom[readonly] {
            background: var(--blue-frost);
            color: var(--muted);
            cursor: not-allowed;
        }

        .detail-row {
            display: flex;
            gap: 8px;
            padding: 8px 0;
            border-bottom: 1px solid var(--blue-line);
            font-size: 13.5px;
        }

        .detail-row:last-child { border-bottom: none; }

        .detail-key {
            min-width: 160px;
            font-weight: 500;
            color: var(--muted);
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            padding-top: 1px;
        }

        .detail-val { color: var(--text); }
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
            <a href="/staff/dashboard"class="nav-item">Dashboard</a>
            <a href="/staff/residents"class="nav-item active">Residents</a>
            <a href="/staff/certificates"class="nav-item">Certificates</a>
            <a href="/staff/reports"class="nav-item">Reports</a>
            <a href="/staff/archive"class="nav-item">Archive</a>
        </nav>
        <div class="sidebar-foot">
            <button class="nav-logout" data-bs-toggle="modal" data-bs-target="#logoutModal">Logout</button>
        </div>
    </div>

    <div class="main-wrap">
        <div class="topbar">
            <div class="breadcrumb">Barangay System &nbsp;/&nbsp; <b>Residents</b></div>
            <div class="topbar-date" id="topDate"></div>
        </div>

        <div class="content">

            <div class="page-title">Residents</div>

            <div class="section-box">
                <div class="section-head">
                    <div>
                        <div class="section-title">Resident Records</div>
                        <div class="section-sub">All registered barangay residents</div>
                    </div>
                    <button class="btn-success-custom" data-bs-toggle="modal" data-bs-target="#addResident">
                        + Add Resident
                    </button>
                </div>

                <table class="staff-table" id="residentTable">
                    <thead>
                        <tr>
                            <th>Full Name</th>
                            <th>Purok</th>
                            <th>Contact</th>
                            <th>Status</th>
                            <th>Created By</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($residents as $r)
                        <tr class="res-row">
                            <td>
                                {{ $r->first_name }}
                                {{ $r->middle_name ? strtoupper(substr($r->middle_name,0,1)).'.' : '' }}
                                {{ $r->last_name }}
                            </td>
                            <td class="td-muted">{{ $r->purok }}</td>
                            <td class="td-muted">{{ $r->mobile_number }}</td>
                            <td>
                                @php
                                    $statusClass = match($r->resident_status) {
                                        'Active'   => 'status-active',
                                        'Moved'    => 'status-moved',
                                        'Deceased' => 'status-deceased',
                                        default    => ''
                                    };
                                @endphp
                                <span class="status-badge {{ $statusClass }}">{{ $r->resident_status }}</span>
                            </td>
                            <td class="td-muted">
                                {{ $r->creator
                                    ? $r->creator->first_name.' '.
                                    ($r->creator->middle_name ? strtoupper(substr($r->creator->middle_name,0,1)).'. ' : '').
                                    $r->creator->last_name
                                    : 'N/A'
                                }}
                            </td>
                            <td>
                                <div style="display:flex; gap:6px; flex-wrap:wrap;">
                                    <button class="act-btn act-view"
                                        data-bs-toggle="modal" data-bs-target="#view{{ $r->id }}">
                                        View
                                    </button>
                                    <button class="act-btn act-edit"
                                        data-bs-toggle="modal" data-bs-target="#edit{{ $r->id }}">
                                        Edit
                                    </button>
                                    <form method="POST" action="/staff/residents/{{ $r->id }}" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="act-btn act-archive"
                                            onclick="return confirm('Archive {{ $r->first_name }} {{ $r->last_name }}?')">
                                            Archive
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr class="empty-row">
                            <td colspan="6" style="text-align:center;">No residents found.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>

                <div class="pagination-wrap">
                    <div class="pagination-info" id="resPageInfo"></div>
                    <div class="pagination-controls" id="resPageControls"></div>
                </div>
            </div>

        </div>
    </div>

    @include('Logout')

    <div class="modal fade" id="addResident">
        <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
            <form method="POST" action="/staff/residents">
                @csrf
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title">Add Resident</h5>
                        <button class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">

                        <div class="modal-section-box">
                            <div class="modal-section-title">Personal Information</div>
                            <div class="row g-3">
                                <div class="col-md-3">
                                    <label class="form-label-custom">First Name</label>
                                    <input name="first_name" class="form-input-custom" placeholder="First Name">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label-custom">Middle Name</label>
                                    <input name="middle_name" class="form-input-custom" placeholder="Middle Name">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label-custom">Last Name</label>
                                    <input name="last_name" class="form-input-custom" placeholder="Last Name">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label-custom">Suffix</label>
                                    <input name="suffix" class="form-input-custom" placeholder="Suffix (Optional)">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label-custom">Gender</label>
                                    <select name="gender" class="form-input-custom">
                                        <option disabled selected>Gender</option>
                                        <option>Male</option>
                                        <option>Female</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label-custom">Birthdate</label>
                                    <input type="date" name="birthdate" class="form-input-custom" id="birthdate_add">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label-custom">Age</label>
                                    <input name="age" class="form-input-custom" id="age_add" placeholder="Age" readonly>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label-custom">Place of Birth</label>
                                    <input name="place_of_birth" class="form-input-custom" placeholder="Place of Birth">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label-custom">Civil Status</label>
                                    <select name="civil_status" class="form-input-custom">
                                        <option disabled selected>Civil Status</option>
                                        <option>Single</option>
                                        <option>Married</option>
                                        <option>Widowed</option>
                                        <option>Separated</option>
                                        <option>Divorced</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label-custom">Occupation</label>
                                    <input name="occupation" class="form-input-custom" placeholder="Occupation">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label-custom">Mobile Number</label>
                                    <input name="mobile_number" class="form-input-custom" placeholder="Mobile Number">
                                </div>
                            </div>
                        </div>

                        <div class="modal-section-box">
                            <div class="modal-section-title">Address Information</div>
                            <div class="row g-3">
                                <div class="col-md-3">
                                    <label class="form-label-custom">Purok</label>
                                    <input name="purok" class="form-input-custom" placeholder="Purok">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label-custom">Barangay</label>
                                    <input name="barangay" class="form-input-custom" value="Kingking" readonly>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label-custom">Municipality</label>
                                    <input name="municipality" class="form-input-custom" value="Pantukan" readonly>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label-custom">Province</label>
                                    <input name="province" class="form-input-custom" value="Davao de Oro" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="modal-section-box">
                            <div class="modal-section-title">Additional Information</div>
                            <div class="row g-3">
                                <div class="col-md-3">
                                    <label class="form-label-custom">Voter Status</label>
                                    <select name="voter_status" class="form-input-custom">
                                        <option disabled selected>Voter Status</option>
                                        <option>Yes</option>
                                        <option>No</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label-custom">PWD Status</label>
                                    <select name="pwd_status" class="form-input-custom">
                                        <option disabled selected>PWD Status</option>
                                        <option>Yes</option>
                                        <option>No</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label-custom">4Ps Status</label>
                                    <select name="fourps_status" class="form-input-custom">
                                        <option disabled selected>4Ps Status</option>
                                        <option>Yes</option>
                                        <option>No</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label-custom">Resident Status</label>
                                    <select name="resident_status" class="form-input-custom">
                                        <option disabled selected>Resident Status</option>
                                        <option>Active</option>
                                        <option>Moved</option>
                                        <option>Deceased</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label-custom">Monthly Income</label>
                                    <input type="number" name="monthly_income" class="form-input-custom" placeholder="Monthly Income">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label-custom">Citizenship</label>
                                    <input name="citizenship" class="form-input-custom" placeholder="Citizenship">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label-custom">Years in Barangay</label>
                                    <input type="number" name="years_of_residency" class="form-input-custom" placeholder="Years in Barangay">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label-custom">Employment Status</label>
                                    <select name="employment_status" class="form-input-custom">
                                        <option disabled selected>Select Status</option>
                                        <option>Employed</option>
                                        <option>Unemployed</option>
                                        <option>Self-Employed</option>
                                        <option>Student</option>
                                        <option>Retired</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn-secondary-custom" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn-success-custom">Save Resident</button>
                    </div>

                </div>
            </form>
        </div>
    </div>

    @foreach($residents as $r)
    <div class="modal fade" id="view{{ $r->id }}" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Resident Full Details</h5>
                    <button class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">

                    <div class="modal-section-box">
                        <div class="modal-section-title">Personal Information</div>
                        <div class="detail-row"><span class="detail-key">Full Name</span><span class="detail-val">{{ $r->first_name }} {{ $r->middle_name }} {{ $r->last_name }} {{ $r->suffix }}</span></div>
                        <div class="detail-row"><span class="detail-key">Gender</span><span class="detail-val">{{ $r->gender }}</span></div>
                        <div class="detail-row"><span class="detail-key">Birthdate</span><span class="detail-val">{{ $r->birthdate }}</span></div>
                        <div class="detail-row"><span class="detail-key">Age</span><span class="detail-val">{{ $r->age }}</span></div>
                        <div class="detail-row"><span class="detail-key">Place of Birth</span><span class="detail-val">{{ $r->place_of_birth }}</span></div>
                        <div class="detail-row"><span class="detail-key">Civil Status</span><span class="detail-val">{{ $r->civil_status }}</span></div>
                        <div class="detail-row"><span class="detail-key">Occupation</span><span class="detail-val">{{ $r->occupation }}</span></div>
                        <div class="detail-row"><span class="detail-key">Mobile</span><span class="detail-val">{{ $r->mobile_number }}</span></div>
                    </div>

                    <div class="modal-section-box">
                        <div class="modal-section-title">Address Information</div>
                        <div class="detail-row"><span class="detail-key">Full Address</span><span class="detail-val">{{ $r->purok }}, Kingking, Pantukan, Davao de Oro</span></div>
                    </div>

                    <div class="modal-section-box">
                        <div class="modal-section-title">Additional Information</div>
                        <div class="detail-row"><span class="detail-key">Voter Status</span><span class="detail-val">{{ $r->voter_status }}</span></div>
                        <div class="detail-row"><span class="detail-key">PWD</span><span class="detail-val">{{ $r->pwd_status }}</span></div>
                        <div class="detail-row"><span class="detail-key">4Ps</span><span class="detail-val">{{ $r->fourps_status }}</span></div>
                        <div class="detail-row"><span class="detail-key">Resident Status</span><span class="detail-val">{{ $r->resident_status }}</span></div>
                        <div class="detail-row"><span class="detail-key">Monthly Income</span><span class="detail-val">{{ $r->monthly_income ? '₱'.number_format($r->monthly_income, 2) : 'N/A' }}</span></div>
                        <div class="detail-row"><span class="detail-key">Citizenship</span><span class="detail-val">{{ $r->citizenship }}</span></div>
                        <div class="detail-row"><span class="detail-key">Years of Residency</span><span class="detail-val">{{ $r->years_of_residency }}</span></div>
                        <div class="detail-row"><span class="detail-key">Employment Status</span><span class="detail-val">{{ $r->employment_status }}</span></div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn-secondary-custom" data-bs-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>
    @endforeach

    @foreach($residents as $r)
    <div class="modal fade" id="edit{{ $r->id }}">
        <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
            <form method="POST" action="/staff/residents/update/{{ $r->id }}">
                @csrf
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title">Edit Resident</h5>
                        <button class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">

                        <div class="modal-section-box">
                            <div class="modal-section-title">Personal Information</div>
                            <div class="row g-3">
                                <div class="col-md-3">
                                    <label class="form-label-custom">First Name</label>
                                    <input name="first_name" class="form-input-custom" value="{{ $r->first_name }}">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label-custom">Middle Name</label>
                                    <input name="middle_name" class="form-input-custom" value="{{ $r->middle_name }}">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label-custom">Last Name</label>
                                    <input name="last_name" class="form-input-custom" value="{{ $r->last_name }}">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label-custom">Suffix</label>
                                    <input name="suffix" class="form-input-custom" value="{{ $r->suffix }}">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label-custom">Gender</label>
                                    <select name="gender" class="form-input-custom">
                                        <option disabled>Gender</option>
                                        <option value="Male"   {{ $r->gender=='Male'   ? 'selected' : '' }}>Male</option>
                                        <option value="Female" {{ $r->gender=='Female' ? 'selected' : '' }}>Female</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label-custom">Birthdate</label>
                                    <input type="date" name="birthdate" class="form-input-custom birthdate-edit"
                                        data-id="{{ $r->id }}" value="{{ $r->birthdate }}">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label-custom">Age</label>
                                    <input name="age" class="form-input-custom" id="age_edit_{{ $r->id }}"
                                        value="{{ $r->age }}" readonly>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label-custom">Place of Birth</label>
                                    <input name="place_of_birth" class="form-input-custom" value="{{ $r->place_of_birth }}">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label-custom">Civil Status</label>
                                    <select name="civil_status" class="form-input-custom">
                                        <option disabled>Civil Status</option>
                                        <option value="Single"    {{ $r->civil_status=='Single'    ? 'selected' : '' }}>Single</option>
                                        <option value="Married"   {{ $r->civil_status=='Married'   ? 'selected' : '' }}>Married</option>
                                        <option value="Widowed"   {{ $r->civil_status=='Widowed'   ? 'selected' : '' }}>Widowed</option>
                                        <option value="Separated" {{ $r->civil_status=='Separated' ? 'selected' : '' }}>Separated</option>
                                        <option value="Divorced"  {{ $r->civil_status=='Divorced'  ? 'selected' : '' }}>Divorced</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label-custom">Occupation</label>
                                    <input name="occupation" class="form-input-custom" value="{{ $r->occupation }}">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label-custom">Mobile Number</label>
                                    <input name="mobile_number" class="form-input-custom" value="{{ $r->mobile_number }}">
                                </div>
                            </div>
                        </div>

                        <div class="modal-section-box">
                            <div class="modal-section-title">Address Information</div>
                            <div class="row g-3">
                                <div class="col-md-3">
                                    <label class="form-label-custom">Purok</label>
                                    <input name="purok" class="form-input-custom" value="{{ $r->purok }}">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label-custom">Barangay</label>
                                    <input name="barangay" class="form-input-custom" value="Kingking" readonly>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label-custom">Municipality</label>
                                    <input name="municipality" class="form-input-custom" value="Pantukan" readonly>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label-custom">Province</label>
                                    <input name="province" class="form-input-custom" value="Davao de Oro" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="modal-section-box">
                            <div class="modal-section-title">Additional Information</div>
                            <div class="row g-3">
                                <div class="col-md-3">
                                    <label class="form-label-custom">Voter Status</label>
                                    <select name="voter_status" class="form-input-custom">
                                        <option value="Yes" {{ $r->voter_status=='Yes' ? 'selected' : '' }}>Yes</option>
                                        <option value="No"  {{ $r->voter_status=='No'  ? 'selected' : '' }}>No</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label-custom">PWD Status</label>
                                    <select name="pwd_status" class="form-input-custom">
                                        <option value="Yes" {{ $r->pwd_status=='Yes' ? 'selected' : '' }}>Yes</option>
                                        <option value="No"  {{ $r->pwd_status=='No'  ? 'selected' : '' }}>No</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label-custom">4Ps Status</label>
                                    <select name="fourps_status" class="form-input-custom">
                                        <option value="Yes" {{ $r->fourps_status=='Yes' ? 'selected' : '' }}>Yes</option>
                                        <option value="No"  {{ $r->fourps_status=='No'  ? 'selected' : '' }}>No</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label-custom">Resident Status</label>
                                    <select name="resident_status" class="form-input-custom">
                                        <option value="Active"   {{ $r->resident_status=='Active'   ? 'selected' : '' }}>Active</option>
                                        <option value="Moved"    {{ $r->resident_status=='Moved'    ? 'selected' : '' }}>Moved</option>
                                        <option value="Deceased" {{ $r->resident_status=='Deceased' ? 'selected' : '' }}>Deceased</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label-custom">Monthly Income</label>
                                    <input type="number" name="monthly_income" class="form-input-custom" value="{{ $r->monthly_income }}">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label-custom">Citizenship</label>
                                    <input name="citizenship" class="form-input-custom" value="{{ $r->citizenship }}">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label-custom">Years of Residency</label>
                                    <input type="number" name="years_of_residency" class="form-input-custom" value="{{ $r->years_of_residency }}">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label-custom">Employment Status</label>
                                    <select name="employment_status" class="form-input-custom">
                                        <option value="Employed"      {{ $r->employment_status=='Employed'      ? 'selected' : '' }}>Employed</option>
                                        <option value="Unemployed"    {{ $r->employment_status=='Unemployed'    ? 'selected' : '' }}>Unemployed</option>
                                        <option value="Self-Employed" {{ $r->employment_status=='Self-Employed' ? 'selected' : '' }}>Self-Employed</option>
                                        <option value="Student"       {{ $r->employment_status=='Student'       ? 'selected' : '' }}>Student</option>
                                        <option value="Retired"       {{ $r->employment_status=='Retired'       ? 'selected' : '' }}>Retired</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn-secondary-custom" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn-success-custom">Update Resident</button>
                    </div>

                </div>
            </form>
        </div>
    </div>
    @endforeach

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>

        document.getElementById('topDate').textContent = new Date().toLocaleDateString('en-PH', {
            weekday: 'long', year: 'numeric', month: 'long', day: 'numeric'
        });

        document.getElementById('birthdate_add')?.addEventListener('change', function () {
            let b = new Date(this.value), t = new Date();
            let age = t.getFullYear() - b.getFullYear();
            let m = t.getMonth() - b.getMonth();
            if (m < 0 || (m === 0 && t.getDate() < b.getDate())) age--;
            document.getElementById('age_add').value = age;
        });

        document.querySelectorAll('.birthdate-edit').forEach(function(input) {
            input.addEventListener('change', function () {
                let id = this.dataset.id;
                let b = new Date(this.value), t = new Date();
                let age = t.getFullYear() - b.getFullYear();
                let m = t.getMonth() - b.getMonth();
                if (m < 0 || (m === 0 && t.getDate() < b.getDate())) age--;
                let f = document.getElementById('age_edit_' + id);
                if (f) f.value = age;
            });
        });

        const rowsPerPage = 10;
        let currentPage  = 1;
        const allRows    = Array.from(document.querySelectorAll('.res-row'));
        const totalRows  = allRows.length;

        function totalPages() {
            return Math.max(1, Math.ceil(totalRows / rowsPerPage));
        }

        function renderTable() {
            const start = (currentPage - 1) * rowsPerPage;
            const end   = start + rowsPerPage;
            allRows.forEach(function(row, i) {
                row.style.display = (i >= start && i < end) ? '' : 'none';
            });
            renderControls();
        }

        function renderControls() {
            const tp   = totalPages();
            const wrap = document.getElementById('resPageControls');
            wrap.innerHTML = '';

            const prev = document.createElement('button');
            prev.className = 'page-btn';
            prev.textContent = '←';
            prev.disabled = currentPage === 1;
            prev.addEventListener('click', function() {
                if (currentPage > 1) { currentPage--; renderTable(); }
            });
            wrap.appendChild(prev);

            const label = document.createElement('span');
            label.style.cssText = 'font-size:12px; color:var(--muted); font-family:"DM Sans",sans-serif; padding:0 12px; line-height:32px; display:inline-block;';
            label.textContent = 'Page ' + currentPage + ' of ' + tp;
            wrap.appendChild(label);

            const next = document.createElement('button');
            next.className = 'page-btn';
            next.textContent = '→';
            next.disabled = currentPage === tp;
            next.addEventListener('click', function() {
                if (currentPage < totalPages()) { currentPage++; renderTable(); }
            });
            wrap.appendChild(next);
        }

        renderTable();
    </script>
</body>
</html>